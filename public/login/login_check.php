<?php

require_once(__DIR__ . '/../../app/config.php');  //DB接続
use App\Database;
use App\Utils;

$dbh = Database::getInstance();  //DB接続

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

  /////////////// メールアドレスチェック //////////////
  if($mail === ''){
    echo 'ニックネーム：入力されていません。';
    echo '<br>';
  }

  /////////////// パスワードチェック/////////////
  if($pass ===''){
    echo 'パスワード：入力されていません。<br>';
    echo'<br>';
  }
  $pass2 = $result['password'];
  if(password_verify($pass,$pass2) === false){
    echo 'メールアドレス または パスワード が間違っています';
    echo'<br>';
    echo'<br>';
  } 
  
  if($mail === '' || $pass === '' || password_verify($pass,$pass2) === false){
    echo '<form>';
    echo '<input type="button" onclick="history.back()" value="戻る">';
    echo '</form>';
  }else {

    ////////////////////セッション/////////////////
    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['id'] = $result['id'];
    $_SESSION['name'] = $result['name'];
    ////////////////////セッション/////////////////
    header('Location:../mypage/mypage.php');
    exit();

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