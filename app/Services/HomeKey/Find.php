<?php

namespace App\Services\HomeKey;

class Find {

  public $home_structure;
  public $initial_position;

  /**
   *  Stepped Floor:
   *  0: Not stepped
   *  1: Stepped
   */
  public $stepped_floors;

  public function __construct($home_structure, $initial_position) {
    $this->home_structure = $home_structure;
    $this->initial_position = $initial_position;

    $this->initialize_stepped_floors();
  }

  public function perform() {
    $this->browse_floors_step_north($this->initial_position['y'], $this->initial_position['x']);

    $total_floors = $this->count_stepped_floors();
    return $total_floors;
  }

  /** PRIVATE FUNCTIONS */

  private function initialize_stepped_floors() {
    $this->stepped_floors = array();

    for ($i = 0; $i < count($this->home_structure); $i++) {
      $this->stepped_floors[$i] = array();

      for ($j = 0; $j < count($this->home_structure[$i]); $j++) {
        $this->stepped_floors[$i][$j] = 0;
      }
    }
  }

  /** Uncomment `echo` to see full stepped floors */
  private function count_stepped_floors() {
    $total_floors = 0;
    for ($i = 0; $i < count($this->stepped_floors); $i++) {
      for ($j = 0; $j < count($this->stepped_floors[$i]); $j++) {
        if ($this->stepped_floors[$i][$j] == 1) $total_floors++;
        // echo $this->stepped_floors[$i][$j] . " ";
      }
      // echo "<br/>";
    }

    return $total_floors;
  }

  private function browse_floors_step_north($y_pos, $x_pos) {
    $go_north = true;

    while ($go_north) {
      if ($this->can_go_north($y_pos, $x_pos)) {
        $y_pos -= 1;
        $this->step($y_pos, $x_pos);

        $this->browse_floors_step_east($y_pos, $x_pos);
      }
      else {
        $go_north = false;
      }
    }
  }

  private function browse_floors_step_east($y_pos, $x_pos) {
    $go_east = true;
    
    while ($go_east) {
      if ($this->can_go_east($y_pos, $x_pos)) {
        $x_pos += 1;
        $this->step($y_pos, $x_pos);

        $this->browse_floors_step_south($y_pos, $x_pos);
      }
      else {
        $go_east = false;
      }
    }
  }

  private function browse_floors_step_south($y_pos, $x_pos) {
    $go_south = true;
    
    while ($go_south) {
      if ($this->can_go_south($y_pos, $x_pos)) {
        $y_pos += 1;
        $this->step($y_pos, $x_pos);
      }
      else {
        $go_south = false;
      }
    }
  }

  private function step($y_pos, $x_pos) {
    $this->stepped_floors[$y_pos][$x_pos] = 1;
  }

  private function can_go_north($y_pos, $x_pos) {
    return $this->home_structure[$y_pos - 1][$x_pos] == '.';
  }

  private function can_go_east($y_pos, $x_pos) {
    return $this->home_structure[$y_pos][$x_pos + 1] == '.';
  }

  private function can_go_south($y_pos, $x_pos) {
    return $this->home_structure[$y_pos + 1][$x_pos] == '.';
  }
}
