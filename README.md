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

先初始化:

```php
<?php

use Miposent\FuiOuPay\Application;

$config = [
	'mode'         => 'dev',         //模式：dev=测试环境，pro=正式
	'ins_cd'       => 'xxxxxx',      //机构号（富有支付提供）
	'mchnt_cd'     => 'xxxxxxx',     //商户号（富有支付提供）
	'private_key'  => 'xxxxxxxxxx',  //私钥
	'public_key'   => 'xxxxxxxxxx',  //公钥
	'before_func'   =>function(array $request){}, //请求前回调用处理方法
	'after_func'   =>function(array $request,array $response){} //请求后回调用处理方法
];

$app = new Application($config );
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
