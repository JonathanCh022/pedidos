<?php 
    include '../conexion.php';

   $fechaInicio =date("Y-m-d ", strtotime($_POST['fechainicial'])) ;
    $fechaFinal =date("Y-m-d ", strtotime($_POST['fechafinal'])) ;
    $vendedor = $_POST['vendedor'];
    $cliente = $_POST['cliente'];

    echo $fechaInicio;
    echo $fechaFinal;
    echo $vendedor;
    echo $cliente;
/*  
    $fechaInicio ="2016-07-03" ;
    $fechaFinal ="2016-07-05";
    $vendedor = "1";
    $cliente = "1"; 
 */
    $sqlpedidogeneral = "SELECT pdg_numero , pdg_fecha, pdg_cliente,pdg_estado, pdg_vendedor,pdg_estado FROM pedido_general WHERE pdg_cliente = '$cliente' AND pdg_vendedor = '$vendedor' AND pdg_fecha >= '$fechaInicio' AND pdg_fecha <= '$fechaFinal'" ;
   
    $resultado=  $mysqli->query($sqlpedidogeneral);
  
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



<body>

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

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=""><i class="fa fa-user fa-fw"></i> Opcion 1</a>
                        </li>
                        <li><a href=""><i class="fa fa-gear fa-fw"></i> Opcion 2</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href=""><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
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
                                <li>
                                    <a href="#">Aprovar/Desaprovar Pedidos</a>
                                </li>
                                
                                 <li>
                                    <a href="#">Adicionar Pedido</a>
                                    <!-- /.nav-third-level -->
                                </li>
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
                      <h1 class="page-header">Tabla Pedidos Vendedor</h1>
                    </div>
                    <div >
                        <h4>Pedidos del cliente: <?php echo "$cliente";?> vendedor:<?php echo "$vendedor";?> <br>
                            desde <?php echo "$fechaInicio";?> hasta   <?php echo "$fechaFinal";?></h4>
                    </div>
                    <div class="div3">
                    <table>
                        <tr>                    
                            <td style="height: 10px;">Nro</td>
                            <td style="height: 10px;">Fecha</td>
                            <td style="height: 10px;">Cliente</td>
                            <td style="height: 10px;">Vendedor</td>
                            <td style="height: 10px;">Valor</td>
                            <td style="height: 10px;">Estado</td>
                        </tr>
                        <?PHP    
                        $valor =0; 
                            if (mysqli_num_rows($resultado) > 0) {  
                             while($row = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td >";
                            echo '<a href="visualizarpedidosarticulo.php?id='.$row['pdg_numero'].'">'.$row['pdg_numero'].'</a>';
                            echo "</td>";
                            echo "<td >";
                            echo $row['pdg_fecha']; 
                            echo "</td>";
                            echo "<td >";
                            echo $row['pdg_cliente'];  
                            echo "</td>";
                            echo "<td >";
                            echo $row['pdg_vendedor']; 
                            echo "</td>";
                            echo "<td >";
                            $sqlarticulo="SELECT * FROM pedido_articulos WHERE pda_numero = '".$row['pdg_numero']."'";
                             $resultado2 =  $mysqli->query($sqlarticulo);
                              while($row2 = mysqli_fetch_assoc($resultado2)) {
                                    $cantidad = $row2['pda_cantidad_ped'];
                                    $ref = $row2['pda_referencia'];

                                    $sqlprecio="SELECT * FROM inventario WHERE inv_referencia = '$ref'";
                                    $resultado3 =  $mysqli->query($sqlprecio);
                                    while($row3 = mysqli_fetch_assoc($resultado3)) {
                                    $precio = $row3['inv_precio_vta'];
                                    $valor = $valor + $precio*$cantidad;

                                  }


                              }
                              echo $valor;
                            echo "</td>";
                            echo "<td >"; 
                            echo $row['pdg_estado'];  
                            echo "</td>";
                            echo "</tr>";   

                            }
                            } else {
                                echo "NO HAY USUARIOS REGISTRADOS";//login no exitoso
                            }                
                           
                            
                        ?> 
                    </table>
                </div>
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

    < Custom Theme JavaScript 
    <script src="../bootstrap/template01/dist/js/sb-admin-2.js"></script> 
</body>
<InstanceEnd --></html>