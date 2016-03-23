<?php
  require_once('config.php');
  require_once('functions.php');

  session_start();

  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    //CSRF対策
    setToken();
  }else{
    checkToken();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $dbh = connectDb();

    $err = array();

    //名前が空？
    if ($name == ''){
      $err['name'] = 'お名前を入力してください。';
    }
    //メールアドレスが正しい？
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $err['email'] = 'メールアドレスの形式が正しくありません。';
    }

    if (emailExists($email, $dbh)){
      $err['email'] = 'このアドレスは既に登録されています。';
    }

    //メールアドレスが空？
    if ($email == ''){
      $err['email'] = 'メールアドレスを入力してください。';
    }

    //パスワードが空？
    if ($password == ''){
      $err['password'] = 'パスワードを入力してください。';
    }

    //パスワードが不一致
    if ($password != $password2){
      $err['password2'] = 'パスワードが一致しません。';
    }

    if(empty($err)){
      //登録処理
      $sql = "insert into users
                  (name, email, password, created, modified)
                  values
                  (:name, :email, :password, now(), now())";
      $stmt = $dbh->prepare($sql);
      $params = array(
                  ":name" => $name,
                  ":email" => $email,
                  ":password" => getSha1password($password)
      );
      $stmt->execute($params);
      header('Location: '.SITE_URL.'mypage.php');
      exit;
    }

  }

  require_once('header_1.php');
  require_once('header_2.php');
?>

    <title>新規ユーザー登録</title>
  </head>
  <body>
  <div class="container">
    <h3>新規ユーザー登録</h3>
    <form action="", method="POST">
    <p>お名前：<input type="text" name="name" value="<?php echo h($name); ?>">
      <?php echo h($err['name']); ?>
    </p>
    <p>メールアドレス：<input type="text" name="email" value="<?php echo h($email); ?>">
      <?php echo h($err['email']); ?>
    </p>
    <p>パスワード：<input type="password" name="password" value="">
      <?php echo h($err['password']); ?>
    </p>
    <p>パスワード(確認用)：<input type="password" name="password2" value="">
      <?php echo h($err['password2']); ?>
    </p>

    <input type="hidden" name="token"
      value="<?php echo h($_SESSION['token']); ?>">
    <form class ="form-inline">
      <div class="form-group">
        <p><input type="submit" class="btn btn-primary" value="新規登録"></p>
      </div>
      <div class="form-group">
        <p><a href ="index.php">戻る</a></p>
      </div>
      <div class="form-group">
        <p><a href="login.php">(登録済みの方) ログインページへ</a></p>
      </div>
    </form>
  </div>
  </form>

  <?php
    require_once('footer.php');
  ?>
