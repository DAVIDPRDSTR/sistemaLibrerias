<?php
include 'conexion.php';

if (isset($_POST['done'])) {

    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $q = "INSERT INTO `editorial` (`nombre`, `direccion`, `email`, `estado`) VALUES ('$nombre', '$direccion', '$email','$estado')";

    $query = mysqli_query($con, $q);

    header('location:index.php');
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Insertar editorial</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>

    <body>

        <div class="col-lg-6 m-auto">

            <form method="post">

                <br><br>
                <div class="card">

                    <div class="card-header bg-dark">
                        <h1 class="text-white text-center"> Insertar editorial </h1>
                    </div><br>
                    <h6>Complete todos los campos</h6>
                    <label> Nombre: </label>
                    <input type="text" name="nombre" class="form-control"> <br>

                    <label> Dirección: </label>
                    <input type="text" name="direccion" class="form-control"> <br>

                    <label> E-mail: </label>
                    <input type="text" name="email" class="form-control"> <br>

                    <label> Estado: </label>
                    <select class="custom-select" name="estado">
                        <option selected disabled value="">Seleccione un estado</option>
                        <option value="A">Activo</option>
                        <option value="I">Inactico</option>
                    </select><br>

                    <button class="btn btn-success" type="submit" name="done"> Confirmar </button><br>
                    <a href="index.php" class="btn btn-secondary" role="button">Cancelar</a><br>

                </div>
            </form>
        </div>
    </body>
</html>