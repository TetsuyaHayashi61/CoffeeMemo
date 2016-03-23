<?php
require_once('header_0.php');
require_once('header_1.php');
?>

<?php
$sql = "SELECT * FROM post WHERE id = {$_GET['id']}";
$stmt = $dbh->query($sql) ;
$row = $stmt->fetch();
?>

<title><?php echo $row['coffee_name'].'のメモ'; ?></title>

<?php
require_once('header_2.php');
?>
<div class="container" style="padding:10px 0">
  <a href = "mypage.php">マイページへ</a>
</div>

<div class="container" style="padding:10px 0">
<form class="form-horizontal" action="" method="">
  <fieldset>
    <div class="row">
         <div class="center-block">
           <?php if(h($row['image_name'] !== 'noimage.png')): ?>
            <a href ="<?php echo SITE_URL.'images/'.h($row['image_name']); ?>">
              <img src="<?php echo SITE_URL.'/thumbs/'.h($row['image_name']); ?>" alt="<?php echo h($row['coffee_name']) ?>" class="img-responsive" style="margin:0 auto">
            </a>
          <?php endif; ?>
    </div>
    </div>
  </fieldset>
  <fieldset>
        <div class="form-group">
        <label for="date" class="col-sm-2 control-label">日付</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo h($row['date']); ?></p>
        </div>
    </div>
      <div class="form-group">
      <label for="date" class="col-sm-2 control-label">店名</label>
      <div class="col-sm-10">
        <p class="form-control-static"><?php echo h($row['shop']); ?></p>
      </div>
  </div>
    <div class="form-group">
    <label for="date" class="col-sm-2 control-label">コーヒー名</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['coffee_name']); ?></p>
    </div>
</div>
    <div class="form-group">
    <label for="date" class="col-sm-2 control-label">グラム数</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['volume']); ?> g</p>
    </div>
</div>
<div class="form-group">
<label for="date" class="col-sm-2 control-label">金額</label>
<div class="col-sm-10">
  <p class="form-control-static"><?php echo h($row['price']); ?> 円</p>
</div>
</div>
<label class="col-sm-2 control-label">評価</label>
<div class="col-sm-10">
  <p class="form-control-static"><?php echo h($row['review_score']); ?></p>
</div>
</fieldset>
<!--未使用項目
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">お店からの情報</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['comment']); ?></p>
    </div>
  </div>
-->
<fieldset>
<legend>豆について</legend>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">ブレンド</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['blend']); ?></p>
    </div>
  </div>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">産地(国)</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['origin']); ?></p>
    </div>
  </div>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">産地(地域)</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['area']); ?></p>
    </div>
  </div>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">農園</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['farm']); ?></p>
    </div>
  </div>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">品種</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['breed']); ?></p>
    </div>
  </div>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">精製方法</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['purify']); ?></p>
    </div>
  </div>
  <!--未使用項目
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">格付け</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['grade']); ?></p>
    </div>
  </div>
-->
</fieldset>

<fieldset>
  <legend>焙煎について</legend>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">焙煎度</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['roast']); ?></p>
    </div>
  </div>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">焙煎日</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['roast_date']); ?></p>
    </div>
  </div>
</fieldset>

<fieldset>
  <legend>淹れ方／飲み方</legend>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">淹れ方</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['extract']); ?></p>
    </div>
  </div>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">飲み方</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['beverage']); ?></p>
    </div>
  </div>
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">ホット／アイス</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['hot']); ?></p>
    </div>
  </div>
  <!--未使用項目
  <div class="form-group">
      <label for="date" class="col-sm-2 control-label">トッピング</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo h($row['topping']); ?></p>
    </div>
  </div>
-->
</fieldset>

<fieldset>
  <legend>味わい　(1～5で評価)</legend>
  <div class="form-group">
      <label class="col-sm-2 control-label">苦味</label>
      <div class="col-sm-1">
        <p class="form-control-static"><?php if(h($row['review_score1']) != 0){echo h($row['review_score1']);} ?></p>
      </div>
      <label class="col-sm-1 control-label">甘味</label>
      <div class="col-sm-1">
        <p class="form-control-static"><?php if(h($row['review_score2']) != 0){echo h($row['review_score2']);} ?></p>
      </div>
      <label class="col-sm-1 control-label">酸味</label>
      <div class="col-sm-1">
        <p class="form-control-static"><?php if(h($row['review_score3']) != 0){echo h($row['review_score3']);} ?></p>
      </div>
      <label class="col-sm-1 control-label">香り</label>
      <div class="col-sm-1">
        <p class="form-control-static"><?php if(h($row['review_score4']) != 0){echo h($row['review_score4']);} ?></p>
      </div>
      <label class="col-sm-1 control-label">コク</label>
      <div class="col-sm-1">
        <p class="form-control-static"><?php if(h($row['review_score5']) != 0){echo h($row['review_score5']);} ?></p>
      </div>
  </fieldset>
  <fieldset>
    <legend>
      メモ
    </legend>
      <div class="form-group">
        <div class="col-sm-12">
          <p class="form-control-static"><?php echo nl2br(h($row['my_memo'])); ?></p>
        </div>
      </div>
  </fieldset>
  </fieldset>
</form>
</div>

<div class="container" style="padding:10px 0">
  <div class="col-lg-10 col-lg-offset-2">
    <a href="post_update.php?id=<?php echo h($row['id']); ?>" class="btn btn-primary btn-lg" role="button">編集</a>
    <a href ="mypage.php" class="btn btn-link btn-lg" role="button">マイページへ</a>
    <a href ="post_delete.php?id=<?php echo h($row['id']); ?>" class="btn btn-danger pull-right btn-lg" role="button">削除</a>
  </div>
</div>

<?php
  require_once('footer.php');
?>
