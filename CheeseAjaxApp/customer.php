<?php
class Customer implements JsonSerializable {
  private $givenname;
  private $surname;
  private $address;

  function __get($name) {
    return $this->$name;
  }

  function __set($name,$value) {
    $this->$name = $value;
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
    /*
    return [
      "givenname" => $this->givenname,
      "surname" => $this->surname,
      "address" => $this->address,
    ]; */
  }
}
?>
