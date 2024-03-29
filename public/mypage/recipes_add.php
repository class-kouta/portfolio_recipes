<?php

require_once(__DIR__ . '/../../app/session.php');
require_once(__DIR__ . '/../../app/config.php');
use App\Utils;

$post = Utils::sanitize($_POST);
$genre = $post['genre'];

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

      <form method="post" action="recipes_add_check.php">
          <div class="mb-3 form-group row">
            <label for="name" class="form-label">レシピ名</label>
            <div class="col-6">
              <input type="text" name="name" class="form-control" id="name" autocomplete="off">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="text" class="form-label">レシピ内容</label>
          <textarea name="text" class="form-control" id="text" rows="15" ></textarea>
        </div>

        <input type="hidden" name="genre" value="<?= $genre ?>">

        <div class="my-4">
          <input type="submit" class="btn btn-info" value="レシピを追加">
        </div>

      </form>

      <form method="post" name="form1" action="recipes_list.php">
        <input type="hidden" name="genre" value="<?= $genre ?>">
        <a href="javascript:form1.submit()">戻る</a>
      </form>

    </section>

  </body>
</html>
