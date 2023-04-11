
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ร้านธรรมโอสถ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">


  
</head>
<style>
  .hold-transition{
    /*background-color: #222;*/
    background-image: url("1.jpg");
    background-repeat: no-repeat;

     background-size: 100% ;
  }
  .login-card-body{
    /*background-color: #222;
    opacity: 0.5;*/
  }
body  {
  background-image: url("paper.gif");
  background-color: #222;
  
}
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <center><img width="250 px" src="logo1.png"><br><br><br>
     <!--  <p class="login-box-msg">เข้าสู่ระบบ</p> -->

     <form action="chk_login_2.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="c_username" id="c_username" placeholder="เบอร์โทรศัพท์">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="ion-android-phone-portrait text-primary"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="c_password" id="c_password" placeholder="รหัสผ่าน">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-primary"></span>
            </div>
          </div>
        </div>
        
        <div class="social-auth-links text-center mb-3">
          <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
          <a href="login1.php" class="btn btn-secondary btn-block"> สำหรับเจ้าหน้าที่ </a>
          <!-- <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> พนักงานขับรถ
          </a> -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->

  </div>

</div>
<!-- /.login-box -->



</body>


<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


</html>
