<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <base href="http://localhost/giamsatbairac/" /> <!-- đường dẫn tuyệt đối -->
  <title>Website Quản Trị Trạm Quan Trắc Bãi Rác</title>

  <!-- Custom fonts for this template-->
  <link href="./public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./public/css/style.css">
  <!-- Custom styles for this template-->
  <link href="./public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Đăng Kí Thành Viên</h1>
              </div>
              <form class="user" method="post" id="register-form">
                <div class="form-group row">                  
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="hoten_nql" id="exampleFirstName" placeholder="Họ tên">
                  </div>
                  <div class="col-sm-6">
                    <input type="date" id="ngaysinh_nql" name="ngaysinh_nql" class="form-control form-control-user">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="taikhoan_nql" placeholder="Tên tài khoản" id="taikhoan_nql">
                </div>
                <div class="form-group">
                  <div id="loi-dang-nhap" class="form-control form-control-user bg-danger text-white text-center
                  ">Tài khoản này đã được sử dụng
                </div>                  
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="matkhau_nql" placeholder="Password" name="matkhau_nql">
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" placeholder="Repeat Password" id="laplaimatkhau">
                </div>
              </div>
              <div class="form-group">
                <div id="khong-khop" class="form-control form-control-user bg-danger text-white
                text-center">Mật khẩu lặp lại không khớp
              </div>                
              <div id="da-khop" class="form-control form-control-user bg-success text-white
              text-center">Đã khớp
            </div>   
          </div>
          <input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
          <hr>
        </form>
        <hr>
        <div class="text-center">
          <a class="small" href="forgot-password.html">Forgot Password?</a>
        </div>
        <div class="text-center">
          <a class="small" href="login">Already have an account? Login!</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</div>


<!-- Bootstrap core JavaScript-->
<script src="./public/vendor/jquery/jquery.min.js"></script>
<script src="./public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="./public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="./public/js/sb-admin-2.min.js"></script>
<script src="./public/js/demo/loginProcess.js"></script>
</body>

</html>
