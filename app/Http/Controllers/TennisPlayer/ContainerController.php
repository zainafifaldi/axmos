<?php

namespace App\Http\Controllers\TennisPlayer;

use App\Http\Resourceable,
    App\Services\TennisPlayerService,
    Illuminate\Routing\Controller as BaseController;

class ContainerController extends BaseController
{
  public function run() {
    $verified_container = TennisPlayerService::run(5);
    
    return Resourceable::render('TennisPlayer\VerifiedContainerResource', $verified_container, 200);
  }
}
