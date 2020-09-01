<?php

namespace App\Http;

class Resourceable {
  public static function render($class, $resourceOrCollection, $httpStatus, $options = [], $additionVars = []) {
    $class = "\\App\\Http\\Resources\\$class";
    if($resourceOrCollection instanceof \Illuminate\Database\Eloquent\Collection) {
      $resourceClass = $class::collection($resourceOrCollection);
    }
    else {
      $resourceClass = new $class($resourceOrCollection);
    }

    $response = $resourceClass->additional([
      'meta' => array_merge($options, [
        'http_status' => $httpStatus,
      ]),
    ]);

    foreach($additionVars as $varKey => $varVal) {
      $response->$varKey($varVal);
    }

    return $response;
  }
}
