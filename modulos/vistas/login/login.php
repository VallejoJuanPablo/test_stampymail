<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php"><b>Admin</b></a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Ingreso</p>
        <?php
        if (isset($errorLogin)) {
        ?>
          <p class="login-box-msg">Por favor controlar las credenciales de acceso</p>
        <?php } ?>


        <form action="index.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="user" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recordar Usuario
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div>
          </div>
        </form>
        <div class="social-auth-links text-center mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab  mr-2"></i> Recuperar Password
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab mr-2"></i> Registrar
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
</body>

</html>