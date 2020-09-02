<?php

namespace App\Http\Controllers\OnlineStore;

use App\Http\Resourceable,
    App\Models\OnlineStore\Order,
    App\Services\OnlineStoreService,
    Illuminate\Http\Request,
    Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
  public function index() {
    $orders = Order::all();

    return Resourceable::render('OnlineStore\OrderResource', $orders, 200);
  }

  public function create(Request $request) {
    $order = OnlineStoreService::create($request->all());

    return Resourceable::render('OnlineStore\OrderResource', $order, 201);
  }
}
