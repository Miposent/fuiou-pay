<?php

require_once 'vendor/autoload.php';

$app = new \Miposent\FuiOuPay\Application([
//    'api_host' => 'http://www-1.fuiou.com:28090',
    'api_host' => 'https://fundwx.fuiou.com',
    "private_key" => 'MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJgAzD8fEvBHQTyxUEeK963mjziMWG7nxpi+pDMdtWiakc6xVhhbaipLaHo4wVI92A2wr3ptGQ1/YsASEHm3m2wGOpT2vrb2Ln/S7lz1ShjTKaT8U6rKgCdpQNHUuLhBQlpJer2mcYEzG/nGzcyalOCgXC/6CySiJCWJmPyR45bJAgMBAAECgYBHFfBvAKBBwIEQ2jeaDbKBIFcQcgoVa81jt5xgz178WXUg/awu3emLeBKXPh2i0YtN87hM/+J8fnt3KbuMwMItCsTD72XFXLM4FgzJ4555CUCXBf5/tcKpS2xT8qV8QDr8oLKA18sQxWp8BMPrNp0epmwun/gwgxoyQrJUB5YgZQJBAOiVXHiTnc3KwvIkdOEPmlfePFnkD4zzcv2UwTlHWgCyM/L8SCAFclXmSiJfKSZZS7o0kIeJJ6xe3Mf4/HSlhdMCQQCnTow+TnlEhDTPtWa+TUgzOys83Q/VLikqKmDzkWJ7I12+WX6AbxxEHLD+THn0JGrlvzTEIZyCe0sjQy4LzQNzAkEAr2SjfVJkuGJlrNENSwPHMugmvusbRwH3/38ET7udBdVdE6poga1Z0al+0njMwVypnNwy+eLWhkhrWmpLh3OjfQJAI3BV8JS6xzKh5SVtn/3Kv19XJ0tEIUnn2lCjvLQdAixZnQpj61ydxie1rggRBQ/5vLSlvq3H8zOelNeUF1fT1QJADNo+tkHVXLY9H2kdWFoYTvuLexHAgrsnHxONOlSA5hcVLd1B3p9utOt3QeDf6x2i1lqhTH2w8gzjvsnx13tWqg==',
    'key' => '040f23510fbf4b34ae3895272e83c58c',
    "public_key" => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCBv9K+jiuHqXIehX81oyNSD2RfVn+KTPb7NRT5HDPFE35CjZJd7Fu40r0U2Cp7Eyhayv/mRS6ZqvBT/8tQqwpUExTQQBbdZjfk+efb9bF9a+uCnAg0RsuqxeJ2r/rRTsORzVLJy+4GKcv06/p6CcBc5BI1gqSKmyyNBlgfkxLYewIDAQAB',
    'before_func' => function ($param) {
    },
    'after_func' => function ($request, $response) {
    }
]);

$node = '1652S202209057647572' . rand(100, 999);

//
//$response = $app->merchant->wxMchntAdd([
//    'trace_no' => '157424400680',
//    'sub_ins_cd' => '',
//    'mchnt_name' => '测商全称223',
//    'mchnt_shortname' => '测商简称223',
//    'real_name' => '测商真名',
//    'license_type' => 'A',
//    'license_no' => '440582198705067958',
//    'license_expire_dt' => '20991231',
//    'certif_id' => '440582198705067958',
//    'certif_id_expire_dt' => '20991231',
//    'contact_person' => '尘世的',
//    'contact_phone' => '13065433159',
//    'contact_addr' => '上海市富友街道',
//    'contact_mobile' => '18262532522',
//    'contact_email' => '1207159418123123@qq.com',
//    'business' => '204',
//    'city_cd' => '2900',
//    'county_cd' => '2904',
//    'acnt_type' => '2',
//    'bank_type' => '0301',
//    'inter_bank_no' => '301290000007',
//    'iss_bank_nm' => '交通银行',
//    'acnt_nm' => '测商真名',
//    'acnt_no' => '6123451231002187110',
//    'settle_tp' => '1',
//    'artif_nm' => '测商真名',
//    'acnt_artif_flag' => '1',
//    'acnt_certif_tp' => '0',
//    'acnt_certif_id' => '440582198705067958',
//    'acnt_certif_expire_dt' => '20991231',
//    'th_flag' => '0',
//    'wx_busi_flag' => '0',
//    'wx_flag' => '1',
//    'wx_set_cd' => 'M0000',
//    'ali_flag' => '1',
//    'ali_set_cd' => 'M0000',
//    'qpay_flag' => '',
//    'qpay_set_cd' => '',
//    'jdpay_flag' => '',
//    'jdpay_set_cd' => '',
//    'settle_tp_cd' => '',
//    'settle_ts' => '',
//    'has_reserve_acnt' => '',
//    'reserve_acnt_no' => '',
//    'reserve_acnt_nm' => '',
//    'reserve_inter_bank_no' => '',
//    'reserve_iss_bank_nm' => '',
//    'reserve_bank_type' => '',
//    'contact_cert_no' => '440582198705067958',
//    'license_start_dt' => '20120830',
//    'lic_regis_addr' => '上海富友',
//    'card_start_dt' => '20120830',
//]);
//
//var_dump($response->getResponse());
//
//$response = $app->merchant->mchntAcntUpd([
//    'trace_no' => '157424400680',
//    'fy_mchnt_cd' => 'As',
//    'ins_cd' => 'As',
//    'acnt_type' => '2',
//    'acnt_nm' => '440582198705067958',
//    'acnt_artif_flag' => '1',
//    'acnt_certif_tp' => '0',
//    'acnt_certif_id' => '440582198705067958',
//    'acnt_certif_expire_dt' => '20280808',
//]);
//var_dump($response->getResponse());

//$response = $app->merchant->wxMchntNameCheck([
//    'trace_no' => '157424400698',
//    'mchnt_name'=>'1'
//]);
//var_dump($response->getResponse());

//$response = $app->merchant->xyWechatConfigSet([
//    'trace_no' => '1534231053433',
//    'insCd' => '08A9999999',
//    'agencyType' => '0',
//    'configs' => [
//        [
//            'mchntCd' => '0007510F1588210',
//            'jsapiPath' => 'www.baidu.com',
//            'subAppid' => 'asdfasdfasd',
//            'subscribeAppid' => 'asdfasdfasd'
//        ], [
//            'mchntCd' => '0007510F1588210',
//            'jsapiPath' => 'www.baidu.com',
//            'subAppid' => 'asdfasdfasd',
//            'subscribeAppid' => 'asdfasdfasd'
//        ]
//    ]
//]);
//var_dump($response->getResponse());

//$response = $app->merchant->mchntQueryTZ([
//    'trace_no' => '157424400698',
//    'mchnt_name' => '1',
//    'mchnt_cd' => '0002900F0468631',
//    'modify_no' => '157424400',
//    'modify_tp' => 'TZ',
//]);
//var_dump($response->getResponse());
//
//$response = $app->merchant->mchntOpenTZ([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'trans_zero_flag' => '0',
//    'trans_zero_set_cd' => '',
//    'trans_zero_arr_type' => '1',
//    'month_free_count' => '',
//    'open_desc' => ''
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->wxMchntAddScanPrePay([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'alipre_pay' => '0',
//    'alipre_set_cd' => '',
//    'wechatpre_pay' => '0',
//    'wechatpre_set_cd' => '',
//    'submit_remark' => ''
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->addBestPay([
//    'insCd' => '08A9999999',
//    'mchntCd' => '0002900F0468631',
//    'bestPayOpen' => '1',
//    'bestPaySetCd' => '4',
//    'traceNo' => '157424400698',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->upayScanInstalment([
//    'trace_no' => '157424400698',
//    'sub_ins_cd' => '',
//    'mchnt_cd' => '0002900F0468631',
//    'is_open_installment' => '0',
//    'discount_type' => '0',
//    'num_instalment' => '1',
//    'bank_code' => 'GDB',
//    'card_discount_set_cd' => '',
//    'mer_discount_set_cd_3' => '',
//    'mer_discount_set_cd_6' => '',
//    'mer_discount_set_cd_12' => '',
//    'mer_discount_set_cd_24' => '',
//    'mer_discount_spec_set_cd_3' => '',
//    'mer_discount_spec_set_cd_6' => '',
//    'mer_discount_spec_set_cd_24' => '',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->unionPayPnrReport([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->specChnlReport([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'spec_chnl_type' => 'wx_school_canteen',
//    'mchnt_shortname' => '某某学校',
//    'set_cd' => 'M0008',
//    'business_code' => '164',
//    'remarks' => '',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->aliSpecActiReport([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'mcc' => '9501',
//    'set_cd' => 'M0008',
//    'remarks' => '',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->chnlSubMchIdQuery([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'mchnt_tp' => '1',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->aliQueryMchChnlInf([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'smid' => '',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->aliShopCrt([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'shop_category' => 'B0199',
//    'shop_prov_cd' => '110',
//    'shop_city_cd' => '1000',
//    'shop_county_cd' => '1000',
//    'shop_address' => '广东省广州市朝阳区河畔村',
//    'shop_own_id' => 'A0111111',
//    'shop_type' => '',
//    'shop_name' => ''
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->aliShopQuery([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'shop_own_id' => '08A9999999',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->notifyConfig([
//    'traceNo' => '157424400698',
//    'insCd' => '08A9999999',
//    'notifyEmailFlag' => '0',
//    'notifyUrl' => 'https://www.baidu.com',
//    'notifyUrlFlag' => '0',
//    'notifyType'=>'report',
//    'notifyEmails'=>'aint@qq.com',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->termAdd([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'tm_serial_no' => '12112121221',
//    'tm_contact_ps' => '张先生',
//    'tm_contact_ph' => '13719788774',
//    'tm_prov_cd' => '广东省',
//    'tm_city_cd' => '广州市份',
//    'tm_county_cd' => '1234',
//    'tm_inst_area' => '广东省广州市白云区',
//    'tm_bind_ind' => '1',
//    'tm_phone_no' => '',
//    'apply_remark' => '',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->termChange([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'src_tm_serial_no' => '12112121221',
//    'dest_tm_serial_no' => '12112121221',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->termCancel([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'tm_serial_no' => '12112121221',
//    'close_mchnt' => '0',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->termQuery([
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'tm_serial_no' => '12112121221',
//    'term_id' => '',
//]);
//var_dump($response->getResponse());
//$response = $app->merchant->termAddV2([
//    'ins_cd' => '08A9999999',
//    'trace_no' => '157424400698',
//    'mchnt_cd' => '0002900F0468631',
//    'apply_remark' => '',
//    'termList' => [
//        'tm_serial_no' => 'A1',
//        'tm_contact_ps' => '吴先生',
//        'tm_contact_ph' => '13719788774',
//        'tm_prov_cd' => '广东省',
//        'tm_city_cd' => '广州市',
//        'tm_county_cd' => '天河区',
//        'tm_inst_area' => '广东省广州市天河区',
//        'tm_bind_ind' => '0',
//        'tm_phone_no' => '13719788774',
//        'bfdml_pic_id' => '1',
//        'bfdns_pic_id' => '1',
//    ],
//]);
//var_dump($response->getResponse());


//$response = $app->scan->queryWithdrawAmt([
//    'reserved_busi_type' => '1'
//]);
//var_dump($response->getResponse());
//$response = $app->scan->queryFeeAmt([
//    'amt' => 1,
//    'reserved_busi_type' => '1'
//]);
//var_dump($response->getResponse());
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
//    'reserved_fy_term_sn'=>'',
//    'reserved_device_info'=>'',
//    'term_id'=>'12345678',
//    'random_str'=>'8617299e474e70707777d5671d1c267a',
//    'reserved_limit_pay'=>'',
//    'reserved_sub_appid'=>'',
//    'ins_cd' => '08A9999999',
//    'reserved_fy_term_type' => '',
//    'version' => '1',
//    'addn_inf' => '',
//    'auth_code' => '1278463572819911',
//    'mchnt_cd' => '0002900F0370542',
//    'reserved_expire_minute' => '',
//    'term_ip' => '127.0.0.1',
//    'sence' => '1',
//    'order_amt' =>1,
//    'goods_des' =>'支付',
//    'reserved_hb_fq_seller_percent' =>'',
//    'curr_type' =>'',
//    'txn_begin_ts' =>'20201201152942',
//    'goods_tag' =>'',
//    'goods_detail' =>'',
//    'reserved_fy_term_id' =>'',
//    'reserved_hb_fq_num' =>'',
//    'mchnt_order_no' =>'2020120115294222123451',
//    'order_type' =>'WECHAT',
//]);
//var_dump($response->getResponse());
$response = $app->prepare->preCreate([
    'reserved_fy_term_sn' => '',
    'reserved_device_info' => '',
    'term_id' => '12345678',
    'random_str' => 'd0194c1024f180065d2434fa8b6a2f82',
    'reserved_limit_pay' => '',
    'reserved_sub_appid' => '',
    'ins_cd' => '08A9999999',
    'reserved_fy_term_type' => '',
    'version' => '1',
    'addn_inf' => '',
    'mchnt_cd' => '0002900F0370542',
    'reserved_expire_minute' => '',
    'term_ip' => '127.0.0.1',
    'notify_url' => 'https://mail.qq.com/cgi-bin/frame_html?sid=pEYG5nBgQiNVqANe&amp;r=4a6c47ad7d279a80630dec073cda96e2',
    'order_amt' => 1,
    'goods_des' => '卡盟测试',
    'reserved_hb_fq_seller_percent' => '',
    'curr_type' => '',
    'txn_begin_ts' => '20201201151802',
    'goods_tag' => '',
    'goods_detail' => 'asasda',
    'reserved_fy_term_id' => '',
    'reserved_hb_fq_num' => '',
    'mchnt_order_no' => $node,
    'order_type' => 'WECHAT',
]);
var_dump($response->getResponse());
//var_dump($response->checkVerify());
//$response = $app->prepare->wxPreCreate([
//    'reserved_fy_term_sn' => '',
//    'reserved_device_info' => '',
//    'term_id' => '12345678',
//    'random_str' => 'd0194c1024f180065d2434fa8b6a2f82',
//    'reserved_limit_pay' => '',
//    'reserved_sub_appid' => '',
//    'ins_cd' => '08A9999999',
//    'reserved_fy_term_type' => '',
//    'version' => '1',
//    'addn_inf' => '',
//    'mchnt_cd' => '0002900F0370542',
//    'reserved_expire_minute' => '',
//    'term_ip' => '127.0.0.1',
//    'notify_url' => 'https://mail.qq.com/cgi-bin/frame_html?sid=pEYG5nBgQiNVqANe&amp;r=4a6c47ad7d279a80630dec073cda96e2',
//    'order_amt' => 1,
//    'goods_des' => '卡盟测试',
//    'reserved_hb_fq_seller_percent' => '',
//    'curr_type' => '',
//    'txn_begin_ts' => '20201201151802',
//    'goods_tag' => '',
//    'goods_detail' => 'asasda',
//    'reserved_fy_term_id' => '',
//    'reserved_hb_fq_num' => '',
//    'mchnt_order_no' => '202012011518020724446',
//    'order_type' => 'WECHAT',
//]);
//var_dump($response->getResponse());

//$res = $app->prepare->commonQuery([
//    'order_type' => 'WECHAT',
//    'mchnt_order_no' => $node,
//]);
//var_dump($res->getResponse());
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