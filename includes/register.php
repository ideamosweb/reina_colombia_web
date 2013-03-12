<?php
// Revisamos si el formulario registro fue enviado
if(isset($_POST['submit'])=='Register')
{
	
	$err = array();
	
	if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
	{
		$err[]='El nombre de usuario debe estar entre 3 y 32 caracteres!';
	}
	
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
	{
		$err[]='El nombre de usuario tiene caracteres invalidos!';
	}
	
	if(strlen($_POST['password'])<4 || strlen($_POST['password'])>8)
	{
		$err[]='La contraseña debe estar entre 3 y 8 caracteres!';
	}	
	
	if(!checkEmail($_POST['email']))
	{
		$err[]='El email no es valido!';
	}
	
	// Si no hay errores
	if(!count($err))
	{		
		/*$pass = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);*/		
		
		// Escapamos los datos
		$_POST['email'] = mysql_real_escape_string($_POST['email']);
		$_POST['username'] = mysql_real_escape_string($_POST['username']);
		$_POST['password'] = mysql_real_escape_string($_POST['username']);		
		
		mysql_query("	INSERT INTO usuarios(usr,pass,email,regIP,dt)
						VALUES(
						
							'".$_POST['username']."',
							'".md5($_POST['password'])."',
							'".$_POST['email']."',
							'".$_SERVER['REMOTE_ADDR']."',
							NOW()
							
						)");
		
		if(mysql_affected_rows($cn_link)==1)
		{
			/*send_mail(	'demo-test@tutorialzine.com',
						$_POST['email'],
						'Registration System Demo - Your New Password',
						'Your password is: '.$pass);

			$_SESSION['msg']['reg-success']='We sent you an email with your new password!';*/
		}
		else $err[]='Este usuario ya se encuentra registrado!';
	}

	if(count($err))
	{
		$_SESSION['msg']['reg-err'] = implode('<br />',$err);
	}	
	
	header("Location: ../index.php");
	exit;
}
?>