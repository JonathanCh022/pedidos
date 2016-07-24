<?php 


/*    session_start();
    if (!isset($_SESSION['usu_nit'])) {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }*/
include '../conexion.php';

$archivo_nombre = $_FILES['rut']['name'];
$archivo_tipo = $_FILES['rut']['type'];
$archivo_tamaño = $_FILES['rut']['size'];
$archivo_error = $_FILES['rut']['tmp_name'];

$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
$target_path = "tmp_tablas/".basename($archivo_nombre);

if (in_array($_FILES['rut']['type'],$mimes)){
	if(move_uploaded_file($_FILES['rut']['tmp_name'], $target_path)) {
			$fp = fopen ("$target_path", "r");
			$borrartablaexist = "truncate rutero";
			$mysqli->query($borrartablaexist);

			while ($data = fgetcsv ($fp, 1000, ";")){				

				$insertar="INSERT INTO rutero (rut_vendedor,rut_dia,rut_cliente,rut_orden)
				VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."')";

				$mysqli->query($insertar);

			}

			fclose($fp);
			header("Location: cargarrutero.php?confirmacion=1");
	} 
}else {
	header("Location: cargarrutero.php?confirmacion=2");
}

?>