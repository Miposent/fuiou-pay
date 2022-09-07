<?php

namespace Miposent\FuiOuPay\Service;

use Miposent\FuiOuPay\Api;
use Miposent\FuiOuPay\Core\Http;

class Prepare extends Api
{

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function micropay(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/micropay', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function preCreate(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/preCreate', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
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
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function commonQuery(array $param)
    {
        return $this->postRequest('/commonQuery', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function commonRefund(array $param)
    {
        return $this->postRequest('/commonRefund', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function closeOrder(array $param)
    {
        return $this->postRequest('/closeorder', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancelOrder(array $param)
    {
        return $this->postRequest('/cancelorder', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refundQuery(array $param)
    {
        return $this->postRequest('/refundQuery', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function hisTradeQuery(array $param)
    {
        return $this->postRequest('/hisTradeQuery', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function auth2Openid(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/auth2Openid', $param, ['term_id']);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getOpenid(array $param)
    {
        return $this->getRequestUrl('/oauth2/getOpenid', $param, ['version', 'term_id', 'random_str']);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withhold(array $param)
    {
        $param = array_merge(['term_ip' => $this->getClientIp()], $param);
        return $this->postRequest('/withhold', $param);
    }

    /**
     * @param  array  $param
     * @return false|Prepare|\SimpleXMLElement|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withholdQuery(array $param)
    {
        return $this->postRequest('/withholdQuery', $param);
    }
}