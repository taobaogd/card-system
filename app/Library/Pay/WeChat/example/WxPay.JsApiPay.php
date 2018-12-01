<?php
require_once '../lib/WxPay.Api.php'; class JsApiPay { public $data = null; public function GetOpenid() { if (!isset($_GET['code'])) { $sp5fcf79 = urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']); $sp7a0d0d = $this->__CreateOauthUrlForCode($sp5fcf79); Header("Location: {$sp7a0d0d}"); die; } else { $sp808526 = $_GET['code']; $spb80186 = $this->getOpenidFromMp($sp808526); return $spb80186; } } public function GetJsApiParameters($spf29d35) { if (!array_key_exists('appid', $spf29d35) || !array_key_exists('prepay_id', $spf29d35) || $spf29d35['prepay_id'] == '') { throw new WxPayException('参数错误'); } $spac62fe = new WxPayJsApiPay(); $spac62fe->SetAppid($spf29d35['appid']); $sp3821b5 = time(); $spac62fe->SetTimeStamp("{$sp3821b5}"); $spac62fe->SetNonceStr(WxPayApi::getNonceStr()); $spac62fe->SetPackage('prepay_id=' . $spf29d35['prepay_id']); $spac62fe->SetSignType('MD5'); $spac62fe->SetPaySign($spac62fe->MakeSign()); $sp51276e = json_encode($spac62fe->GetValues()); return $sp51276e; } public function GetOpenidFromMp($sp808526) { $sp7a0d0d = $this->__CreateOauthUrlForOpenid($sp808526); $spb70507 = curl_init(); curl_setopt($spb70507, CURLOPT_TIMEOUT, $this->curl_timeout); curl_setopt($spb70507, CURLOPT_URL, $sp7a0d0d); curl_setopt($spb70507, CURLOPT_SSL_VERIFYPEER, FALSE); curl_setopt($spb70507, CURLOPT_SSL_VERIFYHOST, FALSE); curl_setopt($spb70507, CURLOPT_HEADER, FALSE); curl_setopt($spb70507, CURLOPT_RETURNTRANSFER, TRUE); if (WxPayConfig::CURL_PROXY_HOST != '0.0.0.0' && WxPayConfig::CURL_PROXY_PORT != 0) { curl_setopt($spb70507, CURLOPT_PROXY, WxPayConfig::CURL_PROXY_HOST); curl_setopt($spb70507, CURLOPT_PROXYPORT, WxPayConfig::CURL_PROXY_PORT); } $sp19a4e0 = curl_exec($spb70507); curl_close($spb70507); $sp38c5ae = json_decode($sp19a4e0, true); $this->data = $sp38c5ae; $spb80186 = $sp38c5ae['openid']; return $spb80186; } private function ToUrlParams($sp1a75ae) { $sp7d31a0 = ''; foreach ($sp1a75ae as $sp1e32fe => $sp398610) { if ($sp1e32fe != 'sign') { $sp7d31a0 .= $sp1e32fe . '=' . $sp398610 . '&'; } } $sp7d31a0 = trim($sp7d31a0, '&'); return $sp7d31a0; } public function GetEditAddressParameters() { $sp97eaec = $this->data; $sp38c5ae = array(); $sp38c5ae['appid'] = WxPayConfig::APPID; $sp38c5ae['url'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; $sp930fdf = time(); $sp38c5ae['timestamp'] = "{$sp930fdf}"; $sp38c5ae['noncestr'] = '1234568'; $sp38c5ae['accesstoken'] = $sp97eaec['access_token']; ksort($sp38c5ae); $spf44b7f = $this->ToUrlParams($sp38c5ae); $sp6f1f0d = sha1($spf44b7f); $sp441bd3 = array('addrSign' => $sp6f1f0d, 'signType' => 'sha1', 'scope' => 'jsapi_address', 'appId' => WxPayConfig::APPID, 'timeStamp' => $sp38c5ae['timestamp'], 'nonceStr' => $sp38c5ae['noncestr']); $sp51276e = json_encode($sp441bd3); return $sp51276e; } private function __CreateOauthUrlForCode($sp2f8842) { $sp1a75ae['appid'] = WxPayConfig::APPID; $sp1a75ae['redirect_uri'] = "{$sp2f8842}"; $sp1a75ae['response_type'] = 'code'; $sp1a75ae['scope'] = 'snsapi_base'; $sp1a75ae['state'] = 'STATE' . '#wechat_redirect'; $sp260079 = $this->ToUrlParams($sp1a75ae); return 'https://open.weixin.qq.com/connect/oauth2/authorize?' . $sp260079; } private function __CreateOauthUrlForOpenid($sp808526) { $sp1a75ae['appid'] = WxPayConfig::APPID; $sp1a75ae['secret'] = WxPayConfig::APPSECRET; $sp1a75ae['code'] = $sp808526; $sp1a75ae['grant_type'] = 'authorization_code'; $sp260079 = $this->ToUrlParams($sp1a75ae); return 'https://api.weixin.qq.com/sns/oauth2/access_token?' . $sp260079; } }