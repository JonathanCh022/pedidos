<?php 


/*    session_start();
    if (!isset($_SESSION['usu_nit'])) {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }*/
include '../conexion.php';

$archivo_nombre = $_FILES['inv']['name'];
$archivo_tipo = $_FILES['inv']['type'];
$archivo_tamaño = $_FILES['inv']['size'];
$archivo_error = $_FILES['inv']['tmp_name'];

$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
$target_path = "tmp_tablas/".basename($archivo_nombre);

if (in_array($_FILES['inv']['type'],$mimes)){
	if(move_uploaded_file($_FILES['inv']['tmp_name'], $target_path)) {
			$fp = fopen ("$target_path", "r");
			$borrartablaexist = "truncate inventario";
			$mysqli->query($borrartablaexist);

			while ($data = fgetcsv ($fp, 1000, ";")){				

				$insertar="INSERT INTO inventario (inv_referencia,inv_descripcion,inv_porc_iva,inv_precio_vta,inv_existencias,inv_pedidas)
				VALUES ('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."')";

				$mysqli->query($insertar);

			}

			fclose($fp);
			header("Location: cargarinventario.php?confirmacion=1");
	} 
}else {
	header("Location: cargarinventario.php?confirmacion=2");
}

?>