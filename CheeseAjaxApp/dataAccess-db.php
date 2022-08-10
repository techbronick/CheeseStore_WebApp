<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_user = "ku46587";
$db_name = "db_ku46587";
$db_password = "poo";

$pdo = new
 PDO("mysql:host=kunet;dbname=$db_name",
$db_user,$db_password);

function getAllUsers()
{
  global $pdo;
  $statement = $pdo->prepare('SELECT givenname, surname, address FROM customers');
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
  return $result;
}

function getUsersBySurname($surname)
{
  if ($surname == "")
  {
    return getAllUsers();
  }
  global $pdo;
  $statement = $pdo->prepare('SELECT givenname, surname, address FROM customers
                              WHERE surname = ?');
  $statement->execute([$surname]);
  $users = $statement->fetchAll(PDO::FETCH_CLASS, 'Customer');
  return $users;
}

function getUsersByStartOfSurname($partialSurname)
{
  global $pdo;
  $statement = $pdo->prepare('SELECT DISTINCT surname FROM customers
                              WHERE surname like ?');
  $statement->execute(["$partialSurname%"]);
  // no point doing a fetch_class - we're only going to be returning surnames
  // FETCH_COLUMN does precisely what you'd expect - brings back a single column
  // in this case, we'll get an array of all the surnames.
  // ********* This non FETCH_CLASS use of PDO is considered acceptable! *********
  $users = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
  return $users;
}

function addUser($user)
{
  global $pdo;
  $statement = $pdo->prepare('INSERT INTO customers
    (givenname, surname, address) VALUES (?,?,?)');
  $statement->execute([$user->givenname,
                      $user->surname,
                      $user->address]);
}

?>
