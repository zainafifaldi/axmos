<?php

namespace App\Http\Resources\TennisPlayer;

use Illuminate\Http\Resources\Json\JsonResource;

class VerifiedContainerResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'name'  => $this->name,
    ];
  }
}
