<?php

namespace App\Models\TennisPlayer;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
  protected static $capacity = 3;

  public $name, $quantity;

  public function __construct($name) {
    $this->name = $name;
    $this->quantity = 0;
  }

  public function get_capacity() {
    return self::$capacity;
  }

  public function is_full() {
    return $this->quantity >= self::$capacity;
  }

  /** Fill container with only one ball */
  public function fill_it() {
    $this->quantity = $this->quantity + 1;
  }
}
