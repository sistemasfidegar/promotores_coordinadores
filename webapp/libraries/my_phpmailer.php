<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_PHPMailer {

    public function My_PHPMailer() {
        require_once('PHPMailer/class.phpmailer.php');
    }
            
    public function enviar_correo($data) {

    	$exito=null;
    	
    	$mail = new PHPMailer();
    
    	$mail->SMTPDebug  = false;
    	$mail->CharSet = "UTF-8";
    	
    	$mail->IsSMTP();
    	$mail->IsHTML(true);
    	$mail->SMTPAuth = true; // enable SMTP authentication
    	$mail->Timeout = 60;
    	
    	//ZIMBRA
    	$mail->Host = "10.250.100.9";
    	$mail->Port = 465; 
    	$mail->SMTPSecure = "ssl";
    	$mail->Mailer = "smtp";
    	 
    	
    	//GMAIL
    	//$mail->SMTPSecure = "tls";
    	//$mail->Host = "smtp.gmail.com"; 
    	//$mail->Port = 465; 
    
    
    	$mail->Username = "tablerojgdf@cdmx.gob.mx";
    	$mail->Password = "GApa3=b2";
    	
    	
    	//DATOS DEL CORREO
    	$mail->From = "tablerojgdf@cdmx.gob.mx";
    	$mail->FromName = "Tablero de Control Jefatura de Gobierno";

    	foreach($data['to'] as $value){
    		
    		$mail->AddAddress($value);
    	}
    
    	if(isset($data['cc']))
    	{
    		foreach($data['cc'] as $value) {
    			$mail->AddCC($value);
    		}
    	}
    	 
    	$mail->Subject = $data['asunto'];
    	$mail->Body = $data['mensaje'];
    	//$mail->AltBody = $data['mensaje'];
    	
    	$exito = $mail->Send();
    	
    	
    	return $exito;
        	
    }
    
                	
}

?>