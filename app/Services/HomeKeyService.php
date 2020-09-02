<?php

namespace App\Services;

use App\Services\HomeKey\Find;

class HomeKeyService {
  public static function find($arg1,$arg2){ $res=new Find($arg1,$arg2); return $res->perform(); }
}
