<?php
include('bd.php');
include('includes/header.php');
 ?>
<!-- Header -->
<!-- Body -->



<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <h3>Nueva Tarea</h3>

      <div class="card">
        <div class="card-body">
          <!-- en action se dice a donde se envian los datos del form. y en method se coloca post, para poder recibirlos.-->
          <form class="" action="nueva_tarea.php" method="POST">
            <div class="mb-3">
            <input class="form-control" type="text" name="tarea_titulo" value="" placeholder="Escribir nueva tarea" autofocus>
            </div>
            <div class="mb-3">
            <textarea class="form-control" name="tarea_descripcion" rows="6" placeholder="Escribir descripcion de tarea"></textarea>
            </div>
            <div class="d-grid">
            <input <?php if (!isset($_SESSION['usuario'])) { echo 'disabled'; } ?>  class="btn btn-success " type="submit" name="submit_tarea" value="Enviar">
            </div>
          </form>
        </div>
      </div>

      <?php //mensaje de tarea creada borrada o editada
       if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-<?php echo $_SESSION['message_class'] ?> alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['message']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php unset($_SESSION["message"]); } //borramos la sesion de mensaje para que no vuelva a aparecer el mensaje una vez cerrado.  ?>

    </div>
    <div class="col-md-8">
      <h3 class="mt-3 mt-md-0">Listado de Tareas</h3>
      <div class="table-responsive-md">
      <table id="table_jgj" class="table  table-bordered table-info table-striped table-responsive ">
        <thead class="align-middle">
          <tr>

            <th scope="col">Titulo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha Creacion</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM crud_tareas";
            $resultadoTabla = mysqli_query($conn, $query);

            while ($columna = mysqli_fetch_array($resultadoTabla)) {   ?>

              <tr>

                <td><?php echo $columna['tarea_titulo']; ?></td>
                <td><?php echo $columna['tarea_descripcion']; ?></td>
                <td><?php echo $columna['tarea_tiempo']; ?></td>
                <td>
                  <?php if (isset($_SESSION['usuario'])) { ?>
                    <a   href="editar_tarea.php?id=<?php echo $columna['ID'];?>"><i class="bi bi-pencil-square btn btn-primary m-1 "></i></a>
                    <a href="borrar_tarea.php?id=<?php echo $columna['ID'];?>"><i class="bi bi-trash btn btn-danger m-1"></i></a>
                  <?php } ?>
                </td>
              </tr>

            <?php  }

           ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>






















<!-- End Body -->
<!-- Footer -->
<?php include('includes/footer.php'); ?>
