<?php

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
$user_id = $_POST['user_id'];

      //Insert
        $dbcol = 'date,shop,coffee_name,volume,price,comment,
          review_score,review_score1,review_score2,review_score3,review_score4,review_score5,
          blend,origin,area,farm,breed,purify,grade,user_id,created_at,modified_at';
        $sql = "INSERT INTO post ($dbcol) VALUES (
            :date,:shop,:coffee_name,:volume,:price,:comment,
            :review_score,:review_score1,:review_score2,:review_score3,:review_score4,:review_score5,
            :blend,:origin,:area,:farm,:breed,:purify,:grade,:user_id, now(), now()
            )";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':shop', $shop, PDO::PARAM_STR);
        $stmt->bindParam(':coffee_name', $coffee_name, PDO::PARAM_STR);
        $stmt->bindParam(':volume', $volume, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':review_score', $review_score, PDO::PARAM_STR);
        $stmt->bindParam(':review_score1', $review_score1, PDO::PARAM_STR);
        $stmt->bindParam(':review_score2', $review_score2, PDO::PARAM_STR);
        $stmt->bindParam(':review_score3', $review_score3, PDO::PARAM_STR);
        $stmt->bindParam(':review_score4', $review_score4, PDO::PARAM_STR);
        $stmt->bindParam(':review_score5', $review_score5, PDO::PARAM_STR);
        $stmt->bindParam(':blend', $blend, PDO::PARAM_STR);
        $stmt->bindParam(':origin', $origin, PDO::PARAM_STR);
        $stmt->bindParam(':area', $area, PDO::PARAM_STR);
        $stmt->bindParam(':farm', $farm, PDO::PARAM_STR);
        $stmt->bindParam(':breed', $breed, PDO::PARAM_STR);
        $stmt->bindParam(':purify', $purify, PDO::PARAM_STR);
        $stmt->bindParam(':grade', $grade, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $ret = $stmt->execute();

        header('Location: '.SITE_URL.'mypage.php');
        exit;
        }

  ?>
