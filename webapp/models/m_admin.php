<?php

class M_admin extends MY_Model {

    function M_admin() {
        parent::__construct();
    }
    
    function getCatDelegaciones()
    {
    	$this->sql = "select * from cat_delegacion
    	where activo is true
    	order by delegacion;";
    	
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    	
    }

    function getPromAvance() {

        $this->sql = "select sum(avance)/count(*) as promedio from compromiso 
						where id_estatus = 3 
						and activo is true;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCompFavoritos() {

        $this->sql = "select to_char(dsc.fecha_discurso, 'DD/MM/YYYY') fecha_discurso_mod,dsc.fecha_discurso, cpm.* 
						from compromiso cpm
						join discurso dsc on (cpm.id_discurso = dsc.id_discurso)
						where favorito is true
						and cpm.activo is true
						order by 2 asc;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCompxEstatus() {

        $this->sql = "select id_estatus,estatus_compromiso, count(*) as tot_x_estatus 
						from compromiso cpm
						INNER JOIN cat_estatus_compromiso on (id_estatus=id_estatus_compromiso)
						where id_estatus in (2,3,6)
						and cpm.activo is true
						group by id_estatus,estatus_compromiso 
						order by 1;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCompEnProceso() {

        $this->sql = "select id_compromiso, compromiso, avance from compromiso 
						where id_estatus = 3
						and prioridad = 2
						and activo is true
						order by avance limit 5;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getTotalCompromisosxAnio($anio) {

        $filtro = " and id_discurso in (select id_discurso from discurso where extract(year from fecha_discurso) = $anio)";

        if ($anio == 0)
            $filtro = "";

        $this->sql = "select id_estatus,count(*) from compromiso 
						where id_estatus in (2,3,4,6) 
						$filtro
						and activo is true
						group by id_estatus
						order by 1;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getTotalCompromisosxMes($anio) {

        $filtro = " and  extract(year from fecha_discurso) = $anio";

        if ($anio == 0)
            $filtro = "";


        $this->sql = "select extract(month from fecha_discurso) as mes, id_estatus, count(*) as total_x_estatus 
						from discurso ds
						left join compromiso cp using(id_discurso)
						where ds.activo is true
						and cp.activo is TRUE
						and cp.id_estatus in (2,3,4,6)
						$filtro
						and ds.activo is true
						group by mes,id_estatus
						order by 1,2;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCatEstatus($requeridos = '2,3,4,6') {
        $this->sql = "select * from cat_estatus_compromiso
    	where activo is true
    	and id_estatus_compromiso in ($requeridos)
    	order by 1;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCompromisosUrgentes() {
        $this->sql = "select to_char(fecha_discurso, 'DD/MM/YYYY') fecha_discurso_f,fecha_discurso, cp.* from discurso ds
						inner join (
							SELECT id_compromiso,id_discurso,compromiso,id_estatus,to_char(fecha_tentativa, 'DD/MM/YYYY') fecha_tentativa,
							to_char(fecha_definitiva, 'DD/MM/YYYY') fecha_definitiva,prioridad,avance,tipo_calculo_avance, to_char(fecha_inicio, 'DD/MM/YYYY') fecha_inicio 
							FROM compromiso 
							WHERE id_estatus in (2,3,6)
						) cp using(id_discurso)
						where prioridad = 2
						and activo is true
						order by fecha_discurso
						limit 20;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCompromisosxDependencia($anio) {

        $filtro = " and  extract(year from fecha_discurso) = $anio";

        if ($anio == 0)
            $filtro = "";

        $this->sql = "select id_compromiso,id_dependencia from compromiso_x_dependencia
					where id_compromiso in (
						select cp.id_compromiso
						from discurso ds
						left join compromiso cp using(id_discurso)
						where ds.activo is true
						and cp.activo is TRUE
						and cp.id_estatus in (2,3,4,6)
						$filtro
					)
					order by 2;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCatDependencias() {
        $this->sql = "select id_dependencia, dependencia 
						from cat_dependencia 
						where activo is true
						order by 2;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCatEntes() {
        $this->sql = " select nombre_ente, id_ente, siglas_ente from cat_ente_publico where activo is true order by nombre_ente";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function countCopromisos($id_ente, $filtro) {
        $this->sql = "select count(id_compromiso) as total from compromiso where activo is true and id_ente=$id_ente and id_estatus in (" . $filtro . ") ";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCatEntes2() {
        $this->sql = " select e.nombre_ente, e.id_ente, siglas_ente, count(c.id_ente) as total from cat_ente_publico e left join compromiso as c using (id_ente)  group by id_ente order by  total desc";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getAllUsuarios() {

        $this->sql = "select id_usuario,nombre,paterno,materno,us.activo,id_perfil,id_delegacion,email,perfil,delegacion,usuario 
						from usuario us 
						left join cat_perfil using(id_perfil)
						left join cat_delegacion using(id_delegacion)
						order by nombre,paterno,materno;";
        $result = $this->db->query($this->sql);

        return $result->result_array();
    }

    function getPerfiles() {

        $this->sql = "select * from cat_perfil where activo is true order by perfil;";
        $result = $this->db->query($this->sql);

        return $result->result_array();
    }

    function get_usuario_by_correo($correo) { // sipad
        $data['correo'] = $correo;
        $this->sql = "SELECT id_usuario from usuario where email=:correo";
        $this->bindParameters($data);
        $results = $this->db->query($this->sql, array(1));
        return $results->result_array();
    }

    function insertUsuario($data) {

        $this->sql = "INSERT INTO usuario (nombre, paterno,materno, usuario, password, id_delegacion, id_perfil, email, activo) VALUES 
    	(:nombre, :paterno, :materno,:usuario, :password , :id_delegacion, :id_perfil, :email, :activo) returning id_usuario;";

        $this->bindParameters($data);
        $result = $this->db->query($this->sql);
        return $result->result_array();
    }

    function getUsuario($id_usuario) {

        $this->sql = "select * from usuario where id_usuario=$id_usuario;";
        $result = $this->db->query($this->sql);

        return $result->result_array();
    }

    function actualizarUsuario($data) {

        $this->sql = "Update usuario set nombre=:nombre, paterno=:paterno, materno=:materno, 
            id_delegacion=:id_delegacion, id_perfil=:id_perfil, email=:email, 
            usuario=:usuario, activo=:activo 
        	where id_usuario=:id_usuario returning id_usuario";

        $this->bindParameters($data);
        $this->db->query($this->sql);
        return $this->db->affected_rows();
    }

    function actualizarPassword($data) {
        $this->sql = "Update usuario set password=:password where id_usuario=:id_usuario returning id_usuario";
        $this->bindParameters($data);
        $this->db->query($this->sql);
        return $this->db->affected_rows();
    }

}

?>
