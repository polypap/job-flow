<?php
namespace App\Helpers;

class Helpers {

  public static function shortenString($title = "" , $length = 1) {
    $words = explode(" ", $title);
    $res = implode(" ", array_slice($words, 0, $length));
    return $res;
  }

  public static function booleanToString($bool = null, $value= ['true'=> '','false'=>'']){
    $res = $value;
    if($bool == null)
      return -1;
    if($bool == true || $bool ==1)
      $res= $value['true'];
    if($bool == false || $bool ==0)
      $res= $value['false'];
    return $res;
      
  }

  public static function getDateFormat($date="", $format = "d-m-Y") {
    if($date==null || empty($date))
      return "";
    return date($format, strtotime($date));
  }

}