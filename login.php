<?php
session_start();

  require_once('config.php');
  require_once('functions.php');

  if (!empty($_SESSION['me'])){
    header('Location: '.SITE_URL.'mypage.php');
    exit;
  }

  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    //CSRF対策
    setToken();
  }else{
    checkToken();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $dbh = connectDb();

    $err = array();

    //メールアドレスが空？
    if ($email == ''){
      $err['email'] = 'メールアドレスを入力してください。';
    }

    //メールアドレスの形式が不正
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $err['email'] = 'メールアドレスの形式が正しくありません。';
    }

    /*
        //メールアドレスが登録されていない
        if (!emailExists($email, $dbh)){
          $err['email'] = 'このアドレスは登録されていません。';
        }
    */

    //パスワードが空？
    if ($password == ''){
      $err['password'] = 'パスワードを入力してください。';
    }

    //メールアドレスとパスワードが正しくない
    $me = getUser($email, $password, $dbh);
    if (empty($me)){
      $err['password'] = 'メールアドレスまたはパスワードが正しくありません。';
    }

    if(empty($err)){
      //セッションハイジャック対策
      session_regenerate_id(true);
      $_COOKIE['PHPSESSID'] = session_id();
      $_SESSION['me'] = $me;
      header('Location:'.SITE_URL.'mypage.php');
?>
<pre>
  <?php
var_dump('セッションID、'.session_id());
var_dump($_SESSION);
var_dump('クッキーは、'.$_COOKIE[session_name()].'です');
var_dump($_COOKIE);
 ?>
</pre>
<?php
      exit;
    }

  }

  require_once('header_1.php');
  require_once('header_2.php');
?>

    <title>ログイン画面</title>
  </head>
  <body>
    <div class="container">
    <form action="", method="POST" class="form-horizontal">
      <fieldset>
        <legend>ログイン</legend>
        <div class="form-group">
          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <p><input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo h($email)?>"><?php echo h($err['email']) ?></p>
        </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <p><input type="password" class="form-control" id="inputPassword" placeholder="Password"  name="password" value=""><?php echo h($err['password']) ?></p>
        </div>
        </div>
        <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <p><a href ="signup.php">新規登録はこちら</a></p>
        </div>
        </div>
      </fieldset>

  </div>
  </form>

  <?php
    require_once('footer.php');
  ?>
