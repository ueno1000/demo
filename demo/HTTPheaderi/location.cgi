#!/usr/bin/perl
use utf8;
use strict;
use CGI qw/-no_xhtml :standard/;

my $cgi = new CGI;
my $sp = 1;

my $category = $cgi->param('cat');

# Redirect to desktop site
if($sp)
  {
    my $url = "http://pc.example.com/?cat=$category";
    print "Location: $url\n\n";
    exit 0;
  }else{
    # Redirect to smartphone site
    my $url = "http://sp.example.com/?cat=$category";
    print "Location: $url\n\n";
    exit 0;
  }
