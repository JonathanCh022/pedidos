<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION['usu_nit']) ) {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }
  include '../conexion.php';

  $sqlgeneral="UPDATE empresa SET emp_raz_soc='".$_POST['rz']."', emp_email='".$_POST['mail']."',emp_telefono='".$_POST['telefono']."' WHERE emp_nit='".$_SESSION['emp_nit']."'";
  if ($mysqli->query($sqlgeneral) === TRUE) {
    header('Location: index.php?empresa=0');
  	
  }else{
    header('Location: index.php?empresa=1');
  }
  ?>	