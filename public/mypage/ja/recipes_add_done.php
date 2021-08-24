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
  use App\Utils;

  $dbh = Database::getInstance();

  try{

    $post = Utils::sanitize($_POST);
    $name = $post['name'];
    $text = $post['text'];

    $sql = 'INSERT INTO recipes(user_id,recipe_name,recipe_contents,genre) VALUES (?,?,?,1)';
    $stmt = $dbh->prepare($sql);
    $data[] = $_SESSION['id'];
    $data[] = $name;
    $data[] = $text;
    $stmt->execute($data);

    $dbh = null;

    header('Location:recipes_list.php');

  }catch(Exception $e){
    echo $e;
    echo'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
  }

  ?>

  </body>
</html>
