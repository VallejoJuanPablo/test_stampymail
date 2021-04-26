<?php
include_once 'core/user.php';
include_once 'core/session.php';

$Session = new Session();
$user = new User();

if (isset($_SESSION['user'])) {

  $user->setUser($Session->getCurrentUser());
  include_once 'modulos/comunes/home.php';

} else if (isset($_POST['user']) && isset($_POST['password'])) {

  $userForm = $_POST['user'];
  $passForm = $_POST['password'];

  $user = new User();
  if ($user->userExists($userForm, $passForm)) {
    $Session->setCurrentUser($userForm);
    $user->setUser($userForm);

    include_once 'modulos/comunes/home.php';

  } else {
    $errorLogin = "Nombre de usuario y/o password incorrecto";
    include_once 'modulos/vistas/login/login.php';
  }
} else {
  include_once 'modulos/vistas/login/login.php';
}
