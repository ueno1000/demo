<?php
require_once __DIR__ . '/functions.php';
require_logined_session();

$dsn = 'mysql:dbname=vuln;host=localhost';
$user = 'root';
$password = 'toor';
try {
  $db = new PDO($dsn,$user,$password);
} catch (PDOException $e) {
  die("Connection failed: " . $db->getMessage());
}

# User Name
$sql = "SELECT * FROM userTbl WHERE user = ? limit 1";
$stmt = $db->prepare($sql,array('text'));
$stmt->execute(array($_SESSION['username']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $row['name'];

# Add Message
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $now = date('Y-m-d H:i:s');
  $comment = filter_input(INPUT_POST, 'comment');
  $sql = "INSERT INTO msgTbl (user,message,postdate) VALUES (?,?,?)";
  $type = array('text','text','text');
  $stmt = $db->prepare($sql,$type);
  $stmt->execute(array($username,$comment,$now));
}

header('Content-Type: text/html; charset=UTF-8');
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>CSRF BBS</title>

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
  <h3>CSRF BBS</h3>
  <h5>Welcome, <?=h($username)?></h5>
  <p><a href="logout.php?token=<?=h(generate_token())?>">Logout</a></p>

  <form action="" method="post">
    <label for="comment">Comment:</label>
    <input class="button-primary" type="text" name="comment" id="comment" size="40">
    <input class="button-primary" type="submit" name="submit" id="submit" value="submit">
  </form>
  <hr>
<?php
$sql = "SELECT * FROM msgTbl ORDER BY id DESC";
$res = $db->query($sql);
while ($row = $res->fetch(PDO::FETCH_ASSOC)){
?>
  <strong><?=h($row['user'])?>  </strong>[<a href="./delmsg.php?id=<?=h($row['id'])?>">DEL</a>]<BR>
  <p><?=h($row['message'])?></p>
<?php
}
?>
</body>
</html>
