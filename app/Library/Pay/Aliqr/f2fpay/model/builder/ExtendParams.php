<?php
class ExtendParams { private $sysServiceProviderId; private $hbFqNum; private $hbFqSellerPercent; private $extendParamsArr = array(); public function getExtendParams() { if (!empty($this->extendParamsArr)) { return $this->extendParamsArr; } } public function getSysServiceProviderId() { return $this->sysServiceProviderId; } public function setSysServiceProviderId($spd34fe2) { $this->sysServiceProviderId = $spd34fe2; $this->extendParamsArr['sys_service_provider_id'] = $spd34fe2; } public function getHbFqNum() { return $this->hbFqNum; } public function setHbFqNum($sp6d0705) { $this->hbFqNum = $sp6d0705; $this->extendParamsArr['hb_fq_num'] = $sp6d0705; } public function getHbFqSellerPercent() { return $this->hbFqSellerPercent; } public function setHbFqSellerPercent($sp452833) { $this->hbFqSellerPercent = $sp452833; $this->extendParamsArr['hb_fq_seller_percent'] = $sp452833; } }