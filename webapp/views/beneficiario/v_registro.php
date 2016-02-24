<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url(); ?>">
        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- End of Meta -->

        <title>Registro de promotores y coordinadores del Programa "Prepa Sí"</title>

        <link rel="shortcut icon" href="resources/images/favicon.ico">   

        <link type="text/css" href="resources/styles/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />	
        <link type="text/css" href="resources/styles/layout.css" rel="stylesheet" />		
        <link type="text/css" href="resources/styles/login.css" rel="stylesheet" />	

        <script type="text/javascript" src="resources/scripts/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="resources/scripts/jquery-ui-1.10.0.custom.min.js"></script>
                 
        <script type="text/javascript" src="resources/scripts/jquery.blockUI.js"></script>
        <!-- End of Libraries -->

        <style type="text/css">
            input.error_campo {
                border:2px solid #7F0000;		   		    
                background-image: url('resources/images/error.png');
                background-position: right center;
                background-repeat: no-repeat;
                background-color: #FFBFBF !important;	   
            }		

            #myDiv{
                padding-top: 60px;
            }
            
            #btn-submit{
                margin-top: 10px;
               /* margin-left: 8%;*/               
                padding: 8px;
                background: #E8E8E8;
                color: #000;
                font-weight: bold;
            }
            #btn-submit:hover{
                color: #c4007a;
                background-color: #eee;
            }

            #btn-submit:active{
                background: #A9A9A9;
            }
            
            .transbox{
                width: 33%;
                padding: 30px;
                /*border: 1px solid black;*/
                background-color: #F8F8F8 ;
                opacity: 0.9;
                filter: alpha(opacity=85); /* For IE8 and earlier */
                border-radius: 5px;
            }


            .transbox h1{
                color: #c4007a;
                font-weight: bold;
                font-family: Helvetica;
            }

            div.transbox1 {
                text-align: center;
                margin: 30px;
                background-color: #ffffff;
                border: 1px solid black;
                opacity: 0.5;
                filter: alpha(opacity=50); /* For IE8 and earlier */
                width: 33%;
            }
            
            div.growlUI { background: url('resources/images/warning.png') no-repeat 10px 10px }
			div.growlUI h2, div.growlUI h3 {
			    color: #ffffff; padding: 5px 5px 5px 75px; text-align: left
			}	 

        </style>
        
                 
        <script>
    	jQuery(document).ready(function(){


    		$("#btn-submit").click(function () {

        		var matricula = '';
        		var matricula_escuela = '';
        		var busqueda =$('input:radio[name=busqueda]:checked').val();

        		
        			
        		
        		if(busqueda =='reimpresion')
        		{
        			$.blockUI({message: 'Procesando por favor espere...'});
    	        	jQuery.ajax({
    		            type: 'post',
    		            dataType: 'html',
    		            url: 'index.php/main/ajax_beneficiario_registrado',
    		            data: {matricula: $("#matricula_asignada").val()},
    		            success: function (data) {

        		            if(data!="bad")
        		            {
	    		            	matricula = data;
	    		            	irA('index.php/main/mensaje/'+matricula);	               
        		            }
        		            else
        		            {
            		            alert('No se encontró al beneficiario');
            		            irA('index.php/main/');

            		        }
    		            }
    		            
    		        });
        			
        		}
        		else
            	{
	        		if($("#matricula_asignada").val() != "" && $("#matricula_asignada").val().length>10 && busqueda =='inscripcion')
	    	        {
	    				$.blockUI({message: 'Procesando por favor espere...'});
	    	        	jQuery.ajax({
	    		            type: 'post',
	    		            dataType: 'html',
	    		            url: 'index.php/main/ajax_beneficiario_registrado',
	    		            data: {matricula: $("#matricula_asignada").val()},
	    		            success: function (data) {
	
	        		            if(data!="bad")
	        		            {
		    		            	matricula = data;
		    		            	irA('index.php/main/muestra_informacion/'+matricula);	               
	        		            }
	        		            else
	        		            {
	            		            alert('No se encontró al beneficiario');
	            		            irA('index.php/main/');
	
	            		        }
	    		            }
	    		            
	    		        });
	             
	    	        }
	    			else if($("#matricula_escuela").val() != "" && busqueda =='inscripcion'){
	
	    				$.blockUI({message: 'Procesando por favor espere...'});
	    	        	jQuery.ajax({
	    		            type: 'post',
	    		            dataType: 'html',
	    		            url: 'index.php/main/ajax_beneficiario_unam',
	    		            data: {matricula_escuela: $("#matricula_escuela").val()},
	    		            success: function (data) {
	
	        		            if(data!="bad")
	        		            {
		    		            	matricula = data;
		    		            	irA('index.php/main/muestra_informacion/'+matricula);	               
	        		            }
	        		            else
	        		            {
	            		            alert('No se encontró al beneficiario');
	            		            irA('index.php/main/');
	
	            		        }
	    		            }
	    		            
	    		        });
	    			}
	    			else
	    			{
	    				$.blockUI({ 
	                        message: $('div.growlUI'), 
	                        fadeIn: 700, 
	                        fadeOut: 700, 
	                        timeout: 6000, 
	                        showOverlay: false, 
	                        centerY: false, 
	                        css: { 
	                            width: '350px', 
	                            top: '10px', 
	                            left: '', 
	                            right: '10px', 
	                            border: 'none', 
	                            padding: '5px', 
	                            backgroundColor: '#000', 
	                            '-webkit-border-radius': '10px', 
	                            '-moz-border-radius': '10px', 
	                            opacity: .6, 
	                            color: '#fff' 
	                        } 
	                    }); 
	
	        		}  
        		}      

    		});


    	        
   	     
   	    });//fin ready

   	 function irA(uri) {
         window.location.href = '<?php echo base_url(); ?>' + uri;
     }
        </script>
        			
    </head>
    
    <body style="background-image:url('<?php echo base_url(); ?>resources/images/login.jpg'); background-repeat: no-repeat no-repeat; background-size:cover; background-attachment:fixed;">
        <!-- <body> -->
        <br>
        <div>
                <!-- <img src="resources/images/logos2.png" style="margin-left:20%; width:40%;"> -->
        </div>
        <div style="text-align:center; margin-top:4%;">
           
            <center>            
            	<div>
            		<img src="resources/images/logo_login.png" width="31%"/>
            	</div>
            	<br /><br />
            	
                <div class="transbox" style="border: 1px solid #9D9CA1;">
                    <h1>Registro de Promotores y Coordinadores <br />"Prepa Sí"</h1>
                    
                    <label>Elige un método de busqueda</label><br/><br>
                    
                    <form id="formulario" action="index.php/main/valida_matricula" method="POST">
                    
                        <table style=" width: 80%;" border="0">
                        	<tr>
                                <td align="center" colspan="2">
                                    <input type="text" id="matricula_asignada" name="matricula_asignada" value="" placeholder="Ingresa tu matrícula PS o CURP" style="width:98%; text-transform:uppercase;"/>
                                </td>	
                            </tr>
                            <tr>
                                <td align="center"></td>	
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <input type="text" id="matricula_escuela" name="matricula_escuela" value="" placeholder="matricula (unam)" style="width:98%; text-transform:uppercase;"/>
                                </td>	
                            </tr>
                            <tr>
                                <td align="center"></td>	
                            </tr>
                            <tr>
                                <td align="center" width="40%"><input type="radio" id="busqueda" name="busqueda"  value="inscripcion" checked="checked"> Inscripcion </td>
                                <td align="center" width="40%"><input type="radio" id="busqueda" name="busqueda"  value="reimpresion">Reimpresión</td>	
                            </tr>  
                            <tr>
                                <td align="center" colspan="2">
                                <br />
                                    <input id="btn-submit" class="btn_login" type="button" value="Iniciar registro"  style="cursor:pointer;"/>
                                </td>	
                            </tr>  
                            
                            <tr>
                                <td align="center" colspan="2">
                                	<br />
                                    <span style="color: #E3157D;">Fideicomiso Educación Garantizada del Distrito Federal<br />Coordinación Ejecutiva del Programa de Estímulos para el Bachillerato Universal<br />Tel: 1102 1730 &nbsp;&nbsp;Ext. 4087, 4089, 4128.</span>
                                </td>	
                            </tr>   
                                                                              
                        </table>                        
                      
                </div><!-- end transbox1 -->
                
                
            </center>	
        </div>

        <div class="growlUI" style="display:none">
		    <h2>Importante:<br />Matrícula o CURP incorrectos</h2>		            
		</div>

        <!-- <div style="text-align:center; color:#8a8a8d; font-size:12px;">Dirección General de Auditoría Cibernética y Proyectos Tecnológicos</div> -->

    </body>
</html>