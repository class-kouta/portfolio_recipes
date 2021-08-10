<?php

namespace App;

class Utils
{
  public static function h($str)
  {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
  
  public static function sanitize($before)
  {
    foreach($before as $key => $value){
      $after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    }
    return $after;
  }

}