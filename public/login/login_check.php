<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;

Token::validate();

$dbh = Database::getInstance();

try{

  $post = Utils::sanitize($_POST);
  $mail = $post['mail'];
  $pass = $post['pass'];

  $sql = 'SELECT id,name,password FROM members WHERE mail = ?' ;
  $stmt = $dbh->prepare($sql);
  $data[] = $mail;
  $stmt->execute($data);

  $dbh = null;

  $result = $stmt->fetch();

  // 書かないと変数nullのエラー出る
  if(!isset($result['password'])){
    $pass2 = '';
  }else{
    $pass2 = $result['password'];
  }

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

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢のレシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>

  <?php if(empty($mail)){ ?>
    <span>メールアドレス：入力されていません。</span>
    <br>
    <br>
  <?php } ?>

  <?php if(empty($pass)){ ?>
    <span>パスワード：入力されていません。</span>
    <br>
    <br>
  <?php } ?>

  <?php if(password_verify($pass,$pass2) === false){ ?>
    <span>メールアドレス または パスワード が間違っています。</span>
    <br>
    <br>
  <?php } ?>

  <?php if($mail === '' || $pass === '' || password_verify($pass,$pass2) === false){ ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  <?php

  }else {
    $_SESSION['login'] = 1;
    $_SESSION['id'] = $result['id'];
    $_SESSION['name'] = $result['name'];

    header('Location:../mypage/mypage.php');
    exit();
  }

  ?>

</body>
</html>
