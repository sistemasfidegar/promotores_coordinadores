<style>
    fieldset{
        border-top: 1px solid #ec008c;
        //border-left: 1px solid #ec008c;
        border-radius: 0px;       
        padding-left: 0px;
    }
    .textbox_insert { 
        border: 1px solid #c4c4c4; 
        height: 25px; 
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
        border: 1px solid #ec008c; 
        box-shadow: 0px 0px 8px #ec008c; 
        -moz-box-shadow: 0px 0px 8px #ec008c; 
        -webkit-box-shadow: 0px 0px 8px #ec008c;         
        color:#ec008c;
        font-weight:bold; 
    } 
    .select_insert { 
        border: 1px solid #c4c4c4; 
        height: 25px; 
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
    .select_insert:focus { 
        outline: none; 
        border: 1px solid #ec008c; 
        box-shadow: 0px 0px 8px #ec008c; 
        -moz-box-shadow: 0px 0px 8px #ec008c; 
        -webkit-box-shadow: 0px 0px 8px #ec008c;         
        color:#ec008c;
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
        border: 1px solid #ec008c;   
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
                                url: '<?php echo base_url(); ?>index.php/operador_cgma/validar_correo',\n\
                                data: {usr_email: element.value},\n\
                                async: false}).responseText") == '--ok') ? (true) : (false));
            },
            "correo duplicado"
            );
    $().ready(function () {
        $("#radio").buttonset();

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
        $("#tabs").tabs();

        $("#dialog-nuevo_success").dialog({
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
        });

        $("#form_usuario").validate(
                {
                    rules: {
                        id_ente: "selectNone",
                        id_perfil: "selectNone",
                        nombre: "required",
                        paterno: "required",
                        materno: "required",
                        cargo: "required",
                        correo: "required email unique-correo",
                        no_empleado: "required",
                        datos_contacto: "required"
                    },
                    messages: {
                        nombre: "Campo obligatorio",
                        paterno: "Campo obligatorio",
                        materno: "Campo obligatorio",
                        cargo: "Campo obligatorio",
                        correo: {required: "Campo obligatorio", email: "Correo electrónico no valido"},
                        no_empleado: "Campo obligatorio",
                        datos_contacto: "Campo obligatorio"
                    },
                    ignore: ":not(:visible),:disabled",
                    showErrors: function (map, list) {
                        // there's probably a way to simplify this
                        var focussed = document.activeElement;
                        if (focussed && $(focussed).is("input, textarea")) {
                            $(this.currentForm).tooltip("close", {
                                currentTarget: focussed
                            }, true);
                        }
                        this.currentElements.removeAttr("title").removeClass("ui-state-error");
                        $.each(list, function (index, error) {
                            $(error.element).attr("title", error.message).addClass("ui-state-error");
                        });
                        if (focussed && $(focussed).is("input, textarea")) {
                            $(this.currentForm).tooltip("open", {
                                target: focussed
                            });
                        }
                    }
                });
        $("#Guardar").click(function () {
            //getChecked();
            if ($('#form_usuario').valid()) {

                $.blockUI(opcBlockUI);
                $.ajax({
                    type: 'POST',
                    url: $('#form_usuario').attr("action"),
                    data: $('#form_usuario').serialize(),
                    success: function (data) {

                        $.unblockUI();
                        if (data == 'ok')
                            $("#dialog-nuevo_success").dialog('open');
                        else
                            alert("Ocurrio un error durante el registro.");
                    }
                });
            }
        });
        $("#dialog-eliminar").dialog({
            autoOpen: false,
            closed: true,
            height: 150,
            width: 500,
            resizable: false,
            modal: true,
            buttons: {
                "Aceptar": function () {

                    $.blockUI(opcBlockUI);
                    $.ajax({//con ajax
                        type: 'POST',
                        url: "<?php echo base_url(); ?>index.php/manager/usuarios/eliminar/" + ide,
                        data: "",
                        success: function (data) {
                            if (data == 'ok') {
                                irA('index.php/manager/usuarios/index');
                            } else {
                                $.unblockUI();
                                alert("Ocurrio un error durante la eliminación del registro.");
                            }
                        }
                    });
                    $(this).dialog("close");
                },
                "Cancelar": function () {
                    $(this).dialog("close");
                }
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

<div class="pad20" style="text-align:left; width:90%;">
    <br />
    &nbsp;&nbsp;<img src="resources/images/iden_usuarios.png" />
    <br /><br />
</div>

<div id="tabs" style="width:90%;">
    <ul>
        <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#lista">Registrados</a></li>
        <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#nueva">Nuevo</a></li>
    </ul>

    <div id="lista">

        <table id="dtUsuarios" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="1" style="min-width:612px; width:100%;">
            <thead style="font-size:13px;">
                <tr style="background:#606060; color:#ffffff;">
                    <th style="vertical-align:middle; text-align:center; width: 10px;">#</th>
                    <th style="vertical-align:middle;">Nombre</th>
                    <th style="vertical-align:middle; text-align:center;">Correo</th>
                    <th style="vertical-align:middle; text-align:center;">Dependencia</th>
                    <th style="vertical-align:middle; text-align:center;">Perfil</th>
                    <th style="vertical-align:middle; text-align:center;">Estatus</th>
                </tr>
            </thead>
            <tbody style="font-size:12px;">
                <?php
                $index = 1;
                foreach ($usuarios as $i => $value) {
                    $ruta_edicion = base_url() . "index.php/operador_cgma/editar_usuario/" . $value['id_usuario'];
                    ?>	                                                                                             
                    <tr style="cursor:pointer;">
                        <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
                            <?php echo $index; ?>
                        </td>  

                        <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
                            <?php echo $value['nombre'] . " " . $value['paterno'] . " " . $value['materno']; ?>
                        </td>                                                      

                        <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
                            <?php echo $value['correo_electronico']; ?>
                        </td>  
                        <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
                            <?php echo $value['nombre_ente']; ?>
                        </td>  

                        <td onclick="location.href = '<?php echo $ruta_edicion; ?>'">
                            <?php echo $value['perfil']; ?>
                        </td> 

                        <td width="85px" align="center" onclick="location.href = '<?php echo $ruta_edicion; ?>'">
                            <?php
                            echo etiquetaEstatus($value['activo']);
                            ?>
                        </td>     

                    </tr>
                    <?php
                    $index++;
                }
                ?>	

            </tbody>
        </table>
    </div>
    <div id="nueva" >
        <form action="index.php/administrador/nuevoUsuario" name="form_usuario" method="post" id="form_usuario">
            <table id="form_usr" border="0">
                <tr>
                    <td style="text-align:right; width: 15%;">Dependencia:</td>
                    <td colspan="5" style="width: 85%;">                   
                        <select name="id_ente" id="id_ente" style="width: 98%; display: block;" class="select_insert">
                            <option value="0">--Seleccionar--</option>
                            <?php foreach ($entes as $registro) { ?>
                                <option value="<?php echo $registro['id_ente'] ?>"><?php echo $registro['nombre_ente']; ?></option>;
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
                    <td style="text-align:right; width: 11%">Nombre :</td><td ><input id="nombre" name="nombre" class="textbox_insert" type="text" style="width:97%;" /></td>     
                    <td style="text-align:right; width: 11%;" >Apellido Paterno:</td><td><input id="paterno" name="paterno" class="textbox_insert" type="text" style="width:97%;"/></td>     
                </tr>
                <tr>
                    <td style="text-align:right;">Apellido Materno:</td><td><input id="materno" name="materno" class="textbox_insert" type="text" style="width: 97%;"/></td>

                    <td style="text-align:right;">Cargo:</td><td ><input id="cargo" name="cargo" class="textbox_insert" type="text" style="width:97%;"/></td>     
                </tr>
                <tr>
                    <td style="text-align:right;" >Correo Electrónico:</td><td colspan="3"><input id="correo" name="correo" class="textbox_insert" type="text" style="width:40%;"/></td>     
                    <!-- <td style="text-align:right;">N° Empleado:</td><td><input id="no_empleado" name="no_empleado" class="textbox_insert" type="text" style="width: 97%;"/></td> -->
                </tr>
                
                <tr>
                    <td style="text-align:right; vertical-align:top;" >Datos de Contacto:</td>
                    <td colspan="3">
                        <textarea class="textbox_insert" id="datos_contacto" name="datos_contacto" style="width:99%; height:85px;"></textarea>												
                    </td>     
                </tr>
                <tr>
                    <td style="text-align:right; vertical-align:top;" >Estatus:</td>
                    <td colspan="3">
                        <div id="radio">
                            <input type="radio" id="activo" name="activo"  value="true" ><label for="activo">Activo</label>
                            <input type="radio" id="inactivo" name="activo"  value="false" checked="checked"><label for="inactivo">Inactivo</label>
                        </div>
                    </td> 
                </tr>
                <tr>                                       
                    <td colspan="4" style="text-align:right; ">                           
                        <input class="button" type="button" name="guardar" id="Guardar" value="Guardar">&nbsp; &nbsp; &nbsp;
                        <input class="button" type="button" name="cancelar" id="cancelar" onclick="irA('index.php/operador_cgma/usuarios')" value="Cancelar"> &nbsp; &nbsp; &nbsp;                                                                                    
                    </td>     
                </tr>                

            </table>
        </form>
    </div>
</div>


<div id="dialog-nuevo_success" title="SIPAC">
    <p></p>
    <p align="center">
        <span class="ui-icon-palomita">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            El usuario fue agregado exitosamente.
        </span>
    </p>
</div>