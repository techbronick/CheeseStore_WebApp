<?php
  session_start();
  require_once ("customer.php");
  require_once ("dataAccess-db.php");

  $status = false;

  if(isset($_REQUEST["surname"]))
  {
    $surname = $_REQUEST["surname"];
    $givenname = $_REQUEST["givenname"];
    $address = $_REQUEST["address"];

    $customer = new Customer();
    $customer->surname = htmlentities($surname);
    $customer->givenname = htmlentities($givenname);
    $customer->address = htmlentities($address);

    addUser($customer);
    $status = "$surname has been added.";
  }

  // should really direct to a view...

?>
