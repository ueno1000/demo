#!/usr/bin/perl

use strict;
use CGI ':standard';
use URI;

my $id = param('id');
my $pw = param('pw');
my $base = 'http://auction.tricorder.jp/auction/login.cgi';

print <<END_OF_PRINT;
Location: $base?id=$id&pw=$pw

END_OF_PRINT
