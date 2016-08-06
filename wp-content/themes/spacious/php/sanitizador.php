<?php

function sanitizar($string) {
	return filter_var($string, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
}

function validar_email($email) {
	$ret= false;
	if (isset($email) && $email!='') {
		if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email))
			$ret= true;
	}
	return $ret;
}

function validar_numerico($numero) {
	$ret= false;
	if (isset($numero))
		if ($numero!='' && (string)(int)$numero == $numero)
			$ret= true;
	return $ret;
}

function validar_dominio($dominio) {
	$ret= false;
	if (isset($dominio) && $dominio!='' && strlen($dominio)<=26)
		$ret= true;
	return $ret;
}

function validar_texto($texto) {
	$ret= false;
	if(!strpos($texto, '=') && !strpos($texto, "'") && !strpos($texto, '"'))
		$ret= true;
	return $ret;
}

function validar_nombre($nombre) {
	$ret= false;
	if (isset($nombre) && $nombre!='')
		if (!strpos($nombre, '='))
			$ret= true;
	return $ret;
}

function validar_telefono($nombre) {
	$ret= false;
	if (isset($nombre) && $nombre!='')
		if (!strpos($nombre, '='))
			$ret= true;
	return $ret;
}

function validar_CUIT($cuit) {
    $cadena = str_split($cuit);

    $result = $cadena[0]*5;
    $result += $cadena[1]*4;
    $result += $cadena[2]*3;
    $result += $cadena[3]*2;
    $result += $cadena[4]*7;
    $result += $cadena[5]*6;
    $result += $cadena[6]*5;
    $result += $cadena[7]*4;
    $result += $cadena[8]*3;
    $result += $cadena[9]*2;

    $div = intval($result/11);
    $resto = $result - ($div*11);

    if($resto==0){
        if($resto==$cadena[10]){
            return true;
        }else{
            return false;
        }
    }elseif($resto==1){
        if($cadena[10]==9 AND $cadena[0]==2 AND $cadena[1]==3){
            return true;
        }elseif($cadena[10]==4 AND $cadena[0]==2 AND $cadena[1]==3){
            return true;
        }
    }elseif($cadena[10]==(11-$resto)){
        return true;
    }else{
        return false;
    }
}

function validar_zona($zona) {
	if (isset($zona)) {
		if ($zona!='') {
			switch ($zona) {
				case 'tur':
					return TRUE;	
				break;
				case 'net':
					return TRUE;	
				break;
				case 'org':
					return TRUE;	
				break;
				default:
					return FALSE;
				break;
			}
		}
	}
	return FALSE;
}

function agregar_opcion($subtipo,$valor,$texto) {
	$ret= '<option value="'.$valor.'"';
	if (validar_numerico($subtipo)&& $subtipo==$valor)
		$ret.= 'selected="selected"';
	$ret.= '>'.$texto.'</option>';
	return $ret;
}
?>