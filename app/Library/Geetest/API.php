<?php
namespace App\Library\Geetest; use Illuminate\Support\Facades\Session; class API { private $geetest_conf = null; public function __construct($sp45b2a0) { $this->geetest_conf = $sp45b2a0; } public static function get() { $sp603291 = new Lib(config('services.geetest.id'), config('services.geetest.key')); $spfedf4e = time() . rand(1, 10000); $sp406289 = $sp603291->pre_process($spfedf4e); $spec9b7c = json_decode($sp603291->get_response_str()); Session::put('gt_server', $sp406289); Session::put('gt_user_id', $spfedf4e); return $spec9b7c; } public static function verify($sp024179, $sp22185d, $sp35c376) { $sp603291 = new Lib(config('services.geetest.id'), config('services.geetest.key')); $spfedf4e = Session::get('gt_user_id'); if (Session::get('gt_server') == 1) { $spcc4042 = $sp603291->success_validate($sp024179, $sp22185d, $sp35c376, $spfedf4e); if ($spcc4042) { return true; } else { return false; } } else { if ($sp603291->fail_validate($sp024179, $sp22185d, $sp35c376)) { return true; } else { return false; } } } }