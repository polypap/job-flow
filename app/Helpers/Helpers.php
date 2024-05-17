<?php
namespace App\Helpers;

class Helpers {

  public static function shortenString($title = "" , $length = 1) {
    $words = explode(" ", $title);
    $res = implode(" ", array_slice($words, 0, $length));
    return $res;
  }

}