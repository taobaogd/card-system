<?php
use Illuminate\Support\Facades\Schema; use Illuminate\Database\Schema\Blueprint; use Illuminate\Database\Migrations\Migration; class CreateJobsTable extends Migration { public function up() { Schema::create('jobs', function (Blueprint $spe8060e) { $spe8060e->bigIncrements('id'); $spe8060e->string('queue')->index(); $spe8060e->longText('payload'); $spe8060e->unsignedTinyInteger('attempts'); $spe8060e->unsignedInteger('reserved_at')->nullable(); $spe8060e->unsignedInteger('available_at'); $spe8060e->unsignedInteger('created_at'); }); } public function down() { Schema::dropIfExists('jobs'); } }