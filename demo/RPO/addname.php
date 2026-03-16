<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('mysqlitedb.db');
    }
}
$db = new MyDB();
$name = $_POST['q'];
$db->exec("INSERT INTO foo (name) VALUES ('$name')");
$name = $db->querySingle('SELECT name FROM foo ORDER BY id DESC');
?>
<html>
  <head>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <title>Relative Path Overwrite (RPO)</title>
  </head>
  <body>
    <p>「<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8')?>" was submitted as a friend request.</p>
    <p><a href="./">Back</a></p>
  </body>
</html>
