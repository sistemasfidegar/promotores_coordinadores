<?php

set_time_limit(1000);

class Catalogos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
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

        $datos['perfiles'] = $this->modelo->get_perfiles();
        $datos['sectores'] = $this->modelo->get_sectores();


        $datos_vista['content'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);
        $this->load->view('manager/v_template', $datos_vista);
    }

    function perfiles() {

        $datos['perfiles'] = $this->modelo->get_perfiles();

        $datos0['formularios'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);

        $datos0['f_nuevo'] = $this->load->view('manager/catalogos/view_catalogos_new.php', $datos, true);

        $datos_vista['content'] = $this->load->view('manager/catalogos/view_tabs.php', $datos0, true);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function unidades() {

        $datos['unidades'] = $this->modelo->get_unidades();
        $datos['sectores'] = $this->modelo->get_sectores();

        $datos0['formularios'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);

        $datos0['f_nuevo'] = $this->load->view('manager/catalogos/view_catalogos_new.php', $datos, true);

        $datos_vista['content'] = $this->load->view('manager/catalogos/view_tabs.php', $datos0, true);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function cambs() {

        $datos['cambs'] = $this->modelo->get_cambs();

        $datos0['formularios'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);

        $datos0['f_nuevo'] = $this->load->view('manager/catalogos/view_catalogos_new.php', $datos, true);

        $datos_vista['content'] = $this->load->view('manager/catalogos/view_tabs.php', $datos0, true);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function lugar() {

        $datos['lugares'] = $this->modelo->get_lugares();

        $datos0['formularios'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);

        $datos0['f_nuevo'] = $this->load->view('manager/catalogos/view_catalogos_new.php', $datos, true);

        $datos_vista['content'] = $this->load->view('manager/catalogos/view_tabs.php', $datos0, true);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function sexo() {

        $datos['sexos'] = $this->modelo->get_sexos();

        $datos0['formularios'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);

        $datos0['f_nuevo'] = $this->load->view('manager/catalogos/view_catalogos_new.php', $datos, true);

        $datos_vista['content'] = $this->load->view('manager/catalogos/view_tabs.php', $datos0, true);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function uso() {

        $datos['usos'] = $this->modelo->get_usos();

        $datos0['formularios'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);

        $datos0['f_nuevo'] = $this->load->view('manager/catalogos/view_catalogos_new.php', $datos, true);

        $datos_vista['content'] = $this->load->view('manager/catalogos/view_tabs.php', $datos0, true);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function fauna() {

        $datos['faunas'] = $this->modelo->get_faunas();
        $datos['clases'] = $this->modelo->get_clases();
        $datos['ordenes'] = $this->modelo->get_orden();

        $datos0['formularios'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);

        $datos0['f_nuevo'] = $this->load->view('manager/catalogos/view_catalogos_new.php', $datos, true);

        $datos_vista['content'] = $this->load->view('manager/catalogos/view_tabs.php', $datos0, true);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function causas() {

        $datos['causas'] = $this->modelo->get_causas();

        $datos0['formularios'] = $this->load->view('manager/catalogos/view_catalogos.php', $datos, true);

        $datos0['f_nuevo'] = $this->load->view('manager/catalogos/view_catalogos_new.php', $datos, true);

        $datos_vista['content'] = $this->load->view('manager/catalogos/view_tabs.php', $datos0, true);

        $this->load->view('manager/v_template', $datos_vista);
    }

    function editar($catalogo = '', $id_elemento = '', $movimiento = '') {

        if ($catalogo == 'perfiles') {
            $arr = $this->modelo->get_perfil($id_elemento);

            $array_datos = array(
                'id_elemento' => $id_elemento,
                'perfil' => $arr[0]['perfil'],
                'baja' => $arr[0]['activo'],
                'catalogo' => 'Perfiles',
                'cat' => 1
            );
        }

        if ($catalogo == 'unidades') {
            $arr = $this->modelo->get_unidad($id_elemento);

            $array_datos = array(
                'id_elemento' => $id_elemento,
                'clave_unidad' => $arr[0]['clave_unidad'],
                'baja' => $arr[0]['activo'],
                'descr_unidad' => $arr[0]['descripcion'],
                'sector' => $arr[0]['sector'],
                'ambito' => $arr[0]['ambito'],
                'catalogo' => 'Unidades',
                'cat' => 2
            );
            $array_datos['sectores'] = $this->modelo->get_sectores();
        }

        if ($catalogo == 'cambs') {
            $arr = $this->modelo->get_camb($id_elemento);

            $array_datos = array(
                'id_elemento' => $id_elemento,
                'niv' => $arr[0]['niv'],
                'part1' => $arr[0]['part1'],
                'des_camb' => $arr[0]['des_camb'],
                'comentario' => $arr[0]['comentario'],
                'baja' => $arr[0]['activo'],
                'catalogo' => 'Cambs',
                'cat' => 3
            );
        }

        if ($catalogo == 'lugar') {
            $arr = $this->modelo->get_lugar($id_elemento);

            $array_datos = array(
                'id_elemento' => $id_elemento,
                'opcion' => $arr[0]['opcion'],
                'desc_lugar' => $arr[0]['desc_lugar'],
                'baja' => $arr[0]['activo'],
                'catalogo' => 'Lugar',
                'cat' => 4
            );
        }

        if ($catalogo == 'sexo') {
            $arr = $this->modelo->get_sexo($id_elemento);

            $array_datos = array(
                'id_elemento' => $id_elemento,
                'opcion' => $arr[0]['opcion'],
                'desc_sexo' => $arr[0]['desc_sexo'],
                'baja' => $arr[0]['activo'],
                'catalogo' => 'Sexo',
                'cat' => 5
            );
        }

        if ($catalogo == 'uso') {
            $arr = $this->modelo->get_uso($id_elemento);

            $array_datos = array(
                'id_elemento' => $id_elemento,
                'letra' => $arr[0]['letra'],
                'desc_uso' => $arr[0]['desc_uso'],
                'baja' => $arr[0]['activo'],
                'catalogo' => 'Uso',
                'cat' => 7
            );
        }


        if ($catalogo == 'fauna') {
            $arr = $this->modelo->get_fauna($id_elemento);

            $array_datos = array(
                'id_elemento' => $id_elemento,
                'cla_camb' => $arr[0]['cla_camb'],
                'des_camb' => $arr[0]['des_camb'],
                'nom_cien' => $arr[0]['nom_cien'],
                'clase' => $arr[0]['clase'],
                'orden' => $arr[0]['orden'],
                'baja' => $arr[0]['activo'],
                'catalogo' => 'Fauna',
                'cat' => 6
            );

            $array_datos['clases'] = $this->modelo->getClases();
            $array_datos['ordenes'] = $this->modelo->getOrden();
        }


        if ($catalogo == 'causas') {
            $arr = $this->modelo->get_causa($id_elemento, $movimiento);

            $array_datos = array(
                'id_elemento' => $id_elemento,
                'descripcion' => $arr[0]['descripcion'],
                'movimiento' => $movimiento,
                'baja' => $arr[0]['activo'],
                'catalogo' => 'Causas',
                'cat' => 8
            );
        }

        if ($arr != null) {
            $content = $this->load->view('manager/catalogos/view_catalogos_edit.php', $array_datos, true);
        } else {
            $content = $this->load->view('manager/v_noexiste.php', '', true);
        }

        $datos_vista = array('content' => $content);
        $this->load->view('manager/v_template', $datos_vista);
    }

    function actualizar($id_elemento = '', $catalogo = '') {
        $retorno = '';

        if ($catalogo == 1) {
            $retorno = 'perfiles';
            $datos = array(
                'id_perfil' => (int) $id_elemento,
                'perfil' => $this->input->post('descr'),
                'activo' => $this->input->post('estatus'));

            $result = $this->modelo->actualizar_perfil($datos);
        }

        if ($catalogo == 2) {
            $retorno = 'unidades';
            $datos = array(
                'id_dependencia' => (int) $id_elemento,
                'clave_unidad' => $this->input->post('clave'),
                'sector' => $this->input->post('sector'),
                'descr_unidad' => $this->input->post('descr_unidad'),
                'ambito' => $this->input->post('ambito'),
                'activo' => $this->input->post('estatus'));

            $result = $this->modelo->actualizar_unidad($datos);
        }


        if ($catalogo == 3) {
            $retorno = 'cambs';
            $datos = array(
                'cla_camb' => $id_elemento,
                'niv' => (int) $this->input->post('niv'),
                'part1' => (int) $this->input->post('part1'),
                'des_camb' => strtoupper($this->input->post('des_camb')),
                'activo' => $this->input->post('estatus'),
                'comentario' => $this->input->post('comentario'));

            switch ($this->input->post('niv')) {
                case 5:
                    $datos['part1'] = substr('' . $id_elemento, 0, 4);
                    break;
                case 4:
                    $datos['part1'] = substr('' . $id_elemento, 0, 3) . '0';
                    break;
                case 3:
                    $datos['part1'] = substr('' . $id_elemento, 0, 2) . '00';
                    break;
                case 2:
                    $datos['part1'] = substr('' . $id_elemento, 0, 1) . '000';
                    break;
                case 1:
                    $datos['part1'] = 0;
                    break;
            }

            $result = $this->modelo->actualizar_cambs($datos);
        }


        if ($catalogo == 4) {
            $retorno = 'lugar';

            $datos = array(
                'id_lugar' => $id_elemento,
                'opcion' => strtoupper($this->input->post('opcion')),
                'desc_lugar' => strtoupper($this->input->post('descr')),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->actualizar_lugar($datos);
        }


        if ($catalogo == 5) {
            $retorno = 'sexo';

            $datos = array(
                'id_sexo' => $id_elemento,
                'opcion' => strtoupper($this->input->post('opcion')),
                'desc_sexo' => strtoupper($this->input->post('descr')),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->actualizar_sexo($datos);
        }

        if ($catalogo == 7) {
            $retorno = 'uso';

            $datos = array(
                'id_uso' => $id_elemento,
                'letra' => strtoupper($this->input->post('opcion')),
                'desc_uso' => strtoupper($this->input->post('descr')),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->actualizar_uso($datos);
        }


        if ($catalogo == 6) {
            $retorno = 'fauna';

            $datos = array(
                'id_fauna' => $id_elemento,
                'cla_camb' => strtoupper($this->input->post('clave')),
                'des_camb' => strtoupper($this->input->post('descr')),
                'nom_cien' => strtoupper($this->input->post('nom_cien')),
                'clase' => $this->input->post('clase'),
                'orden' => $this->input->post('orden'),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->actualizar_fauna($datos);
        }


        if ($catalogo == 8) {
            $retorno = 'causas';

            $datos = array(
                'causa' => $id_elemento,
                'movimiento' => $this->input->post('mov'),
                'descripcion' => strtoupper($this->input->post('descr')),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->actualizar_causa($datos);
        }

        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function insertar($catalogo = '') {

        if ($catalogo == "unidades") {
            $r = $this->modelo->get_nextIdUnidad();
            $datos = array(
                'clave_unidad' => strtoupper($this->input->post('clave')),
                'sector' => $this->input->post('sector'),
                'descr_unidad' => strtoupper($this->input->post('descr_unidad')),
                'id_dependencia' => (int) $r[0]['id_dependencia'],
                'ambito' => $this->input->post('ambito'),
                'estatus' => $this->input->post('estatus')
            );
            $result = $this->modelo->inserta_unidad($datos);
        }

        if ($catalogo == "perfiles") {
            $datos = array(
                'perfil' => $this->input->post('descr'),
                'activo' => $this->input->post('estatus')
            );
            $result = $this->modelo->inserta_perfil($datos);
        }

        if ($catalogo == "cambs") {
            $datos = array(
                'cla_camb' => strtoupper($this->input->post('clave')),
                'niv' => (int) $this->input->post('niv'),
                'part1' => (int) $this->input->post('part1'),
                'des_camb' => strtoupper($this->input->post('des_camb')),
                'activo' => $this->input->post('estatus'),
                'comentario' => $this->input->post('comentario'));

            switch ($this->input->post('niv')) {
                case 5:
                    $datos['part1'] = substr($datos['cla_camb'], 0, 4);
                    break;
                case 4:
                    $datos['part1'] = substr($datos['cla_camb'], 0, 3) . '0';
                    break;
                case 3:
                    $datos['part1'] = substr($datos['cla_camb'], 0, 2) . '00';
                    break;
                case 2:
                    $datos['part1'] = substr($datos['cla_camb'], 0, 1) . '000';
                    break;
                case 1:
                    $datos['part1'] = 0;
                    break;
            }


            $result = $this->modelo->inserta_camb($datos);
        }

        if ($catalogo == "lugar") {
            $datos = array(
                'opcion' => strtoupper($this->input->post('opcion')),
                'desc_lugar' => strtoupper($this->input->post('descr')),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->inserta_lugar($datos);
        }

        if ($catalogo == "sexo") {
            $datos = array(
                'opcion' => strtoupper($this->input->post('opcion')),
                'desc_sexo' => strtoupper($this->input->post('descr')),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->inserta_sexo($datos);
        }


        if ($catalogo == "uso") {
            $datos = array(
                'letra' => strtoupper($this->input->post('opcion')),
                'desc_uso' => strtoupper($this->input->post('descr')),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->inserta_uso($datos);
        }


        if ($catalogo == "fauna") {
            $datos = array(
                'cla_camb' => strtoupper($this->input->post('clave')),
                'des_camb' => strtoupper($this->input->post('descr')),
                'nom_cien' => strtoupper($this->input->post('nom_cien')),
                'clase' => $this->input->post('clase'),
                'orden' => $this->input->post('orden'),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->inserta_fauna($datos);
        }


        if ($catalogo == "causas") {
            $datos = array(
                'causa' => $this->input->post('causa'),
                'descripcion' => strtoupper($this->input->post('descr')),
                'movimiento' => $this->input->post('movimiento'),
                'activo' => $this->input->post('estatus')
            );

            $result = $this->modelo->inserta_causa($datos);
        }



        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function createCatalogos() {

        //--------------------Codigo 1000,3000,4000 --------------------------------
        $datos['cambs'] = $this->modelo->getPublicCambs("'1','3','4'");
        $datos['title'] = 'CATALOGO DE SERVICIOS DEL GOBIERNO DEL DISTRITO FEDERAL (ARMONIZADO)';
        $datos['size'] = 11;
        $content = $this->load->view('publico/view_catalogos.php', $datos, true);
        unset($datos);
        $archivo2 = $this->getPDF('L', $content, './resources/media/publico/', 'CABMSDF SERVICIOS.pdf');
        unset($content);
        //-------------------Codigo 2000 -------------------------------------------
        $datos['cambs'] = $this->modelo->getPublicCambs("'2'");
        $datos['title'] = 'CATALOGO DE BIENES MUEBLES DEL GOBIERNO DEL DISTRITO FEDERAL (ARMONIZADO)';
        $datos['size'] = 9;
        $content = $this->load->view('publico/view_catalogos.php', $datos, true);
        unset($datos);
        $archivo2 = $this->getPDF('L', $content, './resources/media/publico/', 'CABMSDF 2000.pdf');
        unset($content);

        //--------------------Codigo 5000 ------------------------------------------
        $datos['cambs'] = $this->modelo->getPublicCambs("'5'");
        $datos['title'] = 'CATALOGO DE BIENES MUEBLES DEL GOBIERNO DEL DISTRITO FEDERAL (ARMONIZADO)';
        $datos['size'] = 9;
        $content = $this->load->view('publico/view_catalogos.php', $datos, true);
        unset($datos);
        $archivo2 = $this->getPDF('L', $content, './resources/media/publico/', 'CABMSDF 5000.pdf');
        unset($content);
    }

    private function getPDF($horientacion, $content, $path, $filename) {
        if (!file_exists($path)) {

            if (!mkdir($path, 0775, true))
                die('No fue posible crear el Directorio' . $this->upload_path);
        }
        require_once('./webapp/third_party/html2pdf/html2pdf.class.php');

        try {
            $html2pdf = new HTML2PDF($horientacion, 'LETTER', 'es', true, 'UTF-8', array(10, 10, 10, 10));
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content);
            //$html2pdf->Output('Informe.pdf', 'D');
            $html2pdf->Output($path . '/' . $filename, 'F');
        } catch (HTML2PDF_exception $e) {
            //echo $e;
            return -1;
        }
        return $path . '/' . $filename;
    }

}

?>