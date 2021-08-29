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

  <section class="container-sm mx-3">

    <form method="post" action="recipes_edit_check.php">

      <div class="mb-3 form-group row">
        <label for="name" class="form-label">レシピ名</label>
        <div class="col-6">
          <input type="text" name="name" value="<?= $name ?>" class="form-control" id="name" autocomplete="off">
        </div>
      </div>

      <div class="mb-3">
        <label for="text" class="form-label">レシピ内容</label>
        <textarea name="text" class="form-control" id="text" rows="15"><?= $text ?></textarea>
      </div>

      <div class="my-4">
        <input type="submit" class="btn btn-info" value="レシピを変更">
      </div>

      <input type="hidden" name="code" value="<?= $code ?>">
      <input type="hidden" name="genre" value="<?= $genre ?>">
    </form>

    <form method="post" name="form1" action="recipes_disp.php">
      <input type="hidden" name="code" value="<?= $code ?>">
      <input type="hidden" name="genre" value="<?= $genre ?>">
      <a href="javascript:form1.submit()">戻る</a>
    </form>

  </section>

  </body>
</html>
