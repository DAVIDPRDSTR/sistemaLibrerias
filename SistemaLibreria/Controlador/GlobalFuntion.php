<?php

namespace Controlador;

Class GlobalFunctions{
    
    public static function redirectPage($url,$msj ='', $permanent = false){}
    
    public static function baseUrl(){
        
        $host = $_SERVER['HTTP_HOST'];
        $root = substr($_SERVER['REQUEST_URI'], 0, -24);
        echo "http://$host/$root";
        return "http://$host/$root";
    }


}



