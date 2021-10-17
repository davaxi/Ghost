<?php

namespace Davaxi\Ghost;

/**
 * Class Client
 * @package Davaxi\Ghost
 */
class Client
{
    const API_VERSION = 'v4';

    const ENV_API_URL = 'GHOST_API_URL';
    const ENV_CONTENT_API_KEY = 'GHOST_CONTENT_API_KEY';
    const ENV_ADMIN_API_KEY = 'GHOST_ADMIN_API_KEY';

    /**
     * @var array
     */
    protected $config = [];

    /**
     * Client constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge(
            [
                'api_url' => '',
                'api_version' => static::API_VERSION,
                'content_api_key' => '',
                'admin_api_key' => '',
            ],
            $config
        );
    }

    /**
     * @param string $apiUrl
     */
    public function setApiUrl(string $apiUrl)
    {
        $this->config['api_url'] = $apiUrl;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->config['api_url'];
    }

    /**
     * @param string $apiVersion
     */
    public function setApiVersion(string $apiVersion)
    {
        $this->config['api_version'] = $apiVersion;
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->config['api_version'];
    }

    /**
     * @param string $contentApiKey
     */
    public function setContentApiKey(string $contentApiKey)
    {
        $this->config['content_api_key'] = $contentApiKey;
    }

    /**
     * @return string
     */
    public function getContentApiKey(): string
    {
        return $this->config['content_api_key'];
    }

    /**
     * @param string $adminApiKey
     */
    public function setAdminApiKey(string $adminApiKey)
    {
        $this->config['admin_api_key'] = $adminApiKey;
    }

    /**
     * @return string
     */
    public function getAdminApiKey(): string
    {
        return $this->config['admin_api_key'];
    }

    public function loadFromEnvironment()
    {
        if (isset($_ENV[static::ENV_API_URL])) {
            $this->setApiUrl($_ENV[static::ENV_API_URL]);
        }
        if (isset($_ENV[static::ENV_CONTENT_API_KEY])) {
            $this->setContentApiKey($_ENV[static::ENV_CONTENT_API_KEY]);
        }
        if (isset($_ENV[static::ENV_ADMIN_API_KEY])) {
            $this->setAdminApiKey($_ENV[static::ENV_ADMIN_API_KEY]);
        }
    }
}