<?php

class Address {

private $addr1;
private $addr2;
private $zipCode;
private $city;

public function __construct($addr1, $addr2, $zipCode, $city) {
  $this->addr1 = $addr1;
  $this->addr2 = $addr2;
  $this->zipCode = $zipCode;
  $this->city = $city;
}

public function getAddress() {
  return [
    'addr1' => $this->addr1,
    'addr2' => $this->addr2,
    'zipCode' => $this->zipCode,
    'city'    => $this->city
  ];
}

}