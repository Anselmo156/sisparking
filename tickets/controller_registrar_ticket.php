<?php

include('../app/config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$nit_ci = $_GET['nit_ci'];
$espacio = $_GET['espacio'];
$fecha_ingreso = $_GET['fecha_ingreso'];
$hora_ingreso = $_GET['hora_ingreso'];
$user_sesion = $_GET['user_sesion'];

date_default_timezone_set("Europe/Madrid");
$fechaHora = date("Y-m-d H:i:s");

$sentencia = $pdo->prepare('INSERT INTO tb_tickets
(nombre_cliente,nit_ci,espacio,fecha_ingreso,hora_ingreso,user_sesion, fyh_creacion, estado)
VALUES ( :nombre_cliente,:nit_ci,:espacio,:fecha_ingreso,:hora_ingreso,:user_sesion,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_cliente',$nombre_cliente);
$sentencia->bindParam(':nit_ci',$nit_ci);
$sentencia->bindParam(':espacio',$espacio);
$sentencia->bindParam(':fecha_ingreso',$fecha_ingreso);
$sentencia->bindParam(':hora_ingreso',$hora_ingreso);
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