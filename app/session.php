<?php

session_start();
session_regenerate_id();
if(!isset($_SESSION['login'])){
  echo'ログインされていません。';
  echo '<br>';
  echo '<br>';
  echo '<a href="/portfolio_recipes/public/login/login.php">ログイン画面へ</a><br>';
  exit();

}
