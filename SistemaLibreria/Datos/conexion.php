<?php
try {
    $pdo=new PDO("mysql:dbname=libreria;host=localhost","root","");

    
    
} catch (Exception $ex) {
    die('Error'.$ex->getMessage());
}

?>

