<?php

require_once(__DIR__ . '/../../app/session.php');

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>

  <?php require_once(__DIR__ . '/login_user.php'); ?>

  <form method="post" name="form1" action="recipes_list.php">
    <input type="hidden" name="genre" value="1">
    <a href="javascript:form1.submit()">和食</a>
  </form>
  <br>
  <br>
  <form method="post" name="form2" action="recipes_list.php">
    <input type="hidden" name="genre" value="2">
    <a href="javascript:form2.submit()">洋食</a>
  </form>
  <br>
  <br>
  <form method="post" name="form3" action="recipes_list.php">
    <input type="hidden" name="genre" value="3">
    <a href="javascript:form3.submit()">中華</a>
  </form>
  <br>
  <br>

  </body>
</html>
