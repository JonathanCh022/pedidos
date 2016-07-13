<?php 
include '../conexion.php';
$newestad = $_POST['estado'];
$num = $_POST['nmo_ped'];
$sqlupdt = "UPDATE pedido_general SET pdg_estado = $newestad WHERE pdg_numero = '$num'" ; 
$mysqli->query($sqlupdt);
?>