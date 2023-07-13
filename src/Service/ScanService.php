<?php

namespace Miposent\FuiOuPay\Service;

use Miposent\FuiOuPay\Api;

/**
 * Class ScanService
 * @package Miposent\FuiOuPay\Service
 */
class ScanService extends Api
{

    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function queryWithdrawAmt(array $param)
    {
        return $this->postRequest('/queryWithdrawAmt', $param);
    }

    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function queryFeeAmt(array $param)
    {
        return $this->postRequest('/queryFeeAmt', $param);
    }

    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withdraw(array $param)
    {
        return $this->postRequest('/withdraw', $param);
    }

    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function queryChnlPayAmt(array $param)
    {
        return $this->postRequest('/queryChnlPayAmt', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function walletWithdraw(array $param)
    {
        return $this->postRequest('/wallet/withdraw', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function walletQueryWithdrawT0(array $param)
    {
        return $this->postRequest('/wallet/queryWithdrawT0', $param);
    }

    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function queryBalance(array $param)
    {
        return $this->postRequest('/queryBalance', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function querySettlement(array $param)
    {
        return $this->postRequest('/querySettlement', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wxPayFaceGetAuthInfo(array $param)
    {
        return $this->postRequest('/wxpayface/getAuthinfo', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wxPayFaceGetDeviceSign(array $param)
    {
        return $this->postRequest('/wxpayface/getDeviceSign', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wechatOfflineFaceGetToken(array $param)
    {
        return $this->postRequest('/wechat/offlineface/getToken', $param);
    }

    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wechatOfflineFaceUserQuery(array $param)
    {
        return $this->postRequest('/wechat/offlineface/userQuery', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wechatOfflineFaceUserUpdate(array $param)
    {
        return $this->postRequest('/wechat/offlineface/userUpdate', $param);
    }

    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wechatOfflineFaceGetAuthInfo(array $param)
    {
        return $this->postRequest('/wechat/offlineface/getAuthinfo', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wechatOfflineFaceGetRelieveContract(array $param)
    {
        return $this->postRequest('/wechat/offlineface/relieveContract', $param);
    }

    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wechatOfflineFacePreSign(array $param)
    {
        return $this->postRequest('/wechat/offlineface/preSign', $param);
    }


    /**
     * @param array $param
     * @return Api|ScanService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wechatOfflineFaceSignQuery(array $param)
    {
        return $this->postRequest('/wechat/offlineface/signQuery', $param);
    }

    /**
     * @return array
     */
    protected function getDefaultParam(): array
    {
        return [
            'ins_cd' => $this->getConfig()['ins_cd'],
            'mchnt_cd' => $this->getConfig()['mchnt_cd'],
            'random_str' => $this->getRandomStr()
        ];
    }
}