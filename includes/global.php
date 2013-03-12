<?php
	// Para el manejo de Sesiones
	session_start();
	
	// Mostrar Errores
	ini_set('display_errors',1);
		
	// Otras Variales Globales
	$meses = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre");
	$meses_corto = array(1 => "Ene", 2 => "Feb", 3 => "Mar", 4 => "Abr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Ago", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dic");
	
	function f_fecha($fe){
		global $meses;
		$ano = substr($fe,0,4);
		$mes = intval(substr($fe,5,2));
		$dia = intval(substr($fe,8,2));
		return $meses[$mes]." ".$dia." de ".$ano;
	}
	
	function mod_fecha($fecha, $mod){
		$time = strtotime("$fecha $mod");
		
		return date('Y-m-d',$time);
	}
	
	function mod_fecha_hora($fecha, $mod){
		$time = strtotime("$fecha $mod");
		
		return date('Y-m-d H:i:s',$time);
	}

	
	// Funciones Globales
	
	function replace_tildes($cad){
		$s = str_replace('ñ','n',$cad);
		$s = str_replace('Ñ','n',$s);
		$s = str_replace('á','a',$s);
		$s = str_replace('Á','A',$s);
		$s = str_replace('é','e',$s);
		$s = str_replace('É','E',$s);
		$s = str_replace('í','i',$s);
		$s = str_replace('Í','I',$s);
		$s = str_replace('ó','o',$s);
		$s = str_replace('Ó','O',$s);
		$s = str_replace('ú','u',$s);
		$s = str_replace('Ú','U',$s);
		
		$nuevo = strtolower(ereg_replace("[^A-Za-z0-9 ]", '', $s));
		$nuevo = str_replace(' ','%20',$nuevo);
		return $nuevo;
	}
	
	/**
     *  Limpia una cadena de acentos y caracteres extraños y la convierte a minúscula
     *
     * @access public
     * @author Moises Narvaez <moisesnarvaez@gmail.com>
	 * @param String $cad
     * @return String $nuevo
     */
	function format_cadena($cad){
		$s = str_replace('ñ','n',$cad);
		$s = str_replace('Ñ','n',$s);
		$s = str_replace('á','a',$s);
		$s = str_replace('Á','A',$s);
		$s = str_replace('é','e',$s);
		$s = str_replace('É','E',$s);
		$s = str_replace('í','i',$s);
		$s = str_replace('Í','I',$s);
		$s = str_replace('ó','o',$s);
		$s = str_replace('Ó','O',$s);
		$s = str_replace('ú','u',$s);
		$s = str_replace('Ú','U',$s);
		
		$s = ereg_replace('[Ã¡Ã Ã¢Ã£Âª]','a',$s);
		$s = ereg_replace('[Ã?Ã€Ã‚Ãƒ]','A',$s);
		$s = ereg_replace('[Ã?ÃŒÃŽ]','I',$s);
		$s = ereg_replace('[Ã­Ã¬Ã®]','i',$s);
		$s = ereg_replace('[Ã©Ã¨Ãª]','e',$s);
		$s = ereg_replace('[Ã‰ÃˆÃŠ]','E',$s);
		$s = ereg_replace('[Ã³Ã²Ã´ÃµÂº]','o',$s);
		$s = ereg_replace('[Ã"Ã\'Ã"Ã•]','O',$s);
		$s = ereg_replace('[ÃºÃ¹Ã»]','u',$s);
		$s = ereg_replace('[ÃšÃ™Ã›]','U',$s);
		$s = str_replace('Ã§','c',$s);
		$s = str_replace('Ã‡','C',$s);
		$s = str_replace('Ã±','n',$s);
		$s = str_replace("Ã'",'N',$s);
		
		$nuevo = strtolower(ereg_replace('[^A-Za-z0-9ÃƒÂ±Ãƒâ€˜]', '', $s));
		return $nuevo;
	}
	
	function return_dato_unico($consul){
		$result = mysql_query($consul);
		if ($result){
			if (mysql_num_rows($result)>0){
				$row = mysql_fetch_row($result);
				return $row[0];
			}else
				return '';
		}else
			return '';
	}
	
	function es_email($email) {
		$regex = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
		//comprovamos si la cadena tiene el simbolo de @ y el punto
		if (strpos($email, '@') !== false && strpos($email, '.') !== false) {
		//comparamos con la expresion regular la cadena
			if (preg_match($regex, $email)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function f_moneda($valor,$dec=0){
		return number_format($valor,$dec,',','.');
	}
	
	function generateClave($cant=9){
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$cad = "";
		for($i=0;$i<$cant-1;$i++) {
			$cad .= substr($str,rand(0,36),1);
		}
		return $cad;
	}
	
	function recordar_texto($texto, $cant=20){
		if(strlen($texto) > $cant)
			return substr($texto,0,$cant)."...";
		return $texto;
	}

	function myWrap($input, $chars, $lines = false) { 
		# the simple case - return wrapped words 
		if(!$lines) 
			return wordwrap($input, $chars, "\n"); 

		# truncate to maximum possible number of characters 
		$retval = substr($input, 0, $chars * $lines); 

		# apply wrapping and return first $lines lines 
		$retval = wordwrap($retval, $chars, "\n"); 
		preg_match("/(.+\n?){0,$lines}/", $retval, $regs);

		return $regs[0]; 
	}
	
?>