<html>
<head>
	<meta charset="UTF-8">
	<title>DNS情報</title>
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
	<h3>DNS情報</h3>
	<pre><code>
<?php
	$domain = $_GET['domain'];
	system("/usr/bin/dig $domain");
?>
</code></pre>
</body>
</html>
