<?php

include 'conexion.php';

$id = $_GET['id_editorial'];

$q = " DELETE FROM editorial WHERE id_editorial = $id ";

mysqli_query($con, $q);

header('location:index.php');
