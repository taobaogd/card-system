<?php
class AlipayEbppBillBatchPayurlGetRequest { private $callbackUrl; private $orderType; private $payBillList; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setCallbackUrl($sp621802) { $this->callbackUrl = $sp621802; $this->apiParas['callback_url'] = $sp621802; } public function getCallbackUrl() { return $this->callbackUrl; } public function setOrderType($sp9b1cc2) { $this->orderType = $sp9b1cc2; $this->apiParas['order_type'] = $sp9b1cc2; } public function getOrderType() { return $this->orderType; } public function setPayBillList($sp0876db) { $this->payBillList = $sp0876db; $this->apiParas['pay_bill_list'] = $sp0876db; } public function getPayBillList() { return $this->payBillList; } public function getApiMethodName() { return 'alipay.ebpp.bill.batch.payurl.get'; } public function setNotifyUrl($speb4f8d) { $this->notifyUrl = $speb4f8d; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spb43228) { $this->returnUrl = $spb43228; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spbed0e7) { $this->terminalType = $spbed0e7; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spc510db) { $this->terminalInfo = $spc510db; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp0605e4) { $this->prodCode = $sp0605e4; } public function setApiVersion($sp6872c2) { $this->apiVersion = $sp6872c2; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spac9c83) { $this->needEncrypt = $spac9c83; } public function getNeedEncrypt() { return $this->needEncrypt; } }