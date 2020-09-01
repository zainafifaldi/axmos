<?php

namespace App\Http\Resources\OnlineStore;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductWithOrderResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'id'        => $this->id,
      'name'      => $this->name,
      'quantity'  => $this->quantity,
      'orders'    => OrderResource::collection($this->orders()->get()),
    ];
  }
}
