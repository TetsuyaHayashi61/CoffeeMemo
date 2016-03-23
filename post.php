<?php
require_once('header_0.php');
require_once('header_1.php');
?>

<title>入力ページ</title>

<?php
require_once('header_2.php');
require_once('post_insert.php');
?>


  <div class="container" style="padding:10px 0">
  <form class="form-horizontal" action="" method="post" id=my_form enctype="multipart/form-data">
    <fieldset>
      <legend>買ったもの／飲んだもの</legend>
      <div class="form-group">
        <label for="picture" class="col-sm-2 control-label">写真</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h(MAX_FILE_SIZE); ?>">
        <input type="file" name="image" id="my_file">
      <div class="col-sm-10">
      </div>

      <?php if (isset($success)) : ?>
        <div class="msg success"><?php echo $success; ?></div>
      <?php endif; ?>
      <?php if (isset($error)) : ?>
        <div class="msg error"><?php echo $error; ?></div>
      <?php endif; ?>

      </div>
      <div class="form-group">
          <label for="date" class="col-sm-2 control-label">日付</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" id="date" name="date">
          </div>
      </div>
      <div class="form-group">
          <label for="shop_name" class="col-sm-2 control-label">店名 (※)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="shop_name" name="shop" required>
          </div>
      </div>
      <div class="form-group">
          <label for="coffee_name" class="col-sm-2 control-label">コーヒー名 (※)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="coffee_name" name="coffee_name" required>
          </div>
      </div>
      <div class="form-group">
          <label for="volume" class="col-sm-2 control-label">グラム数</label>
          <div class="col-sm-4 input-group">
            <input type="number" class="form-control" id="volume" name="volume">
            <div class="input-group-addon">グラム</div>
          </div>
      </div>
      <div class="form-group">
          <label for="price" class="col-sm-2 control-label">金額</label>
          <div class="col-sm-4 input-group">
            <input type="number" class="form-control" id="price" name="price">
            <div class="input-group-addon">円</div>
          </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">評価 (1～5 ※)</label>
        <div class="col-sm-2">
        <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score" required>
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
            <input type="radio" name="blend" id="inlineRadio1" value="ストレート"> ストレート
          </label>
          <label class="radio-inline">
            <input type="radio" name="blend" id="inlineRadio2" value="ブレンド"> ブレンド
          </label>
          <label class="radio-inline">
            <input type="radio" name="blend" id="inlineRadio3" value="分からない"> 分からない
          </label>
      </div>
      </div>
      <div class="form-group">
          <label for="origin" class="col-sm-2 control-label">産地(国)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="origin" name="origin">
          </div>
      </div>
      <div class="form-group">
          <label for="area" class="col-sm-2 control-label">産地(地域)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="area" name="area">
          </div>
      </div>
      <div class="form-group">
          <label for="farm" class="col-sm-2 control-label">農園</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="farm" name="farm">
          </div>
      </div>
      <div class="form-group">
          <label for="breed" class="col-sm-2 control-label">品種</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="breed" name="breed">
          </div>
      </div>
      <div class="form-group">
         <label for="select" class="col-sm-2 control-label">精製方法</label>
      <div class="col-sm-10">
       <select class="form-control" id="select" name="purify">
         <option value="">選択して入力</option>
         <option value="ナチュラル">ナチュラル</option>
         <option value="ウォッシュド">ウォッシュド</option>
         <option value="パルプドナチュラル">パルプドナチュラル</option>
         <option value="スマトラ式">スマトラ式</option>
         <option value="その他">その他</option>
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
             <input type="date" class="form-control" id="roast_date" name="roast_date">
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
         <input type="radio" name="hot" id="inlineRadio1" value="ホット"> ホット
       </label>
       <label class="radio-inline">
         <input type="radio" name="hot" id="inlineRadio2" value="アイス"> アイス
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
          <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score1">
          </div>
          <label class="col-sm-1 control-label">甘味</label>
          <div class="col-sm-1">
          <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score2">
          </div>
          <label class="col-sm-1 control-label">酸味</label>
          <div class="col-sm-1">
          <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score3">
          </div>
          <label class="col-sm-1 control-label">香り</label>
          <div class="col-sm-1">
          <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score4">
          </div>
          <label class="col-sm-1 control-label">コク</label>
          <div class="col-sm-1">
          <input type="number" class="form-control" step="0.5" min="1.0" max="5.0" name="review_score5">
          </div>
      </div>
  </fieldset>
  <fieldset>
    <legend>メモ</legend>
    <div class="form-group">
      <div class="col-sm-12">
        <textarea class="form-control" rows="10" id="textArea" name="my_memo" placeholder="感想・豆の情報など、自由にメモ"></textarea>
      </div>
    </div>
  </fieldset>
   <input type="hidden" name="user_id" value="<?php echo h($me['id']); ?>"></p>
    <fieldset>
    <div class="form-group">
      <button type="submit" class="btn btn-primary"> 登録</input>
    </div>
    </fieldset>
    </form>
  </div>

  <?php
    require_once('footer.php');
  ?>
