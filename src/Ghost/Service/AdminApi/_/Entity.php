<?php

namespace Davaxi\Ghost\Service\AdminApi\_;

use Davaxi\Ghost\Exception\HttpRequestException;
use Davaxi\Ghost\Exception\InvalidParamsException;

Trait Entity
{
    /**
     * https://ghost.org/docs/admin-api/#the-post-object
     * @param array $params
     * @return mixed
     * @throws HttpRequestException
     */
    public function find(array $params = [])
    {
        $params = array_merge(
            [
                'include' => '',
                'formats' => 'mobiledoc',
                'filter' => '',
                'limit' => static::DEFAULT_LIMIT,
                'page' => 0,
                'order' => '',
            ],
            $params
        );
        return $this->_request('GET', '/', $params);
    }

    /**
     * @param string $id
     * @return mixed
     * @throws HttpRequestException
     */
    public function findById(string $id)
    {
        return $this->_request('GET', "/$id/");
    }

    /**
     * @param string $slug
     * @return mixed
     * @throws HttpRequestException
     */
    public function findBySlug(string $slug)
    {
        return $this->_request('GET', "/slug/$slug/");
    }

    /**
     * https://ghost.org/docs/admin-api/#creating-a-post
     * @param array $data
     * @return mixed
     * @throws HttpRequestException
     */
    public function create(array $data)
    {
        return $this->_request('POST', '/', [], [static::SERVICE_KEY => $data]);
    }

    /**
     * https://ghost.org/docs/admin-api/#creating-a-post
     * @param array $data
     * @return mixed
     * @throws HttpRequestException
     */
    public function createOne(array $data)
    {
        return $this->_request('POST', '/', [], [static::SERVICE_KEY => [$data]]);
    }

    /**
     * @param string $id
     * @param array $data
     * @return mixed
     * @throws HttpRequestException|InvalidParamsException
     */
    public function update(string $id, array $data)
    {
        return $this->_request('PUT', "/$id/", [], [static::SERVICE_KEY=> [$data]]);
    }

    /**
     * https://ghost.org/docs/admin-api/#deleting-a-post
     * @param string $id
     * @return mixed
     * @throws HttpRequestException
     */
    public function delete(string $id)
    {
        return $this->_request('DELETE', "/$id/");
    }
}