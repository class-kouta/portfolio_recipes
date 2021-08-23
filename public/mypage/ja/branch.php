<?php

require_once(__DIR__ . '/../../../app/session.php');

if(isset($_POST['disp'])){
  if(!isset($_POST['code'])){
    header('Location:recipes_ng.php');
    exit();
  }
  $code = $_POST['code'];
  header('Location:recipes_disp.php?code='.$code);
  exit();
}

if(isset($_POST['add'])){
  header('Location:recipes_add.php');
  exit();
}

if(isset($_POST['edit'])){
  if(!isset($_POST['code'])){
    header('Location:recipes_ng.php');
    exit();
  }
  $code = $_POST['code'];
  header('Location:recipes_edit.php?code='.$code);
  exit();
}

if(isset($_POST['delete'])) {
  if(!isset($_POST['code'])){
    header('Location:recipes_ng.php');
    exit();
  }
  $code = $_POST['code'];
  header('Location:recipes_delete.php?code='.$code);
  exit();
}
