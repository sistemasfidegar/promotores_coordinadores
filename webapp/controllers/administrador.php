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
       /* $this->load->model('m_operador');
        $this->load->model('m_varios');
        */
        $this->load->model('m_admin');
    	
    }
    function salir()
    {
    	$externo = $this->session->userdata('externo');
    	$this->session->sess_destroy();
    
    	if($externo)
    	{
    		echo '<script>window.close();</script>';
    	}
    	else
    	{
    		redirect('admin/login');
    	}
    }
    function index() {

        $data['content'] = null;
        $this->load->view('administrador/v_listado.php', $data, false);
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
 		
        $this->load->view('administrador/editaUsuario.php', $data, false);
        
        //$this->load->view('administrador/v_template.php', $datos);
    }

    function nuevoUsuario() {

        
        $data['delegaciones'] = $this->m_admin->getCatDelegaciones();
        $data['perfiles'] = $this->m_admin->getPerfiles();
        $this->load->view('administrador/nuevoUsuario.php', $data, false);

        

        //$this->load->view('administrador/v_template.php', $datos);
    }

    function listadoUsuarios() {

      	 $data['usuarios'] = $this->m_admin->getAllUsuarios();

    	$this->load->view('administrador/v_listaUsuario.php', $data, false);
       //$this->load->view('administrador/v_template.php', $datos);
    }

    function aceptado(){
    
    	$aceptado=$this->input->post('arreglo');
    
    	//echo '<pre>';
    	//print_r($aceptado);
    	//echo '</pre>';
    
    	foreach ($aceptado as $val){
    
    		$res=$this->modelo->inserAceptado($val);
    	}
    	if ($res == 1){
    		echo 'ok';
    	}
    	else
    		echo 'bad';
    
    }

    /*Funciones de barra*/
    function RegistradosC(){
    	$data['institucion']=$this->modelo->getInstitucion();
    	$data['registro']=1;
    	$this->load->view('administrador/v_regCoordinador', $data, false);
    }
    function RegistradosC1(){
    	$data['institucion']=$this->modelo->getInstitucion();
    	$plantel=(int)$this->input->post('plantel');
    	$aux=$this->modelo->getDatosEscuela($plantel);
    	$data['datos']=$aux[0];
    	$data['Coordinador']=$this->modelo->registroCoo($plantel);
    	/*$aux=$this->modelo->getCiclo();
    		$data['ciclo']=$aux[0];*/
    	$data['registro']=1;
    	$this->load->view('administrador/v_regCoordinador', $data, false);
    }
    function RegistradosP(){
    	$data['institucion']=$this->modelo->getInstitucion();
    	$data['registro']=2;
    	$this->load->view('administrador/v_regPromotor', $data, false);
    }
    function RegistradosP1(){
    	$data['institucion']=$this->modelo->getInstitucion();
    	$plantel=(int)$this->input->post('plantel');
    
    	$aux=$this->modelo->getDatosEscuela($plantel);
    	$data['datos']=$aux[0];
    
    	$data['Promotor']=$this->modelo->registroProm($plantel);
    	$data['registro']=2;
    
    	$this->load->view('administrador/v_regPromotor', $data, false);
    }
    function AceptadosC(){
    	$data['institucion']=$this->modelo->getInstitucion();
    	$data['registro']=1;
    
    	$this->load->view('administrador/v_coordinadorAceptado', $data, false);
    }
    function AceptadosC1(){
    	$data['institucion']=$this->modelo->getInstitucion();
    	$plantel=(int)$this->input->post('plantel');
    	$aux=$this->modelo->getDatosEscuela($plantel);
    	$data['datos']=$aux[0];
    	$data['Coordinador']=$this->modelo->AceptadoCoo($plantel);
    	$data['registro']=1;
    
    	$this->load->view('administrador/v_coordinadorAceptado', $data, false);
    }
    function AceptadosP(){
    	$data['institucion']=$this->modelo->getInstitucion();
    	$data['registro']=2;
    	$this->load->view('administrador/v_promotorAceptado', $data, false);
    }
    function AceptadosP1(){
    	$data['institucion']=$this->modelo->getInstitucion();
    	$plantel=(int)$this->input->post('plantel');
    	$aux=$this->modelo->getDatosEscuela($plantel);
    	$data['datos']=$aux[0];
    	$data['Promotor']=$this->modelo->AceptadoProm($plantel);
    	$data['registro']=2;
    
    	$this->load->view('administrador/v_promotorAceptado', $data, false);
    }
    public function ajaxGetPlanteles($tipo)
    {
    	$planteles = $this->modelo->get_plantel($tipo);
    		
    	echo '<option value="0">[Seleccionar]</option>';
    	foreach ($planteles as $plantel){
    		echo '<option value="'.$plantel['id_plantel'].'">'.$plantel['plantel'].'</option>';
    	}
    
    }
    function exportaExcel()
    {
    	$archivo = 'tabla_'.date('dmY_hi').'.xls';
    
    	if( $_POST['datos_a_enviar']!=null)
    	{
    		header("Content-type: application/vnd.ms-excel; name='excel'");
    		header("Content-Disposition: filename=$archivo");
    		header("Pragma: no-cache");
    		header("Expires: 0");
    
    		echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
    		echo $_POST['datos_a_enviar'];
    	}
    }
    /*Funciones de barra*/
}
