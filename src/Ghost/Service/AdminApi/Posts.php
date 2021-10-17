<?php

namespace Davaxi\Ghost\Service\AdminApi;

use Davaxi\Ghost\Service\AdminApi;
use Davaxi\Ghost\Exception\InvalidParamsException;
use Davaxi\Ghost\Exception\HttpRequestException;

class Posts extends AdminApi
{
    use AdminApi\_\Entity;

    const SERVICE_KEY = 'posts';
    const BASE_URL = '{url}/ghost/api/{version}/admin/posts{path}';

    /**
     * https://ghost.org/docs/admin-api/#updating-a-post
     * @param string $id
     * @param array $data
     * @return mixed
     * @throws HttpRequestException|InvalidParamsException
     */
    public function update(string $id, array $data)
    {
        $data = array_merge(
            [
                'updated_at' => null,
            ],
            $data
        );
        # https://forum.ghost.org/t/updatecollisionerror-when-updating-post/13764
        # If mismatch updated_at, throw UPDATE_COLLISION
        if (!$data['updated_at']) {
            $result = $this->findById($id);
            $data['updated_at'] = $result[static::SERVICE_KEY][0]['updated_at'];
        }
        return $this->_request('PUT', "/$id/", [], [static::SERVICE_KEY => [$data]]);
    }

}