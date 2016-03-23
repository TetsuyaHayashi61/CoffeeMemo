<?php
if(!empty($_POST)){

$id = $_POST['id'];
$date = $_POST['date'];
$shop = $_POST['shop'];
$coffee_name = $_POST['coffee_name'];
$volume = $_POST['volume'];
$price = $_POST['price'];
$comment = $_POST['comment'];
$review_score = $_POST['review_score'];
$review_score1 = $_POST['review_score1'];
$review_score2 = $_POST['review_score2'];
$review_score3 = $_POST['review_score3'];
$review_score4 = $_POST['review_score4'];
$review_score5 = $_POST['review_score5'];
$blend = $_POST['blend'];
$origin = $_POST['origin'];
$area = $_POST['area'];
$farm = $_POST['farm'];
$breed = $_POST['breed'];
$purify = $_POST['purify'];
$grade = $_POST['grade'];
$roast = $_POST['roast'];
$roast_date = $_POST['roast_date'];
$extract = $_POST['extract'];
$beverage =$_POST['beverage'];
$hot =$_POST['hot'];
$topping = $_POST['topping'];
$my_memo = $_POST['my_memo'];
$image_name =$_POST['image_name'];
$user_id = $_POST['user_id'];

  //Update
    $sql = "UPDATE post SET
                    date=:date,
                    shop=:shop,
                    coffee_name=:coffee_name,
                    volume=:volume,
                    price=:price,
                    review_score=:review_score,
                    review_score1=:review_score1,
                    review_score2=:review_score2,
                    review_score3=:review_score3,
                    review_score4=:review_score4,
                    review_score5=:review_score5,
                    blend=:blend,
                    origin=:origin,
                    area=:area,
                    farm=:farm,
                    breed=:breed,
                    purify=:purify,
                    user_id=:user_id,
                    updated_at=now(),
                    roast=:roast,
                    roast_date=:roast_date,
                    extract=:extract,
                    beverage=:beverage,
                    hot=:hot,
                    my_memo=:my_memo
                    WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $params = array(
                    ":date" => $date,
                    ":shop" => $shop,
                    ":coffee_name" => $coffee_name,
                    ":volume" => $volume,
                    ":price" => $price,
                    ":review_score" => $review_score,
                    ":review_score1" => $review_score1,
                    ":review_score2" => $review_score2,
                    ":review_score3" => $review_score3,
                    ":review_score4" => $review_score4,
                    ":review_score5" => $review_score5,
                    ":blend" => $blend,
                    ":origin" => $origin,
                    ":area" => $area,
                    ":farm" => $farm,
                    ":breed" => $breed,
                    ":purify" => $purify,
                    ":user_id" => $user_id,
                    ":roast" => $roast,
                    ":roast_date" => $roast_date,
                    ":extract" => $extract,
                    ":beverage" => $beverage,
                    ":hot" => $hot,
                    ":my_memo" => $my_memo,
                    ":id" => $id
    );
    $stmt->execute($params);

    // 画像ファイルの変更がある場合のみ、画像ファイル名を挿入
    if(!empty($image_name)){
      $dbcol = 'image_name';
      $sql = "UPDATE post SET image_name=:image_name WHERE id=:id";
      $stmt = $dbh->prepare($sql);
      $params = array(
                      ":image_name" => $image_name,
                      ":id" => $id
                      );
      $stmt->execute($params);
    }
    header('Location: '.SITE_URL.'mypage.php');
    exit;
}

?>
