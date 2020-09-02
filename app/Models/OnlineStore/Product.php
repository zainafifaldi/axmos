<?php

namespace App\Models\OnlineStore;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'online_store_products';
  protected $guarded = [];
  protected $casts = [
    'quantity'  => 'integer',
  ];

  function orders(){
    return $this->hasMany('App\Models\OnlineStore\Order', 'product_id');
  }
}
