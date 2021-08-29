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

  <section class="container">

    <div class="d-flex justify-content-center border-bottom pb-2 mb-2">

    <div class="d-flex align-items-center">
      <h2 class="fs-4 px-4 ms-4 mb-0">レシピ一覧</h2>
    </div>

    <div class="d-flex align-items-center">
      <form method="post" name="form2" action="recipes_add.php">
        <input type="hidden" name="genre" value="<?= $genre ?>">
        <a href="javascript:form2.submit()" class="btn btn-outline-success btn-sm">追加</a>
      </form>
    </div>

    </div>

    <div class="d-flex justify-content-center">

      <ul class="list-unstyled">
      <?php foreach($recipes as $key => $recipe): ?>
        <li class="mb-2">
          <form method="post" name="form1" action="recipes_disp.php">
            <input type="hidden" name="code" value="<?= $recipe['code']; ?>">
            <input type="hidden" name="genre" value="<?= $genre ?>">
            <a href="javascript:form1[<?= $key ?>].submit()" class="text-decoration-none"><?= $recipe['recipe_name'] ?></a>
          </form>
        </li>
      <?php endforeach; ?>
      </ul>

    </div>

  </section>



  </body>
</html>
