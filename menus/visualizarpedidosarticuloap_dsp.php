<?php 
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION['usu_nit']) || $_SESSION['usu_rol']!== '0') {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }
  $id= $_GET["id"];
    include '../conexion.php';

  /*  $fechaInicio =date("Y-m-d ", strtotime($_POST['fechainicial'])) ;
    $fechaFinal =date("Y-m-d ", strtotime($_POST['fechafinal'])) ;
    $vendedor = $_POST['vendedor'];
    $cliente = $_POST['cliente']; */

    if (isset($_GET['confirmacion'])) {
		$conf = $_GET['confirmacion'];
	}else {
		$conf = 0;
	}

    $sqlpedidoarticulo = "SELECT * FROM pedido_articulos WHERE   pda_numero = '$id' ";
   
    $resultado =  $mysqli->query($sqlpedidoarticulo);
    $rest=  $mysqli->query($sqlpedidoarticulo);
      while ($fila = $rest->fetch_assoc()) {       
        $est[]=$fila['pda_estado']; 

    }
  
    $estados = [
     "Reportado",
     "Aprobado",
     "Rechazado",
     "Pendiente"
    ];    
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
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
     <!-- <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> -->
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
        .clwhite{
            color: white;
        }

        .trtit{
            background-color:#1a75ff;
        }

        table {
            overflow:hidden;
            border:1px solid #d3d3d3;
            background:#fefefe;
            width:70%;
            margin:5% auto 0;
            -moz-border-radius:5px; /* FF1+ */
            -webkit-border-radius:5px; /* Saf3-4 */
            border-radius:5px;
            -moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
        }
        th {
            padding:18px 28px 18px; 
            text-align:center; 
            padding-top:22px;            
            border-top:1px solid #e0e0e0;  
            border-right:1px solid #e0e0e0;          
        }
        td {padding:8px 28px 8px; 
            text-align:center; 
            border-top:1px solid #e0e0e0; 
            border-right:1px solid #e0e0e0;}
    </style>

</head>



<body onload="validarlogin(<?php echo "$conf";?>); est();">

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
                                    <a href="visualizarpedidoap_dsp.php">Aprobar/Desaprobar Pedidos</a>
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
                      <h1 class="page-header">Tabla Articulos Pedidos</h1>
                    </div>
                    <div class="panel">
                        <h4>Articulos del Pedido N° <?php echo "$id";?></h4>
                          <a href="aprobar_desaprobar.php" class="btn btn-default">Regresar</a>
                    </div>
                    <div class="div3">
                    <table id="pedidos" class="w3-table w3-striped w3-bordered w3-border w3-tiny w3-hoverable table  table-bordered">
                        <thead>
                            <tr class="trtit">                    
                                <td style="height: 10px;" class="clwhite">Articulo</td>
                                <td style="height: 10px;" class="clwhite">Cantidad</td>
                                <td style="height: 10px;" class="clwhite">Valor</td>
                                <td style="height: 10px;" class="clwhite">Descuento</td>
                                <td style="height: 10px;" class="clwhite">Neto</td>
                                <td style="height: 10px;" class="clwhite">Estado</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?PHP     
                            $i = 0;
                            if (mysqli_num_rows($resultado) > 0) {  
                             while($row = mysqli_fetch_assoc($resultado)) {
                            $num = $row['pda_numero']; 
                            $referenc = $row['pda_referencia']; 
                            echo "<tr>";
                            echo "<td >";
                            echo $row['pda_referencia']; 
                            
                            echo "</td>";
                            echo "<td >";
                            echo $row['pda_cantidad_ped']; 
                            echo "</td>";
                            echo "<td >";
                            $sqlinventario="SELECT * FROM inventario WHERE inv_referencia = '".$row['pda_referencia']."'";
                             $resultado2 =  $mysqli->query($sqlinventario);
                              while($row2 = mysqli_fetch_assoc($resultado2)) {
                                $precio = $row2['inv_precio_vta'];
                                $iva = $row2['inv_porc_iva'];
                                $precio = $precio + $precio*$iva/100;
                                echo $precio;

                              }
                            echo "</td>";
                            echo "<td >";
                            echo $row['pda_descuento']; 
                            echo "</td>";
                            echo "<td >"; 
                            echo $neto = $precio -$row['pda_descuento']/100;
                            echo "</td>";   
                            echo "<td >";?>
                            <form  name="form2" method="post" action="update_estado_art.php"  id="form<?php echo $i; ?>">
                                <input type="text" name="nmo_ped" hidden value="<?php echo $num;?>" ></input>
                                <select class="form-control  input-sm" onchange="myFunction2(this.value,<?php echo $i; ?>)" style="width:95%;" name="estado" id="estado<?php echo $i; ?>" >                                
                                </select>
                                <input type="text" name="ref_ped" hidden value="<?php echo $referenc;?>" ></input>
                                <input type="text" name="id" hidden value="<?php echo $id;?>" ></input>
                            </form>

                            <div id="myModal<?php echo $i; ?>" class="modal fade" role="dialog">
    						    <div class="modal-dialog " style="width: 27%; ">

    						        <!-- Modal content-->
    						        <div class="modal-content">
    						          <div class="modal-header">
    						                <button type="button" class="close" data-dismiss="modal">&times;</button>
    						          </div>
    						          <div id="light" class="modal-body" style="background-color:#f5f5f0; ">
    						               <div class="panel ">
    						                    <div class="panel-body ">
    						                   		<form name="formact" method="POST" autocomplete="off" action="update_estado_art.php" id="formact<?php echo $i; ?>">
    							                   		<input type="text" name="ref_ped"  hidden value="<?php echo $referenc;?>" ></input>
    					                            	<input type="text" name="id" hidden value="<?php echo $id;?>" ></input>
    					                            	<input type="text" name="nmo_ped" hidden value="<?php echo $num;?>" ></input>
    							                        <label class="control-label">Cantidad:</label>
    							                        <input type="text" name="cant" maxlength="7" class="form-control" onkeyup="autocomp(<?php echo $i; ?> , this.value, '<?php echo $referenc;?>' )"><span id="txtHint<?php echo $i; ?>" style="font-size:12px;"></span><br>
    							                        <label class="control-label">Descuento:</label>
    							                        <input type="text" name="desc" class="form-control" maxlength="2"><br>
    							                        <input type="button" name="sbt" onclick="myFunction(<?php echo $i; ?>)" value="Actualizar" class="btn btn-default">
    						                        </form>
    						                    </div>              
    						                </div>                
    						          </div>          
    						        </div>

    						     </div>
						    </div>  
                            <?php
                            echo "</td>";
                            echo "</tr>";   
                            $i++;                            
                            }
                            } else {
                                echo "NO HAY USUARIOS REGISTRADOS";//login no exitoso
                            }                
                           
                            
                        ?> 
                        <tbody>
                    </table>
                </div>
              </div>
                <!-- /.row -->
           	  	<div id="Modal" class="modal fade" role="dialog">
			      <div class="modal-dialog " style="width: 27%; ">

			        <!-- Modal content-->
			        <div class="modal-content">
			          <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal">&times;</button>
			          </div>
			          <div id="light" class="modal-body" style="background-color:#f5f5f0; ">
			               <div class="panel ">
			                    <div class="panel-body ">
			                   		<span class="glyphicon glyphicon-saved " style="font-size:50px; margin-left:40%;"></span>
			                   		<h3 class="text-center">Datos actualizados satisfactoriamente.</h3>
			                    </div>               
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

    < Custom Theme JavaScript 
    <script src="../bootstrap/template01/dist/js/sb-admin-2.js"></script> 
</body>
<InstanceEnd --></html>


<script type="text/javascript">
    var std = new Array();
    var glob = 0;
 function est()
    {        
            var a = new Array();
                                   
            var cont = 0;
            <?php
            echo "\nextform = $i";
            for ($i = 0, $total = count($estados); $i < $total; $i ++) {               
                echo "\na[$i] = '$estados[$i]';";              
            }
            for ($i=0 , $total1 = count($est); $i < $total1 ; $i++) { 
                echo "\nstd[$i] = $est[$i];";
            }           
            ?>
           
            
            var x = document.forms.length - extform;
            
            for (var j= 0; j < x; j++) {
                estado = document.getElementById("form"+j).elements[1].id; 
                cont = 0;
                for (var i = 0; i < a.length; i++) {
                    opcion1 = new Option(a[i],i);                                       
                    document.getElementById(estado).options[cont]=opcion1;                                 
                    cont++;                          
                }
            }
                
            for (var i = 0; i < std.length; i++) {            
               
               document.getElementById("estado"+i).selectedIndex=std[i];                        
            }            
            
    }

function myFunction(formulario) {
	if ($("#txtHint"+formulario).text() == "") {
		var r = confirm("Desea realizar esta accion?");
		if (r == true  ) {		
			document.getElementById("formact"+formulario).submit();
		} else if(r == false){
                
                document.getElementById("estado"+formulario).selectedIndex=std[formulario];
        }  	
	}else {
        window.alert("Cantidad no valida.");
        }
}
    

function myFunction2(opc,formulario) {
	
	if (opc == 1) {		 
                $( '#myModal'+formulario ).modal( 'toggle' );
                glob = formulario;            
		}else{ 
			var t = confirm("Desea realizar esta accion?");
			if (t == true) {
				document.getElementById("form"+formulario).submit();								
			} else if(t == false){
                
                document.getElementById("estado"+formulario).selectedIndex=std[formulario];
            }   
		}
   
}

$(window).on('hidden.bs.modal', function() { 
    
    document.getElementById("estado"+glob).selectedIndex=std[glob];
});

function validarlogin(error){
    if (error == 1) {
           $( document ).ready( function() {
                $( '#Modal' ).modal( 'toggle' );
            });
           }
        }


    function autocomp(div,val,ref){    	
    	if (val.length == 0) {
	        document.getElementById("txtHint"+div).innerHTML = "";
	        return;
	      }
    	$.post("checkinv.php",
        	{
        name:val,
        city:ref   	
    	}, function(data, status){
            //window.alert("Data: " + data + "\nStatus: " + status);
            document.getElementById("txtHint"+div).innerHTML = data;
        });
    }

    $(document).ready(function() {
        $('#pedidos').DataTable();
    } );


		
</script>