<?php

namespace App\Services\OnlineStore;

use App\Http\Resourceable,
    App\Models\OnlineStore\Product,
    App\Models\OnlineStore\Order,
    Illuminate\Support\Facades\DB;

class Create {
  public $params;
  public $order;

  public function __construct($params) {
    $this->params = $params;
  }

  public function perform() {
    DB::transaction(function() {
      $this->insert_order();
      $this->reduce_quantity();
    });

    return $this->order;
  }

  /** PRIVATE FUNCTIONS */

  private function insert_order() {
    $this->order = Order::create([
      'product_id'  => $this->params['product_id'],
      'user_id'     => $this->params['user_id'],
      'quantity'    => $this->params['quantity'],
    ]);
  }

  private function reduce_quantity() {
    /** Remove `->lockForUpdate()` method calling and add `sleep(1);` in line 40 to see race condition bad impact */
    $product = $this->order->product()->lockForUpdate()->first();
    $product->quantity -= $this->order->quantity;
    if ($product->quantity < 0) {
      /** Raise error when stock is reach minus */
      abort(Resourceable::message("Stok tidak mencukupi", 422));
    }
    $product->save();
  }
}
