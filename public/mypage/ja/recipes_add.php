<?php

require_once(__DIR__ . '/../../../app/session.php');
require_once(__DIR__ . '/../../../app/config.php');
use App\Utils;
use App\Token;

Token::create();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>

    <!-- ファイルの切り出し（ここから） -->
    <div class="container-sm mt-2">
      <div class="d-flex flex-row-reverse ">
        <p><?= $_SESSION['name']?> さん ログイン中</p>
      </div>
      <div class="d-flex flex-row-reverse ">
        <a href="../../login/logout.php">ログアウト</a>
      </div>
    </div>
    <!-- ファイルの切り出し（ここまで） -->

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

        <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">

      </form>


  </body>
</html>
