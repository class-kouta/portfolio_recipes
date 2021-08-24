<?php

require_once(__DIR__ . '/../../../app/session.php');

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>
  <?php

  require_once(__DIR__ . '/../../../app/config.php');
  use App\Database;

  try{

    $code = $_GET['code'];

    $dbh = Database::getInstance();

    $sql = 'SELECT recipe_name FROM recipes WHERE code = ?';
    $stmt = $dbh->prepare($sql);
    $data[] = $code;
    $stmt->execute($data);

    $rec = $stmt->fetch();
    $name = $rec['recipe_name'];

    $dbh = null;

  }catch(Exception $e){

    echo'ただいま障害により大変ご迷惑をおかけしております';
    exit();

  }

  ?>

  <!-- ファイルの切り出し（ここから） -->
  <div class="container-sm mt-2">
    <div class="d-flex flex-row-reverse ">
      <p><?= $_SESSION['name']?> さん ログイン中</p>
    </div>
    <div class="d-flex flex-row-reverse ">
      <a href="../../login/logout.php">ログアウト</a>
    </div>
  </div>
  <!-- ファイルの切り出し（ここから） -->

  <br>
  レシピ名
  <br>
  <?= $name; ?>
  <br>
  このレシピを削除してもよろしいですか<br>
  <br>
  <form method="post" action="recipes_delete_done.php">
    <input type="hidden" name="code" value="<?= $code; ?>">
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
  </form>

  </body>
</html>
