<html>
<head>
	<meta charset="UTF-8">
	<title>サーバー情報</title>
	<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
<h3>サーバー情報</h3>
<?php
	$modname=$_GET['mod'];
	require_once($modname.'.php');
?>
</body>
</html>
