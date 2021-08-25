<?php

require_once(__DIR__ . '/../../../app/session.php');
require_once(__DIR__ . '/../../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;

Token::validate();

$dbh = Database::getInstance();

try{

  $post = Utils::sanitize($_POST);
  $name = $post['name'];
  $text = $post['text'];

  $sql = 'INSERT INTO recipes(user_id,recipe_name,recipe_contents,genre) VALUES (?,?,?,1)';
  $stmt = $dbh->prepare($sql);
  $data[] = $_SESSION['id'];
  $data[] = $name;
  $data[] = $text;
  $stmt->execute($data);

  $dbh = null;

  header('Location:recipes_list.php');

}catch(Exception $e){
  echo $e;
  echo'ただいま障害により大変ご迷惑をお掛けしています。';
  exit();
}
