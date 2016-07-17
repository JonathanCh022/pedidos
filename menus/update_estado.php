<?php 
include '../conexion.php';
$newestad = $_POST['estado'];
$num = $_POST['nmo_ped'];
$sqlupdt = "UPDATE pedido_general SET pdg_estado = $newestad WHERE pdg_numero = '$num'" ; 
$mysqli->query($sqlupdt);
if ($newestad == 1) {
	$sqlupdt2 = "UPDATE pedido_articulos SET pda_estado = $newestad WHERE pda_numero ='$num'"  ; 
	$mysqli->query($sqlupdt2);
	header('location: aprobar_desaprobar.php?confirmacion=1');
	}elseif ($newestad == 2) {
		$sqlupdt2 = "UPDATE pedido_articulos SET pda_estado = $newestad WHERE pda_numero ='$num'"  ; 
		$mysqli->query($sqlupdt2);
		header('location: aprobar_desaprobar.php?confirmacion=1');
	}
header('location: aprobar_desaprobar.php?confirmacion=1');
?>