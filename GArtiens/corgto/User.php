<?php

class User {

  private $firstName;
  private $lastName;
  private $address;

  public function __construct($firstName, $lastName, $address) {
    $this->firstName = $firstName;
    $this->lastName  = $lastName;
    $this->address   = new Address(
      $address->addr1,
      $address->addr2,
      $address->zipCode,
      $address->city
    );
  }

  public function getUser() {
    return json_encode([
      'firstName' => $this->firstName,
      'lastName'  => $this->lastName,
      'address'   => $this->address->getAddress()
    ], JSON_PRETTY_PRINT);
  }

}



