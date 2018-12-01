<?php
class AlipayMobilePublicInfoModifyRequest { private $appName; private $authPic; private $licenseUrl; private $logoUrl; private $publicGreeting; private $shopPic1; private $shopPic2; private $shopPic3; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setAppName($spc053e5) { $this->appName = $spc053e5; $this->apiParas['app_name'] = $spc053e5; } public function getAppName() { return $this->appName; } public function setAuthPic($sp94f76c) { $this->authPic = $sp94f76c; $this->apiParas['auth_pic'] = $sp94f76c; } public function getAuthPic() { return $this->authPic; } public function setLicenseUrl($spcc908e) { $this->licenseUrl = $spcc908e; $this->apiParas['license_url'] = $spcc908e; } public function getLicenseUrl() { return $this->licenseUrl; } public function setLogoUrl($spc819f0) { $this->logoUrl = $spc819f0; $this->apiParas['logo_url'] = $spc819f0; } public function getLogoUrl() { return $this->logoUrl; } public function setPublicGreeting($sp761a05) { $this->publicGreeting = $sp761a05; $this->apiParas['public_greeting'] = $sp761a05; } public function getPublicGreeting() { return $this->publicGreeting; } public function setShopPic1($sp752d7b) { $this->shopPic1 = $sp752d7b; $this->apiParas['shop_pic1'] = $sp752d7b; } public function getShopPic1() { return $this->shopPic1; } public function setShopPic2($sp0089dc) { $this->shopPic2 = $sp0089dc; $this->apiParas['shop_pic2'] = $sp0089dc; } public function getShopPic2() { return $this->shopPic2; } public function setShopPic3($sp2e8588) { $this->shopPic3 = $sp2e8588; $this->apiParas['shop_pic3'] = $sp2e8588; } public function getShopPic3() { return $this->shopPic3; } public function getApiMethodName() { return 'alipay.mobile.public.info.modify'; } public function setNotifyUrl($speb4f8d) { $this->notifyUrl = $speb4f8d; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spb43228) { $this->returnUrl = $spb43228; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spbed0e7) { $this->terminalType = $spbed0e7; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spc510db) { $this->terminalInfo = $spc510db; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp0605e4) { $this->prodCode = $sp0605e4; } public function setApiVersion($sp6872c2) { $this->apiVersion = $sp6872c2; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spac9c83) { $this->needEncrypt = $spac9c83; } public function getNeedEncrypt() { return $this->needEncrypt; } }