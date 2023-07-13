<?php

namespace Miposent\FuiOuPay\Service;

use Miposent\FuiOuPay\Api;

class MerchantService extends Api
{

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wxMchntAdd(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=wxMchntAdd', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wxMchntUpd(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=wxMchntUpd', $param, self::SIGN_MD5);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function mchntAcntUpd(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=mchntAcntUpd', $param, self::SIGN_MD5);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wxMchntNameCheck(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=wxMchntNameCheck', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function xyWechatConfigSet(array $param)
    {
        $this->setFilterParam(['ins_cd']);
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=xyWechatConfigSet', $param, self::SIGN_MD5, self::FORMAT_JSON);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function xyWechatConfigGet(array $param)
    {
        $this->setFilterParam(['ins_cd']);
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=xyWechatConfigGet', $param, self::SIGN_MD5, self::FORMAT_JSON);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function elecContractGenerate(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=elecContractGenerate', $param, self::SIGN_MD5, self::FORMAT_JSON);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function elecContractSign(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=elecContractSign', $param, self::SIGN_MD5, self::FORMAT_JSON);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function attachConfirm(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=attachConfirm', $param, self::SIGN_MD5, self::FORMAT_JSON);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMchntInfAndConfig(array $param)
    {
        $this->setFilterParam(['ins_cd']);
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=getMchntInfAndConfig', $param, self::SIGN_MD5, self::FORMAT_JSON);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wxAuthQuery(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=wxAuthQuery', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function termCollect(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=termCollect', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function alipayAuthQuery(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=alipayAuthQuery', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function termReportQuery(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=termReportQuery', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function mchntQueryTZ(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=mchntQueryTZ', $param, self::SIGN_MD5);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function mchntOpenTZ(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=mchntOpenTZ', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function wxMchntAddScanPrePay(array $param)
    {
        return $this->postRequest('/wmp/wxMchntMng.fuiou?action=wxMchntAddScanPrePay', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function mchntOpenUpayQr(array $param)
    {
        return $this->postRequest('/wmp/bestPayOpen.fuiou?action=mchntOpenUpayQr', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addBestPay(array $param)
    {
        $this->setFilterParam(['ins_cd']);
        return $this->postRequest('/wmp/bestPayOpen.fuiou?action=addBestPay', $param, self::SIGN_MD5, self::FORMAT_JSON);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function upayScanInstalment(array $param)
    {
        return $this->postRequest('/wmp/mchntOpen.fuiou?action=upayScanInstalment', $param, self::SIGN_MD5);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unionPayPnrReport(array $param)
    {
        return $this->postRequest('/wmp/mchntOpen.fuiou?action=unionPayPnrReport', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function specChnlReport(array $param)
    {
        return $this->postRequest('/wmp/mchntOpen.fuiou?action=specChnlReport', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function aliSpecActiReport(array $param)
    {
        return $this->postRequest('/wmp/mchntOpen.fuiou?action=aliSpecActiReport', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function chnlSubMchIdQuery(array $param)
    {
        return $this->postRequest('/wmp/mchntOpen.fuiou?action=chnlSubMchIdQuery', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function aliQueryMchChnlInf(array $param)
    {
        return $this->postRequest('/wmp/mchntOpen.fuiou?action=aliQueryMchChnlInf', $param, self::SIGN_MD5);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function aliShopCrt(array $param)
    {
        return $this->postRequest('/wmp/blueSea.fuiou?action=aliShopCrt', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function aliShopQuery(array $param)
    {
        return $this->postRequest('/wmp/blueSea.fuiou?action=aliShopQuery', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function notifyConfig(array $param)
    {
        $this->setFilterParam(['ins_cd']);
        return $this->postRequest('wmp/notifyConfig.fuiou?action=notifyConfig', $param, self::SIGN_MD5, self::FORMAT_JSON);
    }


    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function termAdd(array $param)
    {
        return $this->postRequest('/wmp/term.fuiou?action=termAdd', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function termCancel(array $param)
    {
        return $this->postRequest('/wmp/term.fuiou?action=termCancel', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function termChange(array $param)
    {
        return $this->postRequest('/wmp/term.fuiou?action=termChange', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function termAddV2(array $param)
    {
        $this->setFilterSign(['termList']);
        return $this->postRequest('/wmp/term.fuiou?action=termAddV2', $param, self::SIGN_MD5);
    }

    /**
     * @param array $param
     * @return Api|MerchantService
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function termQuery(array $param)
    {
        return $this->postRequest('/wmp/term.fuiou?action=termQuery', $param, self::SIGN_MD5);
    }

    /**
     * @return array
     */
    protected function getDefaultParam(): array
    {
        return [
            'ins_cd' => $this->getConfig()['ins_cd'],
        ];
    }
}