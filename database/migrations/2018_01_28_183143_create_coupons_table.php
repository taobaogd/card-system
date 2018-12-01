<?php
use Illuminate\Support\Facades\Schema; use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateCouponsTable extends Migration { public function up() { Schema::create('coupons', function (Blueprint $spe8060e) { $spe8060e->increments('id'); $spe8060e->integer('user_id'); $spe8060e->integer('category_id')->default(-1); $spe8060e->integer('product_id')->default(-1); $spe8060e->integer('type')->default(\App\Coupon::TYPE_REPEAT); $spe8060e->integer('status')->default(\App\Coupon::STATUS_NORMAL); $spe8060e->string('coupon', 100); $spe8060e->integer('discount_type'); $spe8060e->integer('discount_val'); $spe8060e->integer('count_used')->default(0); $spe8060e->integer('count_all')->default(1); $spe8060e->string('remark')->nullable(); $spe8060e->dateTime('expire_at')->nullable(); $spe8060e->timestamps(); $spe8060e->index(array('user_id', 'coupon')); }); } public function down() { Schema::dropIfExists('coupons'); } }