<?php

require_once(__DIR__ . '/../../../app/session.php');

require_once(__DIR__ . '/../../../app/config.php');
use App\Database;
use App\Recipe;

$genre = 1;
$id = $_SESSION['id'];

$dbh = Database::getInstance();
$recipe = new Recipe($dbh);
$recipes = $recipe->showAll($genre,$id);

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

  <span>和食レシピ一覧</span>
  <br>
  <br>

  <form method="post" action="branch.php">

  <?php foreach($recipes as $recipe): ?>
    <input type="radio" name="code" value="<?= $recipe['code']; ?>">
    <?= $recipe['recipe_name']; ?>
    <br>
  <?php endforeach; ?>

    <br>
    <input type="submit" name="disp" value="参照">
    <input type="submit" name="add" value="追加">
    <input type="submit" name="edit" value="編集">
    <input type="submit" name="delete" value="削除">

  </form>

  <br>
  <a href="../mypage.php">マイページ</a>


  </body>
</html>
