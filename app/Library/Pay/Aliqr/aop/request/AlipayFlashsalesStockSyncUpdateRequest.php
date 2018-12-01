<?php
class AlipayFlashsalesStockSyncUpdateRequest { private $outProductId; private $publicId; private $stock; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setOutProductId($spa4e0c0) { $this->outProductId = $spa4e0c0; $this->apiParas['out_product_id'] = $spa4e0c0; } public function getOutProductId() { return $this->outProductId; } public function setPublicId($sp9ed196) { $this->publicId = $sp9ed196; $this->apiParas['public_id'] = $sp9ed196; } public function getPublicId() { return $this->publicId; } public function setStock($spb444d3) { $this->stock = $spb444d3; $this->apiParas['stock'] = $spb444d3; } public function getStock() { return $this->stock; } public function getApiMethodName() { return 'alipay.flashsales.stock.sync.update'; } public function setNotifyUrl($speb4f8d) { $this->notifyUrl = $speb4f8d; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spb43228) { $this->returnUrl = $spb43228; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spbed0e7) { $this->terminalType = $spbed0e7; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spc510db) { $this->terminalInfo = $spc510db; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp0605e4) { $this->prodCode = $sp0605e4; } public function setApiVersion($sp6872c2) { $this->apiVersion = $sp6872c2; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spac9c83) { $this->needEncrypt = $spac9c83; } public function getNeedEncrypt() { return $this->needEncrypt; } }