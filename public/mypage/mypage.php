<?php

require_once(__DIR__ . '/../../app/session.php');

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
      <a href="../login/logout.php">ログアウト</a>
    </div>
  </div>

  <!-- <main class="container-sm mx-2 mt-4 row">
    <a class="btn btn-outline-success col-3 py-5 fs-3" role="button" href="ja/recipes_list.php">和食</a>
    <a class="btn btn-outline-primary col-3 py-5 fs-3 offset-1" href="we/recipes_we.php">洋食</a>
    <a class="btn btn-outline-danger col-3 py-5 fs-3 offset-1" href="ch/recipes_ch.php">中華</a>
  </main> -->

  <form method="post" name="form1" action="ja/recipes_list.php">
    <input type="hidden" name="genre" value="1">
    <a href="javascript:form1.submit()">和食</a>
  </form>
  <br>
  <br>
  <form method="post" name="form2" action="ja/recipes_list.php">
    <input type="hidden" name="genre" value="2">
    <a href="javascript:form2.submit()">洋食</a>
  </form>
  <br>
  <br>
  <form method="post" name="form3" action="ja/recipes_list.php">
    <input type="hidden" name="genre" value="3">
    <a href="javascript:form3.submit()">中華</a>
  </form>
  <br>
  <br>

  </body>
</html>
