<?php 


/*    session_start();
    if (!isset($_SESSION['usu_nit'])) {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }*/
include '../conexion.php';

$archivo_nombre = $_FILES['clt']['name'];
$archivo_tipo = $_FILES['clt']['type'];
$archivo_tamaño = $_FILES['clt']['size'];
$archivo_error = $_FILES['clt']['tmp_name'];

$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
$target_path = "tmp_tablas/".basename($archivo_nombre);

if (in_array($_FILES['clt']['type'],$mimes)){
	if(move_uploaded_file($_FILES['clt']['tmp_name'], $target_path)) {
			$fp = fopen ("$target_path", "r");
			$borrartablaexist = "truncate clientes";
			$mysqli->query($borrartablaexist);

			while ($data = fgetcsv ($fp, 1000, ";")){				

				$insertar="INSERT INTO clientes (cli_cedula,ven_codigo,cli_nombre,cli_negocio,cli_direccion,cli_email,cli_telefono,cli_latitud,cli_longitud)
				VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[9]."')";

				$mysqli->query($insertar);

			}

			fclose($fp);
			header("Location: cargarclientes.php?confirmacion=1");
	} 
}else {
	header("Location: cargarclientes.php?confirmacion=2");
}

?>