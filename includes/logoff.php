<?php
if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	/*header("Location: ../index.php");
	exit;*/
}
?>