<?php

namespace Davaxi\Ghost;

use Davaxi\Ghost\Exception\HttpRequestException;
use Davaxi\Ghost\Exception\InvalidParamsException;
use Davaxi\Ghost\Exception\MissingConfigurationException;

/**
 * Class Service
 * @package Davaxi\Ghost
 */
abstract class Service
{
    const DEFAULT_LIMIT = 15;
    const BASE_URL = '{url}/ghost/api/{path}';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    protected static $curl_options = [
        CURLINFO_HEADER_OUT => true,
        CURLOPT_ENCODING => '',
        CURLOPT_FAILONERROR => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    ];

    /**
     * Service constructor.
     * @param Client $client
     * @throws MissingConfigurationException
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        if (!$this->client->getApiUrl()) {
            throw new MissingConfigurationException('Missing ghost api url');
        }
        if (!$this->client->getApiVersion()) {
            throw new MissingConfigurationException('Missing ghost api version');
        }
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $queryParams
     * @param array $data
     * @param array $files
     * @throws HttpRequestException
     * @throws InvalidParamsException
     */
    protected function _request(string $method, string $path, array $queryParams = [], array $data = [], array $files = [])
    {
        $curl_options = static::$curl_options;
        $curl_options[CURLOPT_HTTPHEADER] = $this->getHeaders();
        $curl_options[CURLOPT_URL] = $this->getUrl($path, $queryParams);
        switch ($method) {
            case 'GET':
                $curl_options[CURLOPT_HTTPGET] = true;
                break;
            case 'POST':
                $curl_options[CURLOPT_POST] = true;
                $curl_options[CURLOPT_HTTPHEADER][] = 'Content-Type: application/json';
                $curl_options[CURLOPT_POSTFIELDS] = json_encode($data);
                break;
            case 'POST-FORM':
                $curl_options[CURLOPT_POST] = true;
                $curl_options[CURLOPT_HTTPHEADER][] = 'Content-Type: multipart/form-data';
                foreach ($files as $key => $filePath) {
                    if (!file_exists($filePath)) {
                        throw new InvalidParamsException("File $filePath not found");
                    }
                    $data[$key] = new \CURLFile($filePath);
                }
                $curl_options[CURLOPT_POSTFIELDS] = $data;
                break;
            case 'PUT':
                $curl_options[CURLOPT_HTTPHEADER][] = 'Content-Type: application/json';
                $curl_options[CURLOPT_POSTFIELDS] = json_encode($data);
                $curl_options[CURLOPT_CUSTOMREQUEST] = 'PUT';
                break;
            case 'DELETE':
                $curl_options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
                break;
        }

        $curl = curl_init();
        curl_setopt_array($curl, $curl_options);
        $result = curl_exec($curl);
        if ($result === false) {
            $errno = curl_errno($curl);
            $error = curl_error($curl);
            $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            throw new HttpRequestException("Error '$error' ($errno) raised on url[{$curl_options[CURLOPT_URL]}]", $status_code);
        }

        return json_decode($result, true);
    }

    /**
     * @return array
     */
    protected function getHeaders(): array
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getQueryParams(): array
    {
        return [];
    }

    /**
     * @param string $path
     * @param array $queryParams
     * @return string
     */
    protected function getUrl(string $path, array $queryParams): string
    {
        $mapping = [
            '{url}' => $this->client->getApiUrl(),
            '{version}' => $this->client->getApiVersion(),
            '{path}' => $path,
        ];
        $url = str_replace(array_keys($mapping), array_values($mapping), static::BASE_URL);
        $queryParams = array_merge($this->getQueryParams(), $queryParams);
        $queryParams = array_filter($queryParams, function($value) {
            return $value !== '' && $value !== null;
        });
        if (!$queryParams) {
            return $url;
        }

        return sprintf('%s?%s', $url, http_build_query($queryParams));
    }
}