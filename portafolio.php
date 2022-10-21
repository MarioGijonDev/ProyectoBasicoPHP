<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php

    if($_POST){

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $imagen = $_FILES['archivo']['name'];

        $fecha = new DateTime();

        $imagen = $fecha->getTimestamp()."_".$imagen;

        $imagen_temporal = $_FILES['archivo']['tmp_name'];
        move_uploaded_file($imagen_temporal, "img/".$imagen);

        $cnt = new Conexion();
        $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
        $cnt->ejecutar($sql);

        header("location:portafolio.php");
    }

    if($_GET){
        $cnt = new Conexion();

        $idBorrar = $_GET['borrar'];

        $imgBorrada = $cnt->consultar("SELECT imagen FROM `proyectos` WHERE id = ".$idBorrar);

        unlink("img/".$imgBorrada[0]['imagen']);

        $sql = "DELETE FROM proyectos WHERE id = ".$idBorrar;
        $cnt->ejecutar($sql);
    }

    $cnt =  new Conexion();

    $proyectos = $cnt->consultar("SELECT * FROM `proyectos`");

?>










<br>
    <div class="container">
        <div class="row">

            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Datos del proyecto
                    </div>
                    <div class="card-body">
                        <form action="portafolio.php" method="post" enctype="multipart/form-data">

                            <label for="nombre" class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" required>

                            <br>

                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="6"></textarea>

                            <br>

                            <label for="archivo" class="form-label">Imagen del proyecto</label>
                            <input class="form-control" type="file" name="archivo" id="archivo" required>

                            <br>

                            <input class="btn btn-primary" type="submit" value="Enviar proyecto">

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($proyectos as $proyecto) { ?>
                            <tr>
                                <td><?php echo $proyecto['id']?></td>
                                <td><?php echo $proyecto['nombre']?></td>
                                <td>  <img src="img/<?php echo $proyecto['imagen']?>" width="100" alt=""></td>
                                <td><?php echo $proyecto['descripcion']?></td>
                                <td><a name="" id="" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'] ?>" role="button">Eliminar</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

<?php include ("pie.php"); ?>