<?php

namespace Davaxi\Ghost\Service\ContentApi;

use Davaxi\Ghost\Exception\HttpRequestException;
use Davaxi\Ghost\Exception\InvalidParamsException;
use Davaxi\Ghost\Service\ContentApi;

class Settings extends ContentApi
{
    const BASE_URL = '{url}/ghost/api/{version}/content/settings{path}';

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