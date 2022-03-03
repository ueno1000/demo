<?php
require_once __DIR__ . '/functions.php';
require_unlogined_session();

$dsn = 'mysql:dbname=vuln;host=localhost';
$user = 'root';
$password = 'toor';
try {
  $db = new PDO($dsn,$user,$password);
} catch (PDOException $e) {
  die("接続失敗" . $db->getMessage());
}

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (login($username,$password,$db) == true) {
      session_regenerate_id(true);
      $_SESSION['username'] = $username;
      header('Location: ./index.php');
      exit;
    }
    // 認証が失敗したとき
    // 「403 Forbidden」
    http_response_code(403);
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
  <form action="" method="post">
    <label for="id">User ID:</label>
    <input class="button-primary" type="text" name="username" id="id">
    <label for="pw">Password:</label>
    <input class="button-primary" type="password" name="password" id="pw">
    <input type="hidden" name="token" id="pw">
    <input class="button-primary" type="submit" name="submit" id="submit" value="Login">
  </form>
  (akechi/password, oda/password)
  <?php if (http_response_code() === 403): ?>
  <h4 style="color: red;">ユーザ名またはパスワードが違います</h4>
  <?php endif; ?>
  <hr>
<?php
$sql = "SELECT * FROM msgTbl ORDER BY id DESC";
$res = $db->query($sql);
while ($row = $res->fetch(PDO::FETCH_ASSOC)){
?>
  <strong><?=h($row['user'])?>  </strong><BR>
  <p><?=h($row['message'])?></p>
<?php
}
?>

</body>
</html>

<?php
function login($user,$password,$db)
{
  $sql = "SELECT * FROM userTbl WHERE user = ? limit 1;";
  $stmt = $db->prepare($sql,array('text'));
  $stmt->execute(array($user));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $pwd = get_userpassword_hash($password);
  if($pwd === $row['pass']){
    return true;
  }else{
    return false;
  }
}

function get_userpassword_hash($pwd)
{
  return hash('md5', $pwd);
}
?>
