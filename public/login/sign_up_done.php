<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
  </head>
  <body>
    
  <?php
  
  require_once(__DIR__ . '/../../app/config.php'); 
  use App\Database;
  use App\Utils;

  $dbh = Database::getInstance();  //DB接続

  try{

    // $_POSTを消毒
    $post = Utils::sanitize($_POST);
    $name = $post['name'];
    $mail = $post['mail'];
    $pass = $post['pass'];

    ///////// DB に登録 ///////////
    $sql = 'INSERT INTO members(name,mail,password) VALUES (?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $name;
    $data[] = $mail;
    $data[] = $pass;
    $stmt->execute($data);
    
    ////////// DB を切断 ////////////
    $dbh = null;
    
    echo $name.' 様';
    echo '<br>';
    echo '<br>';
    echo 'ご入会ありがとうございます。';
    echo'<br>';
    echo'<a href="login.html">ログインはこちらから</a>';


  }catch(Exception $e){
    echo'ただいま障害により大変ご迷惑をおかけしております';  
    echo'<br>';  
    echo'<br>';  
    echo'エラー理由：';  
    echo'<br>';  
    echo $e->getMessage();
    exit();
  }

  ?>

  </body>
</html>