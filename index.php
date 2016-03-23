  <?php
  require_once('config.php');
  require_once('functions.php');

  session_start();
  $me = $_SESSION['me'];
  $dbh = connectDb();

  require_once('header_1.php');
?>

  <title>Coffee Memo [コーヒー メモ] | 飲んだコーヒーを記録してお気に入りの豆を見つけよう (ベータ版)</title>

<?php
  require_once('header_2.php');
  $indexMsg="
    Coffee Memo(コーヒー メモ)は、
    あなたがお気に入りのコーヒーを見つけるために
    コーヒーを飲んだ経験を簡単に記録できるサービスです。

    現時点では、まだまだ使いづらい点がございますが
    是非、お気軽に登録してご使用ください。

    "
  ?>
        <div class="container">
          <div class="page-header" id="banner">
            <div class="row">
              <div class="col-lg-8 col-md-7 col-sm-6">
                <h1>Coffee Memo</h1>
                <p class="lead">
                  <?php echo nl2br($indexMsg); ?>
                </p>
                <p class="lead">
                  詳しくは、<a href="about.php">こちら</a>から。
                </p>
                <p class="lead">
                  下のボタンから登録して、お気軽にお楽しみください。
                </p>
              </div>

              <div class="btn-group btn-group-justified">
                <a href="signup.php" class="btn btn-default">新規登録</a>
              </div>
            </div>
          </div>
        </div>


    <?php
      require_once('footer.php');
    ?>
