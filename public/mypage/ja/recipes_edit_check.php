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
  use App\Utils;

  $post = Utils::sanitize($_POST);

  $code = $post['code'];
  $name= $post['name'];
  $text = $post['text'];

  ?>

  <div class="container-sm mt-2">
    <div class="d-flex flex-row-reverse ">
      <p><?php echo $_SESSION['name']?> さん ログイン中</p>
    </div>
    <div class="d-flex flex-row-reverse ">
      <a href="../../login/logout.php">ログアウト</a>
    </div>
  </div>

  <?php
  
  if($name === ''){
    echo 'レシピ名が入力されていません';
  } else{
    echo 'レシピ名：';
    echo $name;
    echo '<br>';
    echo '<br>';
  }

  if($text === ''){
    echo 'レシピ内容が入力されていません';
  } else{
    echo 'レシピ内容：';
    echo '<br>';
    echo $text;
    echo '<br>';
    echo '<br>';
  }

  if($name === '' || $text === ''){
    echo '<form>';
    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '</form>';
  }else{
    echo'上記のとおり変更します。';
    echo'<br>';
    echo'<form method="post" action="recipes_edit_done.php">';
    echo'<input type="hidden" name="code" value="'.$code.'">';
    echo'<input type="hidden" name="name" value="'.$name.'">';
    echo'<input type="hidden" name="text" value="'.$text.'">';
    echo'<br>';
    echo'<input type="button" onclick="history.back()" value="戻る">';
    echo'<input type="submit" value="OK">';
    echo'</form>';
  }

  ?>

  </body>
</html>