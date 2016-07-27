<?php
error_reporting(0);
ini_set('display_errors', 0);
header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION['usu_nit']) || $_SESSION['usu_rol']!== '1') {
       header('Location: /pedidos/index.php?errorusuario=si');
       exit();
    }
  include '../conexion.php';
  $sqlinv = "SELECT *  FROM inventario";
  $res = $mysqli->query($sqlinv);
  while ($fila = $res->fetch_assoc()) {
          $arreglo[]=$fila['inv_referencia'];             
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
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">



    <style type="text/css">
  input{
    width: 80%;
    height: 26px;
  }
  .chk{
    width: 20%;
    height: auto;
  }
  .items{
        border-style: none;
        background: none;
 
  }
  .totals{
    width: 10%;
    height: auto;
    border-style: none;
  }
  .custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 5px 10px;
  }
  hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
.modal {
    display: none; /* by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 20%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}


        .clwhite{
            color: white;
            height: 10px;
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
  <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
    var art= "";


    $( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Mostrar todo" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " no concuerda con ningun producto" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
 
    $("#combobox").combobox({                    
                select: function (event, ui) {
                  art = this.value;
                  //window.alert(this.value);
                   articulo(this.value);//ejecucion y calcular
                }
            });
    $( "#toggle" ).on( "click", function() {
      $( "#combobox" ).toggle();
    });
  } );


    function showHint(str,art) {
      var xhttp;
      if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      }
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
          document.getElementById("txtHint").innerHTML = xhttp.responseText;
          if (document.getElementById("txtHint").innerHTML == "" ) {
            //suficientes existencias
          }else{
            //nno hay suficientes existencias


          }
        }
      };
      xhttp.open("GET", "gethint.php?q="+str+"&p="+art, true);
      xhttp.send();
      
    }
    $(function() {
    $('#form1').submit(function() {
      if ($('#campos tr').length < 2) {
        window.alert("Debe ingrear almenos un articulo");
        return false;
      }else{
        window.onbeforeunload = null;
        return true;
       // return false to cancel form action
      }
    });
});
    </script>


</head>



<body onload="inventario();">

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
            <form id="form1" name="form1" method="post" action="procesarpedido.php">
            <input type="text" name="fecha" value="<?php echo $_POST['fecha']; ?>" hidden/>
            <input type="text" name="vendedor" value="<?php echo $_POST['vencodigo']; ?>" hidden/>
            <input type="text" name="cliente" value="<?php echo $_POST['cliente']; ?>" hidden/>
            <input type="text" name="npedido" value="<?php echo $_POST['npedido']; ?>" hidden/>
              <div class="row">
                    <!-- InstanceBeginEditable name="EditRegion1" -->
                   <div class="col-lg-12">
                     <h1 class="page-header">Adicionar Pedidos</h1>
                   </div>
                        <!-- /.col-lg-12 -->
                        <!-- InstanceEndEditable -->
                  <div class="row">
                      <div class="col-lg-12">
                      
                      <!-- Trigger/Open The Modal -->
                      <button type="button" id="myBtn" class="btn btn-default" >Agregar Articulo</button>
                          
                      <button type="submit" class="btn btn-default" > terminar </button>
                          
                      <a href="adicionarpedido.php" class="btn btn-default" > cancelar </a>
                          
                      </div>
                  </div>
                  <hr>

                    
                      <table id="campos" class="w3-table w3-striped w3-bordered w3-border w3-tiny w3-hoverable table  table-bordered">
                        <thead>
                          <tr class="trtit">                    
                              <th class="clwhite">Referencia</th>
                              <th class="clwhite">Cantidad</th>
                              <th class="clwhite">Descuento</th>
                              <th class="clwhite">Neto</th>
                              <th class="clwhite">Iva</th>
                              <th class="clwhite">Total</th>
                          </tr>
                        </thead> 
                        <tbody>
                        </tbody> 
                        </table>
                    <!-- /.row -->

                   <!--     <input type="text" onkeyup="showHint2(this.value,1)">
                      <span id="txtHint1" style="font-size:12px;"></span>-->
                      <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content" >
                          <span class="close" id="close" >×</span>
                        <label>Referencia: </label><select id="combobox" name="combobox" ></select><br><br>
                           <label>Cantidad: </label><input type="text" id="cantidad"  onkeyup="showHint(this.value,art);calcular();" style="width:30%;" /><br>
                       <span id="txtHint" style="font-size:12px;"></span><br>
                        <label>Descuento: </label><input type="number" min="0" max="100" step="any" value="0" id="descuento" onkeyup="calcular();" style="width:30%;"/><br><br>
                        <label>Neto: </label><input type="text" id="neto" style="font-size:12px;width:30%;"  disabled/><br>
                       <input type="text" id="netoaux" hidden />
                       <input type="text" id="subaux" hidden/><br>
                          <label>Iva: </label><input type="number" id="iva" style="font-size:12px;width:30%;" disabled/><br>
                      <input type="text" id="ivaux" hidden/><br>
                     <label>Total: </label><input type="number" id="total" disabled style="width:30%;"/><br><br>
                      <button type="button" id="adicionar" onclick="agregar();">Confirmar </button>
                        </div>

                      </div>

                   

<!-- The Modal -->
                        <div id="fmod" class="modal">

                          <!-- Modal content -->
                          <div class="modal-content">
                            <span class="close" id="close2">x</span>

                            <label>Referencia: </label><input id="refmod"></input><br><br>
                           <label>Cantidad: </label><input type="text" id="cantmod" style="width:30%;" onkeyup="calcular2();" /><br>
                           <input type="text" id="deshid" hidden/>
                           <input type="text" id="nethid" hidden/>
                        <label>Descuento: </label><input type="number" min="0" max="100" step="any" value="0" id="desmod" onkeyup="calcular2();" style="width:30%;"/><br><br>
                        <label>Neto: </label><input type="text" id="netomod" style="font-size:12px;width:30%;"  disabled/><br>
                          <label>Iva: </label><input type="number" id="ivamod" style="font-size:12px;width:30%;" disabled/><br>
                     <label>Total: </label><input type="number" id="totalmod" disabled style="width:30%;"/><br><br>
                      <button type="button" id="butnmod" onclick="mod();">Confirmar</button>


                          </div>

                        </div>
                        <!-- The Modal -->


        <!-- /.row -->

              </div>
              
              <div style="display:flex; flex-direction: row">
                
                <div id="derecha" style="flex:1;">
                <label>Subtotal: </label><input type="number" id="subt" value="0" class="totals" name="subt" disabled /><br>
                 <label>Iva: </label><input type="number" id="ivat" value="0" class="totals" name="ivat" disabled /><br>
                  <label>Total: </label><input type="number" id="finalt" value="0" class="totals" name="finalt" disabled />
                  <input id="i" name="i" hidden />
                </div>
              </div>


                </form>
                
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
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "Advertencia";
  }
  var modal2 = document.getElementById('fmod');
  var modindex = 0;
var nextinput = 1;  
    function agregar(){
      campo = '<tr id="campo'+nextinput+'" name="campo'+nextinput+'" ><th><input type="text" id="ref'+nextinput+'" name="ref'+nextinput+'" class="items" readonly/><button type="button" onclick="modificar('+nextinput+')">Modificar</button><button type="button" onclick="borrar('+nextinput+');">Borrar</button></th><th><input type="text" id="cantidad'+nextinput+'" name="cantidad'+nextinput+'" class="items" ></th><th><input type="text" id="descuento'+nextinput+'" name="descuento'+nextinput+'" class="items" ></th><th><input type="text" id="neto'+nextinput+'" name="neto'+nextinput+'" class="items" readonly></th><th><input type="text" id="iva'+nextinput+'" name="iva'+nextinput+'" class="items" readonly></th><th><input type="text" id="total'+nextinput+'" name="total'+nextinput+'" class="items" readonly></th></tr>';

      if (document.getElementById("combobox").value !== "" && document.getElementById("cantidad").value !== "" && document.getElementById("txtHint").innerHTML == "") {
          if (nextinput>1) {
           for (var i = 1; i < nextinput; i++) {
           	if (document.getElementById("ref"+i)) {
           		if (document.getElementById("combobox").value == document.getElementById("ref"+i).value) {
	              window.alert("Este producto ya esta en el pedido");
	              return;
             }
           	}
           }
        }
         $("#campos tbody").append(campo)

       // document.getElementById("item"+nextinput).innerHTML = document.getElementById("cantidad").value  + " x " +  document.getElementById("combobox").value + " $" + document.getElementById("total").value;
        document.getElementById("ref"+nextinput).value = document.getElementById("combobox").value;
        document.getElementById("combobox").value = "";
        document.getElementById("cantidad"+nextinput).value = document.getElementById("cantidad").value;
        document.getElementById("cantidad").value = "";
        document.getElementById("descuento"+nextinput).value = document.getElementById("descuento").value;
        document.getElementById("descuento").value = 0;
        document.getElementById("neto"+nextinput).value = document.getElementById("neto").value;
        document.getElementById("neto").value = "";
         document.getElementById("netoaux").value = "";
        document.getElementById("iva"+nextinput).value = document.getElementById("iva").value;
        document.getElementById("iva").value = "";
        document.getElementById("total"+nextinput).value = document.getElementById("total").value;
        document.getElementById("total").value = "";
        document.getElementById("i").value = nextinput;
        caltotal(); 
        nextinput++;
        modal.style.display = "none";


      }else{
        window.alert("necesita un producto y una cantidad valida");
      }

    }
    function borrar(index){ 
        if (nextinput>1) {
          $("#campo" + index ).remove();
          caltotal();
        }else return; 
    }
    function modificar(index){
       modal2.style.display = "block";
          // Get the <span> element that closes the modal
          var span = document.getElementById("close2");

          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
              modal2.style.display = "none";
          }
          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
              if (event.target == modal2) {
                  modal2.style.display = "none";
              }
          }
          document.getElementById("refmod").value=document.getElementById("ref"+index).value;

          document.getElementById("cantmod").value=document.getElementById("cantidad"+index).value;
          document.getElementById("desmod").value=document.getElementById("descuento"+index).value;
          document.getElementById("deshid").value=document.getElementById("descuento"+index).value;
          document.getElementById("netomod").value=document.getElementById("neto"+index).value;
          document.getElementById("nethid").value=document.getElementById("neto"+index).value;
          document.getElementById("ivamod").value=document.getElementById("iva"+index).value;
          document.getElementById("totalmod").value=document.getElementById("total"+index).value;
          modindex = index;

    }
    function calcular2(){
    	var aux = 0;
    	 var neto = parseFloat(document.getElementById("nethid").value)/(1 - (parseFloat(document.getElementById("deshid").value)/100));
    	 document.getElementById("netomod").value = neto - (neto*(parseFloat(document.getElementById("desmod").value)/100));
    	 aux =  parseFloat(document.getElementById("netomod").value)*parseFloat(document.getElementById("cantmod").value);
    	 document.getElementById("totalmod").value = aux + (aux*(parseFloat(document.getElementById("ivamod").value)/100));
    }
    function mod(){
      document.getElementById("ref"+modindex).value = document.getElementById("refmod").value;
      document.getElementById("cantidad"+modindex).value = document.getElementById("cantmod").value;
      document.getElementById("descuento"+modindex).value = document.getElementById("desmod").value;
      document.getElementById("neto"+modindex).value = document.getElementById("netomod").value;
      document.getElementById("iva"+modindex).value = document.getElementById("ivamod").value;
      document.getElementById("total"+modindex).value = document.getElementById("totalmod").value;
      modal2.style.display = "none";
      caltotal();

      //poner valores del modal en la tabla
    }
    function calcular(){
      document.getElementById("neto").value = 0;
       document.getElementById("neto").value =  document.getElementById("netoaux").value - ((document.getElementById("netoaux").value*document.getElementById("descuento").value)/100);
     document.getElementById("ivaux").value = ((document.getElementById("neto").value*document.getElementById("cantidad").value)*document.getElementById("iva").value/100);
      document.getElementById("subaux").value = document.getElementById("neto").value*document.getElementById("cantidad").value;
      document.getElementById("total").value = ((document.getElementById("neto").value*document.getElementById("cantidad").value)*document.getElementById("iva").value/100) + (document.getElementById("neto").value*document.getElementById("cantidad").value);
    }
    function caltotal(){
      document.getElementById("subt").value = 0;
        document.getElementById("ivat").value = 0;
        document.getElementById("finalt").value = 0;
        for (var i = 1; i <= nextinput; i++) {
        	if (document.getElementById("neto"+i)) {
        		 document.getElementById("subt").value = parseFloat(document.getElementById("subt").value) + ((parseFloat(document.getElementById("neto"+i).value)*document.getElementById("cantidad"+i).value));
          document.getElementById("ivat").value = parseFloat(document.getElementById("ivat").value) + ((parseFloat(document.getElementById("neto"+i).value)*parseFloat(document.getElementById("cantidad"+i).value)*parseFloat(document.getElementById("iva"+i).value))/100);
          document.getElementById("finalt").value = parseFloat(document.getElementById("finalt").value) + parseFloat(document.getElementById("total"+i).value);

        	}
        }


    //  document.getElementById("subt").value = parseFloat(document.getElementById("subt").value)+parseFloat(document.getElementById("subaux").value);
     //   document.getElementById("ivat").value = parseFloat(document.getElementById("ivat").value)+parseFloat(document.getElementById("ivaux").value);
     //   document.getElementById("finalt").value = parseFloat(document.getElementById("finalt").value)+parseFloat(document.getElementById("total").value);
    }
   function articulo(str) {
    if (str == "") {
        document.getElementById("neto").value = "";
        document.getElementById("netoaux").value = "";
        document.getElementById("iva").value = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
            xmlhttp2 = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("neto").value = xmlhttp.responseText ;
                document.getElementById("netoaux").value = xmlhttp.responseText ;
                calcular();

            }
        };
        xmlhttp2.onreadystatechange = function() {
            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                document.getElementById("iva").value = xmlhttp2.responseText;
                calcular();
            }
        };
        xmlhttp.open("GET","getdata.php?q="+str,true);
        xmlhttp.send();
        xmlhttp2.open("GET","getdata2.php?q="+str,true);
        xmlhttp2.send();
    }
}

    function inventario()
    {           
            var a = new Array();
            var cont = 0;
            <?php
            for ($i = 0, $total = count($arreglo); $i < $total; $i ++) {               
                echo "\na[$i] = '$arreglo[$i]';";
            }
            ?>
            form1.combobox.length=0;
            for (var i = 0; i < a.length; i++) {         
                opcion0 = new Option(a[i],a[i]);
                document.forms.form1.combobox.options[cont]=opcion0;
                cont++;         
            }
    }

    
    $(document).ready(function() {
        $('#campos').DataTable({
          "ordering": false,
          "info":     false,
           "filter": false 
        });
        document.getElementById("campos").deleteRow(1);

    } );
</script>