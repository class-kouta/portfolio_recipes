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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>
    <section class="container-sm m-3">
      <p>ログアウトしました。</p>
      <a href="login.php">ログイン画面へ</a>
    </section>

  </body>
</html>
