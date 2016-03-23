<?php
require_once('header_0.php');
require_once('header_1.php');
?>

<title>削除完了</title>
<div class=container>
<?php
require_once('header_2.php');
  $id = h($_GET['id']);
    $stmt = $dbh->prepare("DELETE FROM post WHERE id=:id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute(array($id));
    echo "削除しました。";
  ?>
    <p><a href='mypage.php'>マイページへ</a>
</div>

<?php
    require_once('footer.php');
?>
