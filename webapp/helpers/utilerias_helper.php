<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


function getMesesTrimestre($trimestre) {

	$mes_txt = '';

	if ($trimestre==1)
		$mes_txt = "'01','02','03'";

	if ($trimestre==2)
		$mes_txt = "'04','05','06'";
	
	if ($trimestre==3)
		$mes_txt = "'07','08','09'";
	
	if ($trimestre==4)
		$mes_txt = "'10','11','12'";

	return $mes_txt;
}

function getMesesTrimestreLetra($trimestre) {

	$mes_txt = '';

	if ($trimestre==1)
		$mes_txt = "ENERO, FEBRERO Y MARZO";

	if ($trimestre==2)
		$mes_txt = "ABRIL, MAYO Y JUNIO";

	if ($trimestre==3)
		$mes_txt = "JULIO, AGOSTO Y SEPTIEMBRE";

	if ($trimestre==4)
		$mes_txt = "OCTUBRE, NOVIEMBRE Y DICIEMBRE";

	return $mes_txt;
}

function mesEnLetras($mes) {

	$mes_txt = '';

	if ($mes == '01' || $mes == '1')
		$mes_txt = 'ENERO';

	if ($mes == '02' || $mes == '2')
		$mes_txt = 'FEBRERO';

	if ($mes == '03' || $mes == '3')
		$mes_txt = 'MARZO';

	if ($mes == '04' || $mes == '4')
		$mes_txt = 'ABRIL';

	if ($mes == '05' || $mes == '5')
		$mes_txt = 'MAYO';

	if ($mes == '06' || $mes == '6')
		$mes_txt = 'JUNIO';

	if ($mes == '07' || $mes == '7')
		$mes_txt = 'JULIO';

	if ($mes == '08' || $mes == '8')
		$mes_txt = 'AGOSTO';

	if ($mes == '09' || $mes == '9')
		$mes_txt = 'SEPTIEMBRE';

	if ($mes == '10')
		$mes_txt = 'OCTUBRE';

	if ($mes == '11')
		$mes_txt = 'NOVIEMBRE';

	if ($mes == '12')
		$mes_txt = 'DICIEMBRE';

	return $mes_txt;
}


function getEstatusSolicitudOIP($valor) {

	$cad = '';
	if ($valor==0)
		$cad = '<span class="label label-danger" style="font-size:14px;">Vencida</span>';

	if ($valor==1 || $valor==2 || $valor==3)
		$cad = '<span class="label label-warning" style="font-size:14px;">Pendiente</span>';

	if ($valor == 4)
		$cad = '<span class="label label-success" style="font-size:14px;">Atendida</span>';
	
	return $cad;
}






function noCacheHeader() {
    header("Last-Modified: " . gmdate("D, d M Y H:i ") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
}

function microtime_float() {
    list($useg, $seg) = explode(" ", microtime());
    return ((float) $useg + (float) $seg);
}

function clean($cadena) {

    $cadena = trim($cadena);

    $cadena = preg_replace('/\s+/', ' ', strtolower($cadena));

    $find = array('�', '�', '�', '�', '�', '�');

    $cadena = str_replace($find, '_', $cadena);

    $cadena = "%" . $cadena . "%";

    return $cadena;
}

function clean_upper($cadena) {
    $cadena = strtolower($cadena);
    $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
    $replace = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');
    $cadena = str_replace($find, $replace, $cadena);
    $cadena = strtoupper(trim($cadena));
    return $cadena;
}

function toMayus($cadena) {
    return strtr(strtoupper($cadena), "àáâãäåæçèéêëìíîïðñòóôõöøùüú", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÜÚ");
}

function clean_upper2($cadena) {


//Rememplazamos caracteres especiales latinos

    $find = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ä', 'ë', 'ï', 'ö', 'ü', 'Ä', 'Ë', 'Ï', 'Ö', 'Ü');

    $repl = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');

    $cadena = str_replace($find, $repl, trim($cadena));

    return strtoupper($cadena);
}

function randomString($length = 10, $uc = TRUE, $n = TRUE, $sc = FALSE) {
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if ($uc == 1)
        $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if ($n == 1)
        $source .= '1234567890';
    if ($sc == 1)
        $source .= '|@#~$%()=^*+[]{}-_';
    if ($length > 0) {
        $rstr = "";
        $source = str_split($source, 1);
        for ($i = 1; $i <= $length; $i++) {
            mt_srand((double) microtime() * 1000000);
            $num = mt_rand(1, count($source));
            $rstr .= $source[$num - 1];
        }
    }
    return $rstr;
}

function zero_fill($number, $width) {
    return str_pad((string) $number, $width, "0", STR_PAD_LEFT);
}

function cortar_cadena($cadenao, $max) {
    $cadena = "";
    $htmlCodigo = "";

    for ($i = 0; $i < strlen($cadenao); $i++) {
        if (($i != 0) && ($i % $max == 0)) {
            $htmlCodigo = $htmlCodigo . $cadena;
            $htmlCodigo = $htmlCodigo . '<br/>';
            $cadena = "";
        }
        $cadena = $cadena . $cadenao[$i];
    }
    $htmlCodigo = $htmlCodigo . $cadena;
    $htmlCodigo = $htmlCodigo . '<br/>';
    return $htmlCodigo;
}

function cadena_original_truncada($cadenao, $max, $salto = "<br/>") {
    $total = strlen($cadenao);
    $orig = $cadenao;
    $cadenao = str_replace("||", "", $cadenao);
    $cadena_array = explode("|", $cadenao);
    $cadena_temporal = "";
    $cadena_final = "";
    $i = 0;
    while ($i < count($cadena_array)) {
        if (strlen($cadena_array[$i]) >= $max) {
            if (strlen($cadena_temporal) > 0)
                ;
            {
                $cadena_final.=$cadena_temporal . $salto;
                $cadena_temporal = "";
            }
            $temp = wordwrap($cadena_array[$i], $max, $salto);
            $cadena_final.="|" . $temp;
            $i++;
        } else {
            if ((strlen($cadena_temporal) + strlen($cadena_array[$i])) < $max) {
                $cadena_temporal.="|" . $cadena_array[$i];
                $i++;
            } else {
                $cadena_final.=$cadena_temporal . $salto;
                $cadena_temporal = "";
            }
        }
    }
    if (strlen($cadena_temporal) > 0)
        ;
    {
        $cadena_final.=$cadena_temporal . "";
        $cadena_temporal = "";
    }
    $cadena_final = "|" . $cadena_final . "||";
    if (strlen($orig) != strlen(str_replace($salto, "", $cadena_final))) {
        $cadena_final = wordwrap($orig, $max, $salto);
    }
    return $cadena_final;
}

function micro_time() {
    list($useg, $seg) = explode(" ", microtime());
    return ((float) $useg + (float) $seg);
}

function imagenArchivo($archivo) {


    $info = pathinfo('./' . $archivo);

    switch ($info['extension']) {
        case "txt": $img = "resources/images/txt.png";
            $title = "Archivo en formato TXT";
            break;
        case "pdf": $img = "resources/images/pdf.png";
            $title = "Archivo en formato PDF";
            break;
        case "xls": $img = "resources/images/xls.png";
            $title = "Archivo en formato XLS";
            break;
        case "xlsx": $img = "resources/images/xls.png";
            $title = "Archivo en formato XLSX";
            break;
        case "doc": $img = "resources/images/doc.png";
            $title = "Archivo en formato DOC";
            break;
        case "docx": $img = "resources/images/doc.png";
            $title = "Archivo en formato DOCX";
            break;
        case "ppt": $img = "resources/images/ppt.png";
            $title = "Archivo en formato PPT";
            break;
        case "pptx": $img = "resources/images/ppt.png";
            $title = "Archivo en formato PPTX";
            break;
        case "jpg": $img = "resources/images/jpg.png";
            $title = "Imagen";
            break;
        case "png": $img = "resources/images/png.png";
            $title = "Imagen";
            break;
        case "zip": $img = "resources/images/zip.png";
            $title = "Archivo comprimido";
            break;
        case "rar": $img = "resources/images/rar.png";
            $title = "Archivo comprimido";
            break;

        default: $img = "resources/images/archivo.png";
            $title = "Archivo";
            break;
    }
    return array('img' => $img, 'title' => $title, 'info' => $info);
}

function getImagenEstado($estado, $motivos = '') {

    switch ($estado) {
        case 1: $imagen = "resources/images/verde.png";
            $color = 'style="color: #84C100;"';
            if ($motivos == null)
                $title = "Nivel Bajo";
            else {
                $motivos = unserialize($motivos);
                $title = implode('/', $motivos);
            }

            break;

        case 2: $imagen = "resources/images/amarillo.png";
            $color = 'style="color: #FFC749;"';
            if ($motivos == null)
                $title = "Nivel Medio";
            else {
                $motivos = unserialize($motivos);
                $title = implode('/', $motivos);
            }
            break;

        case 3: $imagen = "resources/images/rojo.png";
            $color = 'style="color: #EF654A;"';
            if ($motivos == null)
                $title = "Nivel Alto";
            else {
                $motivos = unserialize($motivos);
                $title = implode('/', $motivos);
            }

            break;

        default:$imagen = "resources/images/blanco.png";
            $color = '';
            $title = "Sin clasificar";
            break;
    }

    return "<img src=\"$imagen\" width=\"18px\" border=\"0\" title=\" $title\">";
}

function arrayTimeStampReplace($arreglo, $fields) {
    $temp = array();
    foreach ($arreglo as $value) {
        foreach ($fields as $campo => $format) {
            if (isset($value[$campo])) {
                $value[$campo] = formatTime($value[$campo], $format);
            }
        }
        $temp[] = $value;
    }
    return $temp;
}

function createCSVFile($data, $file) {

    $fp = fopen($file, 'w');

    $header = array();
    if ($data != null) {
        foreach ($data[0] as $key => $value) {
            $header[] = $key;
        }
        fputcsv($fp, $header);
        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }
    } else {
        $header[] = 'Sin registros.';
        fputcsv($fp, $header);
    }

    fclose($fp);
}

function getStatusLabel($status) {
    switch ($status) {
        case 1:
            return "<span class=\"label label-danger\" style=\" border:0px; font-size:13px !important;\">Sin Iniciar</span>";
        case 2:
            return "<span class=\"label label-warning\" style=\" border:0px; font-size:13px !important;\">En proceso</span>";
        case 3:
            return "<span class='label label-success' style=\" border:0px; font-size:13px !important;\">Finalizado</span>";
        case 4:
            return "<span class='label label-orange' style=\" border:0px; font-size:13px !important;\">Pendiente</span>";
        default:
            return "<span class='label label-warning' style=\" border:0px; font-size:13px !important;\">No definido</span>";
    }
}

function getStatusColor($texto, $estatus) {
	
	if(strlen($texto)==1)
		$texto= "&nbsp;".$texto."&nbsp;";
	
	switch ($estatus) {
		case 1:
			return "<span class=\"label label-danger\" style=\"font-size:14px; border:0px;\">$texto Sin avance</span>";
		case 2:
			return "<span class=\"label label-warning\" style=\"font-size:14px; border:0px;\">$texto En proceso</span>";
		case 3:
			return "<span class='label label-success' style=\"font-size:14px; border:0px;\">$texto Cumplidos</span>";
		default:
			return "<span class='label label-info' style=\"font-size:14px; border:0px;\">$texto Totales</span>";
	}
}

function getStatusColorJefe($texto, $estatus) {
	
	if(strlen($texto)==1)
		$texto= "&nbsp;".$texto."&nbsp;";
	
	switch ($estatus) {
		case 1:
			return "<span class=\"label label-danger\" style=\"font-size:18px; border:0px;\">$texto Sin avance</span>";
		case 2:
			return "<span class=\"label label-warning\" style=\"font-size:18px; border:0px;\">$texto En proceso</span>";
		case 3:
			return "<span class='label label-success' style=\"font-size:18px; border:0px;\">$texto Cumplidos</span>";
		default:
			return "<span class='label label-info' style=\"font-size:18px; border:0px;\">Compromisos totales: $texto</span>";
	}
}

function getEtiquetaValor($valor) {

    if ($valor < 30)
        echo '<span class="label label-danger" style="font-size:14px;">' . $valor . '%</span>';

    if ($valor < 60 && $valor >= 30)
        echo '<span class="label label-warning" style="font-size:14px;">' . $valor . '%</span>';

    if ($valor <= 100 && $valor >= 60)
        echo '<span class="label label-success" style="font-size:14px;">' . $valor . '%</span>';
}

function getAvanceLabel($avance) {

    if ($avance >= 0 && $avance < 40) {
        if ($avance == null)
            $avance = 0;

        return "<span class=\"label label-danger\">$avance %</span>";
    }

    if ($avance >= 40 && $avance < 80) {
        return "<span class=\"label label-warning\">$avance %</span>";
    }

    if ($avance > 80 && $avance <= 100) {
        return "<span class='label label-success'>$avance %</span>";
    }
}

function cambiaLeyendaGrafica($anio, $mes) {

    $mes_txt = '';

    if ($mes == '01' || $mes == '1')
        $mes_txt = 'Ene';

    if ($mes == '02' || $mes == '2')
        $mes_txt = 'Feb';

    if ($mes == '03' || $mes == '3')
        $mes_txt = 'Mar';

    if ($mes == '04' || $mes == '4')
        $mes_txt = 'Abr';

    if ($mes == '05' || $mes == '5')
        $mes_txt = 'May';

    if ($mes == '06' || $mes == '6')
        $mes_txt = 'Jun';

    if ($mes == '07' || $mes == '7')
        $mes_txt = 'Jul';

    if ($mes == '08' || $mes == '8')
        $mes_txt = 'Ago';

    if ($mes == '09' || $mes == '9')
        $mes_txt = 'Sep';

    if ($mes == '10')
        $mes_txt = 'Oct';

    if ($mes == '11')
        $mes_txt = 'Nov';

    if ($mes == '12')
        $mes_txt = 'Dic';

    return "$mes_txt/$anio";
}

if (!function_exists('mime_content_type')) {

    function mime_content_type($filename) {

        $mime_types = array(
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',
            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',
            // audio/video            	
            'mp4' => 'video/mp4',
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',
            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = strtolower(array_pop(explode('.', $filename)));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        } elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        } else {
            return 'application/octet-stream';
        }
    }

}

function isImage($path) {
    $a = getimagesize($path);
    $image_type = $a[2];

    if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
        return true;
    }
    return false;
}

function isVideo($path) {
    $mime = mime_content_type($path);

    if (in_array($mime, array("video/mp4"))) {
        return true;
    }
    return false;
}

function getPrioridad($d) {
    if ($d == 3) {
        return "Prioridad Alta";
    } elseif ($d == 2) {
        return "Prioridad Media";
    } else {
        return "Prioridad Normal";
    }
}

function getEstatus($d) {
	if ($d == 3) {
		return "Cumplido";
	} elseif ($d == 2) {
		return "En proceso";
	} else {
		return "Sin avance";
	}
}

function getTipoCompromiso($d) {
    if ($d == 1) {
        return 'Eventual';
    } elseif ($d == 2) {
        return 'Permanete';
    }
}
