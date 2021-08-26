<?php

require_once(__DIR__ . '/../../../app/session.php');
require_once(__DIR__ . '/../../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;
use App\Recipe;

Token::validate();

$dbh = Database::getInstance();

try{

  $post = Utils::sanitize($_POST);
  $code = $post['code'];

  $recipe = new Recipe($dbh);
  $recipe->destroy($code);

  $dbh = null;

  header('Location:recipes_list.php');

}catch(Exception $e){
  echo $e;
  echo'ただいま障害により大変ご迷惑をお掛けしています。';
  exit();
}
