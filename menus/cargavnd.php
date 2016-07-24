<?php 


/*    session_start();
    if (!isset($_SESSION['usu_nit'])) {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }*/
include '../conexion.php';

$archivo_nombre = $_FILES['vnd']['name'];
$archivo_tipo = $_FILES['vnd']['type'];
$archivo_tamaño = $_FILES['vnd']['size'];
$archivo_error = $_FILES['vnd']['tmp_name'];

$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
$target_path = "tmp_tablas/".basename($archivo_nombre);

if (in_array($_FILES['vnd']['type'],$mimes)){
	if(move_uploaded_file($_FILES['vnd']['tmp_name'], $target_path)) {
			$fp = fopen ("$target_path", "r");
			$borrartablaexist = "truncate vendedores";
			$mysqli->query($borrartablaexist);

			while ($data = fgetcsv ($fp, 1000, ";")){				

				$insertar="INSERT INTO vendedores (ven_codigo,ven_nombre,ven_email,ven_telefono,usu_nit)
				VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."')";

				$mysqli->query($insertar);

			}

			fclose($fp);
			header("Location: cargarvendedores.php?confirmacion=1");
	} 
}else {
	header("Location: cargarvendedores.php?confirmacion=2");
}

?>