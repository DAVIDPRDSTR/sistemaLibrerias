<?php

namespace controlador;
/**
 * Created by PhpStorm.
 * User: FRANK
 * Date: 25/05/2020
 * Time: 15:33
 */

function executeSelectAll($sql, $conexion)
{
    return $conexion->query($sql)->fetchAll();
}

function executeSelectOne($sql, $conexion)
{
    return $conexion->query($sql)->fetch();
}

function executeCommand($sql, $conexion)
{
    return $conexion->exec($sql);
}

