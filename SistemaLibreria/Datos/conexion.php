<?php
try {
    $pdo=new PDO("mysql:dbname=sistemalibreria;host=localhost","root","");
    
} catch (Exception $ex) {
    die('Error'.$ex->getMessage());
}


?>

