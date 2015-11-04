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
                return ((eval("$.ajax({\n\
                                type: 'POST',\n\
                                url: '<?php echo base_url(); ?>index.php/administrador/validar_correo',\n\
                                data: {usr_email: element.value},\n\
                                async: false}).responseText") == '--ok') ? (true) : (false));
            },
            "correo duplicado"
            );
    $().ready(function () {
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
        
    });
    function irA(uri) {
        window.location.href = '<?php echo base_url(); ?>' + uri;
    }

    function openDialog(dialog, id) {
        ide = id;
        $("#" + dialog).dialog("open");
    }

    $(function () {

        $("#dtUsuarios").dataTable({
            "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "Todos"]]

        });
    });
</script>
<style>
    table td {padding:4px;}
    .ui-tooltip, .arrow:after {
        background: white;
        border: 2px solid #cd0a0a;
    }
    .ui-tooltip {
        padding: 5px 20px;
        color: #cd0a0a;
        border-radius: 10px;
        font: bold 12px "Helvetica Neue", Sans-Serif;
        box-shadow: 0 0 4px #cd0a0a;
    }
    .arrow {
        width: 70px;
        height: 16px;
        overflow: hidden;
        position: absolute;
        left: 50%;
        margin-left: -35px;
        bottom: -16px;
    }
    .arrow.top {
        top: -16px;
        bottom: auto;
    }
    .arrow.left {
        left: 20%;
    }
    .arrow:after {
        content: "";
        position: absolute;
        left: 20px;
        top: -20px;
        width: 25px;
        height: 25px;
        box-shadow: 6px 5px 9px -9px black;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .arrow.top:after {
        bottom: -20px;
        top: auto;
    }
</style>


<div class="box">     
        <div class="box-body table-responsive">
			<div id="nueva" >
			    <form action="index.php/administrador/insertUsuario" name="form_usuario" method="post" id="form_usuario">
			        <table id="form_usr" border="0">
			            <tr>
			                <td style="text-align:right; width: 15%;">Delegación:</td>
			                <td colspan="5" style="width: 85%;">                   
			                    <select name="id_delegacion" id="id_delegacion" style="width: 98%; display: block;" class="select_insert">
			                        <option value="0">[No aplica]</option>
			                        <?php foreach ($delegaciones as $registro) { ?>
			                            <option value="<?php echo $registro['id_delegacion'] ?>"><?php echo $registro['delegacion']; ?></option>;
			                        <?php
			                        }
			                        ?>
			                    </select>
			                </td>                 
			            </tr>
			            <tr>
			                <td style="text-align:right; width: 15%;">Perfil:</td>
			                <td colspan="5" style="width: 85%;">                   
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
			                <td style="text-align:right; width: 11%">Nombre :</td><td ><input id="nombre" name="nombre" class="textbox_insert" type="text" style="width:96%;" /></td>     
			                <td style="text-align:right; width: 11%;" >Apellido Paterno:</td><td><input id="paterno" name="paterno" class="textbox_insert" type="text" style="width:96%;"/></td>     
			            </tr>
			            <tr>
			                <td style="text-align:right;">Apellido Materno:</td><td><input id="materno" name="materno" class="textbox_insert" type="text" style="width: 96%;"/></td>
			
			                 <td style="text-align:right;" >Correo Electrónico:</td><td><input id="correo" name="correo" class="textbox_insert" type="text" style="width:96%;"/></td>     
			            </tr>
			           
			            <tr>
			                <td style="text-align:right;">Usuario:</td><td> <input id="usuario" name="usuario" class="textbox_insert" type="text" style="width:96%;"  /></td>
			                <td style="text-align:right;">Contraseña:</td>
			                <td><input id="password" name="password" class="textbox_insert" type="password" style="width:96%;"/></td>     
			            </tr>
			          
			            <tr>
			                <td style="text-align:right; vertical-align:top;" >Estatus:</td>
			                <td colspan="3">
			                    <div id="radio">
			                        <input type="radio" id="activo" name="activo"  value="true" checked="checked"><label for="activo">&nbsp;Activo</label>&nbsp;&nbsp;
			                        <input type="radio" id="inactivo" name="activo"  value="false" ><label for="inactivo">&nbsp;Inactivo</label>
			                    </div>
			                </td> 
			            </tr>
			            <tr>                                       
			                <td colspan="4" style="text-align:left; ">                           
			                    <input class="button" type="button" name="guardar" id="Guardar" value="Guardar">&nbsp; &nbsp; &nbsp;
			                    <input class="button" type="button" name="cancelar" id="cancelar" onclick="irA('index.php/administrador/listadoUsuarios')" value="Cancelar"> &nbsp; &nbsp; &nbsp;                                                                                    
			                </td>     
			            </tr>                
			
			        </table>
			    </form>
			</div>
	</div>
</div>