<?php
header('Content-Type: application/json');
require_once ("customer.php");
require_once ("dataAccess-db.php");

if (!isset($_REQUEST["surname"]))
{
  echo json_encode([]);
}
else {
  $customers = getUsersBySurname($_REQUEST["surname"]);
  echo json_encode($customers);  // <- this works because the Customer class
}                                //    implements JsonSerializable
?>
