<div class="px-3 py-2">
  <div class="d-flex flex-row-reverse mb-2">
    <p class="m-0"><?= $_SESSION['name']?> さん ログイン中</p>
  </div>
  <div class="d-flex flex-row-reverse mb-2">
  <!-- MAMP環境と本番環境でドキュメントルート異なる -->
    <!-- <a href="/portfolio_recipes/mypage.php" class="text-decoration-none">マイページ</a> -->
    <a href="/mypage.php" class="text-decoration-none">マイページ</a>
  </div>
  <div class="d-flex flex-row-reverse ">
    <!-- MAMP環境と本番環境でドキュメントルート異なる -->
    <!-- <a href="/portfolio_recipes/public/login/logout.php" class="text-decoration-none">ログアウト</a> -->
    <a href="/public/login/logout.php" class="text-decoration-none">ログアウト</a>
  </div>
</div>
