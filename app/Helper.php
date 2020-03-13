<?php // Code within app\Helpers\Helper.php

// namespace App\Helpers;

class Helper
{
   public static function currency_format($value)
   {
      $locale = App::getLocale();
      $unit = '';
      if ($locale == 'vi') {
         $unit = ' VND';
         $decimal = 0;
      }
      else {
         $unit = ' USD';
         $value = $value/23000.0;
         $decimal = 2;
      }
      return number_format($value, $decimal) . $unit;
   }
}