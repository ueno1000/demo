<!DOCTYPE html>
<html>
  <head>
    <title>Relative Path Overwrite (RPO)</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
  </head>
  <body>
    <form method="post" action="./addname.php">
      Send a friend request
      <p>Name:<input type="text" name="q" value="Shingen Takeda"></p>
      <input type="submit">
    </form>
    <hr>
    <p><a href="rpo.php">View message</a> [rpo.php] (loads style.css as CSS)</p>
    <p><a href="rpo.php/">View message</a> [rpo.php/] (loads rpo.php as CSS)</p>
    <hr>
    <p>PoC</p>
    <p><input type="test" value="{}#blue{background-color:pink;}#red{background-color:green;}" size="64"></p>
    <hr>
    <p><a href="create_db.php">Initialize database</a></p>
  </body>
</html>
