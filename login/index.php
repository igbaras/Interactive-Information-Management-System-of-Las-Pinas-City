<?php session_start(); ?>
<?php ob_start(); ?>

<?php

if (isset($_SESSION['cryptedpass'])) {

  if ($_SESSION['user_role'] == 'admin') {
    header("Location: admin/portal.php");
  } else if ($_SESSION['user_role'] == 'writer') {
    header("Location: writer_editor/writer_portal.php");
  } else if ($_SESSION['user_role'] == 'chat service') {
    header("Location: chat_service/cs_portal.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image icon" href="https://res.cloudinary.com/sarabgi/image/upload/v1669190604/index/lplogo_rjgtai.png">
  <title>Login | The City of Las Piñas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>

<body class="hold-transition login-page" style="background-image: url('https://res.cloudinary.com/sarabgi/image/upload/v1688664262/Assets/270784355_699889750981465_9170872178964725670_n_jd5xlt.jpg'); background-repeat:no-repeat;  background-size: 100% 100%; ">
  <div class="overlay" style=" background-color: rgba(4, 70, 48, 0.7); position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;"></div>
  <div class="login-box">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">

      <img class="animation__shake" src="https://res.cloudinary.com/sarabgi/image/upload/v1669190604/index/lplogo_rjgtai.png" alt="AdminLTELogo" width="200" style="background-color: #DADFD9;">
    </div>


    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Login</b></a>
      </div>

      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <!-- 
        <form action="imageupload.php" method="post" runat="server" enctype="multipart/form-data">
          <div class="input-group">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="submit" value="submit">

        </form>


 -->

        <form action="user_login.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="user_password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

</body>

</html>