<?php 

include_once "../models/borrar.php";
include_once "../models/consulta.php";
include_once "../models/guardar.php";
include_once "../models/actualizar.php";

$opc = $_SERVER['REQUEST_METHOD'];

if ($_POST['_method'] ?? false) {
    $opc = $_POST['_method'];
}

switch($opc){
    case 'GET':
        $id = $_GET['id'] ?? null;
        crudS::seleccionarPorEstudiantes($id);
        
       //$resultado = crudS::seleccionarEstudiante();
        break;
    case 'POST':
        crudG::guardarEstudiante();
        $resultado = 'post hola';
        echo $resultado;
        break; 
    case 'DELETE':
        crudB::borrarEstudiante();
        break;
    case 'PUT':
        $resultado = crudA::actualizarEstudiante();
        echo json_encode($resultado);
        break; 
}

