<?php

namespace App\Services;

use App\Services\TennisPlayer\Run;

class TennisPlayerService {
  public static function run($arg1){ $res=new Run($arg1); return $res->perform(); }
}