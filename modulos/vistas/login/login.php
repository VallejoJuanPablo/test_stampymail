<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STAMPYMAIL</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="./css/stampymail_login.css">
</head>

<body>
  <div class="login-box">
    <div class="login-logo">
    <img src="./img/stampymail-conejo.png" class="avatar" alt="Avatar Image">
    </div>
    <div>
      <div >
        <p class="column-12">Ingreso Test Stampymail</p>
        <?php
        if (isset($errorLogin)) {
        ?>
          <p class="column-12">Por favor controlar las credenciales de acceso</p>
        <?php } ?>


        <form action="index.php" method="post">
            <!-- USERNAME INPUT -->
        <label for="username">Username</label>
        <input type="text" name="user" placeholder="Enter Username">
        <!-- PASSWORD INPUT -->
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter Password">
          <div class="row">
          <div class="column-12">
         
            <button type="submit" class="button button-verde">Ingresar</button>
          </div>
          </div>
          </form>
          <div class="row">
            <div class="column-12" >
            <button type="" class="button button-rojo">Recuperar Password</button>   
            <button type="" class="button button-azul">Registrar</button>
            </div>
          </div>
      
      </div>
    </div>
  </div>
</body>
</html>