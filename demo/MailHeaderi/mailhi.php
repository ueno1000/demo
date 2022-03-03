<?php
  $from = $_POST['from'];
  $msg = $_POST['msg'];
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");
  if (mb_send_mail("tip@nifty.com", "Mail Header Injection Test", $msg , "From: ".$from)) {
    echo "メールが送信されました。";
  } else {
    echo "メールの送信に失敗しました。";
  }
?>
