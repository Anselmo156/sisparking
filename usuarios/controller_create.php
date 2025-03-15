<?php

include('../app/config.php');

$nombres = $_GET['nombres'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];

date_default_timezone_set('Europe/Madrid');
$fechaHora = date("Y-m-d h:i:s");

// echo $nombres.' - '.$email.' - '.$password_user;

$sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
        (nombres, email, password_user, fyh_creacion, estado) 
VALUES (:nombres, :email, :password_user, :fyh_creacion, :estado)");

$sentencia->bindParam('nombres', $nombres);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('password_user', $password_user);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_del_registro);

if($sentencia->execute()){
    echo "Registro Satisfactorio";
    // header('index.php');
    ?>
    <script>location.href = "../roles/asignar.php";</script>
    <?php
}else{
    echo "No se pudo registrar a la Base de Datos";
}