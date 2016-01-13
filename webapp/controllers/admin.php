<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin extends CI_Controller {

	function index()
	{
		if ($this->session->userdata('logged_in'))
		{
			switch ($this->session->userdata('id_perfil'))
			{
				case 1: //Admin
					redirect('administrador/index');
					
					break;
				case 2: //Operador
					redirect('admin/principal');
					break;
			}
		}
		else
			redirect('admin/login');
		
		$this->load->model('modelo');
		$this->load->model('m_admin');
		$this->load->helper('utilerias_helper');
		
		//$this->load->view('admin/v_loginAdmin');
	}
	
 function login()
    {
    	$this->load->model('M_login');
    	                	
        $username = $this->input->post('username');
        $password = $this->input->post('passwordaux');
            
            if ($this->session->userdata('logged_in')) {
                $this->index();
            } 
            elseif($username && $password)
            {            	
            	$resp = $this->loggear($username, $password);
            	
                if ($this->session->userdata('logged_in')) {
                    $this->index();
                } else
                    $this->load->view('admin/v_loginAdmin', array('error' => true, 'errorMsg' => $this->error));
            }
            else
                $this->load->view('admin/v_loginAdmin');
       
    }

    private function loggear($user = '', $password = '', $externo = false) {
        $this->load->model('M_login');


        $data = $this->M_login->user_login($user, $password);

        if($data != NULL)
        {        	
        	$this->clearOtherSessions($data[0]);
        	
        	$this->M_login->insertBitacora($data[0]['id_usuario'], $user);                 

            $datos_user = array(
                'logged_in' => true,
                'id_usuario' => $data[0]['id_usuario'],
            	'usuario' => $data[0]['usuario'],
                'id_perfil' => $data[0]['id_perfil'],
                'nombre' => $data[0]['nombre'],
                'nombre_completo' => $data[0]['nombre'] . ' ' . $data[0]['paterno'] . ' ' . $data[0]['materno'],
                'perfil' => $data[0]['perfil'],
                'id_delegacion' => $data[0]['id_delegacion'],
            	//'delegacion' => $data[0]['delegacion'],
                'pageSize' => 20
            );
            
            $datos_user['externo'] = false;
            if($externo)
            	$datos_user['externo'] = true;

            $this->session->set_userdata($datos_user);
            return true;
        } else {
            $this->error = "Revise su usuario o contraseña.";
            return false;
        }
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
    
   

    private function clearOtherSessions($data) {
        $this->load->model('modelo');
        $sessions = $this->M_login->getallSessions();
        foreach ($sessions as $session) {
            $sessionItem = unserialize($session['user_data']);
            if (isset($sessionItem['id_usuario']) and $sessionItem['id_usuario'] == $data['id_usuario'])
                $this->M_login->deleteSession($session['session_id']);
        }
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
	
 function principal(){
 	$this->load->view('admin/v_listado');
 }
 	
	function RegistradosC(){
		$data['institucion']=$this->modelo->getInstitucion();
		$data['registro']=1;
		$this->load->view('admin/v_regCoordinador', $data, false);
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
		$this->load->view('admin/v_regCoordinador', $data, false);
	}
	function RegistradosP(){
		$data['institucion']=$this->modelo->getInstitucion();
		$data['registro']=2;
		$this->load->view('admin/v_regPromotor', $data, false);
	}
	function RegistradosP1(){
		$data['institucion']=$this->modelo->getInstitucion();
		$plantel=(int)$this->input->post('plantel');
		
		$aux=$this->modelo->getDatosEscuela($plantel);
		$data['datos']=$aux[0];
		
		$data['Promotor']=$this->modelo->registroProm($plantel);
		$data['registro']=2;
		
		$this->load->view('admin/v_regPromotor', $data, false);
	}
	function AceptadosC(){
		$data['institucion']=$this->modelo->getInstitucion();
		$data['registro']=1;
		
		$this->load->view('admin/v_coordinadorAceptado', $data, false);
	}
	function AceptadosC1(){
		$data['institucion']=$this->modelo->getInstitucion();
		$plantel=(int)$this->input->post('plantel');
		$aux=$this->modelo->getDatosEscuela($plantel);
		$data['datos']=$aux[0];
		$data['Coordinador']=$this->modelo->AceptadoCoo($plantel);
		$data['registro']=1;
	
		$this->load->view('admin/v_coordinadorAceptado', $data, false);
	}
	function AceptadosP(){
		$data['institucion']=$this->modelo->getInstitucion();
		$data['registro']=2;
		$this->load->view('admin/v_promotorAceptado', $data, false);
	}
	function AceptadosP1(){
		$data['institucion']=$this->modelo->getInstitucion();
		$plantel=(int)$this->input->post('plantel');
		$aux=$this->modelo->getDatosEscuela($plantel);
		$data['datos']=$aux[0];
		$data['Promotor']=$this->modelo->AceptadoProm($plantel);
		$data['registro']=2;
		
		$this->load->view('admin/v_promotorAceptado', $data, false);
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
}