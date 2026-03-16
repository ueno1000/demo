<html>
<head>
<meta charset="UTF-8">
<title>Book Summary</title>
<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
<h3>Overview</h3>
<pre><code>
<?php
	$book = $_GET['book'];
	readfile('./'.$book);
?>
</code></pre>
</body>
</html>
