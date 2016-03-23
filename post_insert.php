<?php
if(!empty($_POST)){

$date = $_POST['date'];
$shop = $_POST['shop'];
$coffee_name = $_POST['coffee_name'];
$volume = $_POST['volume'];
$price = $_POST['price'];
//$comment = $_POST['comment'];
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
//$grade = $_POST['grade'];
$roast = $_POST['roast'];
$roast_date = $_POST['roast_date'];
$extract = $_POST['extract'];
$beverage =$_POST['beverage'];
$hot =$_POST['hot'];
//$topping = $_POST['topping'];
$my_memo = $_POST['my_memo'];
$image_name =$_POST['image_name'];
$user_id = $_POST['user_id'];
if(empty($image_name)){
  $image_name = "noimage.png";
}

  //Insert
    $dbcol = 'date, shop, coffee_name, volume, price, review_score, review_score1, review_score2, review_score3, review_score4, review_score5, blend, origin, area, farm, breed, purify, user_id, created_at, updated_at, roast, roast_date, extract, beverage, hot, my_memo, image_name';
    $sql = "INSERT INTO post ($dbcol) VALUES (:date, :shop, :coffee_name, :volume, :price, :review_score, :review_score1, :review_score2, :review_score3, :review_score4, :review_score5, :blend, :origin, :area, :farm, :breed, :purify, :user_id, now(), now(), :roast, :roast_date, :extract, :beverage, :hot, :my_memo, :image_name )";
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
                    ":image_name" => $image_name
    );
    $stmt->execute($params);
    header('Location: '.SITE_URL.'mypage.php');
    exit;
}

?>
