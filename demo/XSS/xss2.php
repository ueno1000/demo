<?php
  session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>属性値へのXSS</title>

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
  <form action="xss.php" method="post" name="mail" id="mail">
    <label for="uid">UID:</label>
    <input class="button-primary" type=text name=uid value=<?php echo $_GET['uid']; ?>>
  </form>
</body>
</html>
