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

  <?php foreach($recipes as $key => $recipe): ?>
  <form method="post" name="form1" action="recipes_disp.php">
    <input type="hidden" name="code" value="<?= $recipe['code']; ?>">
    <a href="javascript:form1[<?= $key ?>].submit()"><?= $recipe['recipe_name'] ?></a>
  </form>
  <br>
  <?php endforeach; ?>

  <br>
  <a href="recipes_add.php">追加</a>
  <br>
  <br>
  <a href="../mypage.php">マイページ</a>

  </body>
</html>
