<?php

require_once(__DIR__ . '/../../app/session.php');

require_once(__DIR__ . '/../../app/config.php');
use App\Database;
use App\Utils;
use App\Recipe;

$post = Utils::sanitize($_POST);
$code = $post['code'];
$genre = $post['genre'];

$dbh = Database::getInstance();
$recipe = new Recipe($dbh);
$rec = $recipe->show($code);

$dbh = null;

$name = $rec['recipe_name'];
$text = $rec['recipe_contents'];


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

  <form method="post" action="recipes_edit_check.php">
    <span>レシピ名</span>
    <br>
    <input type="text" name="name" style="width:200px" value="<?= $name ?>">
    <br>
    <br>
    <span>レシピ内容</span>
    <br>
    <textarea name="text" id="" cols="30" rows="10"><?= $text ?></textarea>
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="確認">
    <input type="hidden" name="code" value="<?= $code ?>">
    <input type="hidden" name="genre" value="<?= $genre ?>">
  </form>

  </body>
</html>
