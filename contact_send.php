<?php
//以下ユーザー確認メール
//info@example.comを、あなたのメールアドレスにすることでこのメールフォームをそのまま使えます。
session_start();//ページ移動したら再びsession_start

//echo '<pre>';//HTMLのpreタグを使うと、配列が見やすくなる
//print_r($_SESSION);//print_rとは、配列を出力する関数
//echo '</pre>';

$add_header="From:coffee.memo@outlook.jp\r\n";
$add_header	.= "Reply-to: coffee.memo@outlook.jp\r\n";
$add_header	.= "X-Mailer: PHP/". phpversion();
$opt = '-f'.'coffee.memo@outlook.jp'; //-fって何か意味あったんだけど忘れました　-fすると迷惑メールになりにくいとか、そんなことだったと思う。

require_once('./header_1.php');
?>
<title>お問い合わせ</title>
<link rel="stylesheet" href="./css/bootstrap.css" media="screen">
<link rel="stylesheet" href="../assets/css/custom.min.css">

<div class="container">
<p>送信完了しました。</p><br>
<p>内容確認後、担当者より折り返しご連絡をさせて頂きます。</p><br>
<p>今しばらくお待ちください。</p>

<p><a href="./index.php">ホームへ</a></p>
</div>

<?php
$message = "名前：" . $_SESSION['contact_name'] . "\nE-mail：" . $_SESSION['contact_email']."\n本文：" . $_SESSION['contact_comment'];

// カレントの言語を日本語に設定する
mb_language("ja");
// 内部文字エンコードを設定する　このエンコード指定は大昔の携帯だとShift-jisにしないとだめだったとか。
// 今はUTF-8にしておけばだいたいOKだから、楽な時代になったもんだよ。
mb_internal_encoding("UTF-8");

mb_send_mail($_SESSION['contact_email'],"【お問い合わせ】確認メール",$message,$add_header,$opt);
//mb_send_mailは5つの設定項目がある
//mb_send_mail(送信先メールアドレス,"メールのタイトル","メール本文","メールのヘッダーFromとかリプライとか","送信エラーを送るメールアドレス");
//5番目の情報は第5引数と呼ばれるものでして、これがないと迷惑メール扱いになることも。



//マスター管理者にも同じメールを送りつける！！
mb_send_mail('coffee.memo@outlook.jp',"お問い合わせがありました",$message,$add_header,$opt);

session_destroy();  // セッションを破棄

  require_once('footer.php');
?>
