<?php

namespace Davaxi\Ghost\Service\ContentApi\_;

use Davaxi\Ghost\Exception\HttpRequestException;

/**
 * Trait Entity
 * @package Davaxi\Ghost\Service\ContentApi\_
 */
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
}