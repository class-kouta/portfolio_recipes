<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
  </head>
  <body>
    
  <?php
  
  require_once(__DIR__ . '/../../app/config.php'); 
  use App\Utils;

  // $_POSTを消毒
  $post = Utils::sanitize($_POST);
  $name = $post['name'];
  $mail = $post['mail'];
  $pass = $post['pass'];
  $pass2 = $post['pass2'];

  // ニックネームのチェック（空白、１０文字以内、他何かあるか）
  if($name === ''){
    echo 'ニックネーム：入力されていません。';
    echo '<br>';
  } else{
    echo 'ニックネーム：';
    echo $name;
    echo '<br>';
    echo '<br>';
  }

  // メールアドレスのチェック（空白、半角、他何かあるか）
  if($mail === ''){
    echo 'メールアドレス：入力されていません。';
    echo '<br>';
  } else{
    echo 'メールアドレス：';
    echo $mail;
    echo '<br>';
    echo '<br>';
  }

  // パスワードのチェック（空白、一致するかどうか、他何かあるか）
  if($pass ===''){
    echo 'パスワード：入力されていません。<br>';
    echo'<br>';
    echo'<br>';
  } else if ($pass !== $pass2){
    echo 'パスワード：一致しません。<br>';
    echo'<br>';
    echo'<br>';
  } else {
    echo 'パスワード：';
    echo str_repeat('*', strlen($pass));
    echo '<br>';
    echo '<br>';
  }

  // 処理
  if($name === '' || $pass === '' || $pass !== $pass2){
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
    echo'<a href="sign_up.html">入力画面に戻る</a>';
  }

  ?>

  </body>
</html>