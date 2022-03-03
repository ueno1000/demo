#!/usr/bin/perl
use utf8;
use strict;
use CGI qw/-no_xhtml :standard/;
use Encode qw(encode decode);

my $cgi = new CGI;

my $category = decode('UTF-8', $cgi->param('cat'));

print encode('UTF-8', <<END_OF_HTML);
Content-Type: text/html; charset=UTF-8
Set-Cookie: category=$category

<html>
  <head>
  <meta charset="UTF-8">
  <title>HTTPヘッダーインジェクション</title>

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
</head>
<body>
<h3>Cookieをセットしました。</h3>
</body>
</html>
END_OF_HTML
