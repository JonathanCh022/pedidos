<?php 
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION['usu_nit']) || $_SESSION['usu_rol']!== '0') {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }
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