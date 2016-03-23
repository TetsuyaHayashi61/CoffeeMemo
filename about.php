<?php
require_once('config.php');
require_once('functions.php');

session_start();
$me = $_SESSION['me'];
$dbh = connectDb();

require_once('header_1.php');
?>

<title>Coffee memoについて</title>

<?php
require_once('header_2.php');
$aboutMsg="
  Coffee memo (コーヒー メモ)は、
  コーヒーを飲んだ経験を簡単に記録できるサービスです。

  コーヒーが好きになり、様々なコーヒーを飲んでいると
  「このお店のこの豆は美味しい！」
  「この豆はちょっと好みと違うかな・・・」と
  提供するお店、豆の産地や焙煎度合、抽出方法、等によって、
  風味の違いや、自分の好みに合うもの、合わないものが ある
  ことに気付いてくると思います。

  そのような、コーヒーを飲んだときの印象を記録していくことで、
  自分の好みに気付いたり
  その印象をコーヒー好きな人たちと共有することで、
  お店や豆選びの参考になるような、サービスを目指しています。

  これまでに飲んだコーヒーの風味や評価を思い出すための
  テイスティングノートとして、お使いください。
  ※ 今後、投稿されたメモは他ユーザーにも公開される予定です

  まだまだ使いづらい点がございますが、
  今後、使いやすさを向上させるとともに、
  以下のような 機能を追加していく予定です。

  ・投稿したコーヒーの産地や焙煎度などをグラフ表示
  ・他のユーザーの投稿を閲覧
  ・他のユーザーをフォローする
  ・投稿内容にもとづく、コーヒーのお勧め

  "
?>
      <div class="container">
        <div class="page-header" id="banner">
          <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
              <h2>このサービスについて</h2>
              <p class="lead">
                <?php echo nl2br($aboutMsg); ?>
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
