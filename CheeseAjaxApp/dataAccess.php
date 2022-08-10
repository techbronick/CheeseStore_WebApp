<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$first = new Customer();
$first->givenname = "Paul";
$first->surname = "Neve";
$first->address = "Third dustbin to the left";

$second = new Customer();
$second->givenname = "Jane";
$second->surname = "Neve";
$second->address = "Third dustbin to the left";

$third = new Customer();
$third->givenname = "Fred";
$third->surname = "West";
$third->address = "27 Somewhere Street";

$fourth = new Customer();
$fourth->givenname = "Sally";
$fourth->surname = "Stevenson";
$fourth->address = "47b Culloden Road";

$customers = [ $first, $second, $third, $fourth ];

function getAllUsers()
{
  global $customers;
  return $customers;
}

function getUsersBySurname($surname)
{
  if ($surname == "")
  {
    return getAllUsers();
  }
  global $customers;
  $result = [];
  foreach ($customers as $customer)
  {
    if ($customer->surname == $surname)
    {
      $result[] = $customer;
    }
  }
  return $result;
}

?>
