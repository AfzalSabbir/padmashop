<?php
namespace App\Helpers;

class NumberHelper
{
  /**
  * Escape Number From String
  */
  public static function simpleDryString($string)
  {
    return preg_replace('/[^0-9.]+/', '',$string);
  }

  /**
  * Mod
  */
  public static function simpleMod($number, $mod)
  {
    if ($number > 0) {
      return $number % $mod;
    } else {
      return 0;
    }
  }

}
