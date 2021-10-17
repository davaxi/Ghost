<?php

namespace Davaxi\Ghost\Service\AdminApi;

use Davaxi\Ghost\Exception\HttpRequestException;
use Davaxi\Ghost\Exception\InvalidParamsException;

class Themes extends Posts
{
    const BASE_URL = '{url}/ghost/api/{version}/admin/themes{path}';

    /**
     * @param string $zipPath
     * @return mixed
     * @throws HttpRequestException
     * @throws InvalidParamsException
     */
    public function upload(string $zipPath)
    {
        return $this->_request('POST-FORM', '/upload', [], [], ['file' => $zipPath]);
    }

    /**
     * @param string $name
     * @return mixed
     * @throws HttpRequestException
     * @throws InvalidParamsException
     */
    public function activate(string $name)
    {
        return $this->_request('PUT', "/$name/activate");
    }
}