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
    
    	$reg=$this->modelo->buscaRegistro($matricula_asignada);
    	
    	$data['matricula'] = $matricula_asignada;
    	$aux = $this->modelo->getIdentificacion($matricula_asignada);
    	$data['identificacion'] = $aux[0];
    	 
    	$aux = $this->modelo->getDireccion($matricula_asignada);
    	$data['direccion'] = $aux[0];
    	 
    	$aux = $this->modelo->getEscolar($matricula_asignada);
    	$data['escolar'] = $aux[0];
    	
    	$aux=$this->modelo->getCicloActual();
    	$data['id_ciclo_actual']=$aux[0]['id_ciclo_escolar'];
    	$data['ciclo_escolar'] = $aux[0]['ciclo_escolar'];
    	
    		
    	if($reg!=null)
    	{
    		$data['tipo_registro']=$reg[0]['id_tipo_registro'];
    		
    		if($data['id_ciclo_actual'] == $reg[0]['id_ciclo']){
    			 
    			 
    			$aux=$this->modelo->BuscaFolio($matricula_asignada);
    			$data['folio']=$aux[0];
    		  
    			$aux = $this->modelo->getIdentificacion($matricula_asignada);
    			$data['identificacion'] = $aux[0];
    			$aux=$this->modelo->getIdPlantel($data['matricula']);
    			$data['id_plantel'] = (int)$aux[0]['id_plantel'];
    			
    			$aux=$this->modelo->getfecha($data['matricula'], $data['id_ciclo_actual']);
    			$data['fecha']=$aux[0];
    			$aux=$this->modelo->getDatosEscuela($data['id_plantel']);
    			$data['escuela']=$aux[0];
    			$data['es_promotor'] = 1;
    			$this->load->view('beneficiario/v_mensaje', $data, false);
    		  
    		}
    		elseif($reg[0]['id_tipo_registro']== 1|| $reg[0]['id_tipo_registro']==2){
    			$data['es_promotor'] = 1;
    			$data['tiene_registro'] = 1;
    			$this->load->view('beneficiario/v_datos', $data, false);
    		}
    
    
    	}
    	else{
    		$data['es_promotor'] = 0;
    		$data['tiene_registro'] = 0;
    		$this->load->view('beneficiario/v_datos', $data, false);
    	}
 	 
    }
    function muestra_formato_registro()
    {
    	$data['matricula'] = $this->input->post('matricula');
    	$data['tipo_registro'] = (int)$this->input->post('tipo_registro');
    	$data['correo'] = $this->input->post('correo');
    	$data['tiene_registro'] = (int)$this->input->post('tiene_registro');
    	$data['tel'] = $this->input->post('tel');
    	$data['id_ciclo'] = (int)$this->input->post('ciclo');
    	$data['folio']=$this->modelo->BuscaFolio($data['matricula']);
    	$aux = $this->modelo->getIdentificacion($data['matricula']);
    	$data['identificacion'] = $aux[0];
    	 
    	$this->load->view('beneficiario/v_formato_registro', $data, false);
    	 
    	 
    }
    function guarda_registro()
    {
    	
    	// $reg=$this->modelo->buscaRegistro($matricula_asignada);
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
		   	//end post
		   	
			$aux=$this->modelo->getUltimofolio($data['id_plantel']);
			$cons= 1+(int)$aux[0]['consecutivo'];
			$data['cons']=$cons;
	
			$aux = $this->modelo->getIdentificacion($data['matricula']);
			$data['identificacion'] = $aux[0];
			
			
			
			
			
			$b=$this->modelo->insertaRegistro($data['ciclo'],$data['tipo_registro'],$data['matricula'],$data['id_plantel'],
					$data['eje_1'],$data['eje_2'],$data['eje_3'],$data['eje_4'],$data['eje_5'],$data['eje_6'],$data['eje_7']
					,$data['lugar'],$data['actividad_1'],$data['actividad_2'],$data['actividad_3'],$data['correo'],
					$data['tel'],$data['cons']);
		
			$a=$this->modelo->incrementa($data['cons'],$data['id_plantel']);
			
			
			$aux=$this->modelo->getDatosEscuela($data['id_plantel']);
			$data['escuela']=$aux[0];
				    	
			$aux=$this->modelo->getfecha($data['matricula'], $data['ciclo']);
			$data['fecha']=$aux[0];

			$aux=$this->modelo->BuscaFolio($data['matricula']);
			$folio=trim($aux[0]['clave']).str_pad($aux[0]['consecutivo'],5,0,STR_PAD_LEFT);
			$data['folio']=	$aux[0];
			
			$this->modelo->guardaFolio($folio,$data['matricula'],$data['tipo_registro'], $data['ciclo']);
			
			//$this->load->view('beneficiario/existe', $data, false);
			$this->load->view('beneficiario/v_mensaje', $data, false);
    	
    	//$this->load->view('beneficiario/existe', $data, false);
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
    public function principal(){
    	//$data['provincias'] llena el select con las provincias españolas
    	$data['provincias'] = $this->modelo->getinfo();
    	//cargamos la vista y pasamos el array $data['provincias'] para su uso
    	$this->load->view('administrador/pdfs_view', $data, false);
    }
    
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
    	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    	// se pueden modificar en el archivo tcpdf_config.php de libraries/config
    	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    	//relación utilizada para ajustar la conversión de los píxeles
    	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    
    	// ---------------------------------------------------------
    	// establecer el modo de fuente por defecto
    	$pdf->setFontSubsetting(true);
    
    	// Establecer el tipo de letra
    
    	//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
    	// Helvetica para reducir el tamaño del archivo.
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
    	//$html .="<body>";
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
    	//$html .="<p><h4>Institucion: ".$data['institucion']." <br>Plantel ".$data['plantel']."</h4></p>";
    	
    	
    	
    /*	$html .="<p>TU FECHA DE REGISTRO ES: <b>".$data['fecha']."</b></p>";
    	$html .="<p>TU N&Uacute;MERO DE FOLIO ES: <b>".$data['folio']."</b></p>";
    	*/
    	$html .="<br><h3>Has quedado registrado, te sugerimos estar al pendiente de tu correo: <br> <u>".$data['correo']."</u></h3>";
    	
    	
    //	$html .="</body>";
    	
    	 
    	// Imprimimos el texto con writeHTMLCell()
    	$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
    
    	// ---------------------------------------------------------
    	// Cerrar el documento PDF y preparamos la salida
    	// Este método tiene varias opciones, consulte la documentación para más información.
    	$nombre_archivo = utf8_decode("Registro_".$data['folio'].".pdf");
    	
    
    	$pdf->Output($nombre_archivo, 'I');
    	ob_end_flush();
    }
     
}
?>