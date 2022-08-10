<?php
  session_start();
  require_once ("customer.php");
  require_once ("dataAccess-db.php");

  // if we've never set our session variable before
  if (!isset($_SESSION["lastsearch"]))
  {
    // make it an empty array
    $_SESSION["lastsearch"] = [];
  }

  $searchname = "";
  // if they performed a search, i.e. if one of the searchname
  // fields is filled in
  if (isset($_REQUEST["searchname"]) && $_REQUEST["searchname"] != "")
  {
    $searchname = $_REQUEST["searchname"];
    // add the search onto the end of the session variable array
    // but only if it's not already there...
    if (!in_array($searchname,$_SESSION["lastsearch"]))
    {
        $_SESSION["lastsearch"][] = $searchname;
    }
    // Remember the grammar! $_SESSION["lastsearch"] is going to
    // give us an array. We can append [] = to any array to add a new
    // item to it
  }

  $lastsearch = $_SESSION["lastsearch"];

  $customerlist = getUsersBySurname($searchname);

  require_once ("listNames_view.php");
?>
