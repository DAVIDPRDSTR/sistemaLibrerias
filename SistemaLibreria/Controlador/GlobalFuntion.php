<?php

namespace Controlador;

Class GlobalFunctions
{

    public static function redirectPage($url, $msj = '', $permanent = false)
    {
        if ($msj) {
            $url = $url . '?msj=' . $msj;
        }
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    }

    public static function baseUrl()
    {

        //return "http://".$_SERVER['Server_name']."/Libreria";
        return "http://localhost/sistemaLibrerias/SistemaLibreria";
    }


}



