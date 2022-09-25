<?php

namespace Miposent\FuiOuPay\Service;

use Miposent\FuiOuPay\Api;

/**
 * Class PrepareService
 * @package Miposent\FuiOuPay\Service
 */
class PrepareService extends Api
{

    public $dev_api_host = 'https://fundwx.fuiou.com';

    public $pro_api_host = 'http://spay-mc.fuioupay.com';

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function micropay(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/micropay', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preCreate(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/preCreate', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wxPreCreate(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/wxPreCreate', $param);
    }

    /**
     *
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function commonQuery(array $param)
    {
        return $this->postRequest('/commonQuery', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function commonRefund(array $param)
    {
        return $this->postRequest('/commonRefund', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function closeOrder(array $param)
    {
        return $this->postRequest('/closeorder', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelOrder(array $param)
    {
        return $this->postRequest('/cancelorder', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refundQuery(array $param)
    {
        return $this->postRequest('/refundQuery', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function hisTradeQuery(array $param)
    {
        return $this->postRequest('/hisTradeQuery', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function auth2Openid(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/auth2Openid', $param, ['term_id']);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOpenid(array $param)
    {
        return $this->getRequestUrl('/oauth2/getOpenid', $param, ['version', 'term_id', 'random_str']);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withhold(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/withhold', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withholdQuery(array $param)
    {
        return $this->postRequest('/withholdQuery', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preAuthFinish(array $param)
    {
        return $this->postRequest('/preAuthFinish', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preAuthCancel(array $param)
    {
        return $this->postRequest('/preAuthCancel', $param);
    }


    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preAuthQuery(array $param)
    {
        return $this->postRequest('/preAuthQuery', $param);
    }

    /**
     * @param  array  $param
     * @return false|PrepareService|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preAuthFinishCancel(array $param)
    {
        return $this->postRequest('/preAuthFinishCancel', $param);
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
}