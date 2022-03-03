use strict;

sub parse_cookie {
  my ($cookie_string) = @_;
  my @pairs = split /;/, $cookie_string;
  my $cookie = {};
  foreach my $pair (@pairs) {
     my ($name,$value) = split /=/, $pair;
     $name =~ s/ //g;
     $cookie->{$name} = $value;
  }
  return $cookie;
}

sub nl2br {
  my ($str) = @_;
  $str =~ s/\r\n/<br>/g;
  return $str;
}

1;
