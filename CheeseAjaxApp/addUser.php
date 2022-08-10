<!doctype html>
<?php require_once("addUser_controller.php"); ?>
<html>
  <head>
    <title>Add User</title>
  </head>
  <body>
    <?php if ($status): ?>
      <p style="color: green"><?=$status?></p>
    <?php endif ?>
    <form action="addUser.php" method="POST">
      Surname: <input name="surname"/><br/>
      Givenname: <input name="givenname"/><br/>
      Address: <input name="address"/><br/>
      <input type="submit"/>
    </form>
    <a href="listNames.php">Or go back to list</a>
  </body>
</html>
