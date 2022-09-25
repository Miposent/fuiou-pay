<?php

namespace Miposent\FuiOuPay;

use Miposent\FuiOuPay\Core\Http;
use Miposent\FuiOuPay\Core\Xml;

class Api
{
    public $dev_api_host = '';

    public $pro_api_host = '';

    protected $http;

    protected $config = [];

    private $response;

    const SUCCESS = '000000';

    /**
     * Api constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     * @param string $uri
     * @param array $param
     * @param array $filter
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postRequest(string $uri, array $param, array $filter = []): Api
    {
        $this->getConfig()['before_func']($param);
        $response = $this->getHttp()->request($uri, 'POST',
            [
                'form_params' => ['req' => urlencode(Xml::encode($this->getRequestParam($param, $filter)))]
            ]);
        $this->setResponse($response->getBody()->getContents());
        $this->getConfig()['after_func']($param, $this->getResponse());
        return $this;
    }


    /**
     * @param string $uri
     * @param array $param
     * @param array $filter
     * @return string
     */
    public function getRequestUrl(string $uri, array $param, array $filter = []): string
    {
        $param = $this->getRequestParam($param, $filter);
        $this->getConfig()['before_func']($param);
        $paramArray = [];
        foreach ($param as $key => $value) {
            !empty($value) && $paramArray[] = $key . '=' . urlencode($value);
        }
        return $this->getBaseUri() . $uri . '?' . implode('&', $paramArray);
    }

    /**
     * @param array $param
     * @param array $filter
     * @return array
     */
    private function getRequestParam(array $param, array $filter): array
    {
        $param = $this->getFilterParam($this->getIconParam(array_merge($this->getDefaultParam(), $param)), $filter);
        $param['sign'] = $this->getSign($param);
        return $param;
    }

    /**
     * @return bool|int
     */
    public function checkVerify()
    {
        if (empty($this->response->sign)) {
            return false;
        }
        $param = json_decode(json_encode($this->response), true);
        unset($param['sign']);
        $paramStr = $this->getParamStr($this->getIconParam($this->getFilterReserved($param)));
        return openssl_verify($paramStr, base64_decode($this->response->sign), $this->getPublicKey(), OPENSSL_ALGO_MD5);
    }

    /**
     * @param bool $verify
     * @return bool
     */
    public function checkSuccess(bool $verify = false)
    {
        if ($verify) {
            return $this->checkVerify();
        }
        return $this->response['result_code'] === self::SUCCESS;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getHttp()
    {
        if (is_null($this->http)) {
            $this->http = new Http(array_merge($this->getConfig()['http'], [
                'base_uri' => $this->getBaseUri(),
            ]));
        }
        return $this->http;
    }

    /**
     * @return array
     */
    protected function getDefaultParam(): array
    {
        return [];
    }

    /**
     * @param $param
     * @return array|false[]|string[]
     */
    protected function getIconParam($param): array
    {
        return array_map(function ($value) {
            return !empty($value) ? iconv('utf-8', 'gbk', $value) : $value;
        }, $param);
    }

    /**
     * @param array $param
     * @return string
     */
    protected function getSign(array $param): string
    {
        openssl_sign($this->getParamStr($this->getFilterReserved($param)), $sign, $this->getPrivateKey(),
            OPENSSL_ALGO_MD5);
        return base64_encode($sign);
    }

    /**
     * @param array $param
     * @param array $filter
     * @return array
     */
    protected function getFilterParam(array $param, array $filter): array
    {
        foreach ($filter as $key) {
            unset($param[$key]);
        }
        return $param;
    }

    /**
     * @param array $param
     * @return array
     */
    protected function getFilterReserved(array $param): array
    {
        $reserved = [];
        foreach ($param as $key => $value) {
            if (strpos($key, 'reserved') === false) {
                $reserved[$key] = $value;
            }
        }
        return $reserved;
    }

    /**
     * @param array $param
     * @return string
     */
    protected function getParamStr(array $param): string
    {
        $combineStr = '';
        ksort($param);
        foreach ($param as $key => $value) {
            $combineStr .= $key . '=' . (!empty($value) ? $value : '') . '&';
        }
        return rtrim($combineStr, "&");
    }

    /**
     * get random str
     * @return string
     */
    protected function getRandomStr(): string
    {
        return sprintf('%04x%04x%04x%04x%04x%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    /**
     * @return mixed|string
     */
    protected function getClientIp(): string
    {
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = defined('PHPUNIT_RUNNING') ? '127.0.0.1' : gethostbyname(gethostname());
        }
        return filter_var($ip, FILTER_VALIDATE_IP) ?: '127.0.0.1';
    }

    /**
     * @return array
     */
    protected function getConfig(): array
    {
        return $this->config;
    }


    /**
     * @return string
     */
    protected function getPrivateKey(): string
    {
        return "-----BEGIN RSA PRIVATE KEY-----\n" .
            wordwrap($this->getConfig()['private_key'], 64, "\n", true) .
            "\n-----END RSA PRIVATE KEY-----";
    }

    /**
     * @return string
     */
    protected function getPublicKey(): string
    {
        return "-----BEGIN PUBLIC KEY-----\n" .
            wordwrap($this->getConfig()['public_key'], 64, "\n", true) .
            "\n-----END PUBLIC KEY-----";
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->getConfig()['mode'] === 'dev' ? $this->dev_api_host : $this->pro_api_host;
    }

    /**
     * @param $response
     */
    public function setResponse($response)
    {
        if (empty($response)) {
            $this->response = [];
            return;
        }
        $this->response = json_decode(json_encode(simplexml_load_string(urldecode($response)), true), true);
    }

    /**
     *
     * @param array $config
     * @return void
     */
    protected function setConfig(array $config): void
    {
        $this->config = $this->getDefaultConfig();
        foreach ($this->config as $key => $value) {
            if (isset($config[$key])) {
                $this->config[$key] = is_array($value) ? array_merge($value, $config[$key]) : $config[$key];
            }
        }
    }

    /**
     * @return array
     */
    protected function getDefaultConfig(): array
    {
        return [
            'mode' => 'dev',
            'ins_cd' => '',
            'mchnt_cd' => '',
            'private_key' => '',
            'public_key' => '',
            'http' => [
                'verify' => false
            ],
            'before_func' => function (array $param) {
            },
            'after_func' => function (array $request, array $response) {
            }
        ];
    }
}