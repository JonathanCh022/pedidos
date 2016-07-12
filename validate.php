<?php 
	include 'conexion.php';
	$empresa=$_POST['Empresa'];
	$usuario=$_POST['Usuario'];
	$pass=$_POST['Password'];

	$sql="SELECT usu_nit,usu_nombre,usu_clave,usu_rol FROM usuarios WHERE usu_nit = '$usuario' AND usu_clave = '$pass'";	
    $result = $mysqli->query($sql);

    $sql2="SELECT emp_nit,emp_raz_soc,emp_email,emp_telefono FROM empresa WHERE emp_nit = '$empresa'";	
    $result2 = $mysqli->query($sql2);


	if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0) {
					session_start();
					 while($row = mysqli_fetch_assoc($result2)) {	   					 
	   					 $_SESSION['emp_nit']=$row['emp_nit'];
	   					 $_SESSION['emp_raz_soc']=$row['emp_raz_soc'];
	   					 $_SESSION['emp_email']=$row['emp_email'];
	   					 $_SESSION['emp_telefono']=$row['emp_telefono'];
	   					 
   					 }

   					 while($row1 = mysqli_fetch_assoc($result)) {	   					 
	   					 $_SESSION['usu_nit']=$row1['usu_nit'];
	   					 $_SESSION['usu_name']=$row1['usu_nombre'];
	   					 $_SESSION['usu_clave']=$row1['usu_clave'];
	   					 $_SESSION['usu_rol']=$row1['usu_rol'];
	   					 
   					 }header('Location: menus/');
   					}else{
   						header('Location: ../pedidos/index.php?errorusuario=si');
   					}
?>	

