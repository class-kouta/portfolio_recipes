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

  <div class="container-sm mt-2">
    <div class="d-flex flex-row-reverse ">
      <p><?= $_SESSION['name']?> さん ログイン中</p>
    </div>
    <div class="d-flex flex-row-reverse ">
      <a href="../../login/logout.php">ログアウト</a>
    </div>
  </div>

  <?php
  
  require_once(__DIR__ . '/../../../app/config.php'); 
  use App\Database;
  use App\Utils;

  $post = Utils::sanitize($_POST);

  $name = $post['name'];
  $text = $post['text'];

  ////////////////レシピ名チェック//////////////
  if($name === ''){
    echo 'レシピ名が入力されていません';
    echo '<br>';
  }else{
    echo 'レシピ名：';
    echo $name;
    echo '<br>';
  }
  
  /////////////////レシピ内容チェック/////////////////
  if($text ===''){
    echo 'レシピ内容が入力されていません。';
    echo '<br>';
  }else{
    echo 'レシピ内容：';
    echo '<br>';
    echo nl2br($text);
    echo '<br>';
  }

  if($name === '' || $text === ''){
    echo '<form>';
    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '</form>';
  }else{
    echo'<form method="post" action="recipes_add_done.php">';
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