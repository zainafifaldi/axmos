<?php

namespace App\Http\Controllers\HomeKey;

use App\Http\Resourceable,
    App\Models\HomeKey\Finder,
    Illuminate\Routing\Controller as BaseController;

class FinderController extends BaseController
{
  public function run() {
    $total_dot = 0;
    $finder = new Finder($total_dot);

    return Resourceable::render('HomeKey\FinderResource', $finder, 200);
  }
}
