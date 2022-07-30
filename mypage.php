<?php

require_once(__DIR__ . '/app/session.php');

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>

  <?php require_once(__DIR__ . '/public/mypage/login_user.php'); ?>

  <section class="row mt-5 d-flex justify-content-evenly">

    <div class="col-3 d-flex justify-content-center">
      <form method="post" name="form1" action="public/mypage/recipes_list.php" >
        <input type="hidden" name="genre" value="1">
          <a href="javascript:form1.submit()" class="btn btn-outline-success fs-3 py-4 px-5">和食</a>
      </form>
    </div>

    <div class="col-3 d-flex justify-content-center">
      <form method="post" name="form2" action="public/mypage/recipes_list.php">
        <input type="hidden" name="genre" value="2">
          <a href="javascript:form2.submit()" class="btn btn-outline-primary fs-3 py-4 px-5">洋食</a>
      </form>
    </div>

    <div class="col-3 d-flex justify-content-center">
      <form method="post" name="form3" action="public/mypage/recipes_list.php">
        <input type="hidden" name="genre" value="3">
          <a href="javascript:form3.submit()" class="btn btn-outline-danger fs-3 py-4 px-5">中華</a>
      </form>
    </div>

  </section>

  </body>
</html>
