<?php
include '../conexion.php';
$q = $_GET['q'];

$sql = "SELECT * FROM inventario WHERE inv_referencia = '$q'";

$res = $mysqli->query($sql);
while ($fila = $res->fetch_assoc()) {
    echo $fila["inv_precio_vta"];
}

?>