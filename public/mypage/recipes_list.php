<?php

require_once(__DIR__ . '/../../app/session.php');

require_once(__DIR__ . '/../../app/config.php');
use App\Database;
use App\Utils;
use App\Recipe;

$post = Utils::sanitize($_POST);
$genre = $post['genre'];

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

  <?php require_once(__DIR__ . '/login_user.php'); ?>

  <span>レシピ一覧</span>
  <br>
  <br>

  <?php foreach($recipes as $key => $recipe): ?>
  <form method="post" name="form1" action="recipes_disp.php">
    <input type="hidden" name="code" value="<?= $recipe['code']; ?>">
    <input type="hidden" name="genre" value="<?= $genre ?>">
    <a href="javascript:form1[<?= $key ?>].submit()"><?= $recipe['recipe_name'] ?></a>
  </form>
  <br>
  <?php endforeach; ?>

  <br>
  <form method="post" name="form2" action="recipes_add.php">
    <input type="hidden" name="genre" value="<?= $genre ?>">
    <a href="javascript:form2.submit()">追加</a>
  </form>
  <br>
  <br>
  <a href="mypage.php">マイページ</a>

  </body>
</html>
