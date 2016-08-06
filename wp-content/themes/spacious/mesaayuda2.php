<?php
/*
 Template Name:Ayuda
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mesa de ayuda</title>
</head>

<?php
require_once('php/recaptchalib.php');
require_once('php/sanitizador.php');
$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	//print_r($_FILES);
	//die();
	// EL TIPO DE PERSONA.
	if (count($_POST)>=1) {
		if (validar_nombre($_POST['nombre'])) {
			$apellido= $_POST['nombre'];
		} else {
			$valido= 0;
			$error.= "Debe completar el Apellido y Nombre.<br>";
		}		
	 if (validar_email($_POST['email'])) {
                        $correo= $_POST['email'];
                } else {
                        $valido= 0;
                        $error.= "Debe completar el Mail.<br>";
                }

	$sistemas = array("EU", "EE", "GEDO", "CCOO");

	if(in_array($_POST['modulogde'],$sistemas)){
		$sistema = $_POST['modulogde'];
	}
	else{
		 $error.= "Debe completar un sistema válido.<br>";
	}


        if (validar_nombre($_POST['usuariogde'])) {
                        $usugde= $_POST['usuariogde'];
                } else {
                        $valido= 0;
                        $error.= "Debe completar el Usuario.<br>";
                }

        if (validar_nombre($_POST['reparticion'])) {
                        $reparticion= $_POST['reparticion'];
                } else {
                        $valido= 0;
                        $error.= "Debe completar la Reparticion.<br>";
                }
        if (validar_telefono($_POST['telefono'])) {
                        $telefono= $_POST['telefono'];
                } else {
                        $valido= 0;
                        $error.= "Debe completar el Teléfono.<br>";
                }

	$prioridades = array("Normal", "Baja", "Alta", "Critica");

	if(in_array($_POST['prioridad'], $prioridades)){
		$prioridad = $_POST['prioridad'];
	}
	else{
		$error.= "Debe completar una prioridad válida.<br>";
	}
 


        if (validar_texto($_POST['tema'])) {
                        $tema= $_POST['tema'];
                } else {
                        $valido= 0;
                        $error.= "Debe completar el Tema.<br>";
                }
        if (validar_texto($_POST['mensaje'])) {
                        $mensaje= $_POST['mensaje'];
                } else {
                        $valido= 0;
                        $error.= "Debe completar el Mensaje.<br>";
                }

		if (isset($_FILES['adjunto1']) && $_FILES['adjunto1']['name']!="") 
		{
			if ($_FILES['adjunto1']['size']>1000000)
			{
				$valido= 0;
				$error.="El archivo debe ser inferior a 1MB";
			}
			if (($_FILES["adjunto1"]["type"] == "application/pdf")
				|| ($_FILES["adjunto1"]["type"] == "application/x-pdf") || ($_FILES["adjunto1"]["type"] == "text/pdf")
				|| ($_FILES["adjunto1"]["type"] == "text/plain") || ($_FILES["adjunto1"]["type"] == "image/jpg")
				|| ($_FILES["adjunto1"]["type"] == "image/jpeg") || ($_FILES["adjunto1"]["type"] == "application/msword")
				|| ($_FILES["adjunto1"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
				|| ($_FILES["adjunto1"]["type"] == "image/gif") || ($_FILES["adjunto1"]["type"] == "image/png")
                                || ($_FILES["adjunto1"]["type"] == "image/x-windows-bmp") || ($_FILES["adjunto1"]["type"] == "application/zip")
				|| ($_FILES["adjunto1"]["type"] == "application/x-compressed") || ($_FILES["adjunto1"]["type"] == "application/x-zip-compressed")
				|| ($_FILES["adjunto1"]["type"] == "multipart/x-zip") || ($_FILES["adjunto1"]["type"] == "application/x-rar-compressed")
				|| ($_FILES["adjunto1"]["type"] == "application/octet-stream") || ($_FILES["adjunto1"]["type"] == "appication/csv")
				|| ($_FILES["adjunto1"]["type"] == "text/csv") || ($_FILES["adjunto1"]["type"] == "application/x-excel")
				|| ($_FILES["adjunto1"]["type"] == "application/x-msexcel")
				)
			{
				$adjunto1= $_FILES['adjunto1'];
				$extension1= pathinfo($_FILES['adjunto1']['name'], PATHINFO_EXTENSION);
			} else {
				$valido= 0;
				$error.= "Solo debe ingresar la documentación en formato PDF o JPG.<br>";
			}
		} else 
			{
				$valido= 0;
				$error.= "Debe ingresar la documentación.<br>";
			}
		if (isset($_FILES['adjunto2']) && $_FILES['adjunto2']['name']!="") 
		{

                        if ($_FILES['adjunto2']['size']>1000000)
                        {
                                $valido= 0;
                                $error.="El archivo debe ser inferior a 1MB";
                        }

			if (($_FILES["adjunto2"]["type"] == "application/pdf")
                                || ($_FILES["adjunto2"]["type"] == "application/x-pdf") || ($_FILES["adjunto2"]["type"] == "text/pdf")
                                || ($_FILES["adjunto2"]["type"] == "text/plain") || ($_FILES["adjunto2"]["type"] == "image/jpg")
                                || ($_FILES["adjunto2"]["type"] == "image/jpeg") || ($_FILES["adjunto2"]["type"] == "application/msword")
                                 || ($_FILES["adjunto2"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
                                || ($_FILES["adjunto2"]["type"] == "image/gif") || ($_FILES["adjunto2"]["type"] == "image/png")) 
			
{
				$adjunto2= $_FILES['adjunto2'];
				$extension2= pathinfo($_FILES['adjunto2']['name'], PATHINFO_EXTENSION);
			} else {
				$valido= 0;
				$error.= "Solo debe ingresar la documentación en formato PDF o JPG.<br>";
			}
		}

  		$privatekey = "[6Lck4uMSAAAAAAtnfV8RF2mOItSHsW7m-UrIMwOn";
		$resp = recaptcha_check_answer ($privatekey,
                $_SERVER["REMOTE_ADDR"],
                $_POST["recaptcha_challenge_field"],
                $_POST["recaptcha_response_field"]);

		if (!$resp->is_valid) 
		{
		    // What happens when the CAPTCHA was entered incorrectly
		   $error.= "Error en el Captcha";
		   // die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
		   //      "(reCAPTCHA said: " . $resp->error . ")");
		} else 
		{
   			 // Your code here to handle a successful verification
			if ($error=="")
			{
				include("generaTicket.php");
			}
		}


	}
}

?>
<body>
	<div>
		<form action="/index.php/ayuda" method="post"  enctype="multipart/form-data" >
<div >
<p>
</p><div >Apellido y Nombre:*</div>
<div > <span ><input type="text" name="nombre" value="<?php if (validar_nombre($_POST['nombre'])) echo $_POST['nombre']?>" size="40" ></span> </div>
<p></p>
<p>
</p><div >E-mail:* </div>
<div > <span ><input type="email" name="email" value="<?php if (validar_email($_POST['email'])) echo $_POST['email']?>" size="40"></span> </div>
<p></p>
<p>
</p><div > Sistema:* </div>
<div ><span class="">
<select name="modulogde" class="" id="modulogde">
	<option value="EU">EU</option>
	<option value="EE">EE</option>
	<option value="GEDO">GEDO</option>
	<option value="CCOO">CCOO</option>
</select></span> </div>
<p></p>
<p>
</p><div >Usuario GDE:*</div>
<div ><span class=""><input type="text" name="usuariogde" value="<?php if (validar_nombre($_POST['usuariogde'])) echo $_POST['usuariogde']?>" size="40" id="usuariogde"></span> </div>
<p></p>
<p>
</p><div >Repartición:*</div>
<div ><span class=""><input type="text" name="reparticion" value="<?php if (validar_nombre($_POST['reparticion'])) echo $_POST['reparticion']?>" size="40" id="reparticion"> </span></div>
<p></p>
<p>
</p><div >Teléfono:*</div>
<div ><span class=""><input type="text" name="telefono" value="<?php if (validar_telefono($_POST['telefono'])) echo $_POST['telefono']?>" size="40" class="" id="phone"></span> </div>
<p></p>
<p>
</p><div >Prioridad:*</div>
<div ><span class="">
<select name="prioridad" class="" id="prioridad">
	<option value="Normal">Normal</option>
	<option value="Baja">Baja</option>
	<option value="Alta">Alta</option>
	<option value="Critica">Crítica</option>
</select></span></div>
<p></p>

<p>
</p><div >Tema:*</div>
<div ><span class=""><input type="text" name="tema" value="<?php if (validar_texto($_POST['tema'])) echo  $_POST['tema']?>" size="40"  id="tema"></span> </div>
<p></p>
<p>
</p><div >Detalle:*</div>
<div ><span class=""><textarea name="mensaje" cols="40" rows="10" class="" id="mensaje"><?php if (validar_texto($_POST['mensaje'])) echo  $_POST['mensaje']?> </textarea></span> </div>
<p></p>
<p>
</p><div >Adjuntos:</div>
<div ><span class=""><input type="file" name="adjunto1" size="40" class="" id="adjunto1" aria-invalid="false"></span></div>
<div >Adjuntos:</div>
<div ><span class=""><input type="file" name="adjunto2" size="40" class="" id="adjunto2"></span></div>
<p></p>
<div class="info-mda">Tipos de archivos a aceptar: *.bmp, *.gif, *.jpg, *.png, *.zip, *.rar, *.csv, *.doc, *.docx, *.xls, *.xlsx, *.txt, *.pdf <br><br>
Tamaño máximo de archivo: 1120 kb (1.00 mb)</div>
<p></p>

<?php $publickey = "6Lck4uMSAAAAAFow3nPFT1D05cGXBcd-6zG5YlLr"; // you got this from the signup page
  echo recaptcha_get_html($publickey);
?>
<p class="btn-mda"><input type="submit" value="Enviar Consulta" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://intranet.gde.gob.ar/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;"></p>
</div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form>
	</div>
  <?php
  if($error != "")
		echo '<div id="error" style="color: #D8000C; background-color: #FFBABA; margin-top:10px; padding:5px">'.$error.'</div>';
	?>
</body>
</html>
