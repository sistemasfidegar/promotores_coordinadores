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
		.btn {
			  background: #e61e85;
			  background-image: -webkit-linear-gradient(top, #e61e85, #f2228e);
			  background-image: -moz-linear-gradient(top, #e61e85, #f2228e);
			  background-image: -ms-linear-gradient(top, #e61e85, #f2228e);
			  background-image: -o-linear-gradient(top, #e61e85, #f2228e);
			  background-image: linear-gradient(to bottom, #e61e85, #f2228e);
			  -webkit-border-radius: 2;
			  -moz-border-radius: 2;
			  border-radius: 2px;
			  text-shadow: 1px 1px 3px #ffffff;
			  -webkit-box-shadow: 0px 1px 3px #faf7fa;
			  -moz-box-shadow: 0px 1px 3px #faf7fa;
			  box-shadow: 0px 1px 3px #faf7fa;
			  font-family: Arial;
			  color: #ffffff;
			  font-size: 15px;
			  padding: 4px 43px 4px 43px;
			  border: solid #E3157D 1px;
			  text-decoration: none;
			}
			
			.btn:hover {
			  background: #f2228e;
			  background-image: -webkit-linear-gradient(top, #f2228e, #e61e85);
			  background-image: -moz-linear-gradient(top, #f2228e, #e61e85);
			  background-image: -ms-linear-gradient(top, #f2228e, #e61e85);
			  background-image: -o-linear-gradient(top, #f2228e, #e61e85);
			  background-image: linear-gradient(to bottom, #f2228e, #e61e85);
			  text-decoration: none;
			}
        
        </style>               
        
        <script type="text/javascript">
        
        $().ready(function() {
        	        	        	
        	$('[title]').qtip();     	 
        	         	        	         	    	         	         	        	        	        	        	        	        	           
             
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
             
      
        });//ready
        
                                                                              

        function irA(uri) {
            window.location.href = '<?php echo base_url(); ?>' + uri;
        }
        
        </script>
        
    </head>

    <body>
    
    <?php 
   
  
    ?>
       
        <div class="register-container container">
            <div class="row">
               
                <div class="register">
                    <form id="registra" action="index.php/main/muestra_formato_registro" method="post">
                    	<!-- <input type="hidden" id="matricula" name="matricula" value="<?php  echo $matricula; ?>" /> -->
                    	<input type="hidden" id="tiene_registro" name="tiene_registro" value=<?php echo $tiene_registro;?> />
                    	<input type="hidden" id="id_archivo" name="id_archivo" value="<?php echo $identificacion['id_archivo']; ?>" />
                    	<input type="hidden" id="tipo_registro" name="tipo_registro" value="" />
                        <div style="text-align:left; padding-left:20px; border-bottom: 2px dotted #bbb; min-height:73px;">
                        	<a href="index.php/main"><img src="resources/assets/img/logo_gdf_cgdf.png" style="padding-top:0px;" align="top" /></a>&nbsp;                                               	
                        </div>
                        <input type="hidden" id="ciclo" name="ciclo" value="<?php  echo $id_ciclo_actual; ?>" />	
                        <div style="text-align:center; padding-top:20px;">
                        	                        	                       
	                        <div id="dotos_personales">
		                        <label class="leyenda" style="color:#E6007E; text-align:left; padding-left:20px;">1. Identificación</label>		                        
		                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $identificacion['nombre']; ?>" title="Nombre" style="width:30%;" readonly >		                        		                        
	                        	<input type="text" id="paterno" name="paterno" placeholder="A. Paterno" value="<?php echo $identificacion['ap']; ?>" title="Apellido Paterno" style="width:30%;" readonly >		                       		                        		                        
		                        <input type="text" id="materno" name="materno" placeholder="A. Materno" value="<?php echo $identificacion['am']; ?>" title="Apellido Materno" style="width:30%;" readonly >
		                        <br />
		                        <input type="hidden" id="correo" name="correo" placeholder="Correo electrónico" value="<?php echo $identificacion['email']; ?>" title="Correo Electrónico" style="width:30%;" readonly > 
		                        <input type="hidden" id="tel" name="tel" placeholder="Teléfono" value="<?php echo $identificacion['telefono']; ?>" title="Teléfono" style="width:30%;" readonly >
		                        <!-- <input type="text" id="cel" name="cel" placeholder="Celular" value="<?php echo $identificacion['celular']; ?>" title="Celular" style="width:30%;" readonly >
		                         -->
		                         <br />
		                        <input type="text" id="curp" name="curp" placeholder="curp" value="<?php echo $identificacion['curp']; ?>" title="curp" style="width:46%;" readonly >
		                        <input type="text" id="matricula" name="matricula" placeholder="matricula" value="<?php echo $matricula; ?>" title="matricula" style="width:46%;" readonly >
	                        </div>
	                        
	                        
	         	            <br />
	         	            <div id="dotos_domicilio">           
	                        	<label class="leyenda" style="color:#E6007E;  text-align:left; padding-left:20px;">2. Domicilio</label>
	                        	<input type="text" id="calle" name="calle" placeholder="Calle" value="<?php echo $direccion['calle']; ?>" style="width:35%;" title="Calle" readonly >
	                        	<input type="text" id="noext" name="noext" placeholder="No. Exterior" value="<?php echo $direccion['noext']; ?>" style="width:10%;" title="No. Exterior" readonly >
	                        	<input type="text" id="noint" name="noint" placeholder="No. Interior" value="<?php echo $direccion['noint']; ?>" style="width:10%;" title="No. Interior" readonly >
	                        	<input type="text" id="manzana" name="manzana" placeholder="Manzana" value="<?php echo $direccion['manzana']; ?>" style="width:10%;" title="Manzana" readonly >
	                        	<input type="text" id="lote" name="lote" placeholder="Lote" value="<?php echo $direccion['lote']; ?>" style="width:10%;" title="Lote" readonly >
	                        	<input type="text" id="noedif" name="noedif" placeholder="No. Edificio" value="<?php echo $direccion['edificio']; ?>" title="No. Edificio" style="width:10%;" readonly >
	                        	<br />	                        	
	                        	<input type="text" id="nodpto" name="nodpto" placeholder="No. Dpto" value="<?php echo $direccion['departamento']; ?>" title="Departamento" style="width:10%;" readonly >
	                        	<input type="text" id="andador" name="andador" placeholder="Andador" value="<?php echo $direccion['andador']; ?>" title="Andador" style="width:10%;" readonly >
	                        	<input type="text" id="rampa" name="rampa" placeholder="Rampa" value="<?php echo $direccion['rampa']; ?>" title="Rampa" style="width:10%;" readonly >
	                        	<input type="text" id="pasillo" name="pasillo" placeholder="Pasillo" value="<?php echo $direccion['pasillo']; ?>" title="Pasillo" style="width:10%;" readonly >
	                        	<input type="text" id="villa" name="villa" placeholder="Villa" value="<?php echo $direccion['villa']; ?>" title="Villa" style="width:11%;" readonly >
	                        	<input type="text" id="entrada" name="entrada" placeholder="Entrada" value="<?php echo $direccion['entrada']; ?>" title="Entrada" style="width:10%;" readonly >
	                        	<input type="text" id="colonia" name="colonia" placeholder="Colonia" value="<?php echo $direccion['colonia']; ?>" title="Colonia" style="width:22%;" readonly >
	                        	<br />
	                        	<input type="text" id="delegacion" name="delegacion" placeholder="Delegación" value="<?php echo $direccion['delegacion']; ?>" title="Delegación" style="width:80%;" readonly >	                        	
	                        	<input type="text" id="cp" name="cp" placeholder="C.P." value="<?php echo $direccion['cp']; ?>" title="Código Postal" style="width:11%;" readonly >
	                        
	                        </div>
	                        
	                        <br />
	                        <div id="dotos_escolares">
	                        
	                        <?php 
	                        if($identificacion['id_archivo']!=3)
	                        {
	                        	$institucion = $escolar['institucion'];
	                        	$plantel = $escolar['plantel'];
	                        	$grado = $escolar['grado'];
	                        	$turno = $escolar['turno'];
	                        	$modalidad = $escolar['sistema'];
	                        	$promedio = $escolar['promedio'];
	                        	      
	                         }
	                        else 
	                        {
	                        	$institucion = $escolar['institucion_uni'];
	                        	$plantel = $escolar['plantel_uni'];
	                        	$grado = $escolar['grado_uni'];
	                        	$turno = $escolar['turno_uni'];
	                        	$modalidad = $escolar['sistema'];
	                        	$promedio = $escolar['promedio_uni'];
	                        	
	                        	
	                        }
	                        
	                        ?>
		                        <label class="leyenda" style="color:#E6007E;  text-align:left; padding-left:20px;">3. Datos escolares</label>
		                        <input type="text" id="institucion" name="institucion" placeholder="Institución" value="<?php echo $institucion; ?>" title="Institución" style="width:36%;" readonly >
	                        	<input type="text" id="plantel" name="plantel" placeholder="Plantel" value="<?php echo $plantel; ?>" title="Plantel" style="width:35%;" readonly >
	                        	           	
	                        	<input type="text" id="grado" name="grado" placeholder="Grado" value="<?php echo $grado; ?>" title="Grado" style="width:8%;" readonly >
	                        	<input type="text" id="turno" name="turno" placeholder="Turno" value="<?php echo $turno; ?>" title="Turno" style="width:8%;" readonly >
	                        	
	                       	</div>    	                       
	                        
	                      
						    

                       </div>
                            <?php if($Dpromotor!=0){?>                
                        	<button id="guardar_promotor" type="button" style="font-weight:bold;">Registrarse como "PROMOTOR"</button>
                        	<?php }?>
                        	<?php if($es_promotor==1 && ($Dcoordinador!=0)){?>
                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        	<button id="guardar_coordinador" type="button" style="font-weight:bold;">Registrarse como "COORDINADOR"</button>
                        	<?php }
                        	if($Dpromotor==0 && $es_promotor==0){
                        	?>
                        	<div style="text-align:center; color:#8a8a8d; font-size:24px;">
                        		<br>LO SENTIMOS PERO YA NO QUEDAN LUGARES COMO PROMOTOR PARA TU DELEGACIÓN<br>
                        		 
                        	</div>
                        	<br><br>
                        	<div style="text-align:center; padding-left:20px;  min-height:73px;" class="span10">
				                <a href="index.php/main" class="btn">Terminar</a>                                         	
				            </div>
                        	
                        	<?php 
                        	}
                        	?>
                                                                  
                    </form>
                   
                </div>
            </div>
        </div>
        
        
        <!-- Javascript -->
        <script src="resources/assets/js/jquery.backstretch.min.js"></script>
        <script src="resources/assets/js/scripts.js"></script>
       
      
             
    </body>

</html>

