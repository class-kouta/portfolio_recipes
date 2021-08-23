<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Utils;
use App\Token;

Token::validate();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
  </head>
  <body>

  <?php

  $post = Utils::sanitize($_POST);
  $name = $post['name'];
  $mail = $post['mail'];
  $pass = $post['pass'];
  $pass2 = $post['pass2'];

  // チェック
  if(empty($name)){
    echo 'ニックネーム：入力されていません。';
    echo '<br>';
    echo '<br>';
  } else if(5 < mb_strlen($name)){
    echo 'ニックネーム：５文字以内で入力してください';
    echo '<br>';
    echo '<br>';
  } else{
    echo 'ニックネーム：'.$name;
    echo '<br>';
    echo '<br>';
  }

  if(empty($mail)){
    echo 'メールアドレス：入力されていません。';
    echo '<br>';
    echo '<br>';
  } else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    echo 'メールアドレス：正しい形式で入力してください';
    echo '<br>';
    echo '<br>';
  } else{
    echo 'メールアドレス：'.$mail;
    echo '<br>';
    echo '<br>';
  }

  if($pass ===''){
    echo 'パスワード：入力されていません。<br>';
    echo'<br>';
    echo'<br>';
  } else if ($pass !== $pass2){
    echo 'パスワード：一致しません。<br>';
    echo'<br>';
    echo'<br>';
  } else {
    echo 'パスワード：'.str_repeat('*', strlen($pass));
    echo '<br>';
    echo '<br>';
  }

  if(empty($name) || empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL) || empty($pass) || $pass !== $pass2){
    echo '<form>';
    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '</form>';
  }else{
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    echo'<form method="post" action="sign_up_done.php">';
    echo'<input type="hidden" name="name" value="'.$name.'">';
    echo'<input type="hidden" name="mail" value="'.$mail.'">';
    echo'<input type="hidden" name="pass" value="'.$pass.'">';
    echo'以上の内容でよろしければ、新規登録ボタンを押してください。';
    echo'<br>';
    echo'<br>';
    echo'<input type="submit" value="新規登録">';
    echo'</form>';
    echo'<br>';
    echo'<br>';
    echo'<a href="sign_up.php">入力画面に戻る</a>';
  }

  ?>

  </body>
</html>
