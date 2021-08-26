<?php

require_once(__DIR__ . '/../../../app/session.php');
require_once(__DIR__ . '/../../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;
use App\Recipe;

Token::validate();

$dbh = Database::getInstance();

$post = Utils::sanitize($_POST);
$name = $post['name'];
$text = $post['text'];

try{

  $recipe = new Recipe($dbh);
  $recipe->create($name,$text);

  $dbh = null;

  header('Location:recipes_list.php');

}catch(Exception $e){
  echo $e;
  echo'ただいま障害により大変ご迷惑をお掛けしています。';
  exit();
}
