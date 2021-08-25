<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>漢レシピ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>

    <main class="container-sm mx-2 my-3">

      <div class="mb-5">
        <h1 class="fs-3 text-primary">アカウント新規登録</h1>
      </div>

      <form method="post" action="sign_up_check.php">

        <div class="mb-3">
          <label for="name" class="form-label">ニックネーム（５文字以内）</label>
          <div class="row">
            <div class="col-4">
              <input type="text" name="name" class="form-control" id="name" autocomplete="off">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="mail" class="form-label">メールアドレス</label>
          <div class="row">
            <div class="col-4">
              <input type="text" name="mail" class="form-control" id="mail" autocomplete="off">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="pass" class="form-label">パスワード</label>
          <div class="row">
            <div class="col-4">
              <input type="password" name="pass" class="form-control" id="pass" rows="3">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="pass2" class="form-label">パスワード（再入力）</label>
          <div class="row">
            <div class="col-4">
              <input type="password" name="pass2" class="form-control" id="pass2" rows="3">
            </div>
          </div>
        </div>

        <div class="my-4">
          <input type="submit" class="btn btn-info" value="確認">
        </div>

      </form>

      <br>
      <br>
      <a href="login.php">ログイン画面に戻る</a>

    </main>

  </body>
</html>
