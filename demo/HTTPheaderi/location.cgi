#!/usr/bin/perl
use utf8;
use strict;
use CGI qw/-no_xhtml :standard/;

my $cgi = new CGI;
my $sp = 1;

my $category = $cgi->param('cat');

# PC用サイトへリダイレクト
if($sp)
  {
    my $url = "http://pc.example.com/?cat=$category";
    print "Location: $url\n\n";
    exit 0;
  }else{
    # スマートフォン用サイトへリダイレクト
    my $url = "http://sp.example.com/?cat=$category";
    print "Location: $url\n\n";
    exit 0;
  }
