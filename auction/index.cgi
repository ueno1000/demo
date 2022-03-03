#!/usr/bin/perl

use strict;
use CGI ':standard';
require './common.pl';

my $cookie = parse_cookie( $ENV{'HTTP_COOKIE'} );

if( $cookie->{sid} ne 'Fra6u5He' ) {
  print <<EOF_OF_HEADER;
Location: login.cgi

EOF_OF_HEADER
}
else {
  print <<EOF_OF_HEADER2;
Location: list.cgi

EOF_OF_HEADER2
}
