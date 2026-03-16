<html>
<head>
  <meta charset="UTF-8">
  <title>Author Search</title>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
<h3>Search Results</h3>
<?php
$q = $_GET['q'];

$mysqli = new mysqli("localhost", "root", "toor", "vuln");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$result = $mysqli->query("SELECT author,item FROM bookTbl WHERE author='$q' and flag=1");
if (!$result) {
    die('Query failed: '.mysql_error());
}
?>
<table>
  <thead>
    <tr>
      <th>Author</th>
      <th>Book Title</th>
    </tr>
  </thead>
  <tbody>
<?php
while ($row = mysqli_fetch_array($result)) {
  print("   <tr>");
  print("     <td>".$row[0]."</td>");
  print("     <td>".$row[1]."</td>");
  print("   </tr>");
}
$mysqli->close();
?>
  </tbody>
</table>
</body>
</html>
