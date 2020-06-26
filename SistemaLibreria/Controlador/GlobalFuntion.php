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

        $host = $_SERVER['HTTP_HOST'];
        $root = substr($_SERVER['SCRIPT_NAME'], 0, -17);
        return "http://$host/$root";
    }


}



