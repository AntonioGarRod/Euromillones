<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(__DIR__ . '/lib/cupon.php');
require_once (__DIR__ . '/lib/sorteo.php');

print ("Cupones jugados: <br>"); 

$sorteo = new sorteo;

$total = 0;

for ($i =0; $i<100; $i++){
  $cupon = new cupon;
  print $cupon->getRenderedCupon();
  print $cupon->getGoals($sorteo->getSorteo());
  print ("<br>");
  $total = $total + $cupon->getPrice();
}

echo ("<hr />");
print ("Resultados del sorteo: <br>"); 
print $sorteo->getRenderedSorteo();

print ("<br><br>PREMIO ACUMULADO: " . $total . " euros.");
