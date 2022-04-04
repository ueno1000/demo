<!DOCTYPE html>
<html>
<head>
  <title>Server-Side Template Injection</title>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
  <?php
  require_once './vendor/autoload.php';
  
  if(isset($_GET['q'])){
    $q = $_GET['q'];
  } else {
    $q = 'Twig';
  }
  
  $loader = new \Twig\Loader\ArrayLoader([
    'index' => 'Hello '.$q,
  ]);
  $twig = new \Twig\Environment($loader);
  
  echo $twig->render('index');
  ?>
  <hr>
  <p>
    <form method="get" action="ssti.php">
      <input type="text" name="q" value="World">
      <input type="submit" value="submit">
    </form>
  </p>
  <hr>
  <p>
    <form method="get" action="ssti.php">
      <input type="text" name="q" value="{{7*7}}">
      <input type="submit" value="submit">
    </form>
  </p>
  <hr>
  <a href="./">戻る</a>
</body>
</html>
