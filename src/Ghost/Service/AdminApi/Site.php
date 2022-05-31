<?php

namespace Davaxi\Ghost\Service\AdminApi;

use Davaxi\Ghost\Exception\InvalidParamsException;
use Davaxi\Ghost\Exception\HttpRequestException;
use Davaxi\Ghost\Service\AdminApi;

class Site extends AdminApi
{
    const BASE_URL = '{url}/ghost/api/admin/site{path}';

    /**
     * @return mixed
     * @throws HttpRequestException
     * @throws InvalidParamsException
     */
    public function get()
    {
        return $this->_request('GET', '/');
    }
}