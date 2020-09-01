<?php

namespace App\Http\Controllers\OnlineStore;

use App\Http\Resourceable,
    App\Models\OnlineStore\Product,
    Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
  public function index() {
    $products = Product::all();

    return Resourceable::render('OnlineStore\ProductWithOrderResource', $products, 200);
  }
}
