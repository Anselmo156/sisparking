<?php
include('../app/config.php');

$nombre_parqueo = $_GET['nombre_parqueo'];
$nombre_parqueo = strtoupper($nombre_parqueo);// CONVIERTE TODO A MAYÚCULAS
$actividad_empresa = $_GET['actividad_empresa'];
$actividad_empresa = strtoupper($actividad_empresa);// CONVIERTE TODO A MAYÚCULAS
$sucursal = $_GET['sucursal'];
$direccion = $_GET['direccion'];
$direccion = strtoupper($direccion);// CONVIERTE TODO A MAYÚCULAS
$zona = $_GET['zona'];
$zona = strtoupper($zona);// CONVIERTE TODO A MAYÚCULAS
$telefono = $_GET['telefono'];
$departamento_ciudad = $_GET['departamento_ciudad'];
$departamento_ciudad = strtoupper($departamento_ciudad);// CONVIERTE TODO A MAYÚCULAS
$pais = $_GET['pais'];
$pais = strtoupper($pais);// CONVIERTE TODO A MAYÚCULAS
$id_informacion = $_GET['id_informacion'];

date_default_timezone_set("Europe/Madrid");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_informaciones SET 
nombre_parqueo = :nombre_parqueo, 
actividad_empresa = :actividad_empresa, 
sucursal = :sucursal, 
direccion = :direccion, 
zona = :zona, 
telefono = :telefono, 
departamento_ciudad = :departamento_ciudad, 
pais = :pais, 
fyh_actualizacion = :fyh_actualizacion 
WHERE id_informacion = :id_informacion");

$sentencia->bindParam(':nombre_parqueo', $nombre_parqueo);
$sentencia->bindParam(':actividad_empresa', $actividad_empresa);
$sentencia->bindParam(':sucursal', $sucursal);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':zona', $zona);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':departamento_ciudad', $departamento_ciudad);
$sentencia->bindParam(':pais', $pais);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_informacion', $id_informacion);

if($sentencia->execute()){
    echo 'success';
    //header('Location:' .$URL.'/');
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
}else{
    echo 'Error al registrar a la base de datos';
}