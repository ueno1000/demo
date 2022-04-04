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
  </head>
  <body>
    <div id="vuln">TARGET</div>
  </body>
</html>
