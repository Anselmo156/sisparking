<?php

include('../app/config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$nombre_cliente = strtoupper($nombre_cliente);// CONVIERTE TODO A MAYÚSCULAS
$nit_ci_cliente = $_GET['nit_ci_cliente'];
$nit_ci_cliente = strtoupper($nit_ci_cliente);// CONVIERTE TODO A MAYÚSCULAS
$placa_auto = $_GET['placa_auto'];
$placa_auto = strtoupper($placa_auto);// CONVIERTE TODO A MAYÚSCULAS
$id_cliente = $_GET['id_cliente'];


date_default_timezone_set("Europe/Madrid");
$fechaHora = date("Y-m-d H:i:s");
//echo $nombres."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE tb_clientes SET
nombre_cliente = :nombre_cliente,
nit_ci_cliente = :nit_ci_cliente,
placa_auto = :placa_auto,
fyh_actualizacion = :fyh_actualizacion 
WHERE id_cliente = :id_cliente");

$sentencia->bindParam(':nombre_cliente', $nombre_cliente);
$sentencia->bindParam(':nit_ci_cliente', $nit_ci_cliente);
$sentencia->bindParam(':placa_auto', $placa_auto);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);
$sentencia->bindParam(':id_cliente', $id_cliente);

if($sentencia->execute()){
    echo "Se actualizó el registro de la manera correcta";
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    echo "Error al actualizar el registro";
}