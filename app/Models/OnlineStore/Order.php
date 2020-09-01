<?php

namespace App\Models\OnlineStore;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'online_store_orders';
  protected $guarded = [];

  function product(){
    return $this->belongsTo('App\Models\OnlineStore\Product', 'product_id');
  }
}
