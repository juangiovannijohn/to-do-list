<?php
//coneccion con la base de datos
include('bd.php');

//validacion de que los datos se reciben correctamente
if (isset($_POST['submit_tarea'])) {
  $tituloTarea = $_POST['tarea_titulo'];
  $descripcionTarea = $_POST['tarea_descripcion'];

//codigo de SLQ para guardar datos en la BD
  $query = "INSERT INTO crud_tareas(tarea_titulo, tarea_descripcion) VALUES ('$tituloTarea', '$descripcionTarea')";

  $resultado = mysqli_query($conn, $query);

  if (!$resultado) {
  die('Falló la carga');
  };

//creamos la alerta para que se vea el mensaje de tarea creada correctamente
  $_SESSION['message'] = 'La tarea ha sido guardada satisfactoriamente';
  $_SESSION['message_class'] = 'success';
  header("Location: index.php ");

}

 ?>
