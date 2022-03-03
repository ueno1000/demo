<?php
  session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>XSS</title>

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
  <h3>コメント</h3>
  <h4><?php echo $_GET['q']; ?></h4>
</body>
</html>
