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
 .btn-custom {
  background-color: hsl(320, 98%, 47%) !important;
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#E3157D", endColorstr="#E3157D");
  background-image: -khtml-gradient(linear, left top, left bottom, from(#E3157D), to(#E3157D));
  background-image: -moz-linear-gradient(top, #E3157D, #E3157D);
  background-image: -ms-linear-gradient(top, #E3157D, #E3157D);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #E3157D), color-stop(100%, #E3157D));
  background-image: -webkit-linear-gradient(top, #E3157D, #E3157D);
  background-image: -o-linear-gradient(top, #E3157D, #E3157D);
  background-image: linear-gradient(#E3157D, #E3157D);
  border-color: #ed029f #E3157D hsl(320, 98%, 45%);
  color: #FFFEFE !important;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.13);
  -webkit-font-smoothing: antialiased;
}
     
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
        	         	        	         	    	         	         	        	        	        	        	        	        	           
         

             $(".botonExcel").click(function(event) {
          		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
          		$("#FormularioExportacion").submit();
          	});    	        
             
        });//ready
        
       
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
											<li><a href="index.php/admin/">Inicio</a></li>
											<li class="divider-vertical"></li>
											<li class="dropdown">
									          <a href="#" class="dropdown-toggle nav-stacked" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bachillerato<span class="caret"></span></a>
									          <ul class="dropdown-menu">
									          	<!-- <li role="separator" class="divider"></li> -->
									          	<li><a href="index.php/admin/BuscaBC">Coordinadores</a></li>
									            <li><a href="index.php/admin/BuscaBP">Promotores</a></li>
									          </ul>
									        </li>
									        <li class="divider-vertical"></li>
									        <li class="dropdown">
									          <a href="#" class="dropdown-toggle nav-stacked" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Universidad <span class="caret"></span></a>
									          <ul class="dropdown-menu">
									          	
									            <li><a href="index.php/admin/BuscaUC">Coordinadores</a></li>
									            <li><a href="index.php/admin/BuscaUP">Promotores</a></li>
									          </ul>
									        </li>
									        <li class="active">
									          <a href="index.php/admin/salir">Salir</a>
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
               		
						
							
					<?php if ($nivel=='BACHILLERATO'){?>
						<form id="escuela" name="escuela" method="post" action="index.php/admin/BachilleratoC">
					<?php }elseif ($nivel=='UNIVERSITARIOS'){?>
						<form id="escuela" name="escuela" method="post" action="index.php/admin/UniversidadC">
					<?php }?>
							
								<h3>BUSQUEDA COORDINADORES <?php echo $nivel;?></h3>
								<table  border="0" style=" text-align:center !important;">
									<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
									<tr>
									  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									  <td><label>Delegacion:</label></td>
									  <td align="center"  width="30%">
				                        	<select id="id_delegacion" name="id_delegacion" class="form-control" style="width: 80%;">
				                        		<option value="-1">[Seleccionar]</option>
				                        		<option value="10">Álvaro Obregón</option>
												<option value="2">Azcapotzalco</option>
												<option value="14">Benito Juárez</option>
												<option value="3">Coyoacán</option>
												<option value="4">Cuajimalpa de Morelos</option>
												<option value="15">Cuauhtémoc</option>
												<option value="5">Gustavo A. Madero</option>
												<option value="6">Iztacalco</option>
												<option value="7">Iztapalapa</option>
												<option value="8">La Magdalena Contreras</option>
												<option value="16">Miguel Hidalgo</option>
												<option value="9">Milpa Alta</option>
												<option value="11">Tlahuac</option>
												<option value="12">Tlalpan</option>
												<option value="17">Venustiano Carranza</option>
												<option value="13">Xochimilco</option>
												<option value="14">Todas</option>
				                        	</select>
				                        </td>
								    	
								    	
								      
						   				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td>
											<input class="btn btn-custom" type="submit" name="Buscar" id="Buscar" value="Buscar">
										</td>
									</tr>
								</table>
							</form>
					
				</div>
        	</div>
        	<!-- end Busca Promotor -->
        	<div class="row-fluid">
        	
        	
        	<?php 
        	//print_r($datos);
        		if(isset($Coordinador) && $Coordinador!=null){ 
        	?>
				<div class="span12">
					<div class="span12"></div>
						<div class="row-fluid">
							<div class="span8"><div class="span12">&nbsp;</div></div>
								<!--  	
									<div class="span4">
										<div class="span8">&nbsp;</div>
										<div class="span3"><input class="btn btn-small btn-custom" type="button" onclick="valores()" name="nuevo" id="nuevo" value="Aprobar"></div>	
									</div>
								-->	
								</div>
			        		</div>
			        		<div id="span12">
								<form role="form" action="index.php/admin/exportaExcel" method="post" target="_blank" id="FormularioExportacion">
								
									<h2> DELEGACIÓN <?php echo strtoupper ($datos['delegacion']);?></h2>
									<p><img src="resources/images/btn_excel.png" class="botonExcel" style="cursor:pointer;" title="De click aquí para descargar en formato .xls"/></p>
								<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
									<table border="1" class= "table table-bordered table-striped table-hover table-condensed" id="Exportar_a_Excel">
									<tr align="center">
											
											<th colspan="<?php echo $con?>" class="align-right">
											<p>REPORTE DE BENEFICIARIOS  COORDINADOR <?php echo $nivel.' - '.strtoupper ($datos['delegacion']);?> </p>  
												<?php //echo getMesesTrimestreLetra($trimestre);?><?php //echo$anio;?>
											</th>
										</tr>
										<tr>
											
											<th>NOMBRE</th>
											<th>MATRICULA</th>
											<th>INSTITUCIÓN</th>
											<th>PLANTEL</th>
											<th>FOLIO</th>
											<?php if($con==10){?>
											<th>DELEGACION</th>
											<?php }?>
											<th>LUGAR APOYO</th>
											<th>EJE PREFERENTE</th>
											<th>CORREO</th>
											<th>TELEFONO</th>
											
										</tr>
										<?php 
											foreach ($Coordinador as $val){
										?>
										
										<tr>
											<td><?php echo $val['ap'].' '.$val['am'].' '.$val['nombre']?></td>
											<td><?php echo $val['matricula']?></td>
											<td><?php echo $val['institucion']?></td>
											<td><?php echo $val['plantel']?></td>
											<td><?php echo $val['folio']?></td>
											<?php if($con==10){?>
											<td><?php  echo $val['delegacion']?></td>
											<?php }?>
											<td><?php echo $val['lugar_apoyo']?></td>
											<td><?php if($val['eje_1']==2){echo 'Arte y Cultura';}elseif($val['eje_1']==3){echo'Ciencia y tecnología';}elseif($val['eje_1']==4){echo'Deporte y recreación';}elseif($val['eje_1']==5){echo'Economía solidaria';}elseif($val['eje_1']==6){echo'Medio ambiente';}elseif($val['eje_1']==7){echo'Participación juvenil';}elseif($val['eje_1']==8){echo'Salud';} ?></td>
											
											<td><?php echo $val['correo']?></td>
											<td><?php echo $val['telefono']?></td>
											
										</tr>
											
									<?php 	
								
								}
        					}
								?>
							
						</table>
					</form>
				</div>
        	</div>
        	
        	
        	
        	
        </div>
      </div>
	</div>
	
</body>
</html>