<?php
function connectDb() {
try {
  $dbh = new PDO(DSN,DB_USER,DB_PASSWORD,
  array(PDO::ATTR_EMULATE_PREPARES => false));
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  }
  return $dbh;
  }

function  h($s) {
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
  }

function setToken(){
    $token = sha1(uniqid(mt_rand(), true));
    $_SESSION['token'] = $token;
  }

function checkToken(){
    if (empty($_SESSION['token']) || $_SESSION['token'] != $_POST['token']){
      echo "不正なPOSTが行われました！" ;
      exit;
    }
  }

function emailExists($email, $dbh){
    $sql = "select * from users where email=:email limit 1";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(":email" => $email));
    $user = $stmt->fetch ();
    return $user ? true: false;
  }

function getSha1password($s){
    return (sha1(PASSWORD_KEY.$s));
  }

function getUser($email, $password, $dbh){
    $sql = "select * from users where email = :email and password =:password limit 1";
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute(array(":email" => $email, ":password" => getSha1password($password)));
    $user = $stmt->fetch();
    return $user ? $user : false;
  }

 ?>
