<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once (__DIR__ . '/sorteo.php');

class cupon extends sorteo {

  private $values = array();
  private $stars = array();
  private $price = 0;

  public function __construct() {
    $this->values = $this->generate_random(1, 50, 5);
    $this->stars = $this->generate_random(1, 11, 2);

    asort($this->values);
    asort($this->stars);
  }

  public function getCupon() {
    return $this;
  }

  public function getRenderedCupon() {
    $values = join(', ', $this->values);
    $stars = join(', ', $this->stars);

    return ('Numeros: ' . $values . '<br>' . 'Estrellas: ' . $stars);
  }

  public function getGoals(sorteo $sorteo) {
    $stars = $this->matchs($this->stars, $sorteo->getStars());
    $values = $this->matchs($this->values, $sorteo->getValues());

    switch ($values):
      case 2: $this->price = 4;
        break;
      case 3: $this->price = 10;
        break;
      case 4: $this->price = 75;
        break;
      case 5: $this->price = 75900;
        break;
    endswitch;

    switch ($stars):
      case 0: $this->price = $this->price;
        break;
      case 1: $this->price = $this->price * 2;
        break;
      case 2: $this->price = pow($this->price, 2);
        break;
    endswitch;

    print ("<br>Aciertos: " . $values . " numeros, " . $stars . " estrellas");
    print ("<br>Premio: " . $this->price . " euros<br>");
  }

  public function getPrice() {
    return $this->price;
  }

  public function matchs(array $one, array $two) {
    $goals = 0;
    foreach ($one as $value) {
      if (in_array($value, $two)) {
        $goals++;
      }
    }
    return $goals;
  }

}
