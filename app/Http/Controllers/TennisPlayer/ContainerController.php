<?php

namespace App\Http\Controllers\TennisPlayer;

use App\Http\Resourceable,
    App\Services\TennisPlayerService,
    Illuminate\Http\Request,
    Illuminate\Routing\Controller as BaseController;

class ContainerController extends BaseController
{
  public function run(Request $request) {
    $verified_container = TennisPlayerService::run($request->input('total_containers'));

    return Resourceable::render('TennisPlayer\VerifiedContainerResource', $verified_container, 200);
  }
}
