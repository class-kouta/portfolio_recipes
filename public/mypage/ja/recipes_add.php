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

  <?php require_once(__DIR__ . '/../login_user.php'); ?>

    <main class="container-sm mx-2 my-3">

      <form method="post" action="recipes_add_check.php">

        <div class="mb-3">
          <label for="name" class="form-label">レシピ名</label>
          <div class="row">
            <div class="col-4">
              <input type="text" name="name" class="form-control" id="name" autocomplete="off">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="text" class="form-label">レシピ内容</label>
          <div class="row">
            <div class="col-7">
              <textarea name="text" class="form-control" id="text" rows="20" ></textarea>
            </div>
          </div>
        </div>

        <div class="my-4">
          <input type="submit" class="btn btn-info" value="レシピを追加">
        </div>

      </form>


  </body>
</html>
