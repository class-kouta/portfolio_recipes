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

  if(empty($mail)){
    echo 'メールアドレス：入力されていません。';
    echo '<br>';
  }

  if(empty($pass)){
    echo 'パスワード：入力されていません。<br>';
    echo'<br>';
  }

  // これ書かないと変数nullのエラー出る
  if(!isset($result['password'])){
    $pass2 = '';
  }else{
    $pass2 = $result['password'];
  }

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

    $_SESSION['login'] = 1;
    $_SESSION['id'] = $result['id'];
    $_SESSION['name'] = $result['name'];

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
