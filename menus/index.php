<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION['usu_nit'])) {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
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
                                            <a href="cargarvendedores.php">Cargar</a>
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
                                            <a href="cargarclientes.php">Cargar</a>
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
                                            <a href="cargarrutero.php">Cargar</a>
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
                                            <a href="cargarinventario.php">Cargar</a>
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
                      <h1 class="page-header">Contenido General</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                    <!-- InstanceEndEditable -->
              </div>
              <?php


              if (isset($_GET['pedido'])) {
                $pedido = $_GET['pedido'];
                echo "Se ha realizado exitosamento el pedido ".$pedido.".";
            }

                ?>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bootstrap/template01/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/template01/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bootstrap/template01/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../bootstrap/template01/dist/js/sb-admin-2.js"></script>
</body>
<!-- InstanceEnd --></html>


