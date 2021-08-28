<?php

require_once(__DIR__ . '/../../app/session.php');

require_once(__DIR__ . '/../../app/config.php');
use App\Utils;
use App\Token;

$post = Utils::sanitize($_POST);
$code = $post['code'];
$name= $post['name'];
$text = $post['text'];
$genre = $post['genre'];

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

  <?php require_once(__DIR__ . '/login_user.php'); ?>

  <?php if($name === ''){ ?>
    <span>レシピ名が入力されていません</span>
    <br>
    <br>
  <?php } else{ ?>
    <span>レシピ名：<?= $name ?></span>
    <br>
    <br>
  <?php } ?>

  <?php if($text === ''){ ?>
    <span>レシピ内容が入力されていません</span>
    <br>
    <br>
  <?php } else{ ?>
    <span>レシピ内容</span>
    <br>
    <span><?= nl2br($text) ?></span>
    <br>
    <br>
  <?php } ?>

  <?php if($name === '' || $text === ''){ ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  <?php }else{ ?>
    <span> 上記のとおり変更します。</span>
    <br>
    <form method="post" action="recipes_edit_done.php">
      <input type="hidden" name="code" value="<?= $code ?>">
      <input type="hidden" name="name" value="<?= $name ?>">
      <input type="hidden" name="text" value="<?= $text ?>">
      <input type="hidden" name="genre" value="<?= $genre ?>">
      <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
      <br>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  <?php } ?>

  </body>
</html>