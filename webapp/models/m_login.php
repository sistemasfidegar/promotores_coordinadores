<?php

class M_login extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function user_login($alias, $password) {
        $data['alias'] = $alias;
        $data['password'] = $password;
        $this->sql = "SELECT * from usuario 
						inner join cat_perfil using(id_perfil) 
						full join cat_delegacion using(id_delegacion)        		
						where usuario=:alias and password=:password 
						and usuario.activo=true;";
        $this->bindParameters($data);   
        //echo $this->sql;
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function getallSessions() {
        $this->sql = "select * from ci_sessions";
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function deleteSession($session_id) {
        $data['session_id'] = $session_id;
        $this->sql = "DELETE FROM ci_sessions WHERE session_id=:session_id";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results;
    }
    
         
    function insertBitacora($id_usuario, $usuario) {
    	$IP = $this->getRealIP();
    	$this->sql = "INSERT INTO bitacora_accesos (id_usuario, usuario, ip) VALUES ($id_usuario, '$usuario', '$IP') returning id_bitacora;";
    	$results = $this->db->query($this->sql);
    
    	//return $results->result_array();
    }
    
    
    function getRealIP() {
    	if (!empty($_SERVER['HTTP_CLIENT_IP']))
    		return $_SERVER['HTTP_CLIENT_IP'];
    
    	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    		return $_SERVER['HTTP_X_FORWARDED_FOR'];
    
    	return $_SERVER['REMOTE_ADDR'];
    }

}

?>