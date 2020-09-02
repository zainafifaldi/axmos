<?php

namespace App\Http\Controllers\HomeKey;

use App\Http\Resourceable,
    App\Models\HomeKey\Finder,
    App\Services\HomeKeyService,
    Illuminate\Routing\Controller as BaseController;

class FinderController extends BaseController
{
  public function run() {
    $home_structure = $this->initialize_home_structure();
    $initial_position = array('x' => 1, 'y' => 4);

    $total_dots = HomeKeyService::find($home_structure, $initial_position);

    $finder = new Finder($total_dots);

    return Resourceable::render('HomeKey\FinderResource', $finder, 200);
  }

  /** PRIVATE FUNCTION */

  private function initialize_home_structure() {
    return array(
      array('#', '#', '#', '#', '#', '#', '#', '#'),
      array('#', '.', '.', '.', '.', '.', '.', '#'),
      array('#', '.', '#', '#', '#', '.', '.', '#'),
      array('#', '.', '.', '.', '#', '.', '#', '#'),
      array('#', 'X', '#', '.', '.', '.', '.', '#'),
      array('#', '#', '#', '#', '#', '#', '#', '#'),
    );
  }

  /** x: 1, y: 7 */
  private function initialize_another_structure() {
    return array(
      array('#', '#', '#', '#', '#', '#', '#', '#'),
      array('#', '.', '.', '.', '.', '.', '.', '#'),
      array('#', '.', '#', '#', '#', '.', '.', '#'),
      array('#', '.', '.', '.', '#', '.', '#', '#'),
      array('#', '.', '#', '.', '.', '.', '.', '#'),
      array('#', '.', '.', '.', '.', '.', '.', '#'),
      array('#', '.', '#', '.', '#', '#', '.', '#'),
      array('#', 'X', '#', '.', '.', '.', '.', '#'),
      array('#', '#', '#', '#', '#', '#', '#', '#'),
    );
  }
}
