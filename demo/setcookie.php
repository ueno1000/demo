<html>
<head>
  <meta charset="UTF-8">
  <title>Set-Cookie</title>
  <link rel="stylesheet" href="./css/normalize.css">
  <link rel="stylesheet" href="./css/skeleton.css">
</head>
<body>
  <?php
    setcookie('HttpOnly1',"Yes_HttpOnly",time()+3600,'/','',0,1);
    setcookie('HttpOnly2',"No_HttpOnly",time()+3600,'/','',0,0);
  ?>
  <h3>Issued cookies.</h3>
  <script type="text/javascript">
  alert(document.cookie);
  </script>
</body>
</html>
