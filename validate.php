<?php 
	include 'conexion.php';
	$empresa=$_POST['Empresa'];
	$usuario=$_POST['Usuario'];
	$pass=$_POST['Password'];

	$sql="SELECT usu_nombre FROM usuarios WHERE usu_nombre = '$usuario' AND usu_clave = '$pass'";	
    $result = $mysqli->query($sql);


	if (mysqli_num_rows($result) > 0) {
						
   					 while($row = mysqli_fetch_assoc($result)) {
   					 	session_start();
   					 $_SESSION['name']=$row['usu_nombre'];
   					 header('Location: vista_general.php');
   					 }
   					}else{
   						header('Location: ../pedidos/login.php?errorusuario=si');
   					}
?>	

