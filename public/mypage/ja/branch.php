<?php

require_once(__DIR__ . '/../../../app/session.php'); 

///////////// 参照画面へ //////////////
  if(isset($_POST['disp'])){
    if(!isset($_POST['code'])){
      header('Location:recipes_ng.php');
      exit();
    }
    $code = $_POST['code'];
    header('Location:recipes_disp.php?code='.$code);
    exit();
  }

/////////////// 追加画面へ //////////////
  if(isset($_POST['add'])){
    header('Location:recipes_add.php');
    exit();
  }
  
/////////////// 編集画面へ //////////////
  if(isset($_POST['edit'])){
    if(!isset($_POST['code'])){
      header('Location:recipes_ng.php');
      exit();
    }
    $code = $_POST['code'];
    header('Location:recipes_edit.php?code='.$code);
    exit();
  }

///////////// 削除画面へ ///////////////
  if(isset($_POST['delete'])) {
    if(!isset($_POST['code'])){
      header('Location:recipes_ng.php');
      exit();
    }
    $code = $_POST['code'];
    header('Location:recipes_delete.php?code='.$code);
    exit();
  }
  
  