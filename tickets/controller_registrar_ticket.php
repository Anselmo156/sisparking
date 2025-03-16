<?php

include('../app/config.php');

$placa = $_GET['placa'];
$placa = strtoupper($placa);// CONVIERTE TODO A MAYÚSCULAS
$nombre_cliente = $_GET['nombre_cliente'];
$nombre_cliente = strtoupper($nombre_cliente);// CONVIERTE TODO A MAYÚSCULAS
$nit_ci = $_GET['nit_ci'];
$nit_ci = strtoupper($nit_ci);// CONVIERTE TODO A MAYÚSCULAS
$espacio = $_GET['espacio'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$user_sesion = $_GET['user_sesion'];
$estado_ticket = "OCUPADO";

date_default_timezone_set("Europe/Madrid");
$fechaHora = date("Y-m-d H:i:s");

$sentencia = $pdo->prepare('INSERT INTO tb_tickets
(placa_auto, nombre_cliente, nit_ci, espacio, fecha_ingreso, hora_ingreso, estado_ticket, user_sesion, fyh_creacion, estado)
VALUES ( :placa_auto, :nombre_cliente, :nit_ci, :espacio, :fecha_ingreso, :hora_ingreso, :estado_ticket, :user_sesion, :fyh_creacion, :estado)');

$sentencia->bindParam(':placa_auto', $placa);
$sentencia->bindParam(':nombre_cliente',$nombre_cliente);
$sentencia->bindParam(':nit_ci',$nit_ci);
$sentencia->bindParam(':espacio',$espacio);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
$sentencia->bindParam(':estado_ticket', $estado_ticket);
$sentencia->bindParam(':user_sesion',$user_sesion);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estado_del_registro);

if($sentencia->execute()){
    echo 'success';
    ?>
    <script>location.href = "tickets/generar_ticket.php";</script>
    <?php
}else{
    echo 'error al registrar a la base de datos';
}