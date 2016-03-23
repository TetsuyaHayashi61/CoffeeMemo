<?php
  require_once('./config.php');
  require_once('./functions.php');

//mail.phpのPostをSessionに代入する。
//Postは次のページまでしか引き継ぐことが出来ません
//確認ページ、送信ページとページをまたぐ際はこのSessionを使うのが普通です。
//そのため、フォームの確認ページなどで一度Sessionに代入する必要があります。

//いきなり確認画面にアクセスがあれば不正アクセス。
//!$_POSTで　$_POSTがSetされているかをチェックし、セットされていなければリダイレクト
if(!$_POST){
header('Location: SITE_URL');//	headerlocationはPHPのリダイレクト処理でよく使う。
	}

//Sessionを開始するときの決まり文句、これがないとSessionが開始できない
session_start();
$_SESSION += array('contact_name' => h($_POST['contact_name']));
$_SESSION += array('contact_email' => h($_POST['contact_email']));
$_SESSION += array('contact_comment' => h($_POST['contact_comment']));

//無事Sessionに保存できているかチェックする

//echo '<pre>';//HTMLのpreタグを使うと、配列が見やすくなる
//print_r($_SESSION);//print_rとは、配列を出力する関数
//echo '</pre>';


require_once('./header_1.php');
?>

<title>お問い合わせ</title>

<?php
  require_once('./header_2.php');
?>

</head>

<body>
<form id="contact-form" action="./contact_send.php" method="post">
					<input type="hidden" name="sub_actions" value="confirm">

					<div class="container">
					<form id="contact-form" action="./contact_check.php" method="post">
									<input type="hidden" name="sub_actions" value="confirm">
					        <div class="form-group">
					          <label for="name">お名前</label>
					          <p class="form-control-static"><?php echo h($_POST['contact_name']); ?></p>
					        </div>
					        <div class="form-group">
					          <label for="Email1">メールアドレス</label>
					          <p class="form-control-static"><?php echo h($_POST['contact_email']); ?></p>
					        </div>
					        <div class="form-group">
					          <label for=contact>お問い合わせ内容</label>
										<p class="form-control-static"><?php echo nl2br(h($_POST['contact_comment'])); ?></p>
					        </div>
                  <div class="form-group">
<!--PCやスマホのメールフォームの修正ボタンなんかhistory.back()で十分! -->
                      <a href="javascript:history.back();">
											<input type="button" class="btn btn-default" value="戻る">
										  </a>
                      <button type="submit" class="btn btn-primary">送信</button>
                  </div>
					</form>

<?php
require_once('footer.php');
?>
