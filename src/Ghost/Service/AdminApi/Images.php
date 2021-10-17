<?php

namespace Davaxi\Ghost\Service\AdminApi;

use Davaxi\Ghost\Exception\InvalidParamsException;
use Davaxi\Ghost\Exception\HttpRequestException;
use Davaxi\Ghost\Service\AdminApi;

class Images extends AdminApi
{
    const BASE_URL = '{url}/ghost/api/{version}/admin/images{path}';

    # https://ghost.org/docs/admin-api/#the-post-object
    const AVAILABLE_PURPOSES = [
        'image',
        'profile_image',
        'icon'
    ];

    /**
     * @param string $filePath
     * @param string $ref
     * @param string $purpose
     * @return mixed
     * @throws InvalidParamsException
     * @throws HttpRequestException
     */
    public function upload(string $filePath, string $ref = '', string $purpose = 'image')
    {
        if (!in_array($purpose, static::AVAILABLE_PURPOSES)) {
            throw new InvalidParamsException('Invalid purpose for picture. Only available : ' . implode(',', static::AVAILABLE_PURPOSES));
        }

        $data = [];
        $data['purpose'] = $purpose;
        if ($ref) {
            $data['ref'] = $ref;
        }
        return $this->_request('POST-FORM', '/upload/', [], $data, ['file' => $filePath]);
    }
}