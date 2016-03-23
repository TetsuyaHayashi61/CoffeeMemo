<!--TitleからNavberまで-->
<link rel="stylesheet" href="./css/bootstrap.css" media="screen">
<link rel="stylesheet" href="../assets/css/custom.min.css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!--[if lt IE 9]>
   <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
   <script src="../bower_components/respond/dest/respond.min.js"></script>
 <![endif]-->
 <script>

  var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'UA-23019901-1']);
   _gaq.push(['_setDomainName', "bootswatch.com"]);
     _gaq.push(['_setAllowLinker', true]);
   _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

 </script>
</head>
<body>
  <!-- Navbar
    ================================================== -->

<nav class="navbar navbar-default">
<div class="container-fluid">

  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./index.php">Coffee Memo (ベータ版)</a>
  </div>

  <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav">
          <li><a href="./post.php">入力</a></li>
          <li><a href="./mypage.php">マイページ</a></li>
          <li><a href="./about.php">このサービスについて</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="contact.php">お問い合わせ</a></li>
          <?php if(is_null($me)): ?>
            <li><a href="./login.php">ログイン</a></li>
          <?php else: ?>
            <li><a href="./logout.php">ログアウト</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
