<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('mysqlitedb.db');
    }
}
$db = new MyDB();
$name = $db->querySingle('SELECT name FROM foo ORDER BY id DESC');
?>
<html>
  <head>
    <title>Relative Path Overwrite (RPO)</title>
    <link href="./style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <p> <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?> sent you a friend request. Do you approve it?</p>
    <button id="blue">Approve (blue)</button>
    <button id="red">Reject (red)</button>
    <p><a href="./">Back</a></p>
  </body>
</html>
