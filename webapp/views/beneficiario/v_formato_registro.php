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
		
		<script type="text/javascript" src="resources/scripts/jquery.blockUI.js"></script>
       
                 
        
        
        <style>
        .error-message, label.error {
        color: #ff0000;   
        margin:0;
        display: inline;
        font-size: 15px !important;
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
	        border: 15px dotted red; 
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
		
        
        </style>               
        
        <script type="text/javascript">
        
        $().ready(function() {
        	        	        	
        	$('[title]').qtip(); 
        	$("#telefono").numeric();    	 
        	         	        	         	    	         	         	        	        	        	        	        	        	           
        	 $("#formulario").validate(
        			 	{
        			 	 	rules: {   
            			 	 	eje_1: "selectNone",
             		        	eje_2: "selectNone",
             		        	eje_3: "selectNone",
             		        	eje_4: "selectNone",
             		        	eje_5: "selectNone",
             		        	eje_6: "selectNone",
             		        	eje_7: "selectNone",
             		        	lugar: "required",
             		        	actividad_1: "required",
             		        	actividad_2: "required",
             		        	actividad_3: "required",
             		        	email:{required : true, estructuraemail: true},
             		        	telefono: "required"   },
        			        messages: { 
            			        lugar: {required: "Campo obligatorio"},
             		        	actividad_1: {required: "Campo obligatorio"},
             		        	actividad_2: {required: "Campo obligatorio"},
             		        	actividad_3: {required: "Campo obligatorio"},
             		        	email: {required: "Campo obligatorio", estructuraemail: "Introduce un email valido"},
             		        	telefono: {required: "Campo obligatorio"}
             		        	}
        			    //   ignore: ":not(:visible),:disabled"}
        			    });

			    
     
     	 		jQuery.validator.addMethod(
     	            "selectNone",
     	            function (value, element) {
     	                if (element.value == "")
     	                    return false;
     	                else
     	                    return true;
     	            },
     	            "Debes seleccionar una opción"
     	 		);

     	 		jQuery.validator.addMethod("estructuraemail",function (value, element)
             			{
             			 //console.log(value);
             			 var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
             				
             				if (patron.test(element.value)){
             					
             						return true;
             				}
             				else{
             						return false;
             				}
             			},"Introduce un email valido");
     	 		 $("#guardar").click(function ()
     	 		 { 
     	 			  if($('#formulario').valid())
     	 			  {
         	 			  if($("#terminos").is(':checked'))
         	 			  {
     	 				  	$.blockUI({message: 'Procesando por favor espere...'});
     	 					$('#formulario').submit();
         	 			  }
         	 			  else
         	 			  {
         	 				 swal({
	                         	  title: "Debes aceptar los terminos",
	                         	  text: "",
	                         	  type: "error",
	                         	  showCancelButton: false,
	                         	  confirmButtonColor: "#C9302C",
	                         	  confirmButtonText: "Ok",
	                         	  //cancelButtonText: "No, cancel plx!",
	                         	  closeOnConfirm: true
	                         	  //closeOnCancel: false
	                         	},
	                         	function(isConfirm){
	                         	  if (isConfirm) {
	                         		 //irA('index.php/operador/listado');
	                         	  } 
	                         });


             	 		   }
     	 						            
     	 			  }

     	 		 });
        	

        });//ready
        
                                                                              

        function irA(uri) {
            window.location.href = '<?php echo base_url(); ?>' + uri;
        }
        
        </script>
        
         <style type="text/css">
		.hidden { display: none; }
		</style>
		
		
    <script type="application/x-javascript">
    $(function () {
    	function restrict_multiple(selector) {
            // Aqui establece el valor actual en su alt
            $(selector).each(function () {
                $(this).attr("alt", $(this).val());
            })
            // Disparador cuando cambia el select
            $(selector).change(function () {
                // Eliminando el hidden del option
                $(selector + " option").removeClass("hidden");
                
                // Se usa el alt attr, como aun auxiliar para mantener el valor que esta activo
                $(this).attr("alt", $(this).val())
                
                // Creando un arreglo con las opciones seleccionadas
                var selected = new Array();
                
                // Cada opcion seleccionada se ingresa en el arreglo
                $(selector + " option:selected").each(function () {
                    selected.push(this.value);
                })
                           
                // Ocultando los seleccionados ya, para no verlos en los demas selects
                for (k in selected) {
                    if( selected[k] != "" ){
                        $(selector + "[alt!=" + selected[k] + "] option[value=" + selected[k] + "]").addClass("hidden")
                    }
                }
                
            })
            
            // Disparador para que se mantenga actualizado todos los selects
            $(selector).each(function () { $(this).trigger("change"); })
        }
        
        //Rellamo la función pasandole el class
        restrict_multiple(".excluyent-select");
        })
    </script>
        
    </head>

    <body>
    
          
        <div class="register-container container">
            <div class="row">
               
                <div class="register">
                    <form id="formulario" action="index.php/main/guarda_registro" method="post">
                    	<input type="hidden" id="matricula" name="matricula" value="<?php  echo $matricula; ?>" />
                    	<input type="hidden" id="id_archivo" name="id_archivo" value="<?php  echo $id_archivo; ?>" />
                    	<input type="hidden" id="tipo_registro" name="tipo_registro" value="<?php  echo $tipo_registro; ?>" />
                    	<input type="hidden" id="delegacion" name="delegacion" value="<?php  echo $delegacion; ?>" />
                    	<input type="hidden" id="ciclo" name="ciclo" value="<?php  echo $id_ciclo; ?>" />
                    	<input type="hidden" id="tiene_registro" name="tiene_registro" value=<?php echo $tiene_registro;?> />	
                        <div style="text-align:left; padding-left:20px; border-bottom: 2px dotted #bbb; min-height:73px;">
                        	<a href="index.php/main"><img src="resources/assets/img/logo_gdf_cgdf.png" style="padding-top:0px;" align="top" /></a>&nbsp;                                               	
                        </div>
                        
                        <div style="text-align:center; padding-top:20px;">
                        	                        	                       
	                        <div id="ejes">
		                        <label class="leyenda" style="color:#E6007E; text-align:left; padding-left:20px;">Ordena los ejes temáticos de acuerdo a tu preferencia</label>		                        
		                        								 
								 <div style="text-align:left !important; display:block; padding-left:20px; padding-top:5px;">
								 		
								 		<div style="text-align: left; display:inline-block;">
											<span style="font-weight: bold; font-size:20px;">1. </span><select name="eje_1" id="eje_1" class="excluyent-select">
									            <option value="">[Seleccionar]</option>						
									            <option value="2">Arte y Cultura</option>
									            <option value="3">Ciencia y Tecnología</option>
												<option value="4">Deporte y Recreación</option>
												<option value="5">Economía Solidaria</option>
												<option value="6">Medio Ambiente</option>
												<option value="7">Participación Juvenil</option>
												<option value="8">Salud</option>												           
									        </select>
								        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								        
								        <div style="text-align: left; display:inline-block;">
									         <span style="font-weight: bold; font-size:20px;">2. </span><select name="eje_2" id="eje_2" class="excluyent-select">
									            <option value="">[Seleccionar]</option>						
									            <option value="2">Arte y Cultura</option>
									            <option value="3">Ciencia y Tecnología</option>
												<option value="4">Deporte y Recreación</option>
												<option value="5">Economía Solidaria</option>
												<option value="6">Medio Ambiente</option>
												<option value="7">Participación Juvenil</option>
												<option value="8">Salud</option>												           
									        </select>
								        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								        
								        <div style="text-align: left; display:inline-block;">
									         <span style="font-weight: bold; font-size:20px;">3. </span><select name="eje_3" id="eje_3" class="excluyent-select">
									            <option value="">[Seleccionar]</option>						
									            <option value="2">Arte y Cultura</option>
									            <option value="3">Ciencia y Tecnología</option>
												<option value="4">Deporte y Recreación</option>
												<option value="5">Economía Solidaria</option>
												<option value="6">Medio Ambiente</option>
												<option value="7">Participación Juvenil</option>
												<option value="8">Salud</option>												           
									        </select>
								        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								        
								        <br />
								        <div style="text-align: left; display:inline-block;">
									        <span style="font-weight: bold; font-size:20px;">4. </span><select name="eje_4" id="eje_4" class="excluyent-select">
									            <option value="">[Seleccionar]</option>						
									            <option value="2">Arte y Cultura</option>
									            <option value="3">Ciencia y Tecnología</option>
												<option value="4">Deporte y Recreación</option>
												<option value="5">Economía Solidaria</option>
												<option value="6">Medio Ambiente</option>
												<option value="7">Participación Juvenil</option>
												<option value="8">Salud</option>												           
									        </select>
								        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								        
								        
								        
								        <div style="text-align: left; display:inline-block;">								     
									        <span style="font-weight: bold; font-size:20px;">5. </span><select name="eje_5" id="eje_5" class="excluyent-select">
									            <option value="">[Seleccionar]</option>						
									            <option value="2">Arte y Cultura</option>
									            <option value="3">Ciencia y Tecnología</option>
												<option value="4">Deporte y Recreación</option>
												<option value="5">Economía Solidaria</option>
												<option value="6">Medio Ambiente</option>
												<option value="7">Participación Juvenil</option>
												<option value="8">Salud</option>												           
									        </select>
								        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								        
								        <div style="text-align: left; display:inline-block;">
									        <span style="font-weight: bold; font-size:20px;">6. </span><select name="eje_6" id="eje_6" class="excluyent-select">
									            <option value="">[Seleccionar]</option>						
									            <option value="2">Arte y Cultura</option>
									            <option value="3">Ciencia y Tecnología</option>
												<option value="4">Deporte y Recreación</option>
												<option value="5">Economía Solidaria</option>
												<option value="6">Medio Ambiente</option>
												<option value="7">Participación Juvenil</option>
												<option value="8">Salud</option>												           
									        </select>
								        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								        
								        <br />
								        <div style="text-align: left; display:inline-block;">
									         <span style="font-weight: bold; font-size:20px;">7. </span><select name="eje_7" id="eje_7" class="excluyent-select">
									            <option value="">[Seleccionar]</option>						
									            <option value="2">Arte y Cultura</option>
									            <option value="3">Ciencia y Tecnología</option>
												<option value="4">Deporte y Recreación</option>
												<option value="5">Economía Solidaria</option>
												<option value="6">Medio Ambiente</option>
												<option value="7">Participación Juvenil</option>
												<option value="8">Salud</option>												           
									        </select>
								        </div>
						        </div>
						        
	                        </div>
	                        
	                        
	                        <?php 
	                        
	                        $leyenda = "Describe brevemente 3 actividades en comunidad que te gustaría desarrollar como Promotor";
	                        $tipo ="Promotor";
	                        if($tipo_registro==1)
	                        {
	                        	$leyenda = "Describe brevemente 3 actividades que realizas como Promotor actualmente, o que realizaste en el semestre anterior";
	                        	$tipo ="Coordinador";
	                        	
	                        }
	                        ?>
	         	   <!--     <br />
	         	            <div id="lugar">           
	                        	<label class="leyenda" style="color:#E6007E;  text-align:left; padding-left:20px;">Indica el lugar donde te gustaría apoyar como <?php echo $tipo;?></label>	                        	
	                        	 <input type="text" id="lugar" name="lugar" placeholder="Espacio público, parque, deportivo, plantel, e.t.c" value="" title="Lugar" >                       	
	                        
	                        </div>
	                  -->
	                        
	                        <br />
	                        <div id="descripción">	                        	                       
		                        <label class="leyenda" style="color:#E6007E;  text-align:left; padding-left:20px;"><?php echo $leyenda; ?></label>
		                        <input type="text" id="actividad_1" name="actividad_1" placeholder="Actividad #1" value="" title="Actividad #1" ><br />
		                        <input type="text" id="actividad_2" name="actividad_2" placeholder="Actividad #2" value="" title="Actividad #2" ><br />
		                        <input type="text" id="actividad_3" name="actividad_3" placeholder="Actividad #3" value="" title="Actividad #3" >
	                        	
	                       	</div>
	                       	
	                       	<br />
	                       	<div id="datos_contacto">	                        	                       
		                        <label class="leyenda" style="color:#E6007E;  text-align:left; padding-left:20px;">Verifica tus datos de contacto</label>
		                        	<br />
		                       	<table border="0" style=" width: 90%; text-align: left;">
		                       	<tr>
		                       	<td width="2%"></td>
			                    <td width="40%"> <span style="font-weight: bold; font-size:20px; ">Correo:&nbsp;&nbsp;&nbsp; </span><input type="text" id="email" name="email" placeholder="Correo Electrónico" value="<?php echo $correo; ?>" title="Correo Electrónico" style="width:90%;  text-transform:uppercase;" ></td>
			                    <td width="6%"></td>
			                    <td width="20%"> <span style="font-weight: bold; font-size:20px;">Telefono: </span><input type="text" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo $tel; ?>" title="Teléfono" style="width:90%;" maxlength="10"></td>
			                    <td width="10%"></td>
			                    <td width="20%"> <span style="font-weight: bold; font-size:20px;">Turno: </span>
			                   
									<select id="turno" name="turno" class="form-control"  style="width: 90%;">
							        	<option value="-1">[Seleccionar]</option>
							            <option <?php if($turno=='Matutino'){ echo "selected='selected'";} ?> value="Matutino">Matutino</option>
										<option <?php if($turno=='Vespertino'){ echo "selected='selected'";} ?> value="Vespertino">Vespertino</option>
										<option <?php if($turno=='Nocturno'){ echo "selected='selected'";} ?> value="Nocturno">Nocturno</option>
										<option <?php if($turno=='Sabatino'){ echo "selected='selected'";} ?> value="Sabatino">Sabatino</option>
										<option <?php if($turno=='Sin Turno'){ echo "selected='selected'";} ?> value="Sin Turno">Sin Turno</option>
										<option <?php if($turno=='Mixto'){ echo "selected='selected'";} ?> value="Mixto">Mixto</option>
						            </select>		                    	
			                    </tr>
		                        </table>	
	                        	<br />
	                        	<br />
	                        	
	                        	<div style="text-align: left; padding-left:15px;">
	                        		<input type="checkbox" id="terminos" name="terminos" value="1" style="width:2%;"> Acepto los términos y condiciones, <a href="resources/archivos/acepto.pdf" target="_blank">Leer.</a>
	                        	</div>
	                       	</div>       	                       
	                        
	                      
						    

                       </div>                                             
                        <button id="guardar" type="button" style="font-weight:bold; width:98%">CONCLUIR EL REGISTRO</button>                        	                                                                 
                    </form>
                   
                </div>
            </div>
        </div>
        
        
        <!-- Javascript -->
        <script src="resources/assets/js/jquery.backstretch.min.js"></script>
        <script src="resources/assets/js/scripts.js"></script>
       
      
             
    </body>

</html>

