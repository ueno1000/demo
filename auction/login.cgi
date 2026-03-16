#!/usr/bin/perl

use strict;
use CGI ':standard';

my $id = param('id');

# If not logged in, show the login form.
if( ! (param('id') && param('pw')) ) {
  print <<END_OF_LOGIN_PROMPT;
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
      <TD rowspan="2" align="left"><A href="index.cgi"><img src="tricorder_auctions.gif" alt="TRICORDER AUCTION" width="310" height="25" border="0"></A></TD>
      <TD align="right" valign="top"> </TD>
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
         <FORM id="loginform" action="login.cgi" method="POST">
           <p>TRICORDER ID:
             <INPUT name="id" type="text" class="formbox" value="$id" size="30">
             </p>
           <p>PASSWORD:
             <INPUT name="pw" type="password" class="formbox" size="30">
           </p>
           <p>
             <INPUT name="login" type="submit" class="formbox" value="LOGIN">
           </p>
         </FORM>
          <hr>
  </div>
  <div class="roundedcornr_bottom_551763"><div></div>
  </div>
</div>

<hr>
<p align="center"><FONT size="-1">Copyright (C)
  TRICORDER Co. Ltd. All Rights Reserved</FONT></p>
</BODY>
</HTML>
END_OF_LOGIN_PROMPT
}

else {
  print <<EOF_OF_HEADER;
Location: list.cgi
Set-Cookie: sid=Fra6u5He;

EOF_OF_HEADER
}
