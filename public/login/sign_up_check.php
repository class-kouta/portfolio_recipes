<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Utils;
use App\Token;

$post = Utils::sanitize($_POST);
$name = $post['name'];
$mail = $post['mail'];
$pass = $post['pass'];
$pass2 = $post['pass2'];

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

  <section class="container-sm mx-3 my-5">
  <?php if(empty($name)){ ?>
    <p class="border-bottom border-2 text-danger">ニックネームが入力されていません。</p>
  <?php } else if(5 < mb_strlen($name)){ ?>
    <p class="border-bottom border-2 text-danger">ニックネームは５文字以内で入力してください</p>
  <?php } else{ ?>
    <p class="border-bottom border-2 text-primary">ニックネーム：<?= $name ?></p>
  <?php } ?>

  <?php if(empty($mail)){ ?>
    <p class="border-bottom border-2 text-danger">メールアドレスが入力されていません</p>
  <?php } else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){ ?>
    <p class="border-bottom border-2 text-danger">メールアドレスを正しい形式で入力してください</p>
  <?php } else{ ?>
    <p class="border-bottom border-2 text-primary">メールアドレス：<?= $mail ?></p>
  <?php } ?>

  <?php if($pass ===''){ ?>
    <p class="border-bottom border-2 text-danger">パスワードが入力されていません</p>
  <?php } else if ($pass !== $pass2){ ?>
    <p class="border-bottom border-2 text-danger">パスワードが一致しません</p>
  <?php } else { ?>
    <p class="border-bottom border-2 text-primary">パスワード：<?= str_repeat('*', strlen($pass)) ?></p>
  <?php } ?>

  <?php if(!empty($name) && !empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL) && !empty($pass) && $pass === $pass2){ ?>

    <div class="mt-4">
      <p>以上の内容でよろしければ、新規登録ボタンを押してください。</p>
    </div>

    <?php $pass = password_hash($pass, PASSWORD_DEFAULT); ?>
    <form method="post" action="sign_up_done.php">
      <input type="hidden" name="name" value="<?= $name ?>">
      <input type="hidden" name="mail" value="<?= $mail ?>">
      <input type="hidden" name="pass" value="<?= $pass ?>">
      <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
      <input type="submit" class="btn btn-outline-success" value="新規登録">
    </form>

    <?php } ?>

    <div class="mt-5">
      <a href="sign_up.html">入力画面に戻る</a>
    </div>

  </section>

  </body>
</html>
