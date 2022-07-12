<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;
use App\Member;

Token::validate();

$post = Utils::sanitize($_POST);
$mail = $post['mail'];
$pass = $post['pass'];

$dbh = Database::getInstance();
$member = new Member($dbh);
$result = $member->select_id_name_pass($mail);

$dbh = null;

// 書かないと変数nullのエラー出る
if(!isset($result['password'])){
  $pass2 = '';
}else{
  $pass2 = $result['password'];
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢のレシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>

  <section class="container-sm mx-3 my-5">
  <?php if(empty($mail)){ ?>
    <p class="border-bottom border-2 text-danger">メールアドレスが入力されていません。</p>
  <?php } ?>

  <?php if(empty($pass)){ ?>
    <p class="border-bottom border-2 text-danger">パスワードが入力されていません。</p>
  <?php }elseif(password_verify($pass,$pass2) === false){ ?>
    <p class="border-bottom border-2 text-danger">メールアドレス または パスワード が間違っています。</p>
  <?php } ?>

  <?php if($mail === '' || $pass === '' || password_verify($pass,$pass2) === false){ ?>

    <div class="mt-5">
      <a href="login.php">ログイン画面へ</a>
    </div>

  </section>

  <?php
  }else {
    $_SESSION['login'] = 1;
    $_SESSION['id'] = $result['id'];
    $_SESSION['name'] = $result['name'];

    header('Location:/portfolio_recipes/mypage.php');
    exit();
  }
  ?>
</body>
</html>
