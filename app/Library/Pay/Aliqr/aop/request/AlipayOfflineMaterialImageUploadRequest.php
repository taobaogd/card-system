<?php
class AlipayOfflineMaterialImageUploadRequest { private $imageContent; private $imageName; private $imagePid; private $imageType; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setImageContent($sp7884b2) { $this->imageContent = $sp7884b2; $this->apiParas['image_content'] = $sp7884b2; } public function getImageContent() { return $this->imageContent; } public function setImageName($sp57d4b2) { $this->imageName = $sp57d4b2; $this->apiParas['image_name'] = $sp57d4b2; } public function getImageName() { return $this->imageName; } public function setImagePid($sp8f3776) { $this->imagePid = $sp8f3776; $this->apiParas['image_pid'] = $sp8f3776; } public function getImagePid() { return $this->imagePid; } public function setImageType($sp0d550b) { $this->imageType = $sp0d550b; $this->apiParas['image_type'] = $sp0d550b; } public function getImageType() { return $this->imageType; } public function getApiMethodName() { return 'alipay.offline.material.image.upload'; } public function setNotifyUrl($speb4f8d) { $this->notifyUrl = $speb4f8d; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spb43228) { $this->returnUrl = $spb43228; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spbed0e7) { $this->terminalType = $spbed0e7; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spc510db) { $this->terminalInfo = $spc510db; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp0605e4) { $this->prodCode = $sp0605e4; } public function setApiVersion($sp6872c2) { $this->apiVersion = $sp6872c2; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spac9c83) { $this->needEncrypt = $spac9c83; } public function getNeedEncrypt() { return $this->needEncrypt; } }