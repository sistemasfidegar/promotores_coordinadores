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

				
        
        </style>               
        
        <script type="text/javascript">
        
        $().ready(function() {
        	        	        	
        	$('[title]').qtip();     	 
        	         	        	         	    	         	         	        	        	        	        	        	        	           
          /*   
             $("#guardar_promotor").click(function ()
             {
				//alert('promotor');
				 $("#tipo_registro").val(2);
				 $("#registra").submit();	               
          	  });


             $("#guardar_coordinador").click(function ()
             {
            	 //alert('coordinador');
            	 $("#tipo_registro").val(1);
            	 $("#registra").submit();        	              
             });
            */ 
             $("#Institucion").change(function () {
                 var tipo = $("#Institucion option:selected").val();

                 //plantel
                 
                 	$("#plantel").html('<option value="0">Cargando...</option>');
                 	jQuery.ajax({
         	            type: 'post',
         	            dataType: 'html',
         	            url: 'index.php/administrador/ajaxGetPlanteles/'+tipo,
         	            data: {operacion: 'ajax'},
         	            success: function (data) {
         	                $("#plantel").html(data);	               
         	            }
         	        });
         	  
             });
                    	        
             $(".botonExcel").click(function(event) {
         		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
         		$("#FormularioExportacion").submit();
         	});
        });//ready
        
        function valores(){
        	valor = 't[]';
            f= document.form_datos;
         	arre = new Array();
         	total = f[valor].length;
         	if(isNaN(total)){
             	arre[0]=document.getElementById('t[]').value;
         	}else
         	{
	         	for (var i = 0; i < total; i++)
	          	 if (f[valor][i].checked) arre[arre.length] = f[valor][i].value;
         	}
           //return arre.length;
      
        	 if(arre.length > 0 )
        	 {
        		
        	  $.ajax({
        			 
        		      type: 'POST',
        		      dataType: 'html',
        		      url: 'index.php/administrador/aceptado/',	 
        		      data: {arreglo: arre},
        		      success: function (data) {

 		    //                 $.unblockUI();
		                     if(data === 'ok')
		                     {
		                    	 swal({
		                          	  title: "¡Registro exitoso!",
		                          	  text: "",
		                          	  type: "success",
		                          	  showCancelButton: false,
		                          	  confirmButtonColor: "#34AF00",
		                          	  confirmButtonText: "Ok",
		                          	  //cancelButtonText: "No, cancel plx!",
		                          	  closeOnConfirm: false
		                          	  //closeOnCancel: false
		                          	},
		                          	function(isConfirm){
		                          	  if (isConfirm) {
		                          		irA('index.php/administrador');
		                          	  } 
		                          	});
		                     }
		                     else
		                     {
		                    	 swal({
		                         	  title: "Ocurrio un error, intentelo más tarde!!!",
		                         	  text: "",
		                         	  type: "error",
		                         	  showCancelButton: false,
		                         	  confirmButtonColor: "#C9302C",
		                         	  confirmButtonText: "Ok",
		                         	  //cancelButtonText: "No, cancel plx!",
		                         	  closeOnConfirm: false
		                         	  //closeOnCancel: false
		                         	},
		                         	function(isConfirm){
		                         	  if (isConfirm) {
		                         		 irA('index.php/administrador');
		                         	  } 
		                         	});
		                     }
		                 }
        		    
        		        
        		}); 	
        		
        	 }
        
        }                                                                    

        function irA(uri) {
            window.location.href = '<?php echo base_url(); ?>' + uri;
        }
        
        </script>
</head>
<body>
	<div class="register-container container">
		<div class="row">
        	<div class="register">
        		<div style="text-align:left; padding-left:20px; border-bottom: 2px dotted #bbb; min-height:73px;">
                    <a href="index.php/main"><img src="resources/assets/img/logo_gdf_cgdf.png" style="padding-top:0px;" align="top" /></a>&nbsp;                                               	
               	</div>
               	<!-- Buscador -->
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
					</div>
               	<!-- end Buscador -->
               	<div class="row-fluid">
               	<!-- Busca Promotor -->
               		<div class="span12">
               		
						<div class="span12">
						
							<form id="escuela" name="escuela" method="post" action="index.php/administrador/AceptadosC1">
							<h3> COORDINADORES ACEPTADOS</h3>
								<table  border="0" style=" text-align:left !important;">
									<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
									<tr>
									  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									  <td><label>Institucion:</label></td>
									  <td>&nbsp;&nbsp;&nbsp;</td>
								      <td>
								      	<select name="Institucion" id="Institucion" class="form-control" >
								            	<option value="0">[Seleccionar]</option>
							            		<?php 
							            		$u=0;
							            		$b=0;
							            		$i=0;
							            			foreach ($institucion as $val){
							            				if($val['universidad']==0){
							            				
							            					if($b==0)
							            						echo " <optgroup label='Bachillerato'>";
							            				
							            					echo "<option value='".$val['id_institucion']."'>".$val['institucion']."</option>";
							            					
							            					$b++;
							            				}
							            					
							            				if($val['universidad']==1){
							            				
							            					if($u==0)
							            					{
							            						echo'</optgroup>';
							            						echo " <optgroup label='Universidad'>";
							            					}
							            				
							            				
							            					echo "<option value='".$val['id_institucion']."'>".$val['institucion']."</option>";
							            				
							            					$u++;
							            				
							            				}
							            					
							            				if($val['universidad']==2){
							            					if($i==0)
							            					{
							            						echo'</optgroup>';
							            						echo " <optgroup label='Institutos'>";
							            					}
							            						
							            					echo "<option value='".$val['id_institucion']."'>".$val['institucion']."</option>";
							            				
							            					$i++;
							            						
							            				}
							            			}
							            		?>					            				           
							            	</select>
								      </td>
								      </td>
									    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									    <td><label>Plantel:</label></td>
									    <td>&nbsp;&nbsp;&nbsp;</td>
					    				<td>
					    					<select name="plantel" id="plantel" class="form-control" >
												<option value="0">[Seleccionar]</option>					            	            
											</select>
						   				</td>
						   				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td>
											<input class="btn btn-small" type="submit" name="Buscar" id="Buscar" value="Buscar">
										</td>
									</tr>
								</table>
							</form>
					</div>
				</div>
        	</div>
        	<!-- end Busca Promotor -->
        	<div class="row-fluid">
        	<?php if($registro==1 && isset($Coordinador) && $Coordinador!=null){ ?>
				<div class="span12">
					<div class="span12"></div>
					
        		</div>
        		<div id="span12">
        		  <div id="row-fluid">
					<form role="form" action="index.php/administrador/exportaExcel" method="post" target="_blank" id="FormularioExportacion">
					<p><img src="resources/images/btn_excel.png" class="botonExcel" style="cursor:pointer;" title="De click aquí para descargar en formato .xls"/></p>
						<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
						
						<h2><?php echo $datos['institucion'].' - '.$datos['plantel'];?></h2>
						
						<table  border="1" class= "table table-bordered table-striped table-hover table-condensed" id="Exportar_a_Excel"> <!-- table-bordered table-striped table-hover table-condensed-->
						<tr align="center">
								
								<th colspan="12" class="align-right">
								<p>REPORTE DE BENEFICIARIOS ACEPTADOS COMO COORDINADOR</p>  
									<?php //echo getMesesTrimestreLetra($trimestre);?><?php //echo$anio;?>
								</th>
							</tr>
							<tr>
								<th width="2%">#</th>
								<th>NOMBRE</th>
								<th >MATRICULA</th>
								<th>FOLIO</th>
								<th>DELEGACION</th>
								<th>INSTITUCION</th>
								<th>PLANTEL</th>
								<th>LUGAR APOYO</th>
								<th>EJE PREFERENTE</th>
								<th>CONTACTO</th>
								
								<th>CICLO</th>
							</tr>
							<?php 
							$i=1;
								foreach ($Coordinador as $val){
							?>
							
							<tr>
								<td><?php echo $i?></td>
								<td><?php echo $val['ap'].' '.$val['am'].' '.$val['nombre']?></td>
								<td><?php echo $val['matricula']?></td>
								<td><?php echo $val['folio']?></td>
								<td><?php echo $val['delegacion']?></td>
								<td><?php echo $datos['institucion']?></td>
								<td><?php echo $datos['plantel']?></td>
								<td><?php echo $val['lugar_apoyo']?></td>
								<td><?php if($val['eje_1']==2){echo 'Arte y Cultura';}elseif($val['eje_1']==3){echo'Ciencia y tecnología';}elseif($val['eje_1']==4){echo'Deporte y recreación';}elseif($val['eje_1']==5){echo'Economía solidaria';}elseif($val['eje_1']==6){echo'Medio ambiente';}elseif($val['eje_1']==7){echo'Participación juvenil';}elseif($val['eje_1']==8){echo'Salud';} ?></td>
								
								<td><?php echo $val['correo'].'<br>'.$val['telefono']?></td>
								<td><?php echo $val['ciclo_escolar']?></td>
							</tr>
								<?php 
								$i++;
								}
								?>
							
						</table>
						
					</form>
				</div>
				</div>
        	</div>
        	
        	<?php }?>
        	
        	
        	
        </div>
      </div>
	</div>
	
</body>
</html>

