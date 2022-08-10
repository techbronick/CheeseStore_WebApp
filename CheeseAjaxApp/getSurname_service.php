<?php
header('Content-Type: application/json');
require_once ("customer.php");
require_once ("dataAccess-db.php");

if (!isset($_REQUEST["surname"]))
{
  echo json_encode([]); // send empty array
}
else {
  $names = getUsersByStartOfSurname($_REQUEST["surname"]);
  echo json_encode($names);
}
?>
