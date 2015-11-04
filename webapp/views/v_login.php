<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url(); ?>">
        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- End of Meta -->

        <title>Actividades en Comunidad</title>

        <link rel="shortcut icon" href="resources/images/favicon.ico">   

        <link type="text/css" href="resources/styles/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />	
        <link type="text/css" href="resources/styles/layout.css" rel="stylesheet" />		
        <link type="text/css" href="resources/styles/login.css" rel="stylesheet" />	

        <script type="text/javascript" src="resources/scripts/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="resources/scripts/jquery-ui-1.10.0.custom.min.js"></script>
        <script type="text/javascript" src="resources/scripts/md5.js"></script>
         <script type="text/javascript" src="resources/scripts/validaLogin.js"></script>
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
            #username{
                /*margin-top: -6px;
                margin-left: 5px;*/
                width: 91%;
                padding: 11px;
                /*border: 0px;*/
                background: #E8E8E8;
            }
            #password{
                /*margin-top: 1px;
                margin-left: 62px;*/
                width: 91%;
                padding: 11px;
                background: #E8E8E8;
            }
            #btn-submit{
                margin-top: 10px;
                margin-left: 8%;
                /*background-image: url('resources/images/error.png');*/
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
                opacity: 0.8;
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

        </style>
        
         <style>
	        div.growlUI { background: url('resources/images/warning.png') no-repeat 10px 10px }
			div.growlUI h2, div.growlUI h3 {
			    color: white; padding: 5px 5px 5px 75px; text-align: left
			}	        
        </style>			
    </head>
    <!-- <body style="background-image:url('<?php echo base_url(); ?>resources/images/fondo_df.png'); background-repeat: no-repeat no-repeat; background-attachment: fixed;"> -->
    <body style="background-image:url('<?php echo base_url(); ?>resources/images/login.jpg'); background-repeat: no-repeat no-repeat; background-size:cover; background-attachment:fixed;">
        <!-- <body> -->
        <br>
        <div>
                <!-- <img src="resources/images/logos2.png" style="margin-left:20%; width:40%;"> -->
        </div>
        <div style="text-align:center; margin-top:9%;">
            <?php
            if(isset($error) && $error)
            {
            
            ?> 
                <div class="growlUI" style="display:none">
		            <h2>Importante</h2>
		            <h3><?php echo $errorMsg; ?></h3>
		        </div>

                <script type="text/javascript">
                	$(document).ready(function() {
                    	
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
                    	
                    });
                </script>
                
            <?php
                unset($error);
            }
            ?>
            <center>
            
            	<div>
            		<img src="resources/images/logo_login.png" width="31%"/>
            	</div>
            	<br /><br /><br />
            	
                <div class="transbox" style="border: 1px solid #9D9CA1;">
                    <h1>Actividades en Comunidad</h1>
                    <form id="formulario" action="index.php/main/login" method="POST">
                        <table style=" width: 70%;">
                            <tr>
                                <td>
                                    <img src="<?php echo base_url(); ?>resources/images/ico_person.png">
                                </td>
                                <td>
                                    <input type="text" id="username" name="username" value="" placeholder="Ingrese Usuario"/>
                                </td>	
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url(); ?>resources/images/ico_key.png">
                                </td>
                                <td>
                                    <input type="password" id="password" name="password" value="" onKeyPress="firmaUsr(event);" placeholder="Ingrese Contrase&ntilde;a">
                                    <input type="hidden" id="passwordaux" name="passwordaux" value=""/>
                                </td>	
                            </tr>
                           <!-- <tr>
                                <td colspan="2">
                                    <input id="btn-submit" class="btn_login" type="button" value="Ingresar" onClick="valida();" style="cursor:pointer;"/>
                                </td>
                            </tr>-->
                        </table>
                        <input id="btn-submit" class="btn_login" type="button" value="Ingresar" onClick="valida();" style="cursor:pointer;"/>

                        <!--
                        <form id="formulario" action="index.php/main/login" method="POST">
                                <div id="myDiv">
                                        <input type="text" id="username" name="username" value="" />
                                        <br><br>
                                        <input type="password" id="password" name="password" value="" onKeyPress="firmaUsr(event);">
                                        <input type="hidden" id="passwordaux" name="passwordaux" value=""/>
                                </div>
                                <input id="btn-submit" class="btn_login" type="button" value="Ingresar" onClick="valida();" style="cursor:pointer;"/>
                        </form>
                        -->
                </div><!-- end transbox1 -->
                
                <span style="color: #9C99A0;">Fideicomiso Educación Garantizada del Distrito Federal<br />Dirección de Informática Tel: 1102 1730 Ext. 4006 y 4038.</span>
            </center>	
        </div>


        <!-- <div style="text-align:center; color:#8a8a8d; font-size:12px;">Dirección General de Auditoría Cibernética y Proyectos Tecnológicos</div> -->

    </body>
</html>