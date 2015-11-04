            cad = navigator.appName;
            ruta = 'index.php/main/';

            if (cad == 'Microsoft Internet Explorer')
            {
                ruta = '';
                popup('recomendacion', 812, 461);

            }

            function popup(url, ancho, alto) {
                var posicion_x;
                var posicion_y;
                posicion_x = (screen.width / 2) - (ancho / 2);
                posicion_y = (screen.height / 2) - (alto / 2);
                window.open(ruta + url, "msg", 'width=' + ancho + ',height=' + alto + ',menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left=' + posicion_x + ',top=' + posicion_y + '\'');
            }

            function irA(uri) {
                window.location.href = '<?php echo base_url(); ?>' + uri;
            }

            function valida()
            {
                var usr = document.getElementById('username');
                var pass = document.getElementById('password');
                var form = document.getElementById('formulario');
                //img = '<img src="resources/images/error.png" width="13px" align="top"/>';

                $("#error").html('&nbsp;');

                if (usr.value == '' || usr.value == ' ')
                {
                    txt = 'DEBE CAPTURAR SU USUARIO';
                    $("#error").html(txt);
                    $('#username').addClass("error_campo");
                    return false;
                }

                if (pass.value == '' || pass.value == ' ')
                {
                    txt = 'DEBE CAPTURAR SU CONTRASEÑA';
                    $("#error").html(txt);
                    $('#password').addClass("error_campo");
                    return false;
                }

                $("#passwordaux").val(md5(pass.value));
                pass.value = '';

                form.submit();
            }

            function limpia()
            {
                $("#error").html('&nbsp;');
            }

            function firmaUsr(e)
            {

                var obj_usr = document.getElementById('username');
                var obj_pass = document.getElementById('password');

                var tecla = (document.all) ? e.keyCode : e.which;

                if (tecla == 13 && obj_usr.value.length > 0 && obj_pass.value.length > 0)
                {
                    valida();
                }
            }

            $(document).ready(function () {

                $('#username').focus(function () {
                    limpia();
                    $('#username').removeClass("error_campo");
                    $('#password').removeClass("error_campo");
                });

                $('#password').keypress(function () {
                    limpia();
                    $('#username').removeClass("error_campo");
                    $('#password').removeClass("error_campo");

                });
            });