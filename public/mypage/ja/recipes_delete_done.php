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

  require_once(__DIR__ . '/../../../app/config.php');  //DB接続
  use App\Database;
  use App\Utils;

  $dbh = Database::getInstance();  //DB接続

  try{
    
    $post = Utils::sanitize($_POST);
    $code = $post['code'];


    ///////// DB に指示 ///////////
    $sql = 'DELETE FROM recipes WHERE code = ?';
    $stmt = $dbh->prepare($sql);
    $data[] = $code;
    $stmt->execute($data);
    
    ////////// DB を切断 ////////////
    $dbh = null;
    
  }catch(Exception $e){
    echo $e;
    echo'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
  }

  ?>

  <div class="container-sm mt-2">
    <div class="d-flex flex-row-reverse ">
      <p><?= $_SESSION['name']?> さん ログイン中</p>
    </div>
    <div class="d-flex flex-row-reverse ">
      <a href="../../login/logout.php">ログアウト</a>
    </div>
  </div>
  <br>
  削除しました。
  <br>
  <br>

    <a href="recipes_list.php">レシピ一覧へ</a>

  </body>
</html>