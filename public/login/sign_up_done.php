<?php

session_start();
session_regenerate_id();

require_once(__DIR__ . '/../../app/config.php');
use App\Database;
use App\Utils;
use App\Token;
use App\Member;

$post = Utils::sanitize($_POST);
$name = $post['name'];
$mail = $post['mail'];
$pass = $post['pass'];

Token::validate();

$dbh = Database::getInstance();
$member = new Member($dbh);
$member->create($name,$mail,$pass);

$dbh = null;

header('Location:sign_up_completed.html');
