<?php

namespace App\Http\Resources\HomeKey;

use Illuminate\Http\Resources\Json\JsonResource;

class FinderResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'total_dot' => $this->total_dot,
    ];
  }
}
