<?php  
session_start();
unset ($_SESSION['fechainic']);
unset ($_SESSION['fechafinal']);
unset ($_SESSION['vend']);
unset ($_SESSION['client']);
header('location: visualizarpedidoap_dsp.php');
?>