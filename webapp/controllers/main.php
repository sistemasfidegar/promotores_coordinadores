<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    function index()
    {
    	$this->load->model('modelo');
    	$this->load->helper('utilerias_helper');
    	
    	$this->load->view('beneficiario/v_registro');
    }
    function muestra_informacion($matricula_asignada)
    {
    	$data['matricula'] = $matricula_asignada;
    	
    	$reg=$this->modelo->buscaRegistro($data['matricula']);
    	if($reg!=null)
    	{
    		$aux=$this->modelo->getCicloActual();
    		 
    		$data['id_ciclo_actual']=$aux[0]['id_ciclo_escolar'];
    		$data['ciclo_escolar'] = $aux[0]['ciclo_escolar'];
    		
    		
    		if($data['id_ciclo_actual'] == $reg[0]['id_ciclo']){
    		
    			$this->mensaje($matricula_asignada, $data['id_ciclo_actual']);
    			
    		}
    		else {
    			$this->Reingreso($data['matricula']);
    		}
  
    	}
    	else
    	{
    		$this->nuevoIngreso($data['matricula']);
    	}
    	
    	
    	
    }
    
    
    function nuevoIngreso($matricula){
    	
    
     	$data['matricula'] = $matricula;
    	$aux = $this->modelo->getIdentificacion($data['matricula']);
    	$data['identificacion'] = $aux[0];
    	
    	
    	
    	$aux=$this->modelo->lugar_disponible($data['matricula'], $data['identificacion']['id_archivo']);
   	 	
   	 	if( $aux != null){
	    	$data['Dpromotor']=$aux[0]['promotor'];
	    	$data['Dcoordinador']=$aux[0]['coordinador'];
	    	$data['delegacion'] = $aux[0]['delegacion'];
    	}
   
    	if($data['Dpromotor']!=0 || $data['Dcoordinador'] !=0 ){

    			
    			$aux=$this->modelo->getCicloActual();
		    	
		    	$data['id_ciclo_actual']=$aux[0]['id_ciclo_escolar'];
		    	$data['ciclo_escolar'] = $aux[0]['ciclo_escolar'];
		    	
		    	$aux = $this->modelo->getDireccion($data['matricula']);
		    	$data['direccion'] = $aux[0];
		    	 
		    	$aux = $this->modelo->getEscolar($data['matricula']);
		    	$data['escolar'] = $aux[0];
		    	
		    	$data['es_promotor'] = 0;
		    	$data['tiene_registro'] = 0;
		    	
		    	
		    	$this->load->view('beneficiario/v_datos', $data, false);
    	}
    	else{
    		$data['R']=1;
    		$this->load->view('beneficiario/noDisponible', $data, false);
    	}    		
    }
    
    
    
    
    function Reingreso($matricula){
    	
    	$data['matricula'] = $matricula;
    	$data['Dpromotor']=0;
    	$data['Dcoordinador']=0;
    	
    	$aux = $this->modelo->getIdentificacion($matricula);
    	$data['identificacion'] = $aux[0];
    	 
    	$aux=$this->modelo->lugar_disponible($data['matricula'], $data['identificacion']['id_archivo']);
    	
    	if( $aux != null){
	    	$data['Dpromotor']=$aux[0]['promotor'];
	    	$data['Dcoordinador']=$aux[0]['coordinador'];
	    	$data['delegacion'] = $aux[0]['delegacion'];
    	}
    	 
    	if($data['Dpromotor']!=0 || $data['Dcoordinador'] !=0 ){
    	
    		 
    		$aux=$this->modelo->getCicloActual();
    		 
    		$data['id_ciclo_actual']=$aux[0]['id_ciclo_escolar'];
    		$data['ciclo_escolar'] = $aux[0]['ciclo_escolar'];
    		 
    		$aux = $this->modelo->getDireccion($data['matricula']);
    		$data['direccion'] = $aux[0];
    	
    		$aux = $this->modelo->getEscolar($data['matricula']);
    		$data['escolar'] = $aux[0];
    		 
	    	$data['es_promotor'] = 1;
			$data['tiene_registro'] = 1;
			$this->load->view('beneficiario/v_datos', $data, false);
    	}
    	else{
    		$data['R']=1;
    		$this->load->view('beneficiario/noDisponible', $data, false);
    	}
    }
    function muestra_formato_registro()
    {
    	$data['matricula'] = $this->input->post('matricula');
    	$data['tipo_registro'] = (int)$this->input->post('tipo_registro');
    	$data['correo'] = $this->input->post('correo');
    	$data['tiene_registro'] = (int)$this->input->post('tiene_registro');
    	$data['tel'] = $this->input->post('tel');
    	$data['turno'] = $this->input->post('turno');
    	$data['delegacion'] = $this->input->post('delegacion');
    	$data['id_archivo'] = $this->input->post('id_archivo');
    	$data['id_ciclo'] = (int)$this->input->post('ciclo');
    	$data['folio']=$this->modelo->BuscaFolio($data['matricula']);
    	
    	$aux = $this->modelo->getIdentificacion($data['matricula']);
    	
    	$data['identificacion'] = $aux[0];
    	 
    	$this->load->view('beneficiario/v_formato_registro', $data, false);
    	 
    	 
    }
    function guarda_registro()
    {		
    		$data['matricula'] = $this->input->post('matricula');
	    	$data['ciclo'] = (int)$this->input->post('ciclo');
	    	
	    	$aux=$this->modelo->getIdPlantel($data['matricula']);
	    	$data['id_plantel'] = (int)$aux[0]['id_plantel'];
	    	
	    	$data['tipo_registro'] = (int)$this->input->post('tipo_registro');
			$data['correo'] = $this->input->post('email');
			$data['tel'] = (int)$this->input->post('telefono');
			$data['eje_1'] = (int)$this->input->post('eje_1');
			$data['eje_2'] = (int)$this->input->post('eje_2');
			$data['eje_3'] = (int)$this->input->post('eje_3');
			$data['eje_4'] = (int)$this->input->post('eje_4');
			$data['eje_5'] = (int)$this->input->post('eje_5');
			$data['eje_6'] = (int)$this->input->post('eje_6');
			$data['eje_7'] = (int)$this->input->post('eje_7');
			$data['actividad_1'] =$this->input->post('actividad_1');
			$data['actividad_2'] =$this->input->post('actividad_2');
			$data['actividad_3'] =$this->input->post('actividad_3');
			$data['lugar']=$this->input->post('lugar');
			$data['id_archivo'] = $this->input->post('id_archivo');
			$data['delegacion'] = $this->input->post('delegacion');
			$data['turno'] = $this->input->post('turno');
		   	//end post
		   	
			
			
			if ($data['id_archivo']== 1 || $data['id_archivo']== 2)
			{
				if($data['tipo_registro']==1)
					$tipo='CB';
				else
					$tipo='PB';
				
				$aux=$this->modelo->getConsecutivoB($data['delegacion'], $data['tipo_registro']);
				$cons= $aux[0]['fol'];
				
				$data['siglas']=$aux[0]['siglas'];
				$data['id_delegacion']=$aux[0]['id_delegacion'];
					
				$data['folio']=$data['siglas'].'-'.$tipo.'-'.str_pad($cons, 5,0, STR_PAD_LEFT);
				
				$cons=$cons-1;
				$data['cons']=$this->modelo->ActualizaFolio($cons, $data['tipo_registro'],$data['delegacion']);
				
				
							
			}
			elseif ($data['id_archivo']== 3)
			{
				if($data['tipo_registro']==1)
					$tipo='CU';
				else
					$tipo='PU';
				
				$aux=$this->modelo->getConsecutivoU($data['delegacion'], $data['tipo_registro']);
				$cons= $aux[0]['fol'];
				
				$data['siglas']=$aux[0]['siglas'];
				$data['id_delegacion']=$aux[0]['id_delegacion'];
					
				$data['folio']=$data['siglas'].'-'.$tipo.'-'.str_pad($cons, 5,0, STR_PAD_LEFT);
				
				
				$cons=$cons-1;
				$data['cons']=$this->modelo->ActualizaFolioU($cons, $data['tipo_registro'],$data['delegacion']);
				
				
			}
			
			
			$aux = $this->modelo->getIdentificacion($data['matricula']);
			$data['identificacion'] = $aux[0];
		
			
				$b=$this->modelo->insertaRegistro($data['ciclo'],$data['tipo_registro'],$data['matricula'],$data['id_plantel'],
						$data['eje_1'],$data['eje_2'],$data['eje_3'],$data['eje_4'],$data['eje_5'],$data['eje_6'],$data['eje_7']
						,$data['actividad_1'],$data['actividad_2'],$data['actividad_3'],$data['correo'],
						$data['tel'],$data['folio'],$data['id_archivo'],$data['id_delegacion'],$data['turno']);
		
			
			
			$aux=$this->modelo->getDatosEscuela($data['id_plantel']);
			$data['escuela']=$aux[0];
				    	
			$aux=$this->modelo->getfecha($data['matricula'], $data['ciclo']);
			$data['fecha']=$aux[0];

			if ($b != null || $b!=''){
				header ("Location:mensaje2/?matricula=".$data['matricula']);
				
			}else{ 
				echo 'intentalo mas tarde<br>';
				
				
				header ("Location: index.php/main");
						
			}
    	
    	//$this->load->view('beneficiario/existe', $data, false);
    }
    
    
    function mensaje($matricula){
    	$data['msj'] =null;
    	$data['matricula'] = $matricula;
    	$aux=$this->modelo->getCicloActual();
    	
    	$data['id_ciclo_actual']=$aux[0]['id_ciclo_escolar'];
    	
    	$aux = $this->modelo->generaMensaje($data['matricula'], $data['id_ciclo_actual']);
    	
    	
    	if ($aux != null){
    		$data['msj'] = $aux[0];
    		$this->load->view('beneficiario/v_mensaje', $data, false);
    	}
    	else{
    		
    		$data['R']=2;
    		
    		$this->load->view('beneficiario/noDisponible', $data, false);
    	}
    	
    }
   
    
    function mensaje2(){
    	
    	$data['matricula']= $this->input->get('matricula');
    	$aux=$this->modelo->getCicloActual();
    	 
    	$data['id_ciclo_actual']=$aux[0]['id_ciclo_escolar'];
    	
    	$aux = $this->modelo->generaMensaje($data['matricula'], $data['id_ciclo_actual']);
    	
    	 
    	if ($aux != null){
    		$data['msj'] = $aux[0];
    		$this->load->view('beneficiario/v_mensaje', $data, false);
    	}
    	else{
    	
    		$data['R']=3;
    	
    		$this->load->view('beneficiario/noDisponible', $data, false);
    	}
    }
    
    function ajax_beneficiario_registrado()
    {
    	$matricula = strtoupper($this->input->post('matricula'));
    	$aux = $this->modelo->getMatriculaBeneficiario($matricula);
    	
    	if($aux!=null)
    	{
    		echo $matricula = $aux[0]['matricula_asignada'];
    	}
    	else
    	{
    		echo "bad";
    	}
    }
    
    function ajax_beneficiario_unam(){
    	$matricula = $this->input->post('matricula_escuela');
    	$aux = $this->modelo->getMatriculaBeneficiarioUnam($matricula);
    	 
    	if($aux!=null)
    	{
    		echo $matricula = $aux[0]['matricula_asignada'];
    	}
    	else
    	{
    		echo "bad";
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

    function recomendacion() {
    	 
    	$this->load->view('v_recomendacion', null);
    }
    
    ///////////////////////////////////////////////////////////////
    
    function generar(){
    	
    	$this->load->library('Pdf');
    	$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    	$pdf->SetCreator(PDF_CREATOR);
    	$pdf->SetAuthor('Cony Jaramillo');
    	$pdf->SetTitle('Combrobante');
    	$pdf->SetSubject('Registro Coordinadores y Promotores');
    	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
    	ob_start();
    	
    	 
    	// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
    	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 1, 0));
    	$pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
    	 
    	// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
    	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    	// se pueden modificar en el archivo tcpdf_config.php de libraries/config
    	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    	// se pueden modificar en el archivo tcpdf_config.php de libraries/config
    	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    	//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    	// se pueden modificar en el archivo tcpdf_config.php de libraries/config
    	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    	//relación utilizada para ajustar la conversión de los píxeles
    	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    
    	// ---------------------------------------------------------
    	// establecer el modo de fuente por defecto
    	$pdf->setFontSubsetting(true);
    
    	// Establecer el tipo de letra
    
    	$pdf->SetFont('helvetica', '', 14, '', true);
    
    	// Añadir una página
    	// Este método tiene varias opciones, consulta la documentación para más información.
    	$pdf->AddPage();
    
    	//fijar efecto de sombra en el texto
    	$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(255, 255, 255), 'opacity' => 1, 'blend_mode' => 'Normal'));
    	
    	// Establecemos el contenido para imprimir
    	$data['nombre'] = $this->input->post('nombre');
    	$data['folio'] = $this->input->post('folio');
    	$data['correo'] = $this->input->post('correo');
    	$data['fecha'] = $this->input->post('fecha');
    	$data['plantel'] = $this->input->post('plantel');
    	$data['institucion'] = $this->input->post('institucion');
    	$data['tipo_registro'] = $this->input->post('tipo_registro');
    	$matricula=$this->input->post('matricula');
    	
    	//preparamos y maquetamos el contenido a crear
    	$html ="";
    	$html .= "<style type=text/css>";
    	$html .=" h1 {
					  
					    width: 100%;
					    font-weight: bold;
					    font-size: 13;
					    line-height: 2;
					    text-align: center;
					    color: #070005;
					}
    			h2{
    					text-align: justify;
    					font-weight: bold;
						font-size: 9;
						line-height: 1.5;
    					color:  #070005;
    				}
    			h3{
    				line-height: 3;
    				text-align: center;
    				font-weight: normal;
    				font-size: 9;
    				}
					h4{
    					text-align: center;
    					font-weight: bold;
						font-size: 10;
						line-height: 1;
    					color: #070005;
				}
    			
    			h5{
    					text-align: justify;
    					font-weight: bold;
						font-size: 10;
						line-height: 4;
    					color:  #070005;
				}
    			p {
    			 	line-height: 1.5;
    				color: #5E5D5D;
    				font-weight: bold;
				    text-align: justify;
					
    				font-size: 9;
    				
				}
    				
    			
			";
    	
    	$html .= "</style>";
    	
    	$html .='<h1>COMPROBANTE DE REGISTRO COMO '.$data['tipo_registro'].'<br> DEL PROGRAMA PREPA S&Iacute;</h1>';
    	
    	$html .="<p><h5>".$data['nombre']."</h5></p>";
    	
    	$html .='<table border="0">
    			<tr>
    				<td><h2>FECHA DE REGISTRO</h2></td>
    				<td colspan="2"><p>'.$data['fecha'].'</p></td>
    				
    			</tr>
    			<tr>
    				<td><h2>INSTITUCION</h2></td>
    				<td colspan="2"><p>'.$data['institucion'].'</p></td>
    			</tr>
    			<tr>
    				<td><h2>PLANTEL</h2></td>
    				<td colspan="2"><p>'.$data['plantel'].'</p></td>
    			</tr>
    			<tr>
    				<td colspan="3"><h4></h4></td>
    			</tr>
    			<tr>
    				<td colspan="3" bgcolor="#FBEFFB"><h4>FOLIO:   '.$data['folio'].'</h4></td>
    				
    			</tr>
    			
    			</table>';
    	
    	$html .="<br><br><br><br><br><h3>Has quedado registrado, te sugerimos estar al pendiente de tu correo: <br> <u>".$data['correo']."</u></h3>";
    	
    	// Imprimimos el texto con writeHTMLCell()
    	$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
    	
    	$estilo = array('padding'=>'auto' );
    	
    	
    	$tipos=array('C128A');
    	
    	for ($i=0;$i<sizeof($tipos);$i++){
    		$pdf->SetXY(78,110);
    		$pdf->Cell(45, 50,$matricula,0,0,'C');
    		$pdf->write1DBarcode($matricula,$tipos[$i],75,115,50,14,'',$estilo);
    	}
    	 
    	// ---------------------------------------------------------
    	// Cerrar el documento PDF y preparamos la salida
    	// Este método tiene varias opciones, consulte la documentación para más información.
    	$nombre_archivo = utf8_decode("Registro_".$data['folio'].".pdf");
    	
    
    	$pdf->Output($nombre_archivo, 'I');
    	
    	ob_end_flush();
    }
     
}
?>