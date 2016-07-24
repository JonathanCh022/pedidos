<?php 

header("Content-Type: text/html;charset=utf-8");
/*    session_start();
    if (!isset($_SESSION['usu_nit'])) {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }*/
include '../conexion.php';

if (isset($_GET['confirmacion'])) {
        $conf = $_GET['confirmacion'];
    }else {
        $conf = 0;
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
<style type="text/css">
    .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>

</head>



<body onload=" validarlogin(<?php echo "$conf";?>);">

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
                    <div class="col-lg-12" style="margin-top: 50px; ">
                      <h1 class="page-header">Cargar Vendedores</h1>
                    </div>
                    <div style="margin-top: 50px; ">
                        <h5>Cargue el archivo .csv con el siguiente orden pre-establecido <br><br>  Codigo vendedor | Nombre vendedor | Email | Telefono | id usuario</h5>
                    </div>
                    <div style="margin-top: 60px; ">
                        <form name="form1" method="POST" action="cargavnd.php" enctype="multipart/form-data">
                            <label>Escoga el archivo con la Nomina de los vendedores: </label>
                            <input id="uploadFile" placeholder="Choose File" disabled="disabled" value="" />
                            <div class="fileUpload btn btn-primary">
                                <span>Upload</span>
                                <input id="uploadBtn" type="file" class="upload" name="vnd" />
                            </div>
                            
                             <input class="btn btn-default" type="submit" value="Continuar" style="color: black;" />
                             <a class="btn btn-default" href="../menus/" style="color: black;">Cancelar </a>

                         </form>                        
                    </div>
                    
                    <!-- /.col-lg-12 -->
                    <!-- InstanceEndEditable -->
                </div>
                <!-- /.row -->

            </div>
            <div id="Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog " style="width: 27%; ">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div id="light" class="modal-body" style="background-color:#f5f5f0; ">
                           <div id="exito" class="panel " style="display:none;">
                                <div class="panel-body " >
                                    <span class="glyphicon glyphicon-saved " style="font-size:50px; margin-left:40%;"></span>
                                    <h3 class="text-center">Vendedores cargados satisfactoriamente.</h3>
                                </div>               
                            </div>
                            <div id="fallo" class="panel " style="display:none;">
                                <div class="panel-body " >
                                    <span class="glyphicon glyphicon-remove-sign " style="font-size:50px; margin-left:40%;"></span>
                                    <h3 class="text-center">El archivo subido no cumple con la extension (.csv).</h3>
                                </div>               
                            </div>                 
                      </div>          
                    </div>

                  </div>
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

    document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
    };

    function validarlogin(error){
       
    if (error == 1) {
           $( document ).ready( function() {
                $( '#Modal' ).modal( 'toggle' );
                $("#exito").css('display','block');
            });
           }else if(error == 2){

                $( document ).ready( function() {
                    $( '#Modal' ).modal( 'toggle' );
                    $("#fallo").css('display','block');
            });
           }
        }

  
</script>