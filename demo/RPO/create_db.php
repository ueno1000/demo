<!DOCTYPE html>
<html>
  <head>
    <title>Create Database</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
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
    $db->exec("INSERT INTO foo (name) VALUES ('Nobunaga Oda')");
    
    $result = $db->querySingle('SELECT name FROM foo');
    ?>
    Initialized the database and registered user "<?php echo $result ?>".
    <p><a href="./">Back</a></p>
  </body>
</html>
