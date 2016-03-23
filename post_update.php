<?php
require_once('header_0.php');
require_once('header_1.php');
?>

<title>登録内容編集</title>

<?php
require_once('header_2.php');
require_once('post_updated.php');

$sql = "SELECT * FROM post WHERE id = {$_GET['id']}";
$stmt = $dbh->query($sql) ;
$row = $stmt->fetch();
?>

    <div class="container" style="padding:10px 0">
    <form class="form-horizontal" action="" method="post" id=my_form enctype="multipart/form-data">
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
        <legend>買ったもの／飲んだもの</legend>
        <div class="form-group">
          <label for="picture" class="col-sm-2 control-label">写真</label>
          <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h(MAX_FILE_SIZE); ?>">
          <input type="file" name="image" id="my_file">
        <div class="col-sm-10">
        </div>
        </div>
        <div class="form-group">
            <label for="date" class="col-sm-2 control-label">日付</label>
            <div class="col-sm-4">
              <input type="date" class="form-control" id="date" name="date" value="<?php echo h($row['date']) ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="shop_name" class="col-sm-2 control-label">店名 (※)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="shop_name" name="shop" required  value="<?php echo h($row['shop']) ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="coffee_name" class="col-sm-2 control-label">コーヒー名 (※)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="coffee_name" name="coffee_name" required  value="<?php echo h($row['coffee_name']) ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="volume" class="col-sm-2 control-label">グラム数</label>
            <div class="col-sm-2 input-group">
              <input type="number" class="form-control" id="volume" name="volume"  value="<?php echo h($row['volume']) ?>">
              <div class="input-group-addon">グラム</div>
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-2 control-label">金額</label>
            <div class="col-sm-2 input-group">
              <input type="number" class="form-control" id="price" name="price" value="<?php echo h($row['price']) ?>">
              <div class="input-group-addon">円</div>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">評価 (1～5 ※)</label>
          <div class="col-sm-2">
          <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score"  value="<?php echo h($row['review_score']) ?>" required>
        </div>
        </div>
        <!--未使用項目
              <div class="form-group">
                  <label for="comment" class="col-sm-2 control-label">お店からの情報</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" id="textArea" name="comment"></textarea>
                  </div>
              </div>
        -->
      </fieldset>
      <fieldset>
        <legend>豆について</legend>
          <div class="form-group">
            <label for="blend" class="col-sm-2 control-label" >ブレンド</label>
          <div class="col-sm-10">
            <label class="radio-inline">
              <input type="radio" name="blend" id="inlineRadio1" <?php if ($row['blend'] =="ストレート") {print('checked="checked"');}?> value="ストレート"> ストレート
            </label>
            <label class="radio-inline">
              <input type="radio" name="blend" id="inlineRadio2"  <?php if ($row['blend'] =="ブレンド") {print('checked="checked"');}?> value="ブレンド"> ブレンド
            </label>
            <label class="radio-inline">
              <input type="radio" name="blend" id="inlineRadio3"  <?php if ($row['blend'] =="分からない") {print('checked="checked"');}?> value="分からない"> 分からない
            </label>
        </div>
        </div>
        <div class="form-group">
            <label for="origin" class="col-sm-2 control-label">産地(国)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="origin" name="origin" value="<?php echo h($row['origin']) ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="area" class="col-sm-2 control-label">産地(地域)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="area" name="area" value="<?php echo h($row['area']) ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="farm" class="col-sm-2 control-label">農園</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="farm" name="farm" value="<?php echo h($row['farm']) ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="breed" class="col-sm-2 control-label">品種</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="breed" name="breed" value="<?php echo h($row['breed']) ?>">
            </div>
        </div>
        <div class="form-group">
           <label for="select" class="col-sm-2 control-label">精製方法</label>
        <div class="col-sm-10">
         <select class="form-control" id="select" name="purify">
           <option value="">選択して入力</option>
           <option value="ナチュラル" <?php if ($row['purify'] =="ナチュラル") {print('selected');}?>>ナチュラル</option>
           <option value="ウォッシュド" <?php if ($row['purify'] =="ウォッシュド") {print('selected');}?>>ウォッシュド</option>
           <option value="パルプドナチュラル" <?php if ($row['purify'] =="パルプドナチュラル") {print('selected');}?>>パルプドナチュラル</option>
           <option value="スマトラ式" <?php if ($row['purify'] =="スマトラ式") {print('selected');}?>>スマトラ式</option>
           <option value="その他" <?php if ($row['purify'] =="その他") {print('selected');}?>>その他</option>
         </select>
       </div>
       </div>
       <!--未使用項目
        <div class="form-group">
            <label for="grade" class="col-sm-2 control-label">格付け</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="grade" name="grade">
            </div>
        </div>
      -->
      </fieldset>

      <fieldset>
          <legend>焙煎について</legend>
          <div class="form-group">
             <label for="select" class="col-sm-2 control-label">焙煎度</label>
          <div class="col-sm-10">
           <select class="form-control" id="select" name="roast">
            <option value="">選択して入力</option>
            <option value="浅煎">浅煎</option>
            <option value="浅煎／ライトロースト">　ライトロースト</option>
            <option value="浅煎／シナモンロースト">　シナモンロースト</option>
            <option value="中煎">中煎</option>
            <option value="中煎／ミディアムロースト">　ミディアムロースト</option>
            <option value="中煎／ハイロースト">　ハイロースト</option>
            <option value="中深煎">中深煎</option>
            <option value="中深煎／シティロースト">　シティロースト</option>
            <option value="中深煎／フルシティロースト">　フルシティロースト</option>
            <option value="深煎">深煎</option>
            <option value="深煎／フレンチロースト">　フレンチロースト</option>
            <option value="深煎／イタリアンロースト">　イタリアンロースト</option>
           </select>
         </div>
         </div>
         <div class="form-group">
             <label for="roast_date" class="col-sm-2 control-label">焙煎日</label>
             <div class="col-sm-10">
               <input type="date" class="form-control" id="roast_date" name="roast_date" value="<?php echo h($row['roast_date']) ?>">
             </div>
         </div>
      </fieldset>
      <fieldset>
        <legend>淹れ方／飲み方</legend>
        <div class="form-group">
           <label for="select" class="col-sm-2 control-label">淹れ方</label>
        <div class="col-sm-10">
         <select class="form-control" id="select" name="extract">
          <option value="">選択して入力</option>
          <option value="ハンドドリップ(ペーパーフィルター)">ハンドドリップ(ペーパーフィルター)</option>
          <option value="ハンドドリップ(金属フィルター)">ハンドドリップ(金属フィルター)</option>
          <option value="マシンドリップ">マシンドリップ</option>
          <option value="ネルドリップ">ネルドリップ</option>
          <option value="フレンチプレス">フレンチプレス</option>
          <option value="サイフォン">サイフォン</option>
          <option value="エスプレッソ">エスプレッソ</option>
          <option value="マキネッタ(直火式エスプレッソ)">マキネッタ(直火式エスプレッソ)</option>
          <option value="ポーション(カプセル式)">ポーション(カプセル式)</option>
          <option value="水出し">水出し</option>
          <option value="インスタント">インスタント</option>
          <option value="カッピング">カッピング</option>
          <option value="その他">その他</option>
         </select>
       </div>
       </div>
       <div class="form-group">
          <label for="select" class="col-sm-2 control-label">飲み方</label>
       <div class="col-sm-10">
        <select class="form-control" id="select" name="beverage">
         <option value="">選択して入力</option>
         <option value="ブラック">ブラック</option>
         <option value="カフェオレ">カフェオレ</option>
         <option value="カフェラテ">カフェラテ</option>
         <option value="カプチーノ">カプチーノ</option>
         <option value="エスプレッソ">エスプレッソ</option>
         <option value="アメリカン">アメリカン</option>
         <option value="ウインナーコーヒー">ウインナーコーヒー</option>
         <option value="カフェロワイアル">カフェロワイアル</option>
         <option value="アイリッシュ">アイリッシュ</option>
         <option value="ダッチコーヒー">ダッチコーヒー</option>
         <option value="モカジャバ">モカジャバ</option>
         <option value="その他">その他</option>
        </select>
       </div>
       </div>
       <div class="form-group">
         <label for="hot" class="col-sm-2 control-label" >ホット／アイス</label>
       <div class="col-sm-10">
         <label class="radio-inline">
           <input type="radio" name="hot" id="inlineRadio1" <?php if ($row['hot'] =="ホット") {print('checked="checked"');}?> value="ホット"> ホット
         </label>
         <label class="radio-inline">
           <input type="radio" name="hot" id="inlineRadio2" <?php if ($row['hot'] =="アイス") {print('checked="checked"');}?> value="アイス"> アイス
         </label>
     </div>
     </div>
  <!--未使用項目
     <div class="form-group">
       <label for="topping" class="col-sm-2 control-label" >トッピング</label>
     <div class="col-sm-10">
       <label class="checkbox-inline">
         <input type="checkbox" name="topping" id="check1" value="砂糖・シロップ">砂糖・シロップ
       </label>
       <label class="checkbox-inline">
         <input type="checkbox" name="topping" id="check2" value="ミルク">ミルク
       </label>
       <label class="checkbox-inline">
         <input type="checkbox" name="topping" id="check3" value="生クリーム">生クリーム
       </label>
   </div>
   </div>
  -->

  <!--評価-->
    <fieldset>
      <legend>味わい　(1～5で評価)</legend>
        <div class="form-group">
            <label class="col-sm-2 control-label">苦味</label>
            <div class="col-sm-1">
            <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score1" value="<?php if(h($row['review_score1']) != 0){echo h($row['review_score1']);} ?>">
            </div>
            <label class="col-sm-1 control-label">甘味</label>
            <div class="col-sm-1">
            <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score2" value="<?php if(h($row['review_score2']) != 0){echo h($row['review_score2']);} ?>">
            </div>
            <label class="col-sm-1 control-label">酸味</label>
            <div class="col-sm-1">
            <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score3" value="<?php if(h($row['review_score3']) != 0){echo h($row['review_score3']);} ?>">
            </div>
            <label class="col-sm-1 control-label">香り</label>
            <div class="col-sm-1">
            <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score4" value="<?php if(h($row['review_score4']) != 0){echo h($row['review_score4']);} ?>">
            </div>
            <label class="col-sm-1 control-label">コク</label>
            <div class="col-sm-1">
            <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score5" value="<?php if(h($row['review_score5']) != 0){echo h($row['review_score5']);} ?>">
            </div>
        </div>
    </fieldset>
    <fieldset>
      <legend>メモ</legend>
      <div class="form-group">
        <div class="col-sm-12">
          <textarea class="form-control" rows="10" id="textArea" name="my_memo" placeholder="感想・豆の情報など、自由にメモ"><?php echo h($row['my_memo']) ; ?></textarea>
        </div>
      </div>
    </fieldset>
     <input type="hidden" name="user_id" value="<?php echo h($me['id']); ?>">
     <input type="hidden" name="id" value="<?php echo h($row['id']); ?>">
      <fieldset>
      <div class="form-group">
        <button type="submit" class="btn btn-primary"> 変更完了</input>
      </div>
      </fieldset>
      </form>
    </div>
