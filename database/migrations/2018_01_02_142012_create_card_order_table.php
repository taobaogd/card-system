<?php
use Illuminate\Support\Facades\Schema; use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateCardOrderTable extends Migration { public function up() { Schema::create('card_order', function (Blueprint $spe8060e) { $spe8060e->increments('id'); $spe8060e->integer('order_id'); $spe8060e->integer('card_id'); }); } public function down() { Schema::dropIfExists('card_order'); } }