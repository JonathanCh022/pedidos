<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION['usu_nit']) || $_SESSION['usu_rol']!== '1') {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }
  include '../conexion.php';
  $fech=date("Y-m-d", strtotime($_POST['fecha']));
  $time=date("H:i:s", strtotime($_POST['fecha']));
  $index = $_POST['i'];
  $sqlgeneral="INSERT INTO pedido_general (pdg_numero,pdg_fecha,pdg_cliente,pdg_estado,pdg_vendedor,pdg_hora,pdg_latitud,pdg_longitud) VALUES ('".$_POST['npedido']."','$fech','".$_POST['cliente']."','0','".$_POST['vendedor']."','$time','0','0')";
  if ($mysqli->query($sqlgeneral) === TRUE) {

  	for ($i=1; $i <= $index; $i++) {
  		$sqlarticulo = "INSERT INTO pedido_articulos (pda_numero,pda_referencia,pda_descuento,pda_cantidad_ped,pda_cantidad_apro,pda_cantidad_factu,pda_estado) VALUES ('".$_POST['npedido']."','".$_POST['ref'.$i]."','".$_POST['descuento'.$i]."','".$_POST['cantidad'.$i]."','0','0','0')";

  		if ($mysqli->query($sqlarticulo) === TRUE) {
  			header('Location: index.php?pedido='.$_POST['npedido']);
  		}else{
  			echo "problema con los articulos";
  			echo "Error: " . $sqlarticulo . "<br>" . $mysqli->error;
  		}
 	}
  	
  }else{
  	echo "error general";
  	echo "Error: " . $sqlgeneral . "<br>" . $mysqli->error;
  }
  ?>	