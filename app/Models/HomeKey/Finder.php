<?php

namespace App\Models\HomeKey;

use Illuminate\Database\Eloquent\Model;

class Finder extends Model
{
  public $total_dot;

  public function __construct($total_dot) {
    $this->total_dot = $total_dot;
  }
}
