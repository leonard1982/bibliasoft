<?php
function valida_dni($dni) // retorna false(0) si hay errror o el DNI validado y con letra si no hay error
{
   $str = trim($dni);
   $str = str_replace("-","",$str);
   $str = str_ireplace(" ","",$str);
   $n = substr($str,0,strlen($str)-1);
   $n = intval($n);
   if (!is_int($n))
   {
      return 0;
   }
   $l = substr($str,-1);
   if (!is_string($l))
   {
      return 0;
   }
   $letra = substr ("TRWAGMYFPDXBNJZSQVHLCKE", $n%23, 1);
   if ( strtolower($l) == strtolower($letra))
   {
      return $n.$l;
   }
   else
   {
      return 0;
   }
}
?>