<?php

include('../app/config.php');

$id_ticket = $_GET['id'];
$espacio = $_GET['espacio'];

$estado_inactivo = "0";

date_default_timezone_set("Europe/Madrid");
$fechaHora = date("Y-m-d H:i:s");

$sentencia = $pdo->prepare("UPDATE tb_tickets SET
estado = :estado,
fyh_eliminacion = :fyh_eliminacion 
WHERE id_ticket = :id_ticket");

$sentencia->bindParam(':estado', $estado_inactivo);
$sentencia->bindParam(':fyh_eliminacion', $fechaHora);
$sentencia->bindParam(':id_ticket', $id_ticket);

if($sentencia->execute()){

    // Actualizando el estado del espacio de ocupado a libre
    $estado_espacio = "LIBRE";
    $sentencia2 = $pdo->prepare("UPDATE tb_mapeos SET
    estado_espacio = :estado_espacio,
    fyh_actualizacion = :fyh_actualizacion 
    WHERE nro_espacio = :nro_espacio");

    $sentencia2->bindParam(':estado_espacio', $estado_espacio);
    $sentencia2->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia2->bindParam(':nro_espacio', $espacio);

    if($sentencia2->execute()){
        echo "Se actualizó el estado del Espacio a libre";
        echo "Se eliminó el registro de la manera correcta";
        ?>
        <script>location.href = "../principal.php";</script>
        <?php
    }else{
        echo "Error al actualizar el campo nro de espacio del estado";
    }
}else{
    echo "Error al eliminar el registro";
}