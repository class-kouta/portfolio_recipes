<?php

require_once(__DIR__ . '/../../../app/session.php');

require_once(__DIR__ . '/../../../app/config.php');
use App\Database;

try{

  $dbh = Database::getInstance();
  $sql = 'SELECT code,recipe_name FROM recipes WHERE genre = 1 AND user_id = ?';
  $stmt = $dbh->prepare($sql);
  $data[] = $_SESSION['id'];
  $stmt->execute($data);
  $dbh = null;

}catch(PDOException $e){
  echo'ただいま障害により大変ご迷惑をおかけしております';
  echo'<br>';
  echo'<br>';
  echo'エラー理由：';
  echo'<br>';
  echo $e->getMessage();
  exit();
}

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

  <?php while($rec = $stmt->fetch()){ ?>
    <input type="radio" name="code" value="<?= $rec['code']; ?>">
    <?= $rec['recipe_name']; ?>
    <br>
  <?php } ?>

    <input type="submit" name="disp" value="参照">
    <input type="submit" name="add" value="追加">
    <input type="submit" name="edit" value="編集">
    <input type="submit" name="delete" value="削除">

  </form>

  <br>
  <a href="../mypage.php">マイページへ</a>


  </body>
</html>
