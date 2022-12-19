<h1 align="left"><a href="#">Fuiou Pay</a></h1>

📦 基于富友支付提供的文档开发的PHP SDK

## 要求

1. PHP >= 7.2.5
2. **[Composer](https://getcomposer.org/)**

## 引入

```shell
$ composer require miposent/fuiou-pay
```

## 使用

完整例子：

```php
<?php

use Miposent\FuiOuPay\Application;

//初始化
$config = [
    //域名【必填，富友提供（如：https://fundwx.fuiou.com）】
	'api_host'      => 'xxxxxxxxxx',  
	//密钥【扫码商户入网接口必填，富友提供】
	'key'           => 'xxxxxxxxxx',  
	//公钥【必填，富友提供】
	'private_key'   => 'xxxxxxxxxx',  
	//公钥【必填，富友提供】
	'public_key'    => 'xxxxxxxxxx',  
	//机构号【选填，富友提供（此处填了，后面请求接口可不填）】
	'ins_cd'        => 'xxxxxxxxxx',  
	//商户号【选填，富友提供（此处填了，后面请求接口可不填）】
	'mchnt_cd'      => 'xxxxxxxxxx',  
	//请求前回调用处理方法【选填】
	'before_func'   =>  function($request){}, 
	//请求后回调用处理方法【选填】
	'after_func'    =>  function($request,$response){} 
];

$app = new Application($config );

//订单查询
$param=[
    //version可忽略填写，本SDK默认填为1.0
    //term_id可忽略填写，本SDK默认填为88888888
    //random_str可忽略填写，本SDK默认生成
    //ins_cd在上面初始化填写了，此处就不填写
    //mchnt_cd在上面初始化填写了，此处就不填写
    'mchnt_order_no'      => 'xxxxxxxxxx',
    'order_type'          => 'xxxxxxxxxx',
];
$result=$app->prepare->commonQuery($param);

//获取请求结果
var_dump($result->getResponse());

//检验请求结果
var_dump($result->checkVerify());

```

普通线下扫码API:

```php
<?php

use Miposent\FuiOuPay\Application;

//条码支付，商户扫用户二维码收款
$app->prepare->micropay($param);

//主扫统一下单
$app->prepare->preCreate($param);

//微信公众号(小程序)、支付宝服务窗(小程序)统一下单
$app->prepare->wxPreCreate($param);

//订单查询
$app->prepare->commonQuery($param);

//退款申请
$app->prepare->commonRefund($param);

//关闭订单
$app->prepare->closeOrder($param);

//撤销接口
$app->prepare->cancelOrder($param);

//退款查询
$app->prepare->refundQuery($param);

//历史订单查询
$app->prepare->hisTradeQuery($param);

//微信授权码查询openid / 银联授权码获取user_id
$app->prepare->auth2Openid($param);

//服务商模式获取openid
$app->prepare->getOpenid($param);

//微信委托代扣
$app->prepare->withhold($param);

//微信委托代扣查询
$app->prepare->withholdQuery($param);
```

扫码支付增值API:

```php
//查询可结算资金信息
$app->scan->queryWithdrawAmt($param);

//查询手续费信息
$app->scan->queryFeeAmt($param);

//发起结算
$app->scan->withdraw($param);

//资金划拨查询
$app->scan->queryChnlPayAmt($param);

//钱包结算(原钱包提现)
$app->scan->walletWithdraw($param);

//钱包结算即时到账查询(原钱包提现D0查询）
$app->scan->walletWithdraw($param);

//退款账户余额查询接口
$app->scan->walletQueryWithdrawT0($param);

//退款账户余额查询接口
$app->scan->queryBalance($param);

//结算交易查询接口
$app->scan->querySettlement($param);

//微信刷脸支付，获取调用凭证
$app->scan->wxPayFaceGetAuthInfo($param);

//微信数据上报SDK签名获取接口
$app->scan->wxPayFaceGetDeviceSign($param);
```

K12刷脸支付API:

```php
//获取授权凭证接口
$app->scan->wechatOfflineFaceGetToken($param);

//用户信息查询
$app->scan->wechatOfflineFaceUserQuery($param);

//用户信息修改
$app->scan->wechatOfflineFaceUserUpdate($param);

//获取调用授权凭据authinfo（微信老版）
$app->scan->wxPayFaceGetAuthInfo($param);

//获取调用授权凭据authinfo（微信新版）
$app->scan->wechatOfflineFaceGetAuthInfo($param);

//解除刷脸用户签约关系接口
$app->scan->wechatOfflineFaceGetRelieveContract($param);

//预签约接口
$app->scan->wechatOfflineFacePreSign($param);

//签约查询接口
$app->scan->wechatOfflineFaceSignQuery($param);
```

扫码预授权API:

```php
//条码支付，商户扫用户二维码收款
$app->prepare->micropay($param);

//主扫统一下单
$app->prepare->preCreate($param);

//公众号/服务窗统一下单
$app->prepare->wxPreCreate($param);

//订单查询
$app->prepare->commonQuery($param);

//预授权完成
$app->prepare->preAuthFinish($param);

//预授权撤销
$app->prepare->preAuthCancel($param);

//预授权查询
$app->prepare->preAuthQuery($param);

//预授权完成撤销（默认全额退款，部分退款已支持-20210918）
$app->prepare->preAuthFinishCancel($param);
```

扫码进件API:

```php
//商户信息登记接口
$app->merchant->wxMchntAdd($param);

//商户信息更新接口
$app->merchant->wxMchntUpd($param);

//入账信息变更接口
$app->merchant->mchntAcntUpd($param);

//商户名称判重接口
$app->merchant->wxMchntNameCheck($param);

//微信参数配置接口
$app->merchant->xyWechatConfigSet($param);

//微信参数查询接口
$app->merchant->xyWechatConfigSet($param);

//电子协议生成
$app->merchant->elecContractGenerate($param);

//电子协议签署
$app->merchant->elecContractSign($param);

//附件提交完成接口(重要接口)
$app->merchant->attachConfirm($param);

//商户信息查询接口
$app->merchant->getMchntInfAndConfig($param);

//微信认证查询接口
$app->merchant->wxAuthQuery($param);

//商户终端信息采集报备接口（259号文终端报备）
$app->merchant->termCollect($param);

//支付宝认证查询接口
$app->merchant->alipayAuthQuery($param);

//终端信息采集报备查询接口
$app->merchant->termReportQuery($param);
```

业务开通申请API:

```php
//业务状态查询接口
$app->merchant->mchntQueryTZ($param);

//即时到账(D0)业务申请开通接口
$app->merchant->mchntOpenTZ($param);

//扫码预授权申请开通接口
$app->merchant->wxMchntAddScanPrePay($param);

//银联二维码业务申请开通接口
$app->merchant->mchntOpenUpayQr($param);

//商户翼支付申请接口
$app->merchant->addBestPay($param);

//银联分期业务申请
$app->merchant->upayScanInstalment($param);

//交班到账业务申请
$app->merchant->shiftWithdraw($param);
```

活动申请API:

```php
//红火计划报名申请
$app->merchant->unionPayPnrReport($param);

//微信行业活动申请接口
$app->merchant->specChnlReport($param);

//支付宝行业活动申请接口
$app->merchant->aliSpecActiReport($param);
```

渠道商户信息API:

```php
//商户渠道子商户号查询接口
$app->merchant->chnlSubMchIdQuery($param);

//商户查询支付宝渠道信息
$app->merchant->aliQueryMchChnlInf($param);

//支付宝创建门店接口
$app->merchant->aliShopCrt($param);

//支付宝门店查询接口
$app->merchant->aliShopQuery($param);

//支付宝门店查询接口
$app->merchant->notifyConfig($param);
```

终端信息API:

```php
//新增终端
$app->merchant->termAdd($param);

//终端替换
$app->merchant->termChange($param);

//终端撤机
$app->merchant->termCancel($param);

//批量新增终端
$app->merchant->termAddV2($param);

//终端查询
$app->merchant->termQuery($param);
```

其他

```php
//解析xml
\Miposent\FuiOuPay\Core\Xml::decode($re);
```

注意

```php
1.有时result_code报102错误时，有可能是要求参数问题，尽可能把参数全填（除reserved外），值默认空字符;
2.本SDK不做日志处理，若需记录日志，请在初始化配置before_func和after_func中进行记录;
```

## 申明

本SDK是开源免费，因要求需要有与<a href="https://www.fuioupay.com/">富友支付</a>进行合作才可以使用此SDK
