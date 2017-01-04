<?php
function limpiarString($texto)
{
      $textoLimpio = preg_replace('([^A-Za-z0-9 ])', '', $texto);	     					
      return $textoLimpio;
}