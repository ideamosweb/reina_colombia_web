<?php
// Revisamos si el formulario Login fue enviado
if(isset($_POST['submit'])=='Login')
{	
	// Almacenamos los errores
	$err = array();	
	
	if(!$_POST['username'] || !$_POST['password'])
		$err[] = 'Los campos no pueden quedar vacios!';
	
	if(!count($err))
	{
		// Escapamos los datos del formulario
		$_POST['username'] = mysql_real_escape_string($_POST['username']);
		$_POST['password'] = mysql_real_escape_string($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];		

		$row = mysql_fetch_assoc(mysql_query("SELECT id,usr FROM usuarios WHERE usr='{$_POST['username']}' AND pass='".($_POST['password'])."'"));
		
		// Si los datos fueron encotrados, iniciamos session
		if($row['usr'])
		{
			// Almacenamos los datos en variables de session			
			$_SESSION['usr'] = $row['usr'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['rememberMe'] = $_POST['rememberMe'];			
			
			// Creamos cookie Remember
			setcookie('Remember',$_POST['rememberMe']);
		}
		else $err[]='Error en el nombre de usuario o contraseña!';
	}
	
	if($err){
	  // Guardamos los mensajes de error en variable de session
	  $_SESSION['msg']['login-err'] = implode('<br />',$err);
	}	

	/*header("Location: index.php");
	exit;*/
}
?>