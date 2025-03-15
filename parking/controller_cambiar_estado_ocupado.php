<?php

include('../app/config.php');

$espacio = $_GET['espacio'];
$estado_espacio = "OCUPADO";

date_default_timezone_set("Europe/Madrid");
$fechaHora = date("Y-m-d H:i:s");
//echo $nombres."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE tb_mapeos SET
estado_espacio = :estado_espacio,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_map = :id_map");

$sentencia->bindParam(':estado_espacio', $estado_espacio);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_map', $espacio);

if($sentencia->execute()){
    echo "Se actualizó el registro de la manera correcta";
    ?>
    <!-- <script>location.href = "../usuarios/";</script> -->
    <?php
}else{
    echo "Error al actualizar el registro";
}