<?php

class crudA{
    public static function ActualizarEstudiante(){
        include 'conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto -> Conectar();

        parse_str(file_get_contents("php://input"), $data);
        
        $Cedula = $data["cedula"];
        $Nombre = $data["nombre"];
        $Apellido = $data["apellido"];
        $Direccion = $data["direccion"];
        $Telefono = $data["telefono"];

        $consulta = "UPDATE estudianteS set nombre = '$Nombre', apellido = '$Apellido', direccion = '$Direccion',
                                        telefono='$Telefono' WHERE cedula = '$Cedula'";

        $resultado = $conexion -> prepare($consulta);
        $resultado -> execute();
        $dato = "Se actualizo correctamente";
        echo json_encode($dato);
         }
}

?>