<?php

namespace App\Http\Resources\OnlineStore;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'id'          => $this->id,
      'product_id'  => $this->product_id,
      'user_id'     => $this->user_id,
      'quantity'    => $this->quantity,
    ];
  }
}
