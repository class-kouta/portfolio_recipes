<?php

require_once(__DIR__ . '/../../../app/session.php');

require_once(__DIR__ . '/../../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;
use App\Recipe;

Token::validate();

$dbh = Database::getInstance();

try{

  $post = Utils::sanitize($_POST);

  $code = $post['code'];
  $name = $post['name'];
  $text = $post['text'];

  $recipe = new Recipe($dbh);
  $recipe->update($name,$text,$code);

  $dbh = null;


}catch(Exception $e){
  echo $e;
  echo'ただいま障害により大変ご迷惑をお掛けしています。';
  exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>

  <body>

  <?php require_once(__DIR__ . '/../login_user.php'); ?>

  <span> 次のとおり修正しました</span>
  <br>
  <br>
  <span>レシピ名：<?= $name ?></span>
  <br>
  <br>
  <span>レシピ内容</span>
  <br>
  <span><?= nl2br($text) ?></span>
  <br>
  <br>
  <a href="recipes_list.php">レシピ一覧へ</a>

  </body>
</html>
