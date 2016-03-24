<?php
require_once('header_0.php');
require_once('header_1.php');
?>

<title>マイページ</title>

<?php
require_once('header_2.php');

$beans = array();
$sql = "SELECT * FROM post WHERE user_id = {$me['id']} ORDER BY created_at DESC";
foreach ($dbh->query($sql) as $row) {
  array_push($beans, $row);
}
?>
<div class="container" style="padding:10px 0">
  <h3>投稿一覧</h3>

    <?php
    // 投稿が0件のユーザーに対するメッセージ
    if (empty($beans)){
    ?>
  <div class="col-lg-8 col-md-7 col-sm-6">
    <?php
      echo "ユーザー登録が完了しました！</br>
      画面上にある[入力]ボタンから、飲んだコーヒーのメモを投稿して、お楽しみください！！";
      ?>
    </div>
    <?php
  };
    ?>

  <?php
  // 投稿があるユーザーの処理
     foreach ($beans as $bean) : ?>
      <div class = "col-sm-3">
        <a href="memo.php?id=<?php echo $bean['id']; ?>">
          <img src="<?php echo SITE_URL.'/thumbs/'.h($bean['image_name']); ?>" alt="<?php echo h($bean['coffee_name']) ?>" class="img-responsive">
          <?php
            echo $bean['coffee_name'].'<br>' ;
            echo '( '.$bean['shop'].' )<br>';
            echo '評 価  '.$bean['review_score'];
          ?>
        </a>
      </div>
  <?php endforeach; ?>
</div>

<!-- 以下、使用できていないが、文字表示効果をつけるためのコード-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(function() {
  $('.msg').fadeOut(4500);
  $('#my_file').on('change', function() {
    $('#my_form').submit();
  });
});
</script>

<div class="container" style="padding:10px 0">
<a href="index.php">ホームへ</a>
</div>
<?php
  require_once('footer.php');
?>
