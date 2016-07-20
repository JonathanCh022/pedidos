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
$sqlvend = "SELECT ven_codigo , ven_nombre  FROM vendedores ";
$res = $mysqli->query($sqlvend);
while ($fila = $res->fetch_assoc()) {
        $arreglo[]=$fila['ven_codigo'];   
        $arreglo2[]=$fila['ven_nombre'];  
              
}

$sqlcli = "SELECT cli_cedula , cli_nombre, ven_codigo  FROM clientes ";
$res1 = $mysqli->query($sqlcli);
while ($row = $res1->fetch_assoc()) {
        $arreglo3[]=$row['cli_nombre'];   
        $arreglo4[]=$row['ven_codigo'];
         $arreglo5[]=$row['cli_cedula'];    
                
}

?>

<!doctype html>
<html><!-- InstanceBegin template="/Templates/template_admin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Distriabastos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" /> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/template01/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bootstrap/template01/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bootstrap/template01/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bootstrap/template01/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body onload="vendedor(); clt(); ">

<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Administración de Pedidos</a>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Menu General<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Empresa</a>
                                </li>
                                <li>
                                    <a href="#">Operaciones/Usuarios</a>
                                    <!-- /.nav-third-level -->
                                </li>                           
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-folder-close"></i> Pedidos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="visualizarpedidos.php">Visualizar Pedidos</a>
                                </li>
                                 <?php if($_SESSION['usu_rol'] == 0){ ?>
                                <li>
                                    <a href="visualizarpedidoap_dsp.php">Aprovar/Desaprovar Pedidos</a>
                                </li>
                                 <?php } ?>
                                <?php if($_SESSION['usu_rol'] == 1){ ?>
                                 <li>
                                    <a href="adicionarpedido.php">Adicionar Pedido</a>
                                    <!-- /.nav-third-level -->
                                </li>
                                <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Tablas<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Vendedores<span class="fa arrow"></span></a>
                                     <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Cargar</a>
                                        </li>
                                        <li>
                                            <a href="#">Editar</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                
                                
                                 <li>
                                    <a href="#">Clientes<span class="fa arrow"></span></a>
                                     <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Cargar</a>
                                        </li>
                                        <li>
                                            <a href="#">Editar</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Rutero<span class="fa arrow"></span></a>
                                     <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Cargar</a>
                                        </li>
                                        <li>
                                            <a href="#">Editar</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Inventario<span class="fa arrow"></span></a>
                                     <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Cargar</a>
                                        </li>
                                        <li>
                                            <a href="#">Editar</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <!-- InstanceBeginEditable name="EditRegion1" -->
                    <div class="col-lg-12">
                      <h1 class="page-header">Ver Pedidos</h1>
                    </div>
                    <form name="form1" method="post" action="visualizarpedidostabla.php">
                         <label>Fecha Desde: </label>
                        <input  type="text" class="form-control input-sm"   name="fechainicial" id="fecha1" style="cursor: hand;width:20%;" required > 
                        <label>Fecha Hasta: </label>
                        <input  type="text" class="form-control input-sm"   name="fechafinal" id="fecha2" style="cursor: hand;width:20%;" required >
                        <label class=" control-label" for="vendedor" >Vendedor : </label>   
                                    <select class="form-control  input-sm" name="vendedor"  onchange="clt()" required style="width:20%;">
                                    </select>
                         <label class=" control-label" for="vendedor" >Cliente : </label>   
                                    <select class="form-control  input-sm" name="cliente" required style="width:20%;">
                                    </select><br>
                         <input class="btn btn-default" type="submit" value="Continuar" style="color: black;" />
                        <a class="btn btn-default" href="../menus" style="color: black;">Cancelar </a>

                     </form>
                    <!-- /.col-lg-12 -->
                    <!-- InstanceEndEditable -->
              </div>
                <!-- /.row -->

            </div>

            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery 
    <script src="../bootstrap/template01/bower_components/jquery/dist/jquery.min.js"></script>

    < Bootstrap Core JavaScript 
    <script src="../bootstrap/template01/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <Metis Menu Plugin JavaScript -->
    <script src="../bootstrap/template01/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../bootstrap/template01/dist/js/sb-admin-2.js"></script> 
</body>
<InstanceEnd --></html>

<script type="text/javascript">

    function vendedor()
    {           
            var a = new Array();
            var b = new Array();
            var cont = 0;
            <?php
            for ($i = 0, $total = count($arreglo); $i < $total; $i ++) {               
                echo "\na[$i] = '$arreglo2[$i]';";
                echo "\nb[$i] = '$arreglo[$i]';";
            }
            ?>
            form1.vendedor.length=0;
            for (var i = 0; i < a.length; i++) {            
                opcion0 = new Option(a[i],b[i]);
                document.forms.form1.vendedor.options[cont]=opcion0;
                cont++;         
            }
    }

  function clt() {
            var index = document.forms.form1.vendedor.value ;
          
           // index = index + 1 ;

            var x = new Array();
            var y = new Array();
            var z = new Array();
            var con=0;
            <?php
            for ($j = 0, $tot = count($arreglo3); $j < $tot; $j ++) {
                echo "\nx[$j] = '$arreglo3[$j]';"; 
                echo "\ny[$j] = '$arreglo4[$j]';";
                echo "\nz[$j] = '$arreglo5[$j]';";

            }
            ?>
            form1.cliente.length=0;
           
            for (var j = 0; j < x.length; j++) {
            
            
            if (y[j]==index) {
                opcion0=new Option(x[j],z[j]);
                document.forms.form1.cliente.options[con]=opcion0;
                con++;
            }
            }
    } 



    $( document ).ready(function() {
            $('#fecha1').datepicker();
            $('#fecha2').datepicker();
        });

  
</script>