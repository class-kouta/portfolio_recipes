<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;
use App\Member;

$post = Utils::sanitize($_POST);
$name = $post['name'];
$mail = $post['mail'];
$pass = $post['pass'];

Token::validate();

$dbh = Database::getInstance();
$member = new Member($dbh);
$member->create($name,$mail,$pass);

$dbh = null;

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
