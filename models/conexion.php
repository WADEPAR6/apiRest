<?php
class conexion
{
    public function conectar()
    {
        define("server", "localhost");
        define("user", "root");
        define("pass", "");
        define("db", "universidad");
        
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        try {
            $conexion = new PDO("mysql:host=" . server . ";dbname=" . db , user, pass, $opc);
            return $conexion;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            die("error en la conexion a la base de datos" . $e->getMessage());
        }
    }
}

