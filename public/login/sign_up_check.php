<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Utils;
use App\Token;

Token::validate();

$post = Utils::sanitize($_POST);
$name = $post['name'];
$mail = $post['mail'];
$pass = $post['pass'];
$pass2 = $post['pass2'];

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
  </head>
  <body>

  <?php if(empty($name)){ ?>
    <span>ニックネーム：入力されていません。</span>
    <br>
    <br>
  <?php } else if(5 < mb_strlen($name)){ ?>
    <span>ニックネーム：５文字以内で入力してください</span>
    <br>
    <br>
  <?php } else{ ?>
    <span>ニックネーム：<?= $name ?></span>
    <br>
    <br>
  <?php } ?>

  <?php if(empty($mail)){ ?>
    <span>メールアドレス：入力されていません</span>
    <br>
    <br>
  <?php } else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){ ?>
    <span>メールアドレス：正しい形式で入力してください</span>
    <br>
    <br>
  <?php } else{ ?>
    <span>メールアドレス：<?= $mail ?></span>
    <br>
    <br>
  <?php } ?>

  <?php if($pass ===''){ ?>
    <span>パスワード：入力されていません</span>
    <br>
    <br>
  <?php } else if ($pass !== $pass2){ ?>
    <span>パスワード：一致しません</span>
    <br>
    <br>
  <?php } else { ?>
    <span>パスワード：<?= str_repeat('*', strlen($pass)) ?></span>
    <br>
    <br>
  <?php } ?>

  <?php if(empty($name) || empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL) || empty($pass) || $pass !== $pass2){ ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  <?php }else{ ?>
    以上の内容でよろしければ、新規登録ボタンを押してください。
    <br>
    <br>

    <?php $pass = password_hash($pass, PASSWORD_DEFAULT); ?>
    <form method="post" action="sign_up_done.php">
      <input type="hidden" name="name" value="<?= $name ?>">
      <input type="hidden" name="mail" value="<?= $mail ?>">
      <input type="hidden" name="pass" value="<?= $pass ?>">
      <input type="submit" value="新規登録">
    </form>

    <br>
    <br>
    <a href="sign_up.php">入力画面に戻る</a>

  <?php } ?>

  </body>
</html>
