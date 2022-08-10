<?php
require_once ("customer.php");
require_once ("dataAccess-db.php");

if (!isset($_REQUEST["surname"]))
{
  echo "(none)";
}
else {
  $names = getUsersByStartOfSurname($_REQUEST["surname"]);
  if (count($names) == 0)
  {
    echo "(none)";
  }
  else {
    foreach ($names as $name)
    {
      // this will leave an extra comma at the end.
      // We'll handle this client-side...
      echo "$name,";
    }
  }
}
?>
