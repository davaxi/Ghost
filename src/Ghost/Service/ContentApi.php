<?php

namespace Davaxi\Ghost\Service;

use Davaxi\Ghost\Client;
use Davaxi\Ghost\Exception\MissingCredentialsException;
use Davaxi\Ghost\Exception\MissingConfigurationException;
use Davaxi\Ghost\Service;

/**
 * Class ContentApi
 * @package Davaxi\Ghost\Service
 */
class ContentApi extends Service
{
    const BASE_URL = '{url}/ghost/api/{version}/content{path}';

    /**
     * AdminApi constructor.
     * @param Client $client
     * @throws MissingCredentialsException
     * @throws MissingConfigurationException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);
        if (!$this->client->getContentApiKey()) {
            throw new MissingCredentialsException('Missing content api key');
        }
    }

    /**
     * @return array
     */
    protected function getQueryParams(): array
    {
        return [
            'key' => $this->client->getContentApiKey(),
        ];
    }
}