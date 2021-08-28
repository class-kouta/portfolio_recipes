<?php

require_once(__DIR__ . '/../../../app/session.php');
require_once(__DIR__ . '/../../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;
use App\Recipe;

Token::validate();

$post = Utils::sanitize($_POST);
$code = $post['code'];

$dbh = Database::getInstance();
$recipe = new Recipe($dbh);
$recipe->destroy($code);

$dbh = null;

header('Location:recipes_list.php', true, 307);  //$_POSTの値を維持
