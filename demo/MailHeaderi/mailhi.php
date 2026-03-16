<?php
  $from = $_POST['from'];
  $msg = $_POST['msg'];
  mb_language("English");
  mb_internal_encoding("UTF-8");
  if (mb_send_mail("tip@nifty.com", "Mail Header Injection Test", $msg , "From: ".$from)) {
    echo "Email was sent.";
  } else {
    echo "Failed to send email.";
  }
?>
