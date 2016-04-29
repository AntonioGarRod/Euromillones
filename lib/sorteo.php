<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class sorteo {

  private $values = array();
  private $stars = array();

  public function __construct() {
    $this->values = $this->generate_random(1, 50, 5);
    $this->stars = $this->generate_random(1, 11, 2);

    asort($this->values);
    asort($this->stars);
  }

  public function getSorteo() {
    return $this;
  }

  public function getValues() {
    return $this->values;
  }

  public function getStars() {
    return $this->stars;
  }

  public function generate_random($min, $max, $size) {
    $values = array();

    for ($i = 0; $i < $size; $i++) {
      $value = mt_rand($min, $max);
      if (in_array($value, $values)) {
        while (in_array($value, $values)) {
          $value = mt_rand($min, $max);
        }
        $values[$i] = $value;
      }
      else {
        $values[$i] = $value;
      }
    }
    return $values;
  }

  public function getRenderedSorteo() {
    $values = join(', ', $this->values);
    $stars = join(', ', $this->stars);

    return ('Numeros: ' . $values . '<br>' . 'Estrellas: ' . $stars);
  }

}
