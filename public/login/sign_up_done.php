<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;

Token::validate();

$dbh = Database::getInstance();

try{

  $post = Utils::sanitize($_POST);
  $name = $post['name'];
  $mail = $post['mail'];
  $pass = $post['pass'];

  $sql = 'INSERT INTO members(name,mail,password) VALUES (?,?,?)';
  $stmt = $dbh->prepare($sql);
  $data[] = $name;
  $data[] = $mail;
  $data[] = $pass;
  $stmt->execute($data);

  $dbh = null;

}catch(Exception $e){
  echo'ただいま障害により大変ご迷惑をおかけしております';
  echo'<br>';
  echo'<br>';
  echo'エラー理由：';
  echo'<br>';
  echo $e->getMessage();
  exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
  </head>
  <body>

    <span><?= $name ?>様</span>
    <br>
    <br>
    <span>ご入会ありがとうございます。</span>
    <br>
    <br>
    <a href="login.php">ログインはこちらから</a>

  </body>
</html>
