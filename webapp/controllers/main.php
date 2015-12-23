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
    
    
    function guarda_registro()
    {
    	$data['matricula'] = $this->input->post('matricula');
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
    	
    	$aux=$this->modelo->getIdPlantel($data['matricula']);
    	$data['id_plantel'] = (int)$aux[0]['id_plantel'];
    	$aux=$this->modelo->getUltimofolio($data['id_plantel']);
    	$cons= 1+(int)$aux[0]['consecutivo'];
    	$data['cons']=$cons;
    	
    	$data['ciclo'] = (int)$this->input->post('ciclo');
    	$data['msj']=2;
    	
    	$aux = $this->modelo->getIdentificacion($data['matricula']);
    	$data['identificacion'] = $aux[0];
    	
    	$a=$this->modelo->incrementa($data['cons'],$data['id_plantel']);
    	$reg=$this->modelo->buscaRegistro($data['matricula']);
    	$aux=$this->modelo->getCiclo();
    	$data['id_ciclo']=$aux[0]['id_ciclo_escolar'];
    	
    	if($reg==null)
    	{
    		   	$b=$this->modelo->insertaRegistro($data['ciclo'],$data['tipo_registro'],$data['matricula'],$data['id_plantel'],
		    	$data['eje_1'],$data['eje_2'],$data['eje_3'],$data['eje_4'],$data['eje_5'],$data['eje_6'],$data['eje_7']
		    	,$data['lugar'],$data['actividad_1'],$data['actividad_2'],$data['actividad_3'],$data['correo'],
		    	$data['tel'],$data['cons']);
    		
    	}
	    elseif($reg[0]['id_ciclo']!=$data['id_ciclo'] ){
	    	$b=$this->modelo->insertaRegistro($data['ciclo'],$data['tipo_registro'],$data['matricula'],
	    			$data['id_plantel'],$data['eje_1'],$data['eje_2'],$data['eje_3'],$data['eje_4'],$data['eje_5'],$data['eje_6'],$data['eje_7']
	    			,$data['lugar'],$data['actividad_1'],$data['actividad_2'],$data['actividad_3'],$data['correo'],$data['tel'],$data['cons']);
	    }
    	$aux=$this->modelo->generaFolio($data['matricula']);
    	
    	$folio=trim($aux[0]['clave']).str_pad($aux[0]['consecutivo'],5,0,STR_PAD_LEFT);
    	 
    	$data['folio']=	$aux[0];
    	
    	$this->modelo->guardaFolio($folio,$data['matricula'],$data['tipo_registro']);
    	$this->load->view('beneficiario/v_mensaje', $data, false);
    	//echo '<pre>';
    	//print_r($data);
    	//echo '</pre>';
    	
    }
    
    
    function muestra_formato_registro()
    {
    	$data['matricula'] = $this->input->post('matricula');
    	$data['tipo_registro'] = (int)$this->input->post('tipo_registro');
    	$data['correo'] = $this->input->post('correo');
    	$data['tel'] = $this->input->post('tel');
    	$data['id_ciclo'] = (int)$this->input->post('ciclo');
    	$data['folio']=$this->modelo->generaFolio($data['matricula']);
    	$aux = $this->modelo->getIdentificacion($data['matricula']);
    	$data['identificacion'] = $aux[0];
    	
    	$this->load->view('beneficiario/v_formato_registro', $data, false);                                                                                                                                                                                                                                                                                                                                   
    	
    	
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
    
    
    function muestra_informacion($matricula_asignada)
 	{
 		$aux=$this->modelo->getCiclo();
 		$data['id_ciclo']=$aux[0]['id_ciclo_escolar'];
 		$data['ciclo_escolar'] = $aux[0]['ciclo_escolar'];
 		$data['matricula'] = $matricula_asignada;
 		
 		 
 		$aux = $this->modelo->getIdentificacion($matricula_asignada);
 		$data['identificacion'] = $aux[0];
 		
 		$aux = $this->modelo->getDireccion($matricula_asignada);
 		$data['direccion'] = $aux[0];
 		
 		$aux = $this->modelo->getEscolar($matricula_asignada);
 		$data['escolar'] = $aux[0];
 		
    	$reg=$this->modelo->buscaRegistro($matricula_asignada);
    	
    	if($reg!=null)
    	{
    		if($data['id_ciclo'] == $reg[0]['id_ciclo']){
    			$aux=$this->modelo->generaFolio($matricula_asignada);
    			$data['folio']=$aux[0];
		    	$aux = $this->modelo->getIdentificacion($matricula_asignada);
		    	$data['identificacion'] = $aux[0];
		    	$data['msj']=1;
		    	$data['tiene_registro'] = 1;
		    	$data['es_promotor'] = 1;
		    	$this->load->view('beneficiario/v_mensaje', $data, false);
    		}
    		elseif ($reg[0]['id_tipo_registro']== 1|| $reg[0]['id_tipo_registro']==2){
    			$data['es_promotor'] = 1;
    			$data['tiene_registro'] = 0;
    			$this->load->view('beneficiario/v_datos', $data, false);
    		}
    		
    		
    	}
    	else{
    		$data['es_promotor'] = 0;
    		$data['tiene_registro'] = 0;
    		$this->load->view('beneficiario/v_datos', $data, false);
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
    	$pdf->SetTitle('Ejemplo de provincías con TCPDF');
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
    	//preparamos y maquetamos el contenido a crear
    	$html = '';
    	$html .= "<style type=text/css>";
    	$html.=".leyenda
        {
        	font-size:15px !important;
        	font-weight: bold;        
        }";
    	$html .= "th{color: #000; font-weight: bold; background-color: #BCAFB7}";
    	$html .= "td{background-color:#BCAFB7; color: #fff; text-align:center;}";
    	$html .= "</style>";
    	$html .= '<br /><br />';
    	$html .= '<label class="leyenda" style="color:#000; text-align:center; padding-left:20px;">'.$data['nombre']."</label>";
    	$html .= '<p style="text-align:center; font-size:11px;">HAS QUEADO REGISTRADO, REVISA CONSTANTEMENTE TU CORREO</p>';
    	$html .= '<p style="text-align:center; font-size:11px;"><a href="">'.$data['correo'].'</a></p>';
    	$html .= '<p style="text-align:center; font-size:11px;">PARA NOTIFICARTE SI FUISTE ACEPTADO, TU N&Uacute;MERO DE FOLIO ES:</p>';
    	//$html .= '<p style="text-align:center; font-size:11px !important;">TU N&Uacute;MERO DE FOLIO ES:</p><br /><br>';
    	$html .= '<table style=" text-align:center; padding-left:10px; font-size:12px">';
    	$html .= '<tr><th>'.$data['folio']."</th></tr>";
    	$html .= "</table>";
    	
    	 
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