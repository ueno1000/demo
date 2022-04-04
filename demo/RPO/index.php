<!DOCTYPE html>
<html>
  <head>
    <title>Relative Path Overwrite (RPO)</title>
  </head>
  <body>
    <form method="post" action="./addname.php">
      友達申請を送る
      <p>名前：<input type="text" name="q" value="武田信玄"></p>
      <input type="submit">
    </form>
    <hr>
    <p><a href="rpo.php">メッセージを見る</a> [rpo.php] （style.css をCSSとして読み込む）</p>
    <p><a href="rpo.php/">メッセージを見る</a> [rpo.php/] （rpo.php をCSSとして読み込む）</p>
    <hr>
    <p>PoC</p>
    <p><input type="test" value="{}#blue{background-color:pink;}#red{background-color:green;}" size="64"></p>
    <hr>
    <p><a href="create_db.php">データベース初期化</a></p>
  </body>
</html>
