<?php

namespace Miposent\FuiOuPay;

use Miposent\FuiOuPay\Core\Http;
use Miposent\FuiOuPay\Core\Xml;

class Api
{
    public $api_host = '';

    protected $http;

    protected $config = [];

    protected $filter_param = [];

    protected $filter_sign = [];

    protected $response;

    const SUCCESS = '000000';

    const SIGN_RAS = 0;

    const SIGN_MD5 = 1;

    const FORMAT_XML = 'xml';

    const FORMAT_JSON = 'json';

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
     * @param int $method
     * @param string $format
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postRequest(string $uri, array $param, int $method = self::SIGN_RAS, string $format = self::FORMAT_XML): Api
    {
        $this->getConfig()['before_func']($param);
        $option = [];
        switch ($format) {
            case self::FORMAT_XML:
                $option['form_params'] = ['req' => $this->getRequestReq($param, $method, $format)];
                break;
            case self::FORMAT_JSON:
                $option['json'] = ['req' => $this->getRequestReq($param, $method, $format)];
                break;
        }
        $response = $this->getHttp()->request($uri, 'POST', $option);
        $this->setResponse($response->getBody()->getContents());
        $this->getConfig()['after_func']($param, $this->getResponse());
        return $this;
    }


    /**
     * @param string $uri
     * @param array $param
     * @param int $method
     * @return string
     */
    public function getRequestUrl(string $uri, array $param, int $method = self::SIGN_RAS): string
    {
        $param = $this->getRequestParam($param, $method);
        $this->getConfig()['before_func']($param);
        $paramArray = [];
        foreach ($param as $key => $value) {
            !empty($value) && $paramArray[] = $key . '=' . urlencode($value);
        }
        return $this->getBaseUri() . $uri . '?' . implode('&', $paramArray);
    }

    /**
     * @param array $param
     * @param int $method
     * @param string $format
     * @return string
     */
    private function getRequestReq(array $param, int $method, string $format): string
    {
        $req = $this->getRequestParam($param, $method);
        switch ($format) {
            case self::FORMAT_XML:
                $req = Xml::encode($req);
                break;
            case self::FORMAT_JSON:
                $req = json_encode($req, JSON_UNESCAPED_UNICODE);
                break;
        }
        return urlencode($req);
    }

    /**
     * @param array $param
     * @param int $method
     * @return array
     */
    private function getRequestParam(array $param, int $method): array
    {
        $param = $this->filterParam($this->getIconParam(array_merge($this->getDefaultParam(), $param)));
        switch ($method) {
            case self::SIGN_RAS:
                $param['sign'] = $this->getRasSign($param);
                break;
            case self::SIGN_MD5:
                $param['sign'] = $this->getMd5Sign($param, $this->getConfig()['key']);
                break;
        }
        return $param;
    }

    /**
     * @return bool|int
     */
    public function checkVerify()
    {
        $param = $this->getResponse();
        if (empty($param['sign'])) {
            return false;
        }
        unset($param['sign']);
        $paramStr = $this->getParamStr($this->getIconParam($this->filterReserved($param)));
        return openssl_verify($paramStr, base64_decode($this->response['sign']), $this->getPublicKey(), OPENSSL_ALGO_MD5);
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
     * @return mixed
     */
    public function getResponse()
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
            if (is_array($value)) {
                return $this->getIconParam($value);
            }
            return !empty($value) ? iconv('utf-8', 'gbk', $value) : $value;
        }, $param);
    }

    /**
     * @param array $param
     * @return string
     */
    protected function getRasSign(array $param): string
    {
        openssl_sign($this->getParamStr($this->filterSign($this->filterReserved($param))), $sign, $this->getPrivateKey(),
            OPENSSL_ALGO_MD5);
        return base64_encode($sign);
    }

    /**
     * @param array $param
     * @param string $key
     * @return string
     */
    protected function getMd5Sign(array $param, string $key): string
    {
        $param = $this->filterSign($this->filterReserved($param));
        $str = $this->getParamStr($param, true) . '&key=' . $key;
        return md5($str);
    }

    /**
     * @param array $param
     * @return array
     */
    protected function filterParam(array $param): array
    {
        foreach ($this->getFilterParam() as $key) {
            unset($param[$key]);
        }
        return $param;
    }

    /**
     * @param array $param
     * @return array
     */
    protected function filterSign(array $param): array
    {
        foreach ($this->getFilterSign() as $key) {
            unset($param[$key]);
        }
        return $param;
    }

    /**
     * @param array $param
     * @return array
     */
    protected function filterReserved(array $param): array
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
     * @param bool $filter
     * @return string
     */
    protected function getParamStr(array $param, bool $filter = false): string
    {
        $combineStr = '';
        ksort($param);
        foreach ($param as $key => $value) {
            if ($filter && is_string($value) && $value == '') {
                continue;
            }
            if (is_array($value)) {
                if (empty($value)) {
                    $value = '';
                } else {
                    $newValue = [];
                    foreach ($value as $item) {
                        ksort($item);
                        $newValue[] = $item;
                    }
                    $value = json_encode($newValue);
                }
            }
            $combineStr .= $key . '=' . ($value != '' ? $value : '') . '&';
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
     * @param string $api
     * @return void
     */
    public function setBaseUri(string $api): void
    {
        $this->api_host = $api;
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->api_host;
    }


    /**
     * @return array
     */
    public function getFilterParam(): array
    {
        return $this->filter_param;
    }

    /**
     * @param array $filter
     */
    public function setFilterParam(array $filter): void
    {
        $this->filter_param = $filter;
    }

    /**
     * @return array
     */
    public function getFilterSign(): array
    {
        return $this->filter_sign;
    }

    /**
     * @param array $filter_sign
     */
    public function setFilterSign(array $filter_sign): void
    {
        $this->filter_sign = $filter_sign;
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
        if (xml_parse(xml_parser_create(), urldecode($response), true)) {
            $response = json_decode(json_encode(simplexml_load_string(urldecode($response)), true), true);
        }
        $this->response = $response;
    }

    /**
     *
     * @param array $config
     * @return void
     */
    protected function setConfig(array $config): void
    {
        $this->config = $this->getDefaultConfig();
        $this->setBaseUri($config['api_host']);
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
            'api_host' => '',
            'ins_cd' => '',
            'mchnt_cd' => '',
            'private_key' => '',
            'public_key' => '',
            'key' => '',
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