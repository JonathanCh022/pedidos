<?php
include '../conexion.php';
$q = intval($_GET['q']);
$articulo = "leche";

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