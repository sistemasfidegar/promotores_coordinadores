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
                if ('<?php echo $usuario[0]['email']; ?>' != element.value)
                    return ((eval("$.ajax({\n\
                                type: 'POST',\n\
                                url: '<?php echo base_url(); ?>index.php/administrador/validar_correo',\n\
                                data: {usr_email: element.value},\n\
                                async: false}).responseText") == '--ok') ? (true) : (false));
                else
                    return true;
            },
            "Correo electrónico registrado con anterioridad."
    );

    $().ready(function () {

        $("#changePassword").validate({
            rules: {
                contrasena: {required: true, minlength: 5},
                contrasena_conf: {required: true, minlength: 5, equalTo: "#contrasena"}
            },
            messages: {
                contrasena: {required: "Este campo es obligatorio", minlength: "La contraseña debe ser de mas de 5 caracteres"},
                contrasena_conf: {required: "Este campo es obligatorio", minlength: "La contraseña debe ser de mas de 5 caracteres", equalTo: "Las contraseñas no coinciden"}
            },
            ignore: ":not(:visible),:disabled",
            submitHandler: function (form) {
                $.post("<?php echo base_url(); ?>index.php/administrador/cambiarPassword/<?php echo $usuario[0]['id_usuario'] ?>", {password: $('#contrasena').val()}).done(function (data) {
                                    if (data === '--ok')
                                    {
                                        bootbox.hideAll();
                                        bootbox.alert("la contraseña se cambio exitosamente.");
                                    }
                                });
                            }
                        });


                        $("#form_usuario").validate(
                                {
                                    rules: {                                        
                                        id_perfil: "selectNone",
                                        nombre: "required",
                                        paterno: "required",
                                        materno: "required",
                                        usuario: "required",
                                       
                                        correo: "required email unique-correo"
                                    },
                                    messages: {
                                        nombre: "Campo obligatorio",
                                        paterno: "Campo obligatorio",
                                        materno: "Campo obligatorio",
                                        usuario: "Campo obligatorio",
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
                                        if(data === '--ok')
                                        {
                                        	bootbox.alert("Se actualizó la información exitosamente.", function () {
                                                irA("index.php/administrador/listadoUsuarios");
                                             });
                                        }
                                        else
                                        {
                                            alert("Ocurrio un error durante el registro.");
                                        }
                                    }
                                });
                            }
                        });
                    });
                    function irA(uri) {
                        window.location.href = '<?php echo base_url(); ?>' + uri;
                    }

                    function openDialog(dialog, id) {
                        ide = id;
                        $("#" + dialog).dialog("open");
                    }

                    function changePassword(seg)
                    {
                        idSeguimiento = seg;
                        bootbox.dialog({
                            title: "Cambiar Contraseña",
                            message: $('#changePassword'),
                            show: false
                        }).on('shown.bs.modal', function () {
                            $('#changePassword').show();
                            $('#contrasena').val('');
                            $('#contrasena_conf').val('');
                        }).on('hide.bs.modal', function (e) {
                            $('#changePassword').hide().appendTo('body');
                        }).modal('show');

                    }

</script>

<div class="box">     
        <div class="box-body table-responsive">
			<div class="pad20" style="text-align:left; width:90%;">
			    <br />
			    &nbsp;&nbsp;&nbsp;<img src="resources/images/iden_usuarios.png" />
			    <br /><br />
			</div>
	
			<div class="ui-widget-content" style="width:90%">
			    <form action="index.php/administrador/actualizarUsuario/<?php echo $usuario[0]['id_usuario'] ?>" name="form_usuario" method="post" id="form_usuario">
			        <table id="form_usr" border="0">
			            <tr>
			                <td style="text-align:right;">Delegación:</td>
			                <td colspan="5" >                   
			                    <select name="id_delegacion" id="id_delegacion" style="width: 98%; display: block;" class="select_insert">
			                        <option value="0">[No aplica]</option>
			                        <?php foreach ($delegaciones as $registro) { ?>
			                            <option value="<?php echo $registro['id_delegacion'] ?>" <?php if ($usuario[0]['id_delegacion'] == $registro['id_delegacion']) echo "selected='selected'" ?>><?php echo $registro['delegacion']; ?></option>;
			                        <?php
			                        }
			                        ?>
			                    </select>
			                </td>                 
			            </tr>
			            <tr>
			                <td style="text-align:right; ">Perfil:</td>
			                <td colspan="5" >                   
			                    <select name="id_perfil" id="id_perfil" style="width: 98%; display: block;" class="select_insert">
			                        <option value="0">--Seleccionar--</option>
			                        <?php foreach ($perfiles as $registro) { ?>
			                            <option value="<?php echo $registro['id_perfil'] ?>" <?php if ($usuario[0]['id_perfil'] == $registro['id_perfil']) echo "selected='selected'" ?>><?php echo $registro['perfil']; ?></option>;
			                            <?php
			                        }
			                        ?>
			                    </select>
			                </td>
			            </tr>
			            <tr>
			                <td style="text-align:right; width: 11%">Nombre :</td><td ><input id="nombre" name="nombre" class="textbox_insert" type="text" style="width:96%;" value="<?php echo $usuario[0]['nombre'] ?>"/></td>     
			                <td style="text-align:right; width: 11%;" >Apellido Paterno:</td><td><input id="paterno" name="paterno" class="textbox_insert" type="text" style="width:96%;" value="<?php echo $usuario[0]['paterno'] ?>"/></td>     
			            </tr>
			            <tr>
			                <td style="text-align:right;">Apellido Materno:</td>
			                <td><input id="materno" name="materno" class="textbox_insert" type="text" style="width: 97%;" value="<?php echo $usuario[0]['materno'] ?>"/></td>
			
			                <td style="text-align:right;" >Correo Electrónico:</td><td><input id="correo" name="correo" class="textbox_insert" type="text" style="width:96%;" value="<?php echo $usuario[0]['email'] ?>"/></td>     
			            </tr>
			            
			            <tr>
			                <td style="text-align:right;">Usuario:</td>
			                <td> <input id="usuario" name="usuario" class="textbox_insert" type="text" style="width:97%;" value="<?php echo $usuario[0]['usuario'] ?>" /></td>
			                <td style="text-align:right;"></td>
			                <td ><a onClick="changePassword()" href="javascript:void(0);" class="btn btn-default">Cambiar Contraseña</a></td>
			
			            </tr>
			          
			            <tr>
			                <td style="text-align:right; vertical-align:top;" >Estatus:</td>
			                <td colspan="3">
			                    <div id="radio">
			                        <input type="radio" id="activo" name="activo"  value="true" <?php echo (($usuario[0]['activo'] == "t") ? ('checked="checked"') : ('')); ?>><label for="activo">Activo</label>
			                        <input type="radio" id="inactivo" name="activo"  value="false" <?php echo (($usuario[0]['activo'] == "f") ? ('checked="checked"') : ('')); ?>><label for="inactivo">Inactivo</label>
			                    </div>
			                </td> 
			            </tr>
			            <tr>                                       
			                <td colspan="4" style="text-align:left; ">                           
			                    <input class="button" type="button" name="guardar" id="Guardar" value="Guardar">&nbsp; &nbsp; &nbsp;
			                    <input class="button" type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="irA('index.php/administrador/listadoUsuarios')" > &nbsp; &nbsp; &nbsp;                                                                                    
			                </td>     
			            </tr>                
			
			        </table>
			    </form>
			</div>
	</div>
</div>

<form id='changePassword'class="form-horizontal"  style="display:none;">  

    <div class="form-group">  
        <label class="col-md-4 control-label" for="name">Contraseña:</label>  
        <div class="col-md-8">  
            <input id="contrasena" name="contrasena" class="textbox_insert" type="password" style="width:97%;"/>        </div>
    </div>
    <div class="form-group">  
        <label class="col-md-4 control-label" for="name">Confirme la contrseña:</label>  
        <div class="col-md-8">  
            <input id="contrasena_conf" name="contrasena_conf" class="textbox_insert" type="password" style="width:97%;"/>        </div>
    </div> 
    <div class="form-group">  
        <button style=" margin-right: 15px;" type="submit" class='btn btn-success pull-right'>Guardar Cambios</button>
    </div> 
</form> 
