<?php

require_once(__DIR__ . '/../../../app/session.php');
require_once(__DIR__ . '/../../../app/config.php');
use App\Database;
use App\Recipe;

$dbh = Database::getInstance();

$code = $_GET['code'];

$recipe = new Recipe($dbh);
$rec = $recipe->show($code);

$name = $rec['recipe_name'];
$text = $rec['recipe_contents'];

$dbh = null;

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

  <span>レシピ名：<?= $name ?></span>
  <br>
  <br>

  <span>レシピ内容</span>
  <br>
  <br>
  <span><?= nl2br($text);?></span>
  <br>
  <br>
  <br>

  <a href="recipes_list.php">和食レシピ一覧</a>
  <br>
  <br>

  </body>
</html>
