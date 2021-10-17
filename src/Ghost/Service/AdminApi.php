<?php

namespace Davaxi\Ghost\Service;

use Davaxi\Ghost\Client;
use Davaxi\Ghost\Exception\MissingCredentialsException;
use Davaxi\Ghost\Exception\MissingConfigurationException;
use Davaxi\Ghost\Service;
use Firebase\JWT\JWT;

/**
 * Class AdminApi
 * @package Davaxi\Ghost\Service
 */
class AdminApi extends Service
{
    const BASE_URL = '{url}/ghost/api/{version}/admin{path}';

    /**
     * AdminApi constructor.
     * @param Client $client
     * @throws MissingCredentialsException
     * @throws MissingConfigurationException
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);
        if (!$this->client->getAdminApiKey()) {
            throw new MissingCredentialsException('Missing admin api key');
        }
    }

    /**
     * @return string
     */
    protected function getGhostToken(): string
    {
        list($id, $secret) = explode(':', $this->client->getAdminApiKey());
        $payload = [
            'iat' => time(),
            'exp' => strtotime('+5 minutes'),
            'aud' => "/{$this->client->getApiVersion()}/admin/"
        ];
        return JWT::encode($payload, hex2bin($secret), 'HS256', $id);
    }

    /**
     * @return array
     */
    protected function getHeaders(): array
    {
        return [
            'Authorization: Ghost ' . $this->getGhostToken()
        ];
    }
}