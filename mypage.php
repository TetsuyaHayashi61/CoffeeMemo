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

    <?php foreach ($beans as $bean) : ?>
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

<!--
<ul>
  <?php foreach ($images as $image)  : ?>
    <li>
      <a href ="<?php echo SITE_URL. 'images/' .basename($image); ?>">
        <img src ="<?php echo SITE_URL. $image; ?>">
      </a>
    </li>
  <?php endforeach; ?>
</ul>
-->

<?php
/* 画像一覧表示
<?php if (isset($success)) : ?>
  <div class="msg success"><?php echo $success; ?></div>
<?php endif; ?>
<?php if (isset($error)) : ?>
  <div class="msg error"><?php echo $error; ?></div>
<?php endif; ?>

<ul>
  <?php foreach ($images as $image)  : ?>
    <li>
      <a href ="<?php echo SITE_URL. 'images/' .basename($image); ?>">
        <img src ="<?php echo SITE_URL. $image; ?>">
      </a>
    </li>
  <?php endforeach; ?>
</ul>
*/
?>


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
