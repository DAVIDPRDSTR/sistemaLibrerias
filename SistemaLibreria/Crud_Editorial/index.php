
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Editorial</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

    </head>

    <body>

        <div class="container">
            <div class="col-lg-12">
                <br><br>
                <h1 class="text-warning text-center"> Editorial </h1>
                <br>
                <a href="insert.php" class="btn btn-primary">Agregar</a>
                <table id="tabledata" class=" table table-striped table-hover table-bordered">

                    <tr class="bg-dark text-white text-center">

                        <th> Id </th>
                        <th> Nombre </th>
                        <th> Dirección </th>
                        <th> E-mail </th>
                        <th colspan="2" style="text-align: center;"> Acciones </th>

                    </tr>

                    <?php
                    include 'conexion.php';
                    $q = "select * from editorial ";

                    $query = mysqli_query($con, $q);

                    while ($res = mysqli_fetch_array($query)) {
                        ?>
                        <tr class="text-center">
                            <td> <?php echo $res['id_editorial']; ?> </td>
                            <td> <?php echo $res['nombre']; ?> </td>
                            <td> <?php echo $res['direccion']; ?> </td>
                            <td> <?php echo $res['email']; ?> </td>
                            <td> <button class="btn-danger btn"> <a href="delete.php?id_editorial=<?php echo $res['id_editorial']; ?>" class="text-white"> Eliminar </a> </button> </td>
                            <td> <button class="btn-primary btn"> <a href="update.php?id_editorial=<?php echo $res['id_editorial']; ?>" class="text-white"> Actualizar </a> </button> </td>

                        </tr>

                        <?php
                    }
                    ?>

                </table>

            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#tabledata').DataTable();
            })
        </script>

    </body>
    <footer
        style="text-align: center; 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        font-style: italic;
        background-color: black;
        position: absolute;
        bottom: 0;
        margin-left: 0.5%;
        width: 99%;
        height: 30px;
        color: white;">
        <p><small>Grupo 3</small></p>
    </footer>

</html>
