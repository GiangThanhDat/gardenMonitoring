<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="./public/css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
  <section id="content">
    <form method="post" id="login-form" action="db/login">
      <h1>Admin Login</h1>
      <div>
        <input type="text" placeholder="Username" required="" name="taikhoan_nql"/>
      </div>
      <div>
        <input type="password" placeholder="Password" required="" name="matkhau_nql"/>
      </div>
      <div>
        <input type="submit" value="Log in" />
      </div>
    </form><!-- form -->
    <div class="button">
      <a href="#">Training with live project</a>
    </div><!-- button -->
  </section><!-- content -->
</div><!-- container -->
</body>
</html>