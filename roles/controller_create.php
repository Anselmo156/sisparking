<?php

include('../app/config.php');

$nombre = $_GET['nombre'];
$nombre = strtoupper($nombre);// CONVIERTE TODO A MAYÚCULAS

date_default_timezone_set("Europe/Madrid");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("INSERT INTO tb_roles 
        (nombre, fyh_creacion, estado) 
VALUES (:nombre, :fyh_creacion, :estado)");

$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_del_registro);

if($sentencia->execute()){
    echo "Registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    echo "No se pudo registrar a la Base de Datos";
}