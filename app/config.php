<?php

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'sisparking');

$servidor = "mysql:dbname=".BD."; host=".SERVIDOR;

try{
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // echo "La conexión a la Base de Datos fué exitosa";
}catch (PDOException $e){
    // echo "Error a la Base de Datos";
    echo "<script>alert('Error en la Conexión a la Base de Datos');</script>";
}

$URL = 'http://localhost/sisparking';

$estado_del_registro = "1";
