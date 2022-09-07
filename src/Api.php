<?php

namespace Miposent\FuiOuPay;

use Miposent\FuiOuPay\Core\Http;
use Miposent\FuiOuPay\Core\Xml;

class Api
{
    const DEV_API_HOST = 'https://fundwx.fuiou.com';

    const PRO_API_HOST = 'http://spay-mc.fuioupay.com';

    protected $http;

    protected array $config = [];

    private object $response;

    const SUCCESS = '000000';

    /**
     * Api constructor.
     * @param  array  $config
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     *
     * @param  string  $uri
     * @param  array  $param
     * @param  array  $filter
     * @return false|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postRequest(string $uri, array $param, array $filter = [])
    {
        $response = $this->getHttp()->request($uri, 'POST',
            [
                'form_params' => ['req' => urlencode(Xml::getArrayToXml($this->getRequestParam($param, $filter)))]
            ]);
        $this->setResponse($response->getBody()->getContents());
        return $this;
    }


    /**
     * @param  string  $uri
     * @param  array  $param
     * @param  array  $filter
     * @return string
     */
    public function getRequestUrl(string $uri, array $param, array $filter = [])
    {
        $param = $this->getRequestParam($param, $filter);
        $paramArray = [];
        foreach ($param as $key => $value) {
            !empty($value) && $paramArray[] = $key.'='.urlencode($value);
        }
        return $this->getBaseUri().$uri.'?'.implode('&', $paramArray);
    }

    /**
     * @param  array  $param
     * @param  array  $filter
     * @return array
     */
    private function getRequestParam(array $param, array $filter)
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
     * @param  bool  $verify
     * @return bool
     */
    public function checkSuccess(bool $verify = false)
    {
        if ($verify) {
            return $this->checkVerify();
        }
        return $this->response->result_code === self::SUCCESS;
    }

    /**
     * @return object
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
            $this->http = new Http([
                'base_uri' => $this->getBaseUri(),
                'verify' => false
            ]);
        }
        return $this->http;
    }

    /**
     * @return array
     */
    protected function getDefaultParam(): array
    {
        return [
            'version' => '1.0',
            'term_id' => '88888888',
            'ins_cd' => $this->getConfig()['ins_cd'],
            'mchnt_cd' => $this->getConfig()['mchnt_cd'],
            'random_str' => $this->getRandomStr()
        ];
    }

    /**
     * @param $param
     * @return array|false[]|string[]
     */
    protected function getIconParam($param)
    {
        return array_map(function ($value) {
            return !empty($value) ? iconv('utf-8', 'gbk', $value) : $value;
        }, $param);
    }

    /**
     * @param  array  $param
     * @return string
     */
    protected function getSign(array $param): string
    {
        openssl_sign($this->getParamStr($this->getFilterReserved($param)), $sign, $this->getPrivateKey(),
            OPENSSL_ALGO_MD5);
        return base64_encode($sign);
    }

    /**
     * @param  array  $param
     * @param  array  $filter
     * @return array
     */
    protected function getFilterParam(array $param, array $filter)
    {
        foreach ($filter as $key) {
            unset($param[$key]);
        }
        return $param;
    }

    /**
     * @param  array  $param
     * @return array
     */
    protected function getFilterReserved(array $param)
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
     * @param  array  $param
     * @return string
     */
    protected function getParamStr(array $param): string
    {
        $combineStr = '';
        ksort($param);
        // 处理数据
        foreach ($param as $key => $value) {
            $combineStr .= $key.'='.(!empty($value) ? $value : '').'&';
        }
        $combineStr = rtrim($combineStr, "&");
        return $combineStr;
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
    protected function getPrivateKey()
    {
        return "-----BEGIN RSA PRIVATE KEY-----\n".
            wordwrap($this->getConfig()['private_key'], 64, "\n", true).
            "\n-----END RSA PRIVATE KEY-----";
    }

    /**
     * @return string
     */
    protected function getPublicKey()
    {
        return "-----BEGIN PUBLIC KEY-----\n".
            wordwrap($this->getConfig()['public_key'], 64, "\n", true).
            "\n-----END PUBLIC KEY-----";
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->getConfig()['mode'] === 'dev' ? self::DEV_API_HOST : self::PRO_API_HOST;
    }

    /**
     * @param $response
     */
    public function setResponse($response)
    {
        $this->response = simplexml_load_string(urldecode($response));
    }

    /**
     *
     * @param  array  $config
     * @return void
     */
    protected function setConfig(array $config): void
    {
        $this->config = array_merge([
            //model : dev、pro
            'mode' => 'dev',
            'ins_cd' => '',
            'mchnt_cd' => '',
            'private_key' => '',
            'public_key' => ''
        ], $config);
    }

}