<?php

class crudB{
    public static function borrarEstudiante(){

    include 'conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->conectar();
    $cedula = $_GET['cedula'];
    $borrarSql = "DELETE FROM estudiantes WHERE cedula = '$cedula'";
    $resultado = $conexion->prepare($borrarSql);
    $resultado->execute();
    echo json_encode($resultado);

    }}

