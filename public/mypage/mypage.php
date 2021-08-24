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

  <?php require_once(__DIR__ . '/login_user.php'); ?>

  <main class="container-sm mx-2 mt-4 row">
    <a class="btn btn-outline-success col-3 py-5 fs-3" role="button" href="ja/recipes_list.php">和食</a>
    <a class="btn btn-outline-primary col-3 py-5 fs-3 offset-1" href="we/recipes_we.php">洋食</a>
    <a class="btn btn-outline-danger col-3 py-5 fs-3 offset-1" href="ch/recipes_ch.php">中華</a>
  </main>

  </body>
</html>
