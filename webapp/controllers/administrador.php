<?php

class administrador extends CI_Controller {

    var $id_usuario = null;
    var $objPHPExcel = null;
    var $stylesinfo = null;

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('main');
        } else if ($this->session->userdata('id_perfil') != 1) {
            echo "No esta autorizado para ingresar aqui";
            exit();
        }

        $this->id_usuario = (int) $this->session->userdata('id_usuario');
        $this->load->model('modelo');
        $this->load->model('m_operador');
        $this->load->model('m_varios');
        $this->load->model('m_admin');
    }

    function index() {

        $data['content'] = null;
        $this->load->view('administrador/v_template.php', $data, false);
    }

    function actualizarUsuario($id_usuario = null) {

        $datos['id_usuario'] = (int) $id_usuario;
   
        $datos['id_delegacion'] = (int) $this->input->post('id_delegacion');
        $datos['id_perfil'] = (int) $this->input->post('id_perfil');
        $datos['nombre'] = trim($this->input->post('nombre'));
        $datos['paterno'] = trim($this->input->post('paterno'));
        $datos['materno'] = trim($this->input->post('materno'));
        $datos['email'] = trim($this->input->post('correo'));        
        $datos['usuario'] = trim($this->input->post('usuario'));        
        $datos['activo'] = $this->input->post('activo');

        $exito = $this->m_admin->actualizarUsuario($datos);

        //$this->correo_de_registro($datos);

        if ($exito > 0) {
            echo '--ok';
        } else
            echo '--bad';
    }

    function cambiarPassword($id_usuario = null) {

        $datos['id_usuario'] = (int) $id_usuario;
        $datos['password'] = md5($this->input->post('password'));
        $exito = $this->m_admin->actualizarPassword($datos);


        if ($exito > 0) {
            echo '--ok';
        } else
            echo '--bad';
    }

    function usuarios() {
        $datos['content'] = $this->load->view('administrador/v_usuarios.php', null, true);

        $this->load->view('administrador/v_template.php', $datos, false);
    }

    function validar_correo() {
        $usuario = $this->m_admin->get_usuario_by_correo(trim($this->input->post('usr_email')));
        if ($usuario == NULL) {
            echo "--ok";
        }
    }

    function insertUsuario() {

        // $password = randomString(8, TRUE, TRUE, TRUE);
        $datos['id_delegacion'] = (int) $this->input->post('id_delegacion');
        $datos['id_perfil'] = (int) $this->input->post('id_perfil');
        $datos['nombre'] = trim($this->input->post('nombre'));
        $datos['paterno'] = trim($this->input->post('paterno'));
        $datos['materno'] = trim($this->input->post('materno'));
        $datos['usuario'] = trim($this->input->post('usuario'));
        $datos['password'] = md5($this->input->post('password'));
        $datos['email'] = trim($this->input->post('correo'));
        $datos['activo'] = $this->input->post('activo');


        $exito = $this->m_admin->insertUsuario($datos);


        //$this->correo_de_registro($datos);

        if (isset($exito[0]['id_usuario'])) {
            echo '--ok';
        } else {
            echo '--bad';
        }
    }

    function editarUsuario($id_usuario = null) {
    	
        $data['usuario'] = $this->m_admin->getUsuario((int) $id_usuario);
        $data['delegaciones'] = $this->m_admin->getCatDelegaciones();
        $data['perfiles'] = $this->m_admin->getPerfiles();

        $datos['content'] = $this->load->view('administrador/v_editarUsuario', $data, true);
        $this->load->view('administrador/v_template.php', $datos);
    }

    function nuevoUsuario() {

        
        $data['delegaciones'] = $this->m_admin->getCatDelegaciones();
        $data['perfiles'] = $this->m_admin->getPerfiles();


        $datos['content'] = $this->load->view('administrador/v_nuevoUsuario.php', $data, true);

        $this->load->view('administrador/v_template.php', $datos);
    }

    function listadoUsuarios() {

        $data['usuarios'] = $this->m_admin->getAllUsuarios();

        $datos['content'] = $this->load->view('administrador/v_listadoUsuarios.php', $data, true);

        $this->load->view('administrador/v_template.php', $datos);
    }

    function dashboard_proyectos() {

        $id_proyecto = $this->input->post('id_proyecto');

        $proyectos = $this->modelo->getProyectos();
        $data1['proyectos'] = $proyectos;

        if ($id_proyecto == null)
            $id_proyecto = $proyectos[0]['id_proyecto'];


        $proyecto = $this->modelo->getProyecto($id_proyecto);
        $actividades = $this->modelo->getActividades($id_proyecto);

//print_r($proyecto[0]);
        $data1['actividades'] = $actividades;
        $data1['seleccionado'] = $id_proyecto;
        $data1['proyecto_origen'] = $proyecto[0];


        $aux_involucrados = array();
        $ids_actividad = array();
        foreach ($actividades as $actividad) {
            $id_actividad = $actividad['id_actividad'];
            $ids = $actividad['dependencia'];
            $aux = $this->modelo->getEntesInvolucrados($ids);

            $cadena = array();
            if ($aux != null) {
                foreach ($aux as $ente_aux) {
                    $cadena[] = $ente_aux['siglas_ente'];
                }

                $aux_involucrados[$id_actividad] = implode(" / ", $cadena);
            } else {
                $aux_involucrados[$id_actividad] = '&nbsp;';
            }

            if (!in_array($id_actividad, $ids_actividad))
                $ids_actividad[] = $id_actividad;
        }

        $data1['involucrados'] = $aux_involucrados;

        $data1['dificultades'] = array();
        if ($ids_actividad != null) {
            $ids = implode(",", $ids_actividad);
            $data1['dificultades'] = $this->modelo->getDificultadesProyecto($ids);
        }



        $aux_involucrados = array();
        foreach ($data1['dificultades'] as $dificultad) {
            $id_dificultad = $dificultad['id_dificultad'];
            $ids = $dificultad['ids_entes_involucrados'];
            $aux = $this->modelo->getEntesInvolucrados($ids);

            $cadena = array();
            if ($aux != null) {
                foreach ($aux as $ente_aux) {
                    $cadena[] = $ente_aux['siglas_ente'];
                }

                $aux_involucrados[$id_dificultad] = implode(" / ", $cadena);
            } else {
                $aux_involucrados[$id_dificultad] = '&nbsp;';
            }
        }

        $data1['involucrados_dif'] = $aux_involucrados;

        $datos['content'] = $this->load->view('administrador/v_proyectos_dashboard.php', $data1, true);
        $this->load->view('administrador/v_template.php', $datos);
    }

    function seguimiento_actividad($id_proyecto, $id_actividad) {

        $datos['id_actividad'] = $id_actividad;
        $varaux = $this->modelo->getNombreyIdActividad($id_actividad);
        $datos['actividad'] = $varaux[0]['actividad'];
        $datos['num_actividad'] = $varaux[0]['no_actividad'];
        $dificultades = $this->modelo->getDificultades($id_actividad);
        $datos['dificultades'] = $dificultades;
        $datos['entes'] = $this->m_operador->get_entes_publicos();



        $aux_involucrados = array();
        foreach ($dificultades as $dificultad) {
            $id_dificultad = $dificultad['id_dificultad'];
            $ids = $dificultad['ids_entes_involucrados'];
            $aux = $this->modelo->getEntesInvolucrados($ids);

            $cadena = array();
            if ($aux != null) {
                foreach ($aux as $ente_aux) {
                    $cadena[] = $ente_aux['siglas_ente'];
                }

                $aux_involucrados[$id_dificultad] = implode(" / ", $cadena);
            } else {
                $aux_involucrados[$id_dificultad] = '&nbsp;';
            }
        }

        $datos['involucrados'] = $aux_involucrados;
        $datos['id_proyecto'] = $id_proyecto;
        $datos['seguimientos'] = $this->m_operador->getSeguimientos($id_actividad);

        $data['content'] = $this->load->view('administrador/v_seguimiento_actividad.php', $datos, true);

        $this->load->view('administrador/v_template.php', $data);
    }

    function actividades_proyecto($id_proyecto_ori) {
        $proyectos = $this->modelo->getProyecto($id_proyecto_ori);
        $datos['proyecto'] = $proyectos;

        $aux_involucrados = array();
        foreach ($proyectos as $proyecto) {
            $id_proyecto = $proyecto['id_proyecto'];
            $ids = $proyecto['ids_entes_involucrados'];
            $aux = $this->modelo->getEntesInvolucrados($ids);
            $datos['entes_permitidos'] = $aux;

            $cadena = array();
            if ($aux != null) {
                foreach ($aux as $ente_aux) {
                    $cadena[] = $ente_aux['nombre_ente'];
                }

                $aux_involucrados[$id_proyecto] = implode("<br />", $cadena);
            } else {
                $aux_involucrados[$id_proyecto] = '&nbsp;';
            }
        }
        $datos['involucrados'] = $aux_involucrados;


        /* LISTADO DE ACTIVIDADES */
        $actividades = $this->modelo->getActividades($id_proyecto_ori);
        $datos['actividades'] = $actividades;

        $aux_involucrados = array();
        foreach ($actividades as $actividad) {
            $id_proyecto = $actividad['id_actividad'];
            $ids = $actividad['dependencia'];
            $aux = $this->modelo->getEntesInvolucrados($ids);

            $cadena = array();
            if ($aux != null) {
                foreach ($aux as $ente_aux) {
                    $cadena[] = $ente_aux['siglas_ente'];
                }

                $aux_involucrados[$id_proyecto] = implode(" / ", $cadena);
            } else {
                $aux_involucrados[$id_proyecto] = '&nbsp;';
            }
        }
        $datos['involucrados_act'] = $aux_involucrados;


        $data['content'] = $this->load->view('administrador/v_actividades_proyecto.php', $datos, true);

        $this->load->view('administrador/v_template.php', $data);
    }

    function setCompromisosFilters() {

        $filter['compromisos_filter']['cumplidos'] = $this->input->post('cumplidos');
        $filter['compromisos_filter']['proceso'] = $this->input->post('proceso');
        $filter['compromisos_filter']['pendientes'] = $this->input->post('pendientes');
        $filter['compromisos_filter']['investigar'] = $this->input->post('investigar');
        $filter['compromisos_filter']['anio'] = $this->input->post('anio');

        $this->session->set_userdata($filter);
    }

    function compromisos($accion = 'index') {

        $data['dependencias'] = $this->modelo->getDependencias();

        for ($year = date('Y'); $year >= 2012; $year--)
            $data['years'][] = $year;

        $argumentos = func_get_args();


        switch ($accion) {
            case 'pendientes':
                $filter['compromisos_filter']['pendientes'] = "on";
                $filter['compromisos_filter']['anio'] = $this->processAnio((int) $argumentos[1]);
                $this->session->set_userdata($filter);
                $data['compromisos_filter'] = $filter['compromisos_filter'];
                $data['content'] = $this->load->view('administrador/v_compromisos.php', $data, true);
                break;
            case 'proceso':
                $filter['compromisos_filter']['proceso'] = "on";
                $filter['compromisos_filter']['anio'] = $this->processAnio((int) $argumentos[1]);
                $this->session->set_userdata($filter);
                $data['compromisos_filter'] = $filter['compromisos_filter'];
                $data['content'] = $this->load->view('administrador/v_compromisos.php', $data, true);
                break;
            case 'cumplidos':
                $filter['compromisos_filter']['cumplidos'] = "on";
                $filter['compromisos_filter']['anio'] = $this->processAnio((int) $argumentos[1]);
                $this->session->set_userdata($filter);
                $data['compromisos_filter'] = $filter['compromisos_filter'];
                $data['content'] = $this->load->view('administrador/v_compromisos.php', $data, true);
                break;
            case 'investigar':
                $filter['compromisos_filter']['investigar'] = "on";
                $filter['compromisos_filter']['anio'] = $this->processAnio((int) $argumentos[1]);
                $this->session->set_userdata($filter);
                $data['compromisos_filter'] = $filter['compromisos_filter'];
                $data['content'] = $this->load->view('administrador/v_compromisos.php', $data, true);
                break;
            case 'index':
                $this->session->unset_userdata('compromisos_filter');
                $data['content'] = $this->load->view('administrador/v_compromisos.php', $data, true);
                break;
            case 'discurso' :
                $data['discurso'] = $this->modelo->getDiscurso((int) $argumentos[1]);
                $data['compromisos'] = $this->modelo->getCompromisosOfDiscurso((int) $argumentos[1]);
                $data['content'] = $this->load->view('administrador/v_compromisosDiscurso.php', $data, true);
                break;
            case 'seguimiento' :
                $data['compromiso'] = $this->modelo->getCompromiso((int) $argumentos[1]);
                $seguimientos = $this->modelo->getSegimientos((int) $argumentos[1]);
                $data['seguimientos'] = $seguimientos;
                $data['discurso'] = $this->modelo->getDiscurso($data['compromiso'][0]['id_discurso']);

                $archivos = array();
                foreach ($seguimientos as $seguimiento) {
                    $aux = $this->modelo->getArchivosSeguimiento($seguimiento['id_seguimiento']);

                    $i = 0;
                    foreach ($aux as $arch) {
                        $archivos[$seguimiento['id_seguimiento']][] = $arch;
                        $i++;
                    }
                }
                $data['archivos'] = $archivos;
                $data['content'] = $this->load->view('administrador/v_seguimientoCompromiso.php', $data, true);
                break;
            case 'edit_seguimiento' :
                $data['compromiso'] = $this->modelo->getCompromiso((int) $argumentos[1]);
                $data['estatusCompromiso'] = $this->modelo->getEstatusCompromiso();
                $seguimientos = $this->modelo->getSegimientos((int) $argumentos[1]);

                $data['seguimientos'] = $seguimientos;
                $data['discurso'] = $this->modelo->getDiscurso($data['compromiso'][0]['id_discurso']);

                $archivos = array();
                foreach ($seguimientos as $seguimiento) {
                    $aux = $this->modelo->getArchivosSeguimiento($seguimiento['id_seguimiento']);

                    $i = 0;
                    foreach ($aux as $arch) {
                        $archivos[$seguimiento['id_seguimiento']][] = $arch;
                        $i++;
                    }
                }
                $data['archivos'] = $archivos;



                $data['content'] = $this->load->view('administrador/v_editCompromiso.php', $data, true);
                break;

            case 'delete_seguimiento' :
                $data['compromiso'] = $this->modelo->getCompromiso((int) $argumentos[1]);
                $data['content'] = $this->load->view('administrador/v_editCompromiso.php', $data, true);
                break;
        }

        $this->load->view('administrador/v_template.php', $data);
    }

    function nuevoCompromiso($accion = 'index') {

        $datos['estatusCompromiso'] = $this->modelo->getEstatusCompromiso();


        $data['content'] = $this->load->view('administrador/v_nuevoCompromiso.php', $datos, true);

        $this->load->view('administrador/v_template.php', $data);
    }

    function nuevoSeguimiento($id_compromiso = null) {

        $datos['compromiso'] = $this->modelo->getCompromiso((int) $id_compromiso);
        $datos['estatusCompromiso'] = $this->modelo->getEstatusCompromiso();
        $datos['id_compromiso'] = $id_compromiso;

        $data['content'] = $this->load->view('administrador/v_nuevoSeguimiento.php', $datos, true);

        $this->load->view('administrador/v_template.php', $data);
    }

    function editSeguimiento($id_compromiso = null, $id_seguimiento = null) {
        $seguimientos = $this->modelo->getSegimientos2((int) $id_compromiso, (int) $id_seguimiento);
        $datos['seguimientos'] = $seguimientos;
        $datos['compromiso'] = $this->modelo->getCompromiso((int) $id_compromiso);
        $datos['estatusCompromiso'] = $this->modelo->getEstatusCompromiso();
        $datos['id_compromiso'] = $id_compromiso;

        $data['content'] = $this->load->view('administrador/v_editSeguimiento.php', $datos, true);

        $this->load->view('administrador/v_template.php', $data);
    }

    function guardarCompromiso($id_compromiso = null) {

        $data['id_discurso'] = 1;
        $data['compromiso'] = $this->input->post('compromiso');
        $data['id_estatus'] = (int) $this->input->post('id_estatus');
        $data['fecha_tentativa'] = misql($this->input->post('fecha_tentativa'));
        $data['fecha_definitiva'] = misql($this->input->post('fecha_definitiva'));
        $data['beneficios'] = $this->input->post('beneficios');
        $data['tipo_compromiso'] = $this->input->post('tipo_compromiso');
        $data['prioridad'] = (int) $this->input->post('prioridad');
        $data['avance'] = (float) $this->input->post('avance');
        $data['id_usuario_registro'] = (int) $this->session->userdata('id_usuario');
        $data['id_ente'] = (int) $this->session->userdata('id_ente');
        $result = $this->modelo->insertaCompromiso($data);

        if ($result != null) {
            redirect("administrador/compromisos");
        } else {
            redirect("administrador/error");
        }
    }

    function updateCompromiso($id_compromiso = null) {

        $data['id_discurso'] = 1;
        $data['compromiso'] = $this->input->post('compromiso');
        $data['id_estatus'] = (int) $this->input->post('id_estatus');
        $data['fecha_tentativa'] = misql($this->input->post('fecha_tentativa'));
        $fecha_definitiva = misql($this->input->post('fecha_definitiva'));
        if ($fecha_definitiva != "") {
            $data['fecha_definitiva'] = $fecha_definitiva;
        } else {
            $data['fecha_definitiva'] = null;
        }
        $data['beneficios'] = $this->input->post('beneficios');
        $data['tipo_compromiso'] = $this->input->post('tipo_compromiso');
        $data['prioridad'] = (int) $this->input->post('prioridad');
        $data['avance'] = (float) $this->input->post('avance');
        $data['id_usuario_modifico'] = (int) $this->session->userdata('id_usuario');

        $data['id_compromiso'] = (int) $this->input->post('id_compromiso');

        $result = $this->modelo->updateCompromiso($data);

        if ($result != null) {
            redirect("administrador/compromisos");
        } else {
            redirect("administrador/error");
        }
    }

    function guardarSeguimiento($id_compromiso = null) {

        $data['id_generico'] = $id_compromiso;
        $data['id_tipo_proyecto'] = (int) $this->input->post('id_tipo_proyecto');
        $data['fecha_seguimiento'] = misql($this->input->post('fecha_seguimiento'));
        $data['observacion'] = $this->input->post('observacion');
        $data['avance'] = (float) $this->input->post('avance');
        $data['id_usuario'] = $this->id_usuario;

        $result = $this->modelo->insertaSeguimiento($data);

        $result2 = $this->modelo->actualizar_avance($id_compromiso, $data['avance']);

        $this->load->library('upload');
        if ($this->input->post('cArchivos') != '') {
            $cArchivos = explode('-', $this->input->post('cArchivos'));
            foreach ($cArchivos as $value) {

                $config['upload_path'] = 'resources/media/compromiso/' . $id_compromiso;
                $config['allowed_types'] = '*';
                $config['max_size'] = '0';
                $config['encrypt_name'] = false;
                $config['date_dir'] = false;
                $config['nombre_input'] = 'adjunto_' . $value;

                $resultf = $this->upload->uploadFile($config);

                if ($resultf['result'] == 1) {
                    $datos = array(
                        'id_generico' => $result[0]['id_seguimiento'],
                        'id_tipo' => 1,
                        'archivo' => $resultf['data']['relative_path'],
                        'descripcion_archivo' => $this->input->post('descr_arch_' . $value)
                    );

//Se guarda el archivo
                    $resultA = $this->modelo->insert_archivo($datos);
                }
            }
        }

        if ($result != null) {
            redirect("administrador/compromisos/seguimiento/" . $id_compromiso);
        } else {
            redirect("administrador/error");
        }
    }

    function updateSeguimiento($id_compromiso = null, $id_seguimiento = null) {

        $data['id_generico'] = $id_compromiso;
        $data['id_tipo_proyecto'] = (int) $this->input->post('id_tipo_proyecto');
        $data['id_seguimiento'] = (int) $this->input->post('id_seguimiento');
        $data['fecha_seguimiento'] = misql($this->input->post('fecha_seguimiento'));
        $data['observacion'] = $this->input->post('observacion');
        $data['avance'] = (float) $this->input->post('avance');
        $data['id_usuario'] = $this->id_usuario;

        $result = $this->modelo->updateSeguimiento($data);

        $result2 = $this->modelo->actualizar_avance($id_compromiso, $data['avance']);

        $this->load->library('upload');
        if ($this->input->post('cArchivos') != '') {
            $cArchivos = explode('-', $this->input->post('cArchivos'));
            foreach ($cArchivos as $value) {

                $config['upload_path'] = 'resources/media/compromiso/' . $id_compromiso;
                $config['allowed_types'] = '*';
                $config['max_size'] = '0';
                $config['encrypt_name'] = false;
                $config['date_dir'] = false;
                $config['nombre_input'] = 'adjunto_' . $value;

                $resultf = $this->upload->uploadFile($config);

                if ($resultf['result'] == 1) {
                    $datos = array(
                        'id_generico' => $result[0]['id_seguimiento'],
                        'id_tipo' => 1,
                        'archivo' => $resultf['data']['relative_path'],
                        'descripcion_archivo' => $this->input->post('descr_arch_' . $value)
                    );

//Se guarda el archivo
                    $resultA = $this->modelo->insert_archivo($datos);
                }
            }
        }

        if ($result != null) {
            redirect("administrador/compromisos/seguimiento/" . $id_compromiso);
        } else {
            redirect("administrador/error");
        }
    }

    function eliminarSeguimiento($id_seguimiento = null) {
        //$data['id_generico'] = $id_compromiso;

        $data['id_seguimiento'] = (int) $id_seguimiento;
        $data['id_usuario'] = $this->id_usuario;

        $result = $this->modelo->deleteSeguimiento($data);
    }

    function eliminarCompromiso($id_compromiso = null) {
        $data['id_compromiso'] = (int) $id_compromiso;

        //$data['id_seguimiento'] = (int) $id_seguimiento;                        
        $data['id_usuario'] = $this->id_usuario;

        $result = $this->modelo->deleteCompromiso($data);
    }

    function dataTableDiscursos() {

        $this->load->library('ServerSideProcessing');

        $columns = array(
            array('db' => 'fecha_discurso', 'dt' => 0,
                'formatter' => function ($d, $row) {
                    return sqlDateFormat($d);
                }),
            array('db' => 'nombre_discurso', 'dt' => 1),
            array('db' => 'lugar_evento', 'dt' => 2),
            array('db' => 'total_compromisos', 'dt' => 3,
                'formatter' => function( $d, $row ) {
                    return "<a href='" . base_url() . "index.php/administrador/compromisos/discurso/" . $row['id_discurso'] . "' class=\"btn btn-app\">
                                        <span style='font-size:13px; font-weight:bold;' class=\"badge bg-teal\">$d</span>
                                        <i class=\"fa fa-eye\"></i> Ver
                                    </a>";
                })
        );

        $queryA = "select id_discurso,fecha_discurso, nombre_discurso, lugar_evento,count(id_compromiso) as total_compromisos "
                . "from discurso "
                . "LEFT JOIN  compromiso using(id_discurso) where discurso.activo is true ";
        $queryB = " GROUP BY discurso.id_discurso ";

        echo json_encode($this->serversideprocessing->simple($_POST, $columns, $queryA, $queryB));
    }

    function dataTableCompromisos() {

        $this->load->library('ServerSideProcessing');

        $status_filter = '';
        if (($compromisos_filter = $this->session->userdata('compromisos_filter')) != null) {

            if (isset($compromisos_filter['cumplidos']) and $compromisos_filter['cumplidos'] == "on") {
                $estatus_array[] = 3;
            }
            if (isset($compromisos_filter['pendientes']) and $compromisos_filter['pendientes'] == "on") {
                $estatus_array[] = 1;
            }
            if (isset($compromisos_filter['investigar']) and $compromisos_filter['investigar'] == "on") {
                $estatus_array[] = 6;
            }
            if (isset($compromisos_filter['proceso']) and $compromisos_filter['proceso'] == "on") {
                $estatus_array[] = 2;
            }
            if (isset($estatus_array) and count($estatus_array) > 0) {
                $status_filter = " and id_estatus in(" . implode(",", $estatus_array) . ") ";
            }
            if ($compromisos_filter['anio'] != 0) {
                $status_filter .= " and to_char(fecha_discurso, 'YYYY')= '" . $compromisos_filter['anio'] . "' ";
            }
        }

        $columns = array(
            array('db' => 'id_compromiso', 'dt' => 0),
            array('db' => 'id_compromiso', 'dt' => 1,
                'formatter' => function( $d, $row ) {
                    return "<i style=\"color:#f39c12\" class=\"fa fa-star\"></i>";
                }),
            array('db' => 'compromiso', 'dt' => 2),
            array('db' => 'beneficios', 'dt' => 3),
            array('db' => 'fecha_tentativa', 'dt' => 4,
                'formatter' => function( $d, $row ) {
                    return misql($d);
                }),
            array('db' => 'id_estatus', 'dt' => 5,
                'formatter' => function( $d, $row ) {
                    return getStatusLabel($d);
                }),
            array('db' => 'fecha_definitiva', 'dt' => 6,
                'formatter' => function( $d, $row ) {
                    return misql($d);
                }),
            array('db' => 'id_compromiso', 'dt' => 7,
                'formatter' => function( $d, $row ) {
                    return "<a title='Ver'  href='" . base_url() . "index.php/administrador/compromisos/seguimiento/" . $d . "' class=\"btn btn-default\">
                                        <i class=\"fa fa-eye\"></i> </a>                    
                            <a title='Editar' href='" . base_url() . "index.php/administrador/compromisos/edit_seguimiento/" . $d . "' class=\"btn btn-default\">
                                        <i class=\"fa fa-pencil-square-o\"></i> </a>                            
                            <button title='Eliminar' onClick='eliminarCompromiso(" . $d . ")' type='button' class='btn btn-default'><i class='fa fa-trash'></i></button>";
                })
        );

        $id_ente = $this->session->userdata('id_ente');

        $queryA = "select id_compromiso, compromiso, id_estatus, beneficios, fecha_tentativa,fecha_definitiva "
                . "from compromiso inner join discurso using(id_discurso) "
                . "where compromiso.activo is true and id_ente=$id_ente $status_filter ";

        echo json_encode($this->serversideprocessing->simple($_POST, $columns, $queryA));
    }

    function captura_proyectos() {

        $data['programas'] = $this->m_operador->getProgramasSectoriales();
        $data['ejes_pgd'] = $this->m_operador->getEjesPGD();
        $data['entes'] = $this->m_operador->get_entes_publicos();

        $datos['content'] = $this->load->view('administrador/v_registro_proyectos.php', $data, true);
//$datos['content'] = "";

        $this->load->view('administrador/v_template.php', $datos);
    }

    function guarda_proyecto() {
        $datos['nombre_proyecto'] = $this->input->post('nombre_proyecto');
        $datos['descripcion'] = $this->input->post('descripcion_proyecto');
        $datos['id_programa'] = (int) $this->input->post('id_programa');
        $datos['id_eje'] = (int) $this->input->post('id_eje');
        $datos['id_area'] = (int) $this->input->post('id_area');
        $datos['id_objetivo'] = (int) $this->input->post('id_objetivo');
        $datos['id_meta'] = (int) $this->input->post('id_meta');
        $datos['id_ente_responsable'] = (int) $this->input->post('id_ente_responsable');
        $entes_involucrados = $this->input->post('id_entes_involucrados');
        $datos['anio_inicio'] = (int) $this->input->post('anio_inicio');
        $datos['anio_fin'] = (int) $this->input->post('anio_fin');
        $datos['presupuesto_total'] = (float) $this->input->post('presupuesto_total');
        $datos['ids_entes_involucrados'] = implode(",", $entes_involucrados);


        $r = $this->m_operador->inserta_proyecto($datos);

        $retorno = base_url() . "index.php/administrador/lista_proyectos";

        if ($r != null)
            header("Location: $retorno");
    }

    function guarda_avance_actividad() {
        $id_actividad = (int) $this->input->post('id_actividad');
        $id_proyecto = (int) $this->input->post('id_proyecto');
        $avance = $this->input->post('avance');
        $observacion = $this->input->post('observacion');
        $no_actividad = (int) $this->input->post('no_actividad');
        $id_usuario = $this->session->userdata('id_usuario');


        $r = $this->m_operador->update_avance_actividad($id_actividad, $avance);
        $r2 = $this->m_operador->insert_seguimiento_actividad($id_proyecto, $id_actividad, $avance, $observacion, $no_actividad, $id_usuario);

        $retorno = base_url() . "index.php/administrador/seguimiento_actividad/" . $id_proyecto . "/" . $id_actividad;

        if ($r != null)
            header("Location: $retorno");
    }

    function guarda_actividad() {
        $datos['id_proyecto'] = (int) $this->input->post('id_proyecto');
        $datos['no_actividad'] = (int) $this->input->post('no_actividad');

        $datos['actividad'] = $this->input->post('actividad');

        $entes_involucrados = $this->input->post('id_entes_involucrados');
        $datos['fecha_inicio'] = misql($this->input->post('fecha_inicio'));
        $datos['fecha_fin'] = misql($this->input->post('fecha_fin'));
        $datos['tipo_calculo'] = (int) $this->input->post('tipo_calculo');
        $datos['dependencia'] = implode(",", $entes_involucrados);
        $datos['meses_actividad'] = (int) $this->input->post('meses_actividad');

        $r = $this->m_operador->inserta_actividad($datos);

        $retorno = base_url() . "index.php/administrador/actividades_proyecto/" . $datos['id_proyecto'];

        if ($r != null)
            header("Location: $retorno");
    }

    function guarda_dificultad() {
        $datos['id_actividad'] = (int) $this->input->post('id_actividad');

        $datos['dificultades'] = $this->input->post('dificultades');
        $datos['medidas_correctivas'] = $this->input->post('medidas_correctivas');

        $entes_involucrados = $this->input->post('id_entes_involucrados');
        $datos['retraso'] = (float) $this->input->post('retraso');
        $datos['ids_entes_involucrados'] = implode(",", $entes_involucrados);


        $r = $this->m_operador->inserta_dificultad($datos);

        $retorno = base_url() . "index.php/administrador/seguimiento_actividad/" . $datos['id_actividad'];

        if ($r != null)
            header("Location: $retorno");
    }

    function lista_proyectos() {

        $proyectos = $this->modelo->getProyectos();
        $data['proyectos'] = $proyectos;

        $aux_involucrados = array();
        foreach ($proyectos as $proyecto) {
            $id_proyecto = $proyecto['id_proyecto'];
            $ids = $proyecto['ids_entes_involucrados'];
            $aux = $this->modelo->getEntesInvolucrados($ids);

            $cadena = array();
            if ($aux != null) {
                foreach ($aux as $ente_aux) {
                    $cadena[] = $ente_aux['siglas_ente'];
                }

                $aux_involucrados[$id_proyecto] = implode(" / ", $cadena);
            } else {
                $aux_involucrados[$id_proyecto] = '&nbsp;';
            }
        }

        $data['involucrados'] = $aux_involucrados;

        $datos['content'] = $this->load->view('administrador/v_lista_proyectos.php', $data, true);

        $this->load->view('administrador/v_template.php', $datos);
    }

    function combo_areas_de_oportunidad() {
        $id_eje = (int) $this->input->post('id_eje');

        if ($id_eje != null) {
            $areas = $this->m_operador->get_areas_oportunidad($id_eje);
            echo '<option value="0">[Seleccionar]</option>';
            foreach ($areas as $area) {

                echo '<option value="' . $area['id_cat_area_oportunidad'] . '">' . $area['indice_numerico'] . " " . $area['descripcion'] . '</option>';
            }
        }
    }

    function combo_objetivos() {
        $id_area = (int) $this->input->post('id_area');

        if ($id_area != null) {
            $objetivos = $this->m_operador->get_objetivos($id_area);
            echo '<option value="0">[Seleccionar]</option>';
            foreach ($objetivos as $objetivo) {

                $txt = $objetivo['indice_numerico'] . " " . $objetivo['descripcion'];
                if (strlen($txt) > 170)
                    $txt = substr($objetivo['indice_numerico'] . " " . $objetivo['descripcion'], 0, 167) . "...";

                echo '<option value="' . $objetivo['id_cat_objetivo'] . '">' . $txt . '</option>';
            }
        }
    }

    function combo_metas() {
        $id_obj = (int) $this->input->post('id_objetivo');

        if ($id_obj != null) {
            $metas = $this->m_operador->get_metas($id_obj);
            echo '<option value="0">[Seleccionar]</option>';
            foreach ($metas as $meta) {

                $txt = $meta['indice_numerico'] . " " . $meta['descripcion'];
                if (strlen($txt) > 180)
                    $txt = substr($meta['indice_numerico'] . " " . $meta['descripcion'], 0, 177) . "...";

                echo '<option value="' . $meta['id_cat_meta'] . '">' . $txt . '</option>';
            }
        }
    }

    function asignaciones() {
        $data['content'] = $this->load->view('administrador/v_asignaciones.php', null, true);
        $this->load->view('administrador/v_template.php', $data);
    }

    function comites() {
        $data['content'] = $this->load->view('administrador/v_comites.php', null, true);
        $this->load->view('administrador/v_template.php', $data);
    }

    function discursos() {
        $data['content'] = $this->load->view('administrador/v_discursos.php', null, true);
        $this->load->view('administrador/v_template.php', $data);
    }

    function programas() {
        $data['content'] = $this->load->view('administrador/v_programas.php', null, true);
        $this->load->view('administrador/v_template.php', $data);
    }

    private function processData($data) {
        $datap = null;
        foreach ($data['total'] as $value) {
            $datap[$value['fecha']]['total'] = $value['total'];
            $keys = array_keys($data);
            foreach ($keys as $key) {
                if ($key != 'total') {
                    $datap[$value['fecha']][$key] = 0;
                }
            }
        }
        unset($data['total']);

        foreach ($data as $key => $value) {
            foreach ($value as $value2) {
                $datap[$value2['fecha']][$key] = $value2['total'];
            }
        }
        return $datap;
    }

}
