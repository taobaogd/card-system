<?php
namespace App\Library; class LogHelper { public static function setLogFile($spbef20a) { \Log::getMonolog()->setHandlers(array()); \Log::useDailyFiles(storage_path() . '/logs/' . $spbef20a . '.log', 0, config('app.log_level')); } }