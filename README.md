<h1 align="left"><a href="#">Fuiou Pay</a></h1>

📦 基于富友支付提供的文档开发的PHP SDK



## 要求

1. PHP >= 7.2.5
2. **[Composer](https://getcomposer.org/)**

## 引入

```shell
$ composer require miposent/fuiou-pay 1.0
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

## 注意

本SDK是开源免费，因要求需要有与<a href="https://www.fuioupay.com/">富友支付</a>进行合作才可以使用此SDK