<!doctype html>
<html>
  <head>
    <title>Demo separation</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="clientcode.js"></script>
  </head>
  <body>
    <form action="listNames.php" method="get">
      Standard (form-based) search for surname:
      <input type="text" placeholder="Search" name="searchname"/> <input type="submit" value="Search"/>
    </form>
    Search for surname with magical mystical AJAX:
    <input type="text" placeholder="Search" name="ajaxsearchname"/> <input id="ajaxsearchbutton" type="button" value="Search"/>
    <br/>

    Autocomplete surname with AJAX but using ugly non-JSON web service:
    <div id="uglyajaxsearch">
      <input type="text" placeholder="Search"/>
      <div class="results">
        <div class="result">data</div>
      </div>
    </div>

    <br/>
    Autocomplete surname with AJAX and lovely JSON web service:
    <div id="niceajaxsearch">
      <input type="text" placeholder="Search"/>
      <div class="results">
        <div class="result">data</div>
      </div>
    </div>

    <?php if (count($lastsearch) != 0): ?>
      <form action="listNames.php" method="post">
        Past searches: <select name="searchname">
          <?php foreach ($lastsearch as $searchitem): ?>
            <option value="<?=$searchitem?>"><?=$searchitem?></option></li>
          <?php endforeach ?>
        </select>
        <input type="submit" value="Search"/>
      </form>
    <?php endif ?>
    <table id="resultstable">
      <thead>
        <tr>
          <th>Given Name</th>
          <th>Surname</th>
          <th>Address</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($customerlist as $customer): ?>
        <tr>
          <td><?=$customer->givenname?></td>
          <td><?=$customer->surname?></td>
          <td><?=$customer->address?></td>
          <?php sleep(1); ob_flush(); flush(); // simulate a slow interweb ?>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <a href="addUser.php">Add a new user</a>
  </body>
</html>
