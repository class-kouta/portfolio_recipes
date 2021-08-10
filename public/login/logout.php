<?php

session_start();
$_SESSION = [];
if(isset($_COOKIE[session_name()])){
  setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
  </head>
  <body>

  ログアウトしました。
  <br>
  <br>
  <a href="login.html">ログイン画面へ</a>
  
  </body>
</html>