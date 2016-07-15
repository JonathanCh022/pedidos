<?php
  include '../conexion.php';
  echo $_POST['i'];
  $index = $_POST['i'];
  for ($i=1; $i <= $index; $i++) {
  	echo $_POST['ref'.$i];
  	# code...
  }
  ?>	