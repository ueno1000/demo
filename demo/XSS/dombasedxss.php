<?php
  session_start();
?>
<html>
<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
  <title>DOM based XSS</title>
</head>
<body>
  <h3>URL</h3>
  <script>
    document.write("<h4>"+unescape(document.location)+"</h4>");
  </script>
</body>
</html>
