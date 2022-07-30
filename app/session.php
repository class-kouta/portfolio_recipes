<?php

session_start();
session_regenerate_id();
if(!isset($_SESSION['login'])){
  echo <<<EOT
  ログインされていません
  <br>
  <br>
  <a href="/public/login/login.php">ログイン画面へ</a>
  <br>
  EOT;
  exit();
}
