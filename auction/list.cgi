#!/usr/bin/perl

use strict;
use CGI ':standard';
require './common.pl';
require './data.pl';

my $cookie = parse_cookie( $ENV{'HTTP_COOKIE'} );

if( $cookie->{sid} ne 'Fra6u5He' ) {
  print <<EOF_OF_HEADER;
Location: logininfo.cgi

EOF_OF_HEADER
}

else {
  my $data = get_data();
  print <<END_OF_TEXT;
Content-Type: text/html

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="Content-Style-Type" content="text/css">
<TITLE>TRICORDER AUCTION</TITLE>
<link href="demo.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<TABLE width="100%">
  <TBODY>
    <TR>
      <TD rowspan="2" align="left"><A href="index.cgi"><img src="tricorder_auctions.gif" alt="TRICORDER�I�[�N�V����" width="310" height="25" border="0"></A></TD>
      <TD align="right" valign="top"><a href="logout.cgi">LOGOUT</a></TD>
    </TR>
    <TR>
      <TD></TD>
    </TR>
    <TR>
      <TD colspan="2" align="left"><hr></TD>
    </TR>
  </TBODY>
</TABLE>
<div class="roundedcornr_box_551763">
   <div class="roundedcornr_top_551763"><div></div></div>
      <div class="roundedcornr_content_551763">
         <p align="left">Welcome! <strong>Sen UENO</strong></p>
      </div>
   <div class="roundedcornr_bottom_551763"><div></div></div>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
END_OF_TEXT

  for( my $i=0 ; $i<=$#$data ; ++$i ) {
    my $d = $data->[$i];
    print <<END_OF_TEXT;
  <tr>
    <td valign="top"><a href="#">$d->{subject}</a><br>$d->{image}<br>Seller:<a href="#">$d->{from}</a></td>
    <td valign="top"><B><FONT color="#ff0000">$d->{bidding_price}</FONT></B></td>
    <td valign="top"><B>$d->{bidder}</B></td>
    <td valign="top">$d->{days}</td>
    <td valign="top"><FORM>
        ¥<INPUT name="price" type="text" class="formbox" size="10">
        <INPUT name="submit" type="submit" class="formbox" value="BET">
    </FORM></td>
  </tr>
END_OF_TEXT
  }

  print <<END_OF_TEXT;
</table>
<p>&nbsp;</p>
<hr>
<p align="center"><FONT size="-1">Copyright (C)
  TRICORDER Co. Ltd. All Rights Reserved</FONT></p>
</BODY>
</HTML>
END_OF_TEXT
}
