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

  <?php require_once(__DIR__ . '/../login_user.php'); ?>

  <?php

  require_once(__DIR__ . '/../../../app/config.php');
  use App\Database;

  $dbh = Database::getInstance();

  try{

    $code = $_GET['code'];

    $sql = 'SELECT recipe_name,recipe_contents FROM recipes WHERE code = ?';
    $stmt = $dbh->prepare($sql);
    $data[] = $code;
    $stmt->execute($data);

    $rec = $stmt->fetch();
    $name = $rec['recipe_name'];
    $text = $rec['recipe_contents'];

    $dbh = null;

  }catch(Exception $e){

    echo'ただいま障害により大変ご迷惑をおかけしております';
    exit();

  }

  ?>

  レシピ名<br>
  <?= $name;?>
  <br>
  <br>
  レシピ内容<br>
  <?= nl2br($text);?>
  <br>
  <br>

  <form>
    <input type="button" onclick="history.back()" value="戻る">
  </form>

  </body>
</html>
