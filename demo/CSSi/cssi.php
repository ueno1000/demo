<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
      #vuln {
        color: <?=$_GET['q']?>;
      }
    </style>
    <meta charset="utf-8">
    <title>CSS Injection</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
  </head>
  <body>
    <div id="vuln">TARGET</div>
  </body>
</html>
