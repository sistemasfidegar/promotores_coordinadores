<?php

class M_varios extends MY_Model {

    function M_varios() {
        parent::__construct();
    }
    
    
    
    function getTopImportantes($top='') {
    
    	$filtro = '';
    	if($top!='')
    		$filtro = " limit $top";
    	
    	$this->sql = "select id_compromiso,compromiso,nombre_ente, to_char(fecha_adquisicion,'DD/MM/YYYY') as fecha_adqu, to_char(fecha_definitiva,'DD/MM/YYYY') as fecha_limite, fecha_registro, avance, nombre_dg 
						from compromiso 
						inner JOIN cat_ente_publico using(id_ente)
						INNER JOIN cat_dg using(id_dg)
						where prioridad = 3
						order by fecha_registro,nombre_ente DESC
						$filtro;";
   
    	$results = $this->db->query($this->sql);
    	return $results->result_array();    
    }
    
    function getValsTopDepes($ids='') {
    
    	$this->sql = "select cpr.id_ente, id_estatus, count(*) as tot 
						from compromiso cpr 
						where cpr.id_ente in ($ids)
						and acepta_compromiso = 1
						and activo is true
						group by  cpr.id_ente, id_estatus
						order by cpr.id_ente;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    
    }
    
    
    function getTopDepes($top=5) {
    
    	$this->sql = "select id_ente,nombre_ente, siglas_ente, count(*) from compromiso
						inner join cat_ente_publico using(id_ente)
						group by id_ente,nombre_ente,siglas_ente order by 4 DESC
						limit $top;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();

    }
    
    
    
    //HASTA AQUÍ AGREGADO POR NAZ

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

    function getCatEntes($opcion='') {
    	
    	if($opcion=='')
        	$this->sql = " select nombre_ente, id_ente, siglas_ente from cat_ente_publico where activo is true order by nombre_ente";
    	else
    		$this->sql = "select * from cat_ente_publico
						where id_ente in (
							select distinct id_ente from compromiso 
							where activo is true
							and acepta_compromiso = 1
						) order by nombre_ente;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }
    
   

    function countCopromisos($id_dg, $filtro) {
        $this->sql = "select count(id_compromiso) as total from compromiso 
        where activo is true 
        and id_dg=$id_dg 
        and acepta_compromiso = 1 
        and archivado is false
        and id_estatus in (" . $filtro . ") ";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getUltimaActualizacion($id_dg) {

        $this->sql = "SELECT max(ultima_actualizacion) as ultima_actualizacion from(            
                      select max(fecha_registro) as ultima_actualizacion from compromiso where id_dg=$id_dg
                      union
                      select  max(s.fecha_registro) ultima_actualizacion from seguimiento as s INNER JOIN compromiso on(id_generico=id_compromiso) where id_dg=$id_dg and id_tipo_proyecto in(1,5,6)
                      union
                      select  max(s2.fecha_registro) ultima_actualizacion from seguimiento as s1 INNER JOIN compromiso on(s1.id_generico=id_compromiso)  INNER JOIN seguimiento as s2 on(s2.id_generico=s1.id_seguimiento)   where   id_dg=$id_dg and s2.id_tipo_proyecto =7 and s1.id_tipo_proyecto in (1,5,6)) as q1";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    function getCatEntes2($ids_ambitos='') {
    	
    	$filtro='';
    	if($ids_ambitos!='')
    		$filtro= " where id_ambito in ($ids_ambitos) ";
    	
        $this->sql = " select e.nombre_ente, e.id_ente, siglas_ente, count(c.id_ente) as total 
        from cat_ente_publico e 
        left join compromiso as c using (id_ente)
        $filtro  
        group by e.nombre_ente, e.id_ente, siglas_ente 
        order by nombre_ente";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }
    
    
    function getCatDG($id_dg = '') {

    	$filtro='';
    	if($id_dg!='')
    		$filtro = " where id_dg = $id_dg";
    				
    	$this->sql = "select e.nombre_dg, e.id_dg, count(c.id_dg) as total, e.nombre_corto_dg
    	from cat_dg e
    	left join compromiso as c using (id_dg)
    	$filtro
    	group by e.nombre_dg, e.id_dg
    	order by id_dg";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    function getCatDGs() {
    
    	$this->sql = "select nombre_dg, id_dg
    	from cat_dg where activo is true order by id_dg;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    function getDGsVistaCG() {
    
    	$this->sql = "select * from cat_dg where activo is true order by orden;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }
    
    
    

    function countTotalCompromisosxestatus() {
        $this->sql = "select id_estatus, estatus_compromiso, count(*) as total from compromiso cpr
    	full join cat_estatus_compromiso ON (id_estatus = id_estatus_compromiso) 
    	where acepta_compromiso=1
    	and cpr.activo is true
    	GROUP BY id_estatus, estatus_compromiso ORDER BY id_estatus;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }

    /*function getEntesxAmbito($id_ambito) {
        $this->sql = "SELECT id_ente FROM cat_ente_publico WHERE activo is TRUE and id_ambito = $id_ambito ORDER BY nombre_ente;";

        $results = $this->db->query($this->sql);
        return $results->result_array();
    }*/
    
    function getDirecciones() {
    	$this->sql = "SELECT id_dg FROM cat_dg WHERE activo is TRUE ORDER BY id_dg;";
    
    	$results = $this->db->query($this->sql);
    	return $results->result_array();
    }

}

?>
