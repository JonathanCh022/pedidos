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
$q = intval($_GET['q']);
$articulo = $_GET['p'];

$sql = "SELECT inv_existencias FROM inventario WHERE inv_referencia = '$articulo'";

$res = $mysqli->query($sql);
while ($fila = $res->fetch_assoc()) {
    $existencias=$fila["inv_existencias"];
}
if ($q>$existencias) {
    echo "no hay suficientes existencias!";

    # code...
}else{
}

?>