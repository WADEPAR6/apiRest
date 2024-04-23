<?php
include 'conexion.php';

class crudS
{

    public static function seleccionarEstudiante()
    {
        $cnx = new Conexion();
        $conexion = $cnx->conectar();
        $sqlSelect = "select * from estudiantes";
        $resultado = $conexion->prepare($sqlSelect);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function seleccionarPorEstudiantes($id)
    {
        $cnx = new Conexion();
        $conexion = $cnx->conectar();

        if ($id !== null) {
            $sqlSelect = "SELECT * FROM estudiantes WHERE cedula = :id";
            $resultado = $conexion->prepare($sqlSelect);
            $resultado->bindParam(':id', $id);
        } else {
            $sqlSelect = "SELECT * FROM estudiantes";
            $resultado = $conexion->prepare($sqlSelect);
        }

        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }
}
