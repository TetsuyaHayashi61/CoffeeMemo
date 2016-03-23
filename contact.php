<?php
  require_once('./config.php');
  require_once('./functions.php');

  require_once('./header_1.php');
?>

<title>お問い合わせ</title>

<?php
  require_once('./header_2.php');
?>

<script type="text/javascript" src="./js/jQuery.validation.js"></script>
<script type="text/javascript" src="./js/reserve.js"></script>
<script type="text/javascript">

$(document).ready(function(){
$("#contact-form").validate({
rules : {
name:{required: true}
},
errorClass: "myError"

});
});
</script>

<style>
input.myError {
background-color:#CCFFFF;
}

label.myError {
color:#FF0000;
}

textarea.myError {
background-color:#CCFFFF;
}
</style>
</head>

<body>

<?php
$contactMsg="
   些細なことでも、お気軽にご連絡ください。"

?>

<div class="container">
  <div class="row">
      <p class="lead"><?php echo nl2br($contactMsg); ?></p>
  </div>
<div>

<form id="contact-form" action="./contact_check.php" method="post">
  <legend>お問い合わせ</legend>
				<input type="hidden" name="sub_actions" value="confirm">
        <div class="form-group">
          <label for="name">お名前　(必須)</label>
          <input type="text" class="form-control" id="name" name="contact_name" required>
        </div>
        <div class="form-group">
          <label for="Email1">メールアドレス　(必須)</label>
          <input type="email" class="form-control" id="Email1" name="contact_email" required>
        </div>
        <div class="form-group">
          <label for=contact>お問い合わせ内容</label>
          <textarea class="form-control" rows=4 id="contact" name="contact_comment" placeholder="ご質問・ご意見・ご要望などご入力ください"></textarea>
        </div>
        <button type="submit" class="btn btn-default">確認画面へ</button>
</form>
</div>

<?php
  require_once('footer.php');
?>
