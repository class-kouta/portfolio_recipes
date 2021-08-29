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

  <section class="container-sm mx-3">

  <div class="mb-3">
  <?php if($name === ''){ ?>
    <p class="border-bottom border-2 text-danger">レシピ名が入力されていません</p>
  <?php } else{ ?>
    <h2 class="fs-5 border-bottom border-2">レシピ名：<?= $name ?></h2>
  <?php } ?>

  <?php if($text === ''){ ?>
    <p class="border-bottom border-2 px-2 pt-2 pb-4 text-danger">レシピ内容が入力されていません</p>
  <?php } else{ ?>
    <div class="border-bottom border-2 px-2 pt-2 pb-4">
      <p><?= nl2br($text) ?></p>
    </div>
  <?php } ?>
  </div>

  <?php if($name !== '' && $text !== ''){ ?>
    <form method="post" action="recipes_edit_done.php">
      <input type="hidden" name="code" value="<?= $code ?>">
      <input type="hidden" name="name" value="<?= $name ?>">
      <input type="hidden" name="text" value="<?= $text ?>">
      <input type="hidden" name="genre" value="<?= $genre ?>">
      <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']); ?>">
      <input type="submit" class="btn btn-outline-success" value="変更する">
    </form>
  <?php } ?>

  <form method="post" name="form1" action="recipes_edit.php" class="mt-3">
    <input type="hidden" name="code" value="<?= $code ?>">
    <input type="hidden" name="genre" value="<?= $genre ?>">
    <a href="javascript:form1.submit()">戻る</a>
  </form>

  </section>

  </body>
</html>
