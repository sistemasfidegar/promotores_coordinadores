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
		
        
        </style>               


<?php 
	
	$fol= trim($folio['clave']).str_pad($folio['consecutivo'],5,0,STR_PAD_LEFT);
	$nom= $identificacion['nombre'].' '.$identificacion['ap'].' '.$identificacion['am'];
	

	
?>
    </head>
<page>
    <body>
   <div id="registro" class="register-container container">
   	<div class="row">
   	
    	<div  class="register">
        	<form id="formulario" method="post" action="index.php/main/generar">
            	<div style="text-align:left; padding-left:20px; border-bottom: 2px dotted #bbb; min-height:73px;">
                	<a href="index.php/main"><img src="resources/assets/img/logo_gdf_cgdf.png" style="padding-top:0px;" align="top" /></a>&nbsp;                                               	
                </div>
               	<div id="dotos_personales">
               	<label><h3>Comprobante de registro como <?php if ($tipo_registro==1){echo 'coordinador ';$reg='COORDINADOR';}elseif ($tipo_registro==2){echo 'promotor';$reg='PROMOTOR';}?> del programa Prepa Sí</h3></label>
               	<p><h5><?php echo $escuela['institucion'].' / '.$escuela['plantel'];?></h5></p>
               	<br /><label class="leyenda" style="color:#E6007E; text-align:center; padding-left:20px;"><?php echo $nom;?></label><br>
		        	<p>TU FECHA DE REGISTRO ES: <b><?php echo $fecha['fecha_registro'];?></b></p>
		        	<p>TU N&Uacute;MERO DE FOLIO ES:<br /><br /> <b><?php echo $fol;?></b></p>		                        
		            <p>HAS QUEADO REGISTRADO, TE SUGERIMOS ESTAR AL PENDIENTE DE TU CORREO <br><br><u><?php echo $identificacion['email'];?></u><br><br></p>
		            <p></p>
		            <br />
		       </div>
		       <input type="hidden" id="nombre" name="nombre" value="<?php  echo $nom; ?>" />
		       <input type="hidden" id="plantel" name="plantel" value="<?php echo $escuela['plantel']; ?>" />
		       <input type="hidden" id="institucion" name="institucion" value="<?php echo $escuela['institucion'];?>">
               <input type="hidden" id="folio" name="folio" value="<?php echo $fol;?>" />
               <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha['fecha_registro'];?>" />
               <input type="hidden" id="tipo_registro" name="tipo_registro" value="<?php echo $reg;?>" />
               <input type="hidden" id="correo" name="correo" value="<?php echo $identificacion['email'];?>" />
         <td align="center" colspan="7">
	    <hr />
	        <input type="submit" value="Imprimir" title="Crear PDF" />
        </td>
		</div>      
	      </form>
	     
	 </div>
</div>
	         <!-- Javascript -->
        <script src="resources/assets/js/jquery.backstretch.min.js"></script>
        <script src="resources/assets/js/scripts.js"></script>
        </body>
        </html>
      </page>
      <?php 

      
      ?>