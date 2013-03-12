<?php 
	$cn_host 	= "localhost";
	$cn_user 	= "root";
	$cn_pass 	= "";
	
	$cn_database = "reina_colombia";
	
	 // Versión Online
	/*$cn_host 	= "localhost";
	$cn_user 	= "domicili_desarro";
	$cn_pass 	= "Zl_QK(In!s[%";
	
	$cn_database = "domicili_domiciliosquilla";*/
	
	
	$cn_link = mysql_connect($cn_host,$cn_user,$cn_pass);
	
	if (!$cn_link){
		echo "<b>Error ".mysql_errno().": </b>".mysql_error()."<BR>";
		exit;
	}
	
	mysql_select_db($cn_database);
	
	mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET NAMES utf8");
	
	
	// -*-*-*-*-*-* EVITAMOS INYECCIÓN SQL *-*-*-*-*-*-*-*-*-*-*
	
	// Modificamos las variables pasadas por URL
	foreach($_GET as $variable=>$valor){
	   $_GET[$variable] = mysql_real_escape_string($valor);
	}
	// Modificamos las variables de formularios
	foreach($_POST as $variable=>$valor){
		if(is_array($valor)){
			$i = 0;
			foreach($valor as $val){
				$valor[$i] = mysql_real_escape_string($val);
				$i++;
			}
		}else{
	   		$_POST[$variable] = mysql_real_escape_string($valor);
		}
	}
?>