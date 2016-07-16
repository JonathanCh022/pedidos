<?php 
include '../conexion.php';
$id = $_POST['id'];
$newestad = $_POST['estado'];
$num = $_POST['nmo_ped'];
$referenc = $_POST['ref_ped'];
$sqlupdt = "UPDATE pedido_articulos SET pda_estado = $newestad WHERE pda_numero = '$num' AND  pda_referencia = '$referenc'" ; 
$mysqli->query($sqlupdt);

$sqlaprob = "SELECT pda_estado FROM  pedido_articulos WHERE pda_numero = $id";
$result = $mysqli->query($sqlaprob);
while ($rw = $result->fetch_assoc()) {       
		$estado[]=$rw['pda_estado']; 		              
	}
$a = 0;
$d = 0;

for ($i=0; $i < count($estado); $i++) { 
	if ($estado[$i]== 1) {
		$a++;
	}elseif ($estado[$i]== 2) {
		$d++;
	}
}

$sqlupdt1 = "UPDATE pedido_general SET pdg_estado = 1 WHERE pdg_numero = '$num'";
$sqlupdt2 = "UPDATE pedido_general SET pdg_estado = 2 WHERE pdg_numero = '$num'";
$sqlupdt3 = "UPDATE pedido_general SET pdg_estado = 3 WHERE pdg_numero = '$num'";

if ($a == count($estado)) {
	$mysqli->query($sqlupdt1);
}elseif ($d == count($estado)) {
	$mysqli->query($sqlupdt2);
}else{
	$mysqli->query($sqlupdt3);
}




//header('location: visualizarpedidosarticuloap_dsp.php?id='.$id.'');
?>