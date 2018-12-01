<?php
namespace App\Http\Controllers; use App\Category; use App\Pay; use App\Product; use App\System; use App\User; use App\UserDomain; use Illuminate\Database\Eloquent\Relations\Relation; use Illuminate\Http\Request; use App\Library\Geetest; use Illuminate\Support\Facades\Auth; use Illuminate\Support\Facades\Cookie; class HomeController extends Controller { private function _shop_render($sp7b4336, $sp6680bb = null, $sp41d615 = null) { $sp45b2a0 = array('url' => config('app.url'), 'company' => System::_get('company'), 'name' => config('app.name'), 'logo' => System::_get('logo')); $sp45b2a0['shop'] = array('qq' => System::_get('shop_qq'), 'ann' => System::_get('shop_ann'), 'ann_pop' => System::_get('shop_ann_pop'), 'bkg' => System::_get('shop_bkg'), 'inventory' => System::_getInt('shop_inventory')); if ($sp41d615) { $sp45b2a0['categories'] = array($sp6680bb); $sp45b2a0['product'] = $sp41d615; $spe51eb0 = $sp41d615->name . ' - ' . $sp45b2a0['name']; $sp6fb668 = array(); preg_match_all('/"insert":"(.+?)"/', $sp41d615->description, $sp6fb668); $sp2d3764 = str_replace('\\n', ' ', @join(' ', $sp6fb668[1])); } elseif ($sp6680bb) { $sp45b2a0['categories'] = array($sp6680bb); $sp45b2a0['product'] = null; $spe51eb0 = $sp6680bb->name . ' - ' . $sp45b2a0['name']; $sp2d3764 = $sp6680bb->name; } else { $sp3888dd = Category::where('user_id', $sp7b4336->id)->orderBy('sort')->where('enabled', 1)->get(); foreach ($sp3888dd as $sp6680bb) { $sp6680bb->setVisible(array('id', 'name', 'password_open')); } $sp45b2a0['categories'] = $sp3888dd; $spe51eb0 = $sp45b2a0['name']; $sp2d3764 = $sp45b2a0['shop']['ann']; } $sp45b2a0['vcode'] = array('driver' => System::_get('vcode_driver'), 'buy' => (int) System::_get('vcode_shop_buy'), 'search' => (int) System::_get('vcode_shop_search')); if ($sp45b2a0['vcode']['driver'] === 'geetest') { $sp45b2a0['vcode']['geetest'] = Geetest\API::get(); } $sp45b2a0['pays'] = Pay::whereRaw('enabled&' . (self::is_mobile() ? Pay::ENABLED_MOBILE : Pay::ENABLED_PC) . '!=0')->orderBy('sort')->get(array('id', 'name', 'img')); $spf10c9d = Cookie::get('customer'); $spde6bcb = Cookie::make('customer', strlen($spf10c9d) !== 32 ? md5(str_random(16)) : $spf10c9d, 43200); $sp6951aa = $sp7b4336->shop_template ? $sp7b4336->shop_template->id : 0; return response()->view('shop_template.' . $sp6951aa . '.index', array('name' => $spe51eb0, 'keywords' => preg_replace('/[、，；。！？]/', ', ', $spe51eb0), 'description' => $sp2d3764, 'js_tj' => System::_get('js_tj'), 'js_kf' => System::_get('js_kf'), 'config' => $sp45b2a0))->cookie($spde6bcb); } private function _shop_404() { $this->checkIsInMaintain(); return view('message', array('title' => '404 NotFound', 'message' => '该链接不存在<br>
<a style="font-size: 18px" href="/#/record">查询订单</a>')); } public function shop_user($sp6da1ec) { $this->checkIsInMaintain(); $sp7b4336 = User::find(\App\UserDomain::id_decode($sp6da1ec)); if (!$sp7b4336) { $sp7b4336 = User::where('created_at', '<', \Carbon\Carbon::createFromDate(2019, 1, 1))->find($sp6da1ec); } if (!$sp7b4336) { return $this->_shop_404(); } return $this->_shop_render($sp7b4336); } public function shop_category($sp99d69d) { $this->checkIsInMaintain(); $sp6680bb = Category::whereId(\App\Category::id_decode($sp99d69d))->with('user')->first(); if (!$sp6680bb) { $sp6680bb = Category::whereId($sp99d69d)->where('created_at', '<', \Carbon\Carbon::createFromDate(2019, 1, 1))->with('user')->first(); } if (!$sp6680bb) { return $this->_shop_404(); } $sp6680bb->setVisible(array('id', 'name', 'password_open')); return $this->_shop_render($sp6680bb->user, $sp6680bb); } public function shop_product(Request $sp845342, $sp6a8a51) { $this->checkIsInMaintain(); $sp41d615 = Product::whereId(\App\Product::id_decode($sp6a8a51))->with(array('user', 'category', 'cards' => function (Relation $sp3eff46) { $sp3eff46->whereRaw('`count_all`>`count_sold`')->selectRaw('`product_id`,SUM(`count_all`-`count_sold`) as `count`')->groupBy('product_id'); }))->first(); if (!$sp41d615) { $sp41d615 = Product::whereId($sp6a8a51)->where('created_at', '<', \Carbon\Carbon::createFromDate(2019, 1, 1))->with(array('user', 'category', 'cards' => function (Relation $sp3eff46) { $sp3eff46->whereRaw('`count_all`>`count_sold`')->selectRaw('`product_id`,SUM(`count_all`-`count_sold`) as `count`')->groupBy('product_id'); }))->first(); } if (!$sp41d615 || !$sp41d615->category) { return $this->_shop_404(); } if ($sp41d615->password_open && $sp41d615->password !== $sp845342->input('p')) { return view('message', array('title' => '出错', 'message' => ($sp845342->has('p') ? '密码错误' : '请输入密码') . '<br>
<div style="font-size: 14px">
<input id="password" type="password" style="display: block; margin: 8px 0 8px 0">
<button onclick="location.href=location.href.split(\'?\')[0]+\'?p=\'+encodeURI(document.getElementById(\'password\').value)">确认</button>
</div>
')); } $sp41d615->category->setVisible(array('id', 'name', 'password_open')); $sp41d615->setAttribute('count', count($sp41d615->cards) ? $sp41d615->cards[0]->count : 0); $sp41d615->setVisible(array('id', 'name', 'description', 'count', 'buy_min', 'buy_max', 'support_coupon', 'password_open', 'price', 'price_whole')); return $this->_shop_render($sp41d615->user, $sp41d615->category, $sp41d615); } public function shop() { $this->checkIsInMaintain(); $sp7b4336 = User::firstOrFail(); return $this->_shop_render($sp7b4336); } public function admin() { $sp45b2a0 = array(); $sp45b2a0['url'] = config('app.url'); $sp45b2a0['vcode'] = array('driver' => System::_get('vcode_driver'), 'login' => System::_get('vcode_login')); if ($sp45b2a0['vcode']['driver'] === 'geetest') { $sp45b2a0['vcode']['geetest'] = Geetest\API::get(); } return view('admin', array('config' => $sp45b2a0)); } }