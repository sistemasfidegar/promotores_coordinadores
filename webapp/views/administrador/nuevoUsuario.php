<!DOCTYPE html>
<html lang="es">

    <head>
<base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <title>Registro de promotores y coordinadores del programa "Prepa Sí"</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link rel="shortcut icon" href="resources/images/favicon.ico">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        
        <link rel="stylesheet" href="resources/assets/bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="resources/assets/css/jquery-ui.css">
        <link rel="stylesheet" href="resources/assets/css/style.css">       
        <link rel="stylesheet" href="resources/assets/numeric/jquery-numeric.css">   
          <link rel="stylesheet" href="resources/assets/qtip/jquery.qtip.css">
        <!-- <link href="resources/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">  -->
                 
         
        <script type="text/javascript" src="resources/assets/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
        
        <script type="text/javascript" src="resources/assets/js/bootbox.min.js"></script>
        <script type="text/javascript" src="resources/assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="resources/assets/js/jquery-validate.js"></script>
        <script type="text/javascript" src="resources/assets/numeric/jquery-numeric.js"></script>
        
        <link rel="stylesheet" href="resources/sweetalert/sweetalert.css">                            
		<script type="text/javascript" src="resources/sweetalert/sweetalert.min.js"></script>
		
         <script type="text/javascript" src="resources/assets/qtip/jquery.qtip.js"></script>
        
		<script type="text/javascript" src="resources/assets/bootstrap/js/bootstrap.min.js"></script>
				
		<!-- <script type="text/javascript" src="resources/assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="resources/assets/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>  -->
		
		
		<link href="resources/assets/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script type="text/javascript" src="resources/assets/js/bootstrap-toggle.min.js"></script>
       
                 
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <style>
        
        .error {
		    background: url("resources/assets/css/images/ui-bg_glass_95_fef1ec_1x400.png") repeat-x scroll 50% 50% #fef1ec !important;
		    border: 1px solid #cd0a0a !important;
		    color: #cd0a0a;
		}
		        
        .leyenda
        {
        	font-size:25px !important;
        	font-weight: bold;        
        }
        
        .toggle.android { border-radius: 0px;}
  		.toggle.android .toggle-handle { border-radius: 0px; }
  		
  		
  		div.upload {
		    width: 95%;
		    height: 99px;
		    background: url('resources/assets/img/btn_adjuntar_small.png') no-repeat;
		    overflow: hidden;
		    text-align:left;
		}
		
		div.upload input {
		    display: block !important;
		    width: 157px !important;
		    height: 57px !important;
		    opacity: 0 !important;
		    overflow: hidden !important;
		    text-align:left;
		}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-color: #F01684}
.navbar-inverse { background-image: none; }
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-image: none; }

#active { background-color: #94187B}

        </style>               
        <style>
    fieldset{
        border-top: 1px solid #3C8DBC;
        //border-left: 1px solid #3C8DBC;
        border-radius: 0px;       
        padding-left: 0px;
    }
    .textbox_insert { 
        border: 1px solid #c4c4c4; 
        height: 28px; 
        width: 275px; 
        font-size: 14px; 
        padding: 4px 4px 4px 4px; 
        border-radius: 4px; 
        -moz-border-radius: 4px; 
        -webkit-border-radius: 4px; 
        box-shadow: 0px 0px 8px #d9d9d9; 
        -moz-box-shadow: 0px 0px 8px #d9d9d9; 
        -webkit-box-shadow: 0px 0px 8px #d9d9d9; 
        background: #f4f4f4;

    } 
    .textbox_insert:focus { 
        outline: none; 
        border: 1px solid #34D83F; 
        box-shadow: 0px 0px 8px #34D83F; 
        -moz-box-shadow: 0px 0px 8px #3C8DBC; 
        -webkit-box-shadow: 0px 0px 8px #3C8DBC;         
        color:#555555;
        font-weight:bold; 
    } 
    .select_insert { 
        border: 1px solid #c4c4c4; 
        height: 30px; 
        font-size: 14px; 
        padding: 4px 4px 4px 4px; 
        border-radius: 4px; 
        -moz-border-radius: 4px; 
        -webkit-border-radius: 4px; 
        box-shadow: 0px 0px 8px #d9d9d9; 
        -moz-box-shadow: 0px 0px 8px #d9d9d9; 
        -webkit-box-shadow: 0px 0px 8px #d9d9d9;
        background: #f4f4f4;

    } 
    .select_insert:focus { 
        outline: none; 
        border: 1px solid #34D83F; 
        box-shadow: 0px 0px 8px #34D83F; 
        -moz-box-shadow: 0px 0px 8px #3C8DBC; 
        -webkit-box-shadow: 0px 0px 8px #3C8DBC;         
        color:#555555;
        font-weight:bold; 
        font-size: 12px; 
    }

    #form_usr { 
        border-spacing: 15px;
        border-collapse: separate;
        font-size: 1em;
        width: 1080px;
    }
    .pestania{
        font-size:13px;
        font-family:Arial Black;
        font-weight:bold;
    }

    .titulos{
        padding: 3px;
        font-size: 13px;
        border: 1px solid #3C8DBC;   
        margin-left: 30px;
    }
    /*********************errores de validacion*********/  
    .error-message, label.error {
        color: #ff0000;   
        margin:0;
        display: inline;
        font-size: 9px !important;
        font-weight:lighter;

    }
    input.error {
        border: 1px dotted red; 
    }
    select.error{
        border: 1px dotted red;
        display: block;
        float: left;
    }
    textarea.error {
        border: 1px dotted red; 
    }
    /****************************/
.btn-custom {
  background-color: hsl(320, 98%, 47%) !important;
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#fc1bb1", endColorstr="#E3157D");
  background-image: -khtml-gradient(linear, left top, left bottom, from(#fc1bb1), to(#E3157D));
  background-image: -moz-linear-gradient(top, #fc1bb1, #ed029f);
  background-image: -ms-linear-gradient(top, #fc1bb1, #ed029f);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fc1bb1), color-stop(100%, #E3157D));
  background-image: -webkit-linear-gradient(top, #fc1bb1, #E3157D);
  background-image: -o-linear-gradient(top, #fc1bb1, #E3157D);
  background-image: linear-gradient(#fc1bb1, #E3157D);
  border-color: #ed029f #E3157D hsl(320, 98%, 45%);
  color: #FFFEFE !important;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.13);
  -webkit-font-smoothing: antialiased;
}
</style>
        <script type="text/javascript">
  jQuery.validator.addMethod(
                "selectNone",
                function (value, element) {
                    if (element.value == "0")
                        return false;
                    else
                        return true;
                },
                "Selecciona una opción"
                );
        jQuery.validator.addMethod(
                "unique-correo",
                function (value, element) {
                    return ((eval("$.ajax({\n\
                                    type: 'POST',\n\
                                    url: '<?php echo base_url(); ?>index.php/administrador/validar_correo',\n\
                                    data: {usr_email: element.value},\n\
                                    async: false}).responseText") == '--ok') ? (true) : (false));
                },
                "correo duplicado"
                );
       
        $().ready(function() {
        	        	        	
        	$('[title]').qtip();     	 
        	// $("#radio").buttonset();

            $("input[type=submit], button, .button")
                    .button()
                    .click(function (event) {
                        event.preventDefault();
                    });

            // use custom tooltip; disable animations for now to work around lack of refresh method on tooltip
            $("#form_usuario").tooltip({
                position: {
                    my: "right bottom-10",
                    at: "right top",
                    using: function (position, feedback) {
                        $(this).css(position);
                        $("<div>")
                                .addClass("arrow")
                                .addClass(feedback.vertical)
                                .addClass(feedback.horizontal)
                                .appendTo(this);
                    }},
                show: false,
                hide: false
            });
            var opcBlockUI = {
                message: '<p style="padding: 10px"><spam id="wait_msj" style="position: relative; top: -16px;">' +
                        'Por favor espere.</spam><img style="padding: 10px; display:inline;" src="./resources/images/ajax-loader.gif" /><p>'
            };

            /*  $("#dialog-nuevo_success").dialog({
             autoOpen: false,
             closed: true,
             height: 150,
             width: 350,
             resizable: false,
             modal: true,
             buttons: {
             "Aceptar": function () {
             $(this).dialog("close");
             $.blockUI(opcBlockUI);
             irA('index.php/operador_cgma/usuarios/index');
             }
             }
             });*/

            $("#form_usuario").validate(
                    {
                        rules: {                        
                            id_perfil: "selectNone",
                            nombre: "required",
                            paterno: "required",
                            materno: "required",
                            usuario: "required",
                            password: "required",                       
                            correo: "required email unique-correo"
                        },
                        messages: {
                            nombre: "Campo obligatorio",
                            paterno: "Campo obligatorio",
                            materno: "Campo obligatorio",
                            usuario: "Campo obligatorio",
                            password: "Campo obligatorio",                     
                            correo: {required: "Campo obligatorio", email: "Correo electrónico no valido"}
                        },
                        ignore: ":not(:visible),:disabled"

                    });
            $("#Guardar").click(function () {
                
                if ($('#form_usuario').valid()) {

                    //$.blockUI(opcBlockUI);
                    $.ajax({
                        type: 'POST',
                        url: $('#form_usuario').attr("action"),
                        data: $('#form_usuario').serialize(),
                        success: function (data) {

                            //$.unblockUI();
                            if (data === '--ok') {
                                bootbox.alert("Se agrego el usuario exitosamente.", function () {
                                   irA("index.php/administrador/listadoUsuarios");
                                });
                            }
                            else
                                alert("Ocurrio un error durante el registro.");
                        }
                    });
                }
            });         	        	         	    	         	         	        	        	        	        	        	        	           
             
        });//ready
        
                                                                              

        function irA(uri) {
            window.location.href = '<?php echo base_url(); ?>' + uri;
        }
        function openDialog(dialog, id) {
            ide = id;
            $("#" + dialog).dialog("open");
        }

   /*     $(function () {

            $("#dtUsuarios").dataTable({
                "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "Todos"]]

            });
        });*/
        
  </script>
        
    </head>

    <body>
    
       
        <div class="register-container container">
            <div class="row">
                <div class="register">
                    <!-- <form id="registra" action="index.php/main/" method="post"> -->
                    <form action="index.php/administrador/insertUsuario" name="form_usuario" method="post" id="form_usuario">
            			<div style="text-align:left; padding-left:20px; border-bottom: 2px dotted #bbb; min-height:73px;">
                        	<a href="index.php/main"><img src="resources/assets/img/logo_gdf_cgdf.png" style="padding-top:0px;" align="top" /></a>&nbsp;                                               	
                        </div>
	                      <div class="row-fluid"><div class="span12"> &nbsp </div></div>
				
				<div class="row-fluid">
					<div class="span12">
						<div class="navbar">
							<div class="navbar-inner">
								<div class="container">
									<a href="index.php" class="brand">Prepa Sí</a>
										<ul class="nav pull-right">
											<li><a href="index.php/administrador/">Inicio</a></li>
											<li class="divider-vertical"></li>
											
											<li class="dropdown">
									          <a href="#" class="dropdown-toggle nav-stacked" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador<span class="caret"></span></a>
									          <ul class="dropdown-menu">
									          	<li><a href="index.php/administrador/listadoUsuarios">Listar Usuarios</a></li>
									            <li><a href="index.php/administrador/nuevoUsuario">Nuevo Usuario</a></li>
									          </ul>
									        </li>
											
											<li class="dropdown">
									          <a href="#" class="dropdown-toggle nav-stacked" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registrados<span class="caret"></span></a>
									          <ul class="dropdown-menu">
									          	<li><a href="index.php/administrador/RegistradosC">Coordinadores</a></li>
									            <li><a href="index.php/administrador/RegistradosP">Promotores</a></li>
									          </ul>
									        </li>
									        <li class="divider-vertical"></li>
									        <li class="dropdown">
									          <a href="#" class="dropdown-toggle nav-stacked" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Aceptados <span class="caret"></span></a>
									          <ul class="dropdown-menu">
									          	
									            <li><a href="index.php/administrador/AceptadosC">Coordinadores</a></li>
									            <li><a href="index.php/administrador/AceptadosP">Promotores</a></li>
									          </ul>
									        </li>
									        <li class="active">
									          <a href="index.php/administrador/salir">Salir</a>
									        </li>
									    </ul>
									    
								</div>
							</div>	
						</div>
					</div>
					<div class="span12"> <div class="span12"></div></div>
					
				<!-- inicia nuevo -->
					<div class="span12">
						<div class="span2"><div class="span12"></div></div>
							<div class="span12">
								<div class="box">     
		       			 			<div class="box-body table-responsive">
										<div class="ui-widget-content" style="width:90%">
									        <table id="form_usr" border="0">
									            <tr>
									                <td style="text-align:right; width: 15%;">Delegación:</td>
									                <td colspan="" style="width: 35%;">                   
									                    <select name="id_delegacion" id="id_delegacion" style="width: 98%; display: block;" class="select_insert">
									                        <option value="0">[No aplica]</option>
									                        <?php foreach ($delegaciones as $registro) { ?>
									                            <option value="<?php echo $registro['id_delegacion'] ?>"><?php echo $registro['delegacion']; ?></option>;
									                        <?php
									                        }
									                        ?>
									                    </select>
									                </td> 
									                <td style="text-align:right; width: 15%;">Perfil:</td>
									                <td colspan="" style="width: 35%;">                   
									                    <select name="id_perfil" id="id_perfil" style="width: 98%; display: block;" class="select_insert">
									                        <option value="0">--Seleccionar--</option>
									                        <?php foreach ($perfiles as $registro) { ?>
									                            <option value="<?php echo $registro['id_perfil'] ?>"><?php echo $registro['perfil']; ?></option>;
									                            <?php
									                        }
									                        ?>
									                    </select>
									                </td>                
									            </tr>
									            <tr>
											                <td style="text-align:right; width: 11%">Nombre :</td><td ><input id="nombre" name="nombre" class="textbox_insert" type="text" style="width:96%;" value=""/></td>     
											                <td style="text-align:right; width: 11%;" >Apellido Paterno:</td><td><input id="paterno" name="paterno" class="textbox_insert" type="text" style="width:96%;" value=""/></td>     
											            </tr>
											            <tr>
											                <td style="text-align:right;">Apellido Materno:</td>
											                <td><input id="materno" name="materno" class="textbox_insert" type="text" style="width: 97%;" value=""/></td>
											
											                <td style="text-align:right;" >Correo Electrónico:</td><td><input id="correo" name="correo" class="textbox_insert" type="text" style="width:96%;" value=""/></td>     
											            </tr>
											            
									            
									            <tr>
									                <td style="text-align:right; width: 15%;">Usuario:</td>
									                <td style="text-align:right; width: 35%;"><input id="usuario" name="usuario" class="textbox_insert" type="text" style="width: 96%;" /></td>
													<td style="text-align:right; width: 15%;">Contraseña:</td>
									                <td style="text-align:right; width: 35%;"><input id="password" name="password" class="textbox_insert" type="password" /></td>  
									                      
									            </tr>
									           
									            
									          
									            <tr>
									            	
									                <td style="text-align:right; width: 15%;" >Estatus:</td>
									                <td style="text-align:left; width: 15%;" >
									                	&nbsp; &nbsp; &nbsp;<input type="radio" id="activo" name="activo"  value="true" checked="checked" style="text-align:left; width: 10%;">Activo&nbsp; &nbsp; &nbsp;
									                	<input type="radio" id="inactivo" name="activo"  value="false" style="text-align:right; width: 10%;">Inactivo</td>
									                
									                	       
									               
									            </tr>
									             <tr> 
									            	<td> &nbsp; &nbsp; &nbsp;</td>                                   
									                <td  style="text-align:left; "><input class="btn btn-custom" type="button" name="guardar" id="Guardar" value="Guardar"></td>
									                <td> &nbsp; &nbsp; &nbsp;</td> 
									                <td  style="text-align:left; "><input class="btn " type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="irA('index.php/administrador/listadoUsuarios')" type="text" style="width:80%;"></td>    
									            </tr>             
									
									        </table>
							   <!-- </form> --> 
							</div>
					</div>
				</div>
			</div>
				<!-- fin nuevo -->
		</form> 
     </div>
     </div>
        </div>
        </body>
        </html>
     

