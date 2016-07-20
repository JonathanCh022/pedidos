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
  echo $_POST['i'];
  $index = $_POST['i'];
  for ($i=1; $i <= $index; $i++) {
  	echo $_POST['ref'.$i];
  	# code...
  }
  ?>	