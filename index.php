<?php

require_once 'vendor/autoload.php';

$app = new \Miposent\FuiOuPay\Application([
    'mode' => 'dev',
    'ins_cd' => '08A9999999',
    'mchnt_cd' => '0002900F0468631',
    "private_key" => 'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJgAzD8fEvBHQTyxUEeK963mjziM
WG7nxpi+pDMdtWiakc6xVhhbaipLaHo4wVI92A2wr3ptGQ1/YsASEHm3m2wGOpT2vrb2Ln/S7lz1
ShjTKaT8U6rKgCdpQNHUuLhBQlpJer2mcYEzG/nGzcyalOCgXC/6CySiJCWJmPyR45bJAgMBAAEC
gYBHFfBvAKBBwIEQ2jeaDbKBIFcQcgoVa81jt5xgz178WXUg/awu3emLeBKXPh2i0YtN87hM/+J8
fnt3KbuMwMItCsTD72XFXLM4FgzJ4555CUCXBf5/tcKpS2xT8qV8QDr8oLKA18sQxWp8BMPrNp0e
pmwun/gwgxoyQrJUB5YgZQJBAOiVXHiTnc3KwvIkdOEPmlfePFnkD4zzcv2UwTlHWgCyM/L8SCAF
clXmSiJfKSZZS7o0kIeJJ6xe3Mf4/HSlhdMCQQCnTow+TnlEhDTPtWa+TUgzOys83Q/VLikqKmDz
kWJ7I12+WX6AbxxEHLD+THn0JGrlvzTEIZyCe0sjQy4LzQNzAkEAr2SjfVJkuGJlrNENSwPHMugm
vusbRwH3/38ET7udBdVdE6poga1Z0al+0njMwVypnNwy+eLWhkhrWmpLh3OjfQJAI3BV8JS6xzKh
5SVtn/3Kv19XJ0tEIUnn2lCjvLQdAixZnQpj61ydxie1rggRBQ/5vLSlvq3H8zOelNeUF1fT1QJA
DNo+tkHVXLY9H2kdWFoYTvuLexHAgrsnHxONOlSA5hcVLd1B3p9utOt3QeDf6x2i1lqhTH2w8gzj
vsnx13tWqg==',
    "public_key" => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCBv9K+jiuHqXIehX81oyNSD2RfVn+KTPb7NRT5HDPFE35CjZJd7Fu40r0U2Cp7Eyhayv/mRS6ZqvBT/8tQqwpUExTQQBbdZjfk+efb9bF9a+uCnAg0RsuqxeJ2r/rRTsORzVLJy+4GKcv06/p6CcBc5BI1gqSKmyyNBlgfkxLYewIDAQAB',
    'after_func' => function (array $request, array $response) {
   
    }
]);

$node = '1652S202209057647572' . rand(100, 999);

//$response = $app->scan->queryWithdrawAmt([
//    'reserved_busi_type' => '1'
//]);
//var_dump($response->getResponse());
$response = $app->scan->queryFeeAmt([
    'amt' => 1,
    'reserved_busi_type' => '1'
]);
var_dump($response->getResponse());
//$response = $app->scan->withdraw([
//    'amt'=>1,
//    'fee_amt'=>1,
//    'txn_type' => '1'
//]);
//var_dump($response->getResponse());

//$response = $app->scan->queryChnlPayAmt([
//    'start_date' => '20220101',
//    'end_date' => '20220810',
//    'start_index' => 1,
//    'end_index' => 100
//]);
//var_dump($response->getResponse());

//$response = $app->scan->walletWithdraw([
//    'mchnt_order_no' => $node,
//    'amt' => 1,
//    'fee_amt' => 1,
//    'txn_type' => '3'
//]);
//var_dump($response->getResponse());

//$response = $app->scan->walletQueryWithdrawT0([
//    'mchnt_order_no' => $node,
//    'date' => '20220910',
//    'start_index' => 1,
//    'end_index' => 10
//]);
//var_dump($response->getResponse());
//
//$response = $app->scan->queryBalance([
//]);
//var_dump($response->getResponse());
//$response = $app->scan->wxPayFaceGetAuthinfo([
//    'mchnt_order_no' => $node,
//    'store_id' => '1',
//    'store_name' => '1',
//    'device_id' => '1',
//    'attach' => '',
//    'rawdata' => 'sadsadasdasd',
//    'sub_mch_id' => 'oKlDd5LrvuZnSmloQbyvZayqE2b0',
//    'sub_appid' => 'wxa0be04798ae773ff',
//]);
//var_dump($response->getResponse());
//$response = $app->scan->wxPayFaceGetDeviceSign([
//    'mchnt_order_no' => $node,
//]);
//var_dump($response->getResponse());
//$response = $app->scan->wechatOfflineFaceUserQuery([
//    'mchnt_order_no' => $node,
//    'out_user_id'=>'1121',
//    'organization_id'=>'1121',
//]);
//var_dump($response->getResponse());
//$response = $app->scan->querySettlement([
//    'mchnt_order_no' => $node,
//    'date' => '20220910',
//    'start_index' => 1,
//    'end_index' => 1,
//    'fy_trace_no' => '',
//    'withdraw_type' => '1'
//]);
//var_dump($response->getResponse());

//$url = 'https://m.baidu.com/from=844b/s?b='.urlencode('2').'&a='.urlencode('1').'&word='.urlencode(iconv('utf-8', 'gbk',
//        '中文'));
//$response = $app->prepare->getOpenid([
//    'type' => '1',
//    'appid' => '',
//    'redirect_uri' => $url
//]);
//var_dump($response);
//$response = $app->prepare->preCreate([
//    'order_type' => 'WECHAT',
//    'goods_des' => '商品',
//    'goods_detail' => '这是描述',
//    'addn_inf' => '',
//    'mchnt_order_no' => $node,
//    'curr_type' => 'CNY',
//    'order_amt' => 1,
//    'txn_begin_ts' => date('YmdHis', time()),
//    'goods_tag' => '',
//    'notify_url' => 'https://www.baidu.com'
//]);
//var_dump($response->getResponse());
//$response = $app->prepare->micropay([
//    'addn_inf' => '',
//    'order_type' => 'WECHAT',
//    'goods_des' => '商品',
//    'goods_detail' => '这是描述',
//    'goods_tag' => '',
//    'mchnt_order_no' => $node,
//    'sence' => '1',
//    'order_amt' => 1,
//    'curr_type' => 'CNY',
//    'txn_begin_ts' => date('YmdHis', time()),
//    'auth_code' => '12'
//]);
//var_dump($response->getResponse());
//$response = $app->prepare->wxPreCreate([
////    'addn_inf' => '',
////    'curr_type' => 'CNY',
////    'goods_des' => '飞机一台',
////    'mchnt_order_no' => 'M29220904154390090',
////    'order_amt' => 1,
////    'txn_begin_ts' => date('YmdHis'),
////    'notify_url' => 'https://www.baidu.com',
////    'trade_type' => 'LETPAY',
////    'sub_openid' => 'oKlDd5LrvuZnSmloQbyvZayqE2b0',
////    'sub_appid' => 'wxa0be04798ae773ff',
////    'reserved_business_params' => json_encode([
////        'data' => '12'
////    ], JSON_UNESCAPED_UNICODE)
////    'ins_cd' => '08M0027904',
////    'mchnt_cd' => '0005840F3983305',
////    'random_str' => 'a76c4a662e064788b9ee400455816db2',
////    'version' => '1',
////    'term_id' => '88888888',
//    'addn_inf' => '',
//    'txn_begin_ts' => '20220905175956',
//    'curr_type' => 'CNY',
//    'term_ip' => '172.18.15.165',
//    'goods_des' => '超及鲜生总店',
//    'order_amt' => 3,
//    'notify_url' => 'https://cashier-test.chudachu.com/shop/v2/orderPay/orderReturn',
//    'mchnt_order_no' => $node,
//    'trade_type' => 'LETPAY',
//    'openid' => '',
//    'sub_openid' => 'omkYP4xq5xsHDJmMphZNh0JUj4dM',
//    'sub_appid' => 'wxf6dc51ba415b1319',
//    'goods_detail' => '',
//    'goods_tag' => '',
//    'product_id' => '',
//    'limit_pay' => '',
//    'reserved_expire_minute' => 15,
//    'reserved_business_params' => json_encode(['data' => '12'])
//]);
//var_dump($response->getResponse());
//
//$res = $app->prepare->commonQuery([
//    'order_type' => 'WECHAT',
//    'mchnt_order_no' => $node,
//    'reserved_hb_is_seller' => 1
//]);
//var_dump($res->checkSuccess());
//
//
//$sd = $app->prepare->commonRefund([
//    'order_type' => 'WECHAT',
//    'mchnt_order_no' => $node,
//    'refund_order_no' => $node.'1',
//    'total_amt' => 3,
//    'refund_amt' => 1,
//    'operator_id' => ''
//]);
//
//
//$sd = $app->prepare->closeOrder([
//    'order_type' => 'WECHAT',
//    'mchnt_order_no' => $node,
//    'sub_appid' => 'wxf6dc51ba415b1319'
//]);
//
//var_dump($sd->checkSuccess());
//
//
//$sd = $app->prepare->closeOrder([
//    'order_type' => 'WECHAT',
//    'mchnt_order_no' => $node,
//    'sub_appid' => 'wxf6dc51ba415b1319'
//]);
//
//var_dump($sd->checkSuccess());
//
//$sd = $app->prepare->cancelOrder([
//    'order_type' => 'WECHAT',
//    'mchnt_order_no' => $node,
//    'cancel_order_no' => $node.'2',
//    'operator_id' => ''
//]);
//
//var_dump($sd->checkSuccess());
//
//$sd = $app->prepare->refundQuery([
//    'refund_order_no' => $node,
//]);
//
//var_dump($sd->checkSuccess());
//
//$sd = $app->prepare->hisTradeQuery([
//    'order_type' => 'WECHAT',
//    'mchnt_order_no' => $node,
//    'trade_dt' => '',
//    'channel_order_id' => '',
//    'transaction_id' => ''
//]);
//
//var_dump($sd->checkSuccess());
//
//$sd = $app->prepare->auth2Openid([
//    'order_type' => 'WECHAT',
//    'sub_appid' => 'wxf6dc51ba415b1319',
//    'auth_code' => '121221',
//    'order_amt' => ''
//]);
//
//var_dump($sd->checkSuccess());
//
//$sd = $app->prepare->withhold([
//    'order_type' => 'WXPAP',
//    'goods_des' => '超及鲜生',
//    'goods_detail' => '租借费用',
//    'mchnt_order_no' => $node.'1',
//    'curr_type' => 'CNY',
//    'order_amt' => 1,
//    'txn_begin_ts' => date('YmdHis', time()),
//    'reserved_trade_scene' => 'LIFE_PAY',
//    'Reserved_auth_openid' => 'omkYP4xq5xsHDJmMphZNh0JUj4dM',
//]);
//
//var_dump($sd->checkSuccess());
//
//$sd = $app->prepare->withholdQuery([
//    'order_type' => 'WXPAP',
//    'mchnt_order_no' => $node.'1',
//    'reserved_trade_scene'=>'K12_OFFLINE_FACE'
//]);
//
//var_dump($sd->getResponse());