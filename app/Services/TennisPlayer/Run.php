<?php

namespace App\Services\TennisPlayer;

use App\Models\TennisPlayer\Container,
    App\Services\BaseService,
    Illuminate\Support\Facades\DB;

class Run {
  public $total_containers;
  public $containers;

  public function __construct($total_containers) {
    $this->total_containers = $total_containers;
    $this->containers = array();
  }

  public function perform() {
    $this->generate_containers();

    $verified_container = $this->put_ball_randomly_to_container();
    return $verified_container;
  }

  /** PRIVATE FUNCTIONS */

  private function generate_containers() {
    for ($i = 0; $i < $this->total_containers; $i++) {
      $container_name = "Container Ke-" . ($i + 1);
      $this->containers[$i] = new Container($container_name);
    }
  }

  private function put_ball_randomly_to_container() {
    return $this->containers[0];
  }
}