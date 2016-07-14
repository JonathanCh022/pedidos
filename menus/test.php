<?php
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
  <link rel="stylesheet" href="/resources/demos/style.css">
    <style type="text/css">
  input{
    width: 80%;
    height: 26px;
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
</style>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>


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
                   articulo(this.value);//ejecucion 
                   
                }
            });
    $( "#toggle" ).on( "click", function() {
      $( "#combobox" ).toggle();
    });
  } );


    function showHint(str) {
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
      xhttp.open("GET", "gethint.php?q="+str, true);
      xhttp.send();
      
    }
   var nextinput = 1;
    function AgregarCampos(){

  nextinput++;

  //campo = '<li id="rut'+nextinput+'">Campo:<input type="text" size="20" id="campo' + nextinput + '"&nbsp; name="campo' + nextinput + '"&nbsp; /></li>';

  //campo = '<div id="campo' + nextinput + '" ><div id="div2" class="col-lg-4 "><label class="control-label" for="cuenta"  for="cuenta" > Cuenta: </label><input type="text" class="form-control input-sm" id="cuenta' + nextinput + '"&nbsp; name="cuenta' + nextinput + '"&nbsp; placeholder="Cuenta" /> </div> <div id="div2" class="col-lg-4 "><label class="control-label" for="dinero"  for="dinero" > Dinero: </label><input type="text" class="form-control input-sm" id="dinero' + nextinput + '"&nbsp; name="dinero' + nextinput + '"&nbsp; placeholder="Dinero" /> </div> </div>';
  campo = '<div class="row"><div class="col-lg-2"><select id="combobox" name="combobox" ></select></div><div class="col-lg-2"><input type="text"></div><div class="col-lg-2"><input type="text"></div><div class="col-lg-2"><input type="text"></div><div class="col-lg-2"><input type="text"></div><div class="col-lg-2"><input type="text"></div></div>';

  $("#campos").append(campo);
  }
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
            <form id="form1" name="form1">
            <div id="campos">
                <div class="row">
                <!-- InstanceBeginEditable name="EditRegion1" -->
                    <div class="col-lg-12">
                      <h1 class="page-header">Adicionar Pedidos</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <!-- InstanceEndEditable -->

              </div>
              <div class="row">
                <div class="col-lg-2">
                <button type="button" >adicionar </button>
                    
                </div>
                <div class="col-lg-2">
                <button> modificar </button>
                    
                </div>
                <div class="col-lg-2">
                <button> buscar/borrar </button>
                    
                </div>
                <div class="col-lg-2">
                <input type="submit" value="terminar/enviar" />
                    
                </div>
                <div class="col-lg-2">
                 <button>cancelar </button>
                    
                </div>
                </div>

                
                <div class="row">
                <div class="col-lg-2">
                Referencia
                    
                </div>
                <div class="col-lg-2">
                Cantidad
           <!--       <input type="text" onkeyup="showHint(this.value)">
                <span id="txtHint" style="font-size:12px;"></span>

        -->

                    
                </div>
                <div class="col-lg-2">
                Descuento
                    
                </div>
                <div class="col-lg-2">
                Neto
                    
                </div>
                <div class="col-lg-2">
                Iva
                    
                </div>
                <div class="col-lg-2">
                Total
                    
                </div>
                 </div>
                <!-- /.row -->


                 <div class="row">
                <div class="col-lg-2">
             <!--     <input type="text" onkeyup="showHint2(this.value,1)">
                <span id="txtHint1" style="font-size:12px;"></span>
                    -->



              <select id="combobox" name="combobox" onchange="window.alert(this.value)"></select>

                </div>
                <div class="col-lg-2">
                 <input type="text" id="cantidad"  onkeyup="showHint(this.value);calcular();">
                <span id="txtHint" style="font-size:12px;"></span>
      
                </div>
                <div class="col-lg-2">
               <input type="number" min="0" max="100" step="0.01" id="descuento" onkeyup="calcular();">
                    
                </div>
                <div class="col-lg-2">
                <input type="text" id="neto" style="font-size:12px;" disabled></input>
                    
                </div>
                <div class="col-lg-2">
                <input type="text" id="iva" style="font-size:12px;" disabled></input>
                    
                </div>
                <div class="col-lg-2">
                <input type="text" id="total" disabled>
                    
                </div>
                 </div>


    <!-- /.row -->

          </div>

                </form>
                <hr>
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
    function calcular(){
      document.getElementById("total").value =  (document.getElementById("cantidad").value*document.getElementById("neto").value);
    }
   function articulo(str) {
    if (str == "") {
        document.getElementById("neto").value = "";
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
            }
        };
        xmlhttp2.onreadystatechange = function() {
            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                document.getElementById("iva").value = xmlhttp2.responseText;
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
</script>