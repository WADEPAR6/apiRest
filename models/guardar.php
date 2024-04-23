<?php

class crudG{
    public static function guardarEstudiante(){
    include 'conexion.php';
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $objeto = new Conexion();
    $conexion = $objeto->conectar();
    $consulta = "INSERT INTO estudiantes (cedula, nombre, apellido, direccion, telefono) 
    VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono')";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    echo json_encode($resultado);
    }}
