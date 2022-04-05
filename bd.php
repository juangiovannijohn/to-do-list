<?php
//para guardar en memoria lo cargado, y luego poder borrar el mensaje de success
session_start();


//para conectar la base de datos usamos esta funcion la cual pide RUTA, NOMUSUARIO, PASSW, NOMBASEDATOS.
$conn = mysqli_connect(
  'localhost',
  'root',
  'root',
  'crud_usuarios'
);
?>


<?php
/* Para que las redirecciones funcionen una vez subido al host hay que eliminar este script comentado
  //METODO 2
  $hosting = 'localhost';
  $userHosting = 'root';
  $passHosting = 'root';
  $bdHosting = 'crud_usuarios';

  try{
    $conex = new PDO("mysql:host=$hosting;dbname=$bdHosting;",$userHosting,$passHosting);
  }catch(PDOException $error){

    die('error en la conexion con la base de datos'. $error->getMessage());
  }
*/
?>
