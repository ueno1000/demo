  <?php
  require_once './vendor/autoload.php';
  $loader = new \Twig\Loader\FilesystemLoader('./templates');
  $twig = new \Twig\Environment($loader);
  
  if(isset($_GET['pilot'])){
    $pilot = $_GET['pilot'];
  } else {
    $pilot = 'Amuro Ray';
  }
  
  $products = [
    [
      'type'  => 'RX-78-2',
      'name'  => 'Gundam',
      'pilot' => $pilot
    ],
    [
      'type'  => 'MS-06S',
      'name'  => 'Zaku II',
      'pilot' => 'Char Aznable'
      
    ],
    [
      'type'  => 'MS-07',
      'name'  => 'Gouf',
      'pilot' => 'Ramba Ral'
    ],
  ];
  
  echo $twig->render('index.html', ['products' => $products] );
  ?>
