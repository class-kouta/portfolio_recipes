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
$code = $post['code'];

$recipe = new Recipe($dbh);
$recipe->destroy($code);

$dbh = null;

header('Location:recipes_list.php');
