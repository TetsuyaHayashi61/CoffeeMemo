<?php
  require_once('config.php');
  require_once('functions.php');
  session_start();

  if (!function_exists('imagecreatetruecolor')){
    echo 'GD not installed';
    exit;
  }

 require_once('ImageUploader.php');

  if (empty($_SESSION['me'])){
   header('Location: '.SITE_URL.'signup.php');
    exit;
  }

$me = $_SESSION['me'];
$dbh = connectDb();
$uploader = New  \MyApp\ImageUploader();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $uploader->upload();
}

list($success, $error) = $uploader->getResults();
$images = $uploader->getImages();

?>
