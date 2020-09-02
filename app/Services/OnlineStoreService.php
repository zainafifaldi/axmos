<?php

namespace App\Services;

use App\Services\OnlineStore\Create;

class OnlineStoreService {
  public static function create($arg1){ $res=new Create($arg1); return $res->perform(); }
}
