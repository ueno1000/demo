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

$delid = filter_input(INPUT_GET,'id');
$sql = "DELETE FROM msgTbl WHERE id=?";
$stmt = $db->prepare($sql,array('integer'));
$stmt->execute(array($delid));
header('Location: ./index.php');
exit;
?>
