<?php
include('bd.php');


if (isset($_POST['login_submit'])) {
  $emailUser = $_POST['input_email_login'];
  $passUser = $_POST['input_password_login'];

  $query_email = "SELECT * FROM crud_usuarios WHERE user_email = '$emailUser' ";

  $bdEmailUser = mysqli_query($conn, $query_email);

  $fila = mysqli_fetch_array($bdEmailUser);
  $email = $fila['user_email'];

  $password = $fila['user_password'];
  $verificacionPass = password_verify($passUser, $password);
  $nombre = $fila['user_name'];

  if ($email == NULL || $verificacionPass == false) {
    $_SESSION['mensaje'] = 'Error en iniciar sesion';
    $_SESSION['registro_class'] = 'danger';
    header("Location: index.php");
    die('Error en iniciar sesion');

  }
//creamos la sesion del usuario para que se mantenga activa.
  $_SESSION['usuario'] = ["nombre" => $nombre,'email' => $email];
//creamos la alerta para que se vea el mensaje de sesion iniciada correctamente
  $_SESSION['mensaje'] = 'Has iniciado sesion correctamente';
  $_SESSION['registro_class'] = 'success';
  header("Location: index.php");
exit;
}
 ?>
