<?php

namespace Miposent\FuiOuPay\Core;

use GuzzleHttp\Client;

class Http
{
    /**
     * @var array $config
     */
    private array $config;

    /**
     * @var  $client
     */
    private $client;


    public function __construct(array $config = [])
    {
        $this->setConfig($config);
    }

    /**
     * send request
     * @param  string  $uri
     * @param  string  $method
     * @param  array  $option
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $uri, string $method, array $option): \Psr\Http\Message\ResponseInterface
    {
        return $this->getClient()->request($method, $uri, $option);
    }

    /**
     * set config
     * @param  array  $config
     * @return array
     */
    public function setConfig(array $config): array
    {
        return $this->config = array_merge([
            'timeout' => 60,
            'verify' => false
        ], $config);
    }

    /**
     * get config
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * get client
     * @return Client
     */
    public function getClient(): Client
    {
        if (!$this->client instanceof Client) {
            $this->client = new Client($this->getConfig());
        }
        return $this->client;
    }
}