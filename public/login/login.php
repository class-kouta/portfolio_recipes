<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Utils;
use App\Token;

Token::create();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢のレシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>

    <main class="container-sm mx-2 my-3">
      <div class="mb-5">
        <h1 class="fs-3 text-primary">会員ログイン</h1>
      </div>

      <form method="post" action="login_check.php">

        <div class="mb-3">
          <label for="mail" class="form-label">メールアドレス</label>
          <div class="row">
            <div class="col-4">
              <input type="text" name="mail" class="form-control" id="mail" autocomplete="off">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="pass" class="form-label">パスワード</label>
          <div class="row">
            <div class="col-4">
              <input type="password" name="pass" class="form-control" id="pass" rows="3">
            </div>
          </div>
        </div>

        <div class="my-4">
          <input type="submit" class="btn btn-info" value="ログイン">
        </div>

        <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">

      </form>

      <a href="sign_up.php">新規登録はこちら</a>

    </main>

  </body>
</html>
