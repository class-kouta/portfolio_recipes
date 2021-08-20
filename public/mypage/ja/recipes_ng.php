<?php

require_once(__DIR__ . '/../../../app/session.php'); 

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>

    <div class="container-sm mt-2">
      <div class="d-flex flex-row-reverse ">
        <p><?= $_SESSION['name']?> さん ログイン中</p>
      </div>
      <div class="d-flex flex-row-reverse ">
        <a href="../../login/logout.php">ログアウト</a>
      </div>
    </div>

    レシピを選択してください
    <br>
    <br>
    <a href="recipes_list.php">レシピ一覧へ</a>

  </body>
</html>