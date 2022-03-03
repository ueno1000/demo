<?php
require_once __DIR__ . '/function.php';
require_unlogined_session();

$dsn = 'mysql:dbname=vuln;host=localhost';
$user = 'root';
$password = 'toor';
try {
  $db = new PDO($dsn,$user,$password);
} catch (PDOException $e) {
  die("接続失敗" . $db->getMessage());
}

$username = $_POST["id"];
$password = $_POST['pw'];

// POSTメソッドのときのみ実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        validate_token(filter_input(INPUT_POST, 'token')) &&
        password_verify(
            $password,
            isset($hashes[$username])
                ? $hashes[$username]
                : '$2y$10$abcdefghijklmnopqrstuv' // ユーザ名が存在しないときだけ極端に速くなるのを防ぐ
        )
    ) {
        // 認証が成功したとき
        // セッションIDの追跡を防ぐ
        session_regenerate_id(true);
        // ユーザ名をセット
        $_SESSION['username'] = $username;
        // ログイン完了後に / に遷移
        header('Location: /');
        exit;
    }
    // 認証が失敗したとき
    // 「403 Forbidden」
    http_response_code(403);
}

if(login($_POST["id"],$_POST["pw"],$db) == true){
  session_regenerate_id(true);
  $_SESSION["login"] = true;
  $_SESSION["id"] = $_POST["id"];
  session_set_cookie_params(1209600);
	session_start();
	setcookie(session_name(),session_id(),time()+1209600);
  // 認証成功



}else{
  die("ログインに失敗しました");
}

function login($user,$password,$db)
{
  $sql = "SELECT * FROM userTbl WHERE user = ? limit 1;";
  $stmt = $db->prepare($sql,array('text'));
  $r = $stmt->execute(array($user));
  $row = $r->fetch(PDO::FETCH_ASSOC);
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
