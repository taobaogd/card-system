<?php
namespace App\Library\Pay\QPay; use App\Library\Helper; use App\Library\Pay\ApiInterface; use Illuminate\Support\Facades\Log; require_once __DIR__ . '/qpay_mch_sp/qpayMchAPI.class.php'; class Api implements ApiInterface { private $url_notify = ''; public function __construct($sp3a2be3) { $this->url_notify = SYS_URL_API . '/pay/notify/' . $sp3a2be3; } function goPay($sp45b2a0, $spd184e1, $sp873da9, $sp33eb4d, $sp521b2c) { if (!isset($sp45b2a0['mch_id']) || !isset($sp45b2a0['mch_key'])) { throw new \Exception('请设置 mch_id 和 mch_key'); } $spf44b7f = array('out_trade_no' => $spd184e1, 'body' => $sp873da9, 'device_info' => 'qq_19060', 'fee_type' => 'CNY', 'notify_url' => $this->url_notify, 'spbill_create_ip' => Helper::getIP(), 'total_fee' => $sp521b2c, 'trade_type' => 'NATIVE'); $sp944434 = new \QpayMchAPI('https://qpay.qq.com/cgi-bin/pay/qpay_unified_order.cgi', null, 10); $spc8aefb = $sp944434->req($spf44b7f, $sp45b2a0); $spcc4042 = \QpayMchUtil::xmlToArray($spc8aefb); if (!isset($spcc4042['code_url'])) { Log::error('Pay.QPay.goPay, order_no:' . $spd184e1 . ', error:' . json_encode($spcc4042)); if (isset($spcc4042['err_code_des'])) { throw new \Exception($spcc4042['err_code_des']); } if (isset($spcc4042['return_msg'])) { throw new \Exception($spcc4042['return_msg']); } throw new \Exception('获取支付数据失败'); } header('location: /qrcode/pay/' . $spd184e1 . '/qq?url=' . urlencode($spcc4042['code_url'])); die; } function verify($sp45b2a0, $spf85c0e) { $sp5c8ce2 = isset($sp45b2a0['isNotify']) && $sp45b2a0['isNotify']; $sp944434 = new \QpayMchAPI('https://qpay.qq.com/cgi-bin/pay/qpay_order_query.cgi', null, 10); if ($sp5c8ce2) { $spf44b7f = $sp944434->notify_params(); if (!$sp944434->notify_verify($spf44b7f, $sp45b2a0)) { echo '<xml><return_code>FAIL</return_code></xml>'; return false; } call_user_func_array($spf85c0e, array($spf44b7f['out_trade_no'], $spf44b7f['total_fee'], $spf44b7f['transaction_id'])); echo '<xml><return_code>SUCCESS</return_code></xml>'; return true; } else { $spd184e1 = @$sp45b2a0['out_trade_no']; $spf44b7f = array('out_trade_no' => $spd184e1); $spc8aefb = $sp944434->req($spf44b7f, $sp45b2a0); $spcc4042 = \QpayMchUtil::xmlToArray($spc8aefb); if (array_key_exists('trade_state', $spcc4042) && $spcc4042['trade_state'] == 'SUCCESS') { call_user_func_array($spf85c0e, array($spcc4042['out_trade_no'], $spcc4042['total_fee'], $spcc4042['transaction_id'])); return true; } else { return false; } } } }