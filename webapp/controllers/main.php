<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    function index() {
        if ($this->session->userdata('logged_in'))
        {
            switch ($this->session->userdata('id_perfil'))
            {
                case 1: //Admin
                    redirect('administrador/listadoUsuarios');
                    break;
                case 2: //Operador 
                    redirect('operador/index');
                    break;
                case 3: //Director
                    redirect('director/agenda');
                    break;
                
            }
        } 
        else
            redirect('main/login');
    }

    function keepalive() {
        if ($this->session->userdata('logged_in')) {
            echo "OK";
        } else {
            echo "notLogged";
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
    		redirect('main/login');
    	}
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
                    $this->load->view('v_login', array('error' => true, 'errorMsg' => $this->error));
            }
            else
                $this->load->view('v_login');
       
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
            	'delegacion' => $data[0]['delegacion'],
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
    
    
   

    private function clearOtherSessions($data) {
        $this->load->model('modelo');
        $sessions = $this->M_login->getallSessions();
        foreach ($sessions as $session) {
            $sessionItem = unserialize($session['user_data']);
            if (isset($sessionItem['id_usuario']) and $sessionItem['id_usuario'] == $data['id_usuario'])
                $this->M_login->deleteSession($session['session_id']);
        }
    }
    
    function recomendacion() {
    	 
    	$this->load->view('v_recomendacion', null);
    }
    
    
       
    
   
}
