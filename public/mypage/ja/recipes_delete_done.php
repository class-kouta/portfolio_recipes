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

  $recipe = new Recipe($dbh);
  $recipe->destroy($code);

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

  <span>削除しました。</span>
  <br>
  <br>

  <a href="recipes_list.php">レシピ一覧へ</a>

  </body>
</html>
