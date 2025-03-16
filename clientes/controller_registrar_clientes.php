<?php

include('../app/config.php');

$nombre_cliente = $_GET['nombre_cliente'];
$nombre_cliente = strtoupper($nombre_cliente);// CONVIERTE TODO A MAYÚCULAS
$nit_ci_cliente = $_GET['nit_ci'];
$nit_ci_cliente = strtoupper($nit_ci_cliente);// CONVIERTE TODO A MAYÚCULAS
$placa_auto = $_GET['placa'];
$placa_auto = strtoupper($placa_auto);// CONVIERTE TODO A MAYÚCULAS

date_default_timezone_set("Europe/Madrid");
$fechaHora = date("Y-m-d H:i:s");

// BUSCA SI EL CLIENTE YA ESTA REGISTRADO
$contador_cliente = 0;
$query_clientes = $pdo->prepare("SELECT * FROM tb_clientes WHERE placa_auto = '$placa_auto' AND estado = '1'");
$query_clientes->execute();
$datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);
foreach($datos_clientes as $datos_cliente){
    $contador_cliente = $contador_cliente + 1;
}
if($contador_cliente == "0"){
    // echo "No hay ningun registro igual";
    ?>
    <div class="alert alert-success">
        No hay ningun registro igual
    </div>
    <?php
    $sentencia = $pdo->prepare('INSERT INTO tb_clientes (nombre_cliente, nit_ci_cliente, placa_auto, fyh_creacion, estado)
    VALUES (:nombre_cliente, :nit_ci_cliente, :placa_auto, :fyh_creacion, :estado)');

    $sentencia->bindParam(':nombre_cliente', $nombre_cliente);
    $sentencia->bindParam(':nit_ci_cliente', $nit_ci_cliente);
    $sentencia->bindParam(':placa_auto', $placa_auto);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_del_registro);

    if($sentencia->execute()){
        echo 'success';
        //header('Location:' .$URL.'/');
    }else{
        echo "Error al registrar a la base de datos";
    }
}else{
    // echo "Este cliente ya es encuentra registrado";
    ?>
    <div class="alert alert-danger">
        Este Cliente ya es encuentra registrado
    </div>
    <?php
}