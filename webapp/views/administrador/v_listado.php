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
        
        <script type="text/javascript">
        
        $().ready(function() {
        	        	        	
        	$('[title]').qtip();     	 
        	         	        	         	    	         	         	        	        	        	        	        	        	           
             
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
                    <form id="registra" action="index.php/main/" method="post">
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
					
				<center>
				    <div style="text-align:center !important;">
						<img src="resources/images/tituloCP.png" />
					</div>
					<br><br>		
				    <div class="row" style="width:100%; vertical-align:bottom; text-align:center !important;">
				    	<center>
				       
				        
				        <div style="text-align:center !important;" class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
				            <img src="resources/images/logo_ps.png" style="border:0px solid  #000000;"/>
				        </div>
				        
				         <div style="text-align:center !important;" class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
				            <img src="resources/images/transparente.png" />
				        </div> 
				        </center>   
				    </div>
    			</center> 
			</form>
                </div>
            </div>
        </div>
        </body>
        </html>
     
