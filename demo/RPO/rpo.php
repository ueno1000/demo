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
    <p> <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?> さんから友達申請が来ています。許可しますか？</p>
    <button id="blue">許可（青）</button>
    <button id="red">拒否（赤）</button>
    <p><a href="./">戻る</a></p>
  </body>
</html>
