<?php
try {
    $pdo=new PDO("mysql:dbname=libreria;host=35.192.84.36","6ANOCTURNO","6aNOCT@**");
    
} catch (Exception $ex) {
    die('Error'.$ex->getMessage());
}

?>

