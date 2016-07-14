<?php 
   include 'conexion.php';
   if (isset($_GET['errorusuario'])) {
       $error = 1;
   }else{$error = 0; }


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/template01/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bootstrap/template01/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/template01/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/template01/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onload="validarlogin(<?php echo "$error";?>); ">
<!--================================ Header ================================-->
<div class="full-width-header">
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
        <!--<img alt="140x140" src="img/logo.png" class="img-responsive center-block"/> -->
          <h2 class="page-header text-center">Pedidos</h2>
		</div>
	</div>
</div>
</div>
<!--================================ Header ================================-->

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 " style=" margin-top:4%;">
                <div class="  ">
                    <!--<div class="panel-heading">
                        <h3 class="panel-title">Iniciar sesión</h3>
                    </div> -->
                    <div class="panel-body">
                        <form role="form" method="POST" action="validate.php">
                            <fieldset>
                            	<div class="form-group">
                            		<label class="control-label col-sm-1">Empresa</label>
                                    <input class="form-control" placeholder="NIT" name="Empresa" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-1">Usuario</label>
                                    <input class="form-control" placeholder="NIT" name="Usuario" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-1">Clave</label>
                                    <input class="form-control" placeholder="Password" name="Password" type="password" required>
                                </div>
                               <!-- <div class="checkbox text-right">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordarme
                                    </label>
                                </div> -->
                                
                                <div class="panel panel-default" >
                                  <div class="panel-body text-center">
                                  <label>
                                        <input name="checkboxRobot" type="checkbox" value="checkboxRobot" required> 
                                        <i class="fa fa-user fa-fw" ></i> No soy un robot
                                  </label>
                                  <input  id="checkboxvali" name="checkboxvali" type="checkbox" value="checkboxvali" data-toggle="modal" data-target="#myModal" hidden> 
                                  
                                 </div>
                               </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit"  class="btn btn-lg btn-primary btn-block" value="Ingresar" ></input>
                                <a href="index.php" class="btn btn-block">Recargar pagina</a>
                                
                                
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog " style="width: 27%; ">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div id="light" class="modal-body" style="background-color:#f5f5f0; ">
               <div class="panel ">
                    <div class="panel-body">
                        <img alt="140x140" src="img/error.png" class="img-responsive center-block"  width="100" height="100" style="margin-left:30%;"/> 
                        <h4 style="margin-left:12%;">Empresa, usuario o contraseña incorrecta.<br> Por favor intente de nuevo.</h4>
                    </div>              
                </div>                
          </div>          
        </div>

      </div>
    </div>





    <!-- jQuery -->
    <script src="bootstrap/template01/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/template01/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="bootstrap/template01/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="bootstrap/template01/dist/js/sb-admin-2.js"></script>
</body>

</html>

<script type="text/javascript">

function validarlogin(error){
    if (error == 1) {
           $( document ).ready( function() {
                $( '#myModal' ).modal( 'toggle' );
            });
           }
        }
</script>
