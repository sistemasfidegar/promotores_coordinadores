<?php

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('main');
        } else if ($this->session->userdata('id_perfil') != 1) {
            echo "No esta autorizado para ingresar aqui";
            exit();
        }
    }

    private function putPost() {
        foreach ($_POST as $i => $v) {
            echo "\$_POST['$i']: $v<br />";
        }
    }

    function index() {

        if ($this->session->userdata('opc_success') != null) {
            $opc = $this->session->userdata('opc_success');
            $this->session->unset_userdata('opc_success');
        } else {
            $opc = "";
        }

        $this->load->library('pagination');
        $this->load->helper('date');

        $total = $this->modelo->total_usuarios();
        $config['base_url'] = site_url('manager/usuarios/index');
        $config['uri_segment'] = 4;
        $config['total_rows'] = $total[0]['total'];
        $config['per_page'] = '50';
        $config['num_links'] = '10';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';

        $this->pagination->initialize($config);


        if ($this->uri->segment(4) == NULL)
            $start = 0;
        else
            $start = $this->uri->segment(4);


        if ($opc == '') {
            $array_datos = array();
        } else if ($opc == 'nuevo_usuario_success') { //Nuevo success
            $array_datos = array('nuevo_success' => true);
        } else if ($opc == 'eliminar_usuario_success') { //Eliminar success
            $array_datos = array('eliminar_success' => true);
        } else if ($opc == 'desEliminar_usuario_success') { //Eliminar success
            $array_datos = array('desEliminar_success' => true);
        } else if ($opc == 'actualizar_usuario_success') { //Actualizar success
            $array_datos = array('actualizar_success' => true);
        }

        $array_datos['usuarios'] = $this->modelo->get_usuarios($start, $config['per_page']);
        $array_datos['perfiles'] = $this->modelo->get_perfiles();
        $array_datos['unidades'] = $this->modelo->get_unidades(0);

        $content = $this->load->view('manager/usuarios/view_usuarios.php', $array_datos, true);

        $datos_vista = array('content' => $content);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function insert() {


        $datos = array(
            'id_perfil' => $this->input->post('id_perfil'),
            'id_dependencia' => (int) $this->input->post('id_dependencia'),
            'usr_alias' => trim($this->input->post('usr_alias')),
            'usr_password' => md5($this->input->post('contrasena')),
            'usr_nombre' => ($this->input->post('usr_nombre')),
            'usr_paterno' => ($this->input->post('usr_paterno')),
            'usr_materno' => ($this->input->post('usr_materno')),
            'usr_email' => trim($this->input->post('usr_email')),
            'usr_activo' => $this->input->post('usr_activo')
        );


        //insertamos los datos del usuario
        $result = $this->modelo->insert_usuario($datos);


        if ($result != null) {

            $usr_id = $result[0]['usr_id'];

            $unidades = $this->input->post('str_unidades');

            if ($unidades != '') {


                $unidades = explode(",", $unidades);
                //  print_r($unidades);
                foreach ($unidades as $value) {

                    $datos = array('usr_id' => $usr_id, 'id_dependencia' => $value);
                    $result1 = $this->modelo->insertUsuarioDependencia($datos);
                }
            }

            $this->session->set_userdata('opc_success', 'nuevo_usuario_success');
            echo "ok";
        } else {
            echo "bad";
        }
    }

    function editar($usr_id = '') {

        $usuario = $this->modelo->get_usuario($usr_id);
        $perfiles = $this->modelo->get_perfiles();

        if ($usuario != null) {

            $array_datos = array(
                'usuario' => $usuario[0],
                'perfiles' => $perfiles
            );
            $array_datos['unidades'] = $this->modelo->get_unidades(0);

            $content = $this->load->view('manager/usuarios/view_usuarios_edit.php', $array_datos, true);
        }
        else
            $content = $this->load->view('manager/v_noexiste.php', '', true);

        $datos_vista = array('content' => $content);
        $this->load->view('manager/v_template', $datos_vista);
    }

    function validar_usuario() {
        $usuario = $this->modelo->get_usuario_by_usuario(trim($this->input->post('usr_alias')));
        if ($usuario == NULL)
            echo "--ok";
        else if ($usuario[0] == NULL) {
            print_r($usuario[0]);
        }
    }

    function validar_rfc() {
        $usuario = $this->modelo->get_usuario_by_rfc(trim($this->input->post('usr_rfc')));
        if ($usuario == NULL)
            echo "--ok";
        else if ($usuario[0] == NULL) {
            print_r($usuario[0]);
        }
    }

    function validar_correo() {
        $usuario = $this->modelo->get_usuario_by_correo(trim($this->input->post('usr_email')));
        if ($usuario == NULL)
            echo "--ok";
    }

    function actualizar($usr_id = '') {

        $datos = array(
            'id_perfil' => $this->input->post('id_perfil'),
            'id_area' => $this->input->post('id_area'),
            'usr_id' => (int) $usr_id,
            'usr_alias' => trim($this->input->post('usr_alias')),
            'usr_nombre' => ($this->input->post('usr_nombre')),
            'usr_paterno' => ($this->input->post('usr_paterno')),
            'usr_materno' => ($this->input->post('usr_materno')),
            'usr_email' => trim($this->input->post('usr_email')),
            'id_dependencia' => (int) $this->input->post('id_dependencia'),
            'usr_perfil' => $this->input->post('usr_perfil'),
            'usr_activo' => $this->input->post('usr_activo')
        );

        $result = $this->modelo->actualizar_usuario($datos);

        if ($result != null) {

            $this->modelo->deleteUsuarioDependencia($usr_id);
            $unidades = $this->input->post('str_unidades');

            if ($unidades != '') {

                $unidades = explode(",", $unidades);
                foreach ($unidades as $value) {

                    $datos = array('usr_id' => $usr_id, 'id_dependencia' => $value);
                    $result1 = $this->modelo->insertUsuarioDependencia($datos);
                }
            }

            $this->session->set_userdata('opc_success', 'nuevo_usuario_success');
            echo "ok";
        } else {

            echo "bad";
        }
    }

    function jsonStructure($data) {
        
    }

    function datosEntes($usr_id = '') {

        $result = $this->modelo->get_all_entes();

        $ambito = null;

        $tree = array();

        $temp = array();

        foreach ($result as $value) {

            if ($ambito != null and $value['id_ambito'] != $ambito['id_ambito']) {
                $node = array();
                $node['id'] = 0;
                $node['text'] = $ambito['ambito'];
                $node['state'] = 'closed';

                $node['children'] = $temp;
                array_push($tree, $node);
                $temp = array();
            }



            $node = array();
            $node['id'] = $value['id_ente_publico'];
            $node['text'] = $value['nombre'];

            array_push($temp, $node);


            $ambito = array('id_ambito' => $value['id_ambito'], 'ambito' => $value['ambito']);
        }

        $node = array();
        $node['id'] = 0;
        $node['text'] = $ambito['ambito'];
        $node['children'] = $temp;
        $node['state'] = 'closed';
        array_push($tree, $node);

        $node = array();
        $node['id'] = 0;
        $node['text'] = 'Todos';
        $node['children'] = $tree;
        $node['state'] = 'open';

        $tree = array($node);



        echo json_encode($tree);
    }

    function getUsuarioEntes($usr_id = '') {

        $result = $this->modelo->get_usuario_entes($usr_id);

        $ambito = null;

        $tree = array();

        $temp = array();

        foreach ($result as $value) {

            if ($ambito != null and $value['id_ambito'] != $ambito['id_ambito']) {
                $node = array();
                $node['id'] = 0;
                $node['text'] = $ambito['ambito'];
                $node['state'] = 'closed';

                $node['children'] = $temp;
                array_push($tree, $node);
                $temp = array();
            }



            $node = array();
            $node['id'] = $value['id_ente_publico'];
            $node['text'] = $value['nombre'];
            if ($value['usr_id'] != null)
                $node['checked'] = true;


            array_push($temp, $node);


            $ambito = array('id_ambito' => $value['id_ambito'], 'ambito' => $value['ambito']);
        }

        $node = array();
        $node['id'] = 0;
        $node['text'] = $ambito['ambito'];
        $node['children'] = $temp;
        $node['state'] = 'closed';
        array_push($tree, $node);

        $node = array();
        $node['id'] = 0;
        $node['text'] = 'Todos';
        $node['children'] = $tree;
        $node['state'] = 'open';

        $tree = array($node);



        echo json_encode($tree);
    }

    function eliminar($usr_id = '') {

        $data = array(
            'usr_id' => $usr_id
        );

        $result = $this->modelo->delete_usuario($data);

        if ($result != null) {
            $result = $result[0];

            $this->session->set_userdata('opc_success', 'eliminar_usuario_success');

            echo "ok";
        } else {
            echo "bad";
        }
    }

    function desEliminar($usr_id = '') {

        $data = array(
            'usr_id' => $usr_id
        );

        $result = $this->modelo->unDelete_usuario($data);

        if ($result != null) {
            $result = $result[0];

            $this->session->set_userdata('opc_success', 'desEliminar_usuario_success');

            echo "ok";
        } else {
            echo "bad";
        }
    }

    function cambiar_pass($usr_id = '') {
        $datos = array(
            'usr_id' => (int) $usr_id,
            'usr_password' => md5($this->input->post('contrasena'))
        );

        $result = $this->modelo->actualizar_contrasena($datos);

        if ($result != null)
            echo "ok";
        else
            echo "bad";
    }

    function verificar_usuario_perfil() {
        $datos = array(
            'usr_id' => (int) $this->input->post('usr_id'),
            'id_perfil' => (int) $this->input->post('id_perfil')
        );

        $result = $this->modelo->get_usuario_perfil_from_usr_id_and_id_perfil($datos);

        if ($result == null)
            echo "ok";
        else
            echo "bad";
    }

    function insert_usuario_perfil() {
        $datos = array(
            'usr_id' => (int) $this->input->post('usr_id'),
            'id_perfil' => (int) $this->input->post('id_perfil')
        );

        $result = $this->modelo->insert_usuario_perfil($datos);

        if ($result != null)
            echo "ok";
        else
            echo "bad";
    }

    function verificar_eliminar_usuario_perfil($usr_id = '') {
        $datos = array(
            'usr_id' => (int) $usr_id
        );

        $result = $this->modelo->get_usuario_perfil($datos);

        if ($result != null) {
            if (count($result) > 1) {
                echo "ok";
            } else {
                echo "insuficient";
            }
        } else {
            echo "bad";
        }
    }

    function eliminar_usuario_perfil($usr_id, $id_perfil) {
        $datos = array(
            'usr_id' => (int) $usr_id,
            'id_perfil' => (int) $id_perfil
        );

        $result = $this->modelo->delete_usuario_perfil($datos);

        if ($result != null)
            echo "ok";
        else
            echo "bad";
    }

    function clientGetUsuarios2() {


        try {
            if ($this->config->item('local_opd_id') == $_POST['opd_id']) {
                $resultado = $this->modelo->buscar_usuarios(clean_upper2($_POST['termino']));

                $resultado2 = array();
                foreach ($resultado as $value) {
                    //  if ($value['usr_id'] != $this->session->userdata('usr_id'))
                    $resultado2[] = $value;
                }
                echo "OK!!" . json_encode($resultado2);
            } else {

                $datos_opd = $this->modelo->get_opd($_POST['opd_id']);
                $datos_opd = $datos_opd[0];

                $urlWS = $datos_opd['opd_url'];

                // Utilizar el uri
                $client = new SoapClient(null, array(
                    'location' => $urlWS,
                    'uri' => 'urn:webservices',
                        )
                );
                $resultado = $client->buscarUsuarios($_POST['termino'], 4);

                foreach ($resultado as $value) {
                    if ($this->modelo->usuario_remoto_existe($_POST['opd_id'], $value['usr_id']) != null) {
                        $value['opd_id'] = $_POST['opd_id'];
                        $this->modelo->actualizar_usuario_remoto($value);
                    } else {
                        $value['opd_id'] = $_POST['opd_id'];
                        $this->modelo->insert_usuario_remoto($value);
                    }
                }

                echo "OK!!" . json_encode($resultado);
            }
        } catch (Exception $e) {
            echo "ERROR!!" . $e->getMessage();
            //echo $urlWS;
        }
    }

    function jsonEntes($usr_id = null) {

        $checked = true;

        if ($usr_id == null) {
            $result = $this->modelo->get_all_entes_filtro();
        } else {
            $result = $this->modelo->getEntesUser((int) $usr_id);
        }


        $ambito = null;

        $tree = array();

        $temp = array();


        foreach ($result as $value) {
            if ($ambito != null and $value['ambito'] != $ambito['ambito']) {
                $node = array();
                $node['id'] = 0;
                $node['text'] = ($ambito['ambito'] == null) ? "SN" : $ambito['ambito'];
                $node['state'] = 'closed';

                $node['children'] = $temp;
                array_push($tree, $node);
                $temp = array();
            }



            $node = array();
            $node['id'] = $value['id_dependencia'];
            $node['text'] = $value['descripcion'];
            if ($usr_id != null) {
                if ($value['usr_id'] != null)
                    $node['checked'] = true;
            } else {
                $node['checked'] = $checked;
            }
            array_push($temp, $node);


            $ambito = array('ambito' => $value['ambito'], 'ambito' => $value['ambito']);
        }

        $node = array();
        $node['id'] = 0;
        $node['text'] = ($ambito['ambito'] == null) ? "SN" : $ambito['ambito'];
        $node['children'] = $temp;
        $node['state'] = 'closed';
        array_push($tree, $node);

        $node = array();
        $node['id'] = 0;
        $node['text'] = 'Todos';
        $node['children'] = $tree;
        $node['state'] = 'open';

        $tree = array($node);



        echo json_encode($tree);
    }

}