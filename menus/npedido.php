<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION['usu_nit'])) {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }
include '../conexion.php';	
$q = $_GET['q'];
$sql = "SELECT pdg_numero FROM pedido_general WHERE pdg_numero = '$q'";

$res = $mysqli->query($sql);
 if (mysqli_num_rows($res) > 0) {
 	echo "Este numero de pedido ya existe";
 }
?>