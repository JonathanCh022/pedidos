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

$sql = "SELECT * FROM inventario WHERE inv_referencia = '$q'";

$res = $mysqli->query($sql);
while ($fila = $res->fetch_assoc()) {
    echo $fila["inv_precio_vta"];
}

?>