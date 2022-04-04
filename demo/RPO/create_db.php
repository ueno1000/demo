<!DOCTYPE html>
<html>
  <head>
    <title>Create Database</title>
  </head>
  <body>
    <?php
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('mysqlitedb.db');
        }
    }
    if(file_exists('mysqlitedb.db')) unlink('mysqlitedb.db');
    
    $db = new MyDB();
    $db->exec('CREATE TABLE foo (id INTEGER primary key, name STRING)');
    $db->exec("INSERT INTO foo (name) VALUES ('織田信長')");
    
    $result = $db->querySingle('SELECT name FROM foo');
    ?>
    データベースを初期化してユーザー「<?php echo $result ?>」を登録しました。
    <p><a href="./">戻る</a></p>
  </body>
</html>
