<?php
	/**
	 * All
	 * 
	 * @author Moises Narvaez <moisesnarvaez@gmail.com>
	 * @version 2011
	 * @access public
	 */
	class All{
		// Variable para depuración
		public $_debug;
		
		// Evento
		private $_evn_Id;
		private $_evn_Nombre;
		private $_evn_FchIni;
		private $_evn_FchIni_op;
		private $_evn_FchFin;
		private $_evn_FchFin_op;
		private $_evn_Lugar;
		private $_evn_Desc;
		
		// Noticia
		private $_news_id;
		private $_news_title;
		private $_news_subtitle;
		private $_news_preview;
		private $_news_text;
		
		// Material de estudio
		private $_mtr_Id;
		private $_mtr_Nombre;
		private $_mtr_Desc;
		private $_mtr_Materia;
		private $_mtr_Grado;
		private $_mtr_Estado;

		// Publicidad
		private $_adv_Id;
		private $_adv_Type;
		private $_adv_Url;

		// Magazine
		private $_mag_Id;		
		private $_mag_Path;
		private $_mag_Id_magazine;
		private $_mag_Name;
		private $_mag_Num_pages;
		
		// ******************************************************
		// * __________________ SET ___________________________ *
		// *                                                    *
		// ******************************************************
		
		function evn_SET_Id($val){
			$this->_evn_Id = intval($val);
		}
		
		function evn_SET_Nombre($val){
			$this->_evn_Nombre = $val;
		}
		
		function evn_SET_FchIni($val, $op){
			$this->_evn_FchIni 		= $val;
			$this->_evn_FchIni_op 	= $op;
		}
		
		function evn_SET_FchFin($val, $op){
			$this->_evn_FchFin 		= $val;
			$this->_evn_FchFin_op 	= $op;
		}
		
		function evn_SET_Lugar($val){
			$this->_evn_Lugar = $val;
		}
		
		function evn_SET_Desc($val){
			$this->_evn_Desc = $val;
		}
		
		function ntc_SET_Id($val){
			$this->_news_id = intval($val);
		}
		
		function ntc_SET_Titulo($val){
			$this->_news_title = $val;
		}
		
		function ntc_SET_Subtitulo($val){
			$this->_news_subtitle = $val;
		}
		
		function ntc_SET_Resumen($val){
			$this->_news_preview = $val;
		}
		
		function ntc_SET_Texto($val){
			$this->_news_text = $val;
		}
		
		function mtr_SET_Id($val){
			$this->_mtr_Id = intval($val);
		}
		
		function mtr_SET_Nombre($val){
			$this->_mtr_Nombre = $val;
		}
		
		function mtr_SET_Desc($val){
			$this->_mtr_Desc = $val;
		}
		
		function mtr_SET_Materia($val){
			$this->_mtr_Materia = $val;
		}
		
		function mtr_SET_Grado($val){
			$this->_mtr_Grado = intval($val);
		}
		
		function mtr_SET_Estado($val){
			$this->_mtr_Estado = intval($val);
		}

		function adv_SET_Id($val){
			$this->_adv_Id = intval($val);
		}

		function adv_SET_Url($val){
			$this->_adv_Url = $val;
		}

		function adv_SET_Type($val){
			$this->_adv_Type = $val;
		}

		function mag_SET_Id($val){
			$this->_mag_Id = $val;
		}

		function mag_SET_Path($val){
			$this->_mag_Path = $val;
		}

		function mag_SET_Id_magazine($val){
			$this->_mag_Id_magazine = $val;
		}

		function mag_SET_Name($val){
			$this->_mag_Name = $val;
		}

		function mag_SET_Num_pages($val){
			$this->_mag_Num_pages = $val;
		}
		
		// ******************************************************
		// * __________________ GET ___________________________ *
		// *                                                    *
		// ******************************************************
		
		function evn_GET_id(){
			return $this->_evn_Id;
		}
		
		function ntc_GET_Id(){
			return $this->_news_id;
		}
		
		function mtr_GET_Id(){
			return $this->_mtr_Id;
		}
		
		function mtr_GET_Grado(){
			return $this->_mtr_Grado;
		}

		function adv_GET_Id(){
			return $this->_adv_Id;
		}

		function adv_GET_Type(){
			return $this->_adv_Type;
		}

		function mag_GET_Id(){
			return $this->_mag_Id;
		}

		function mag_GET_Id_Magazine(){
			return $this->_mag_Id_magazine;
		}
		
		// ***********************************************************************
		// * __________________ Configuración ___________________________ *
		// *                                                                     *
		// ***********************************************************************
		
		function CNF_get($nombre){
			$value = return_dato_unico("SELECT value FROM config WHERE name='$nombre'");
			return $value;
		}
		
		function CNF_set($nombre, $valor){
			$query = "UPDATE config SET value='$valor' WHERE name='$nombre'";
			if($this->_debug)
				return $query;
			$result = mysql_query($query);
			/*$resp = mysql_affected_rows();
			if(!$resp){
				$cod = return_dato_unico("SELECT MAX(cnfCodigo) FROM config")+1;
				$query = "INSERT INTO config (cnfCodigo, cnfNombre, cnfValor)"
						." VALUES($cod, '$nombre', '$valor')";
				$result = mysql_query($query);
				$resp = mysql_affected_rows();
			}*/
				
			/*return $resp;*/
		}

		function exist_user($name, $pass){
			$value = return_dato_unico("SELECT username, pass FROM user WHERE username='$name' AND pass='$pass'");
			return $value;
		}
		
		// ***********************************************************************
		// * __________________ Eventos ___________________________ *
		// *                                                                     *
		// ***********************************************************************
		function evnGetAll($order='EvnId', $limit=0, $pag=1){
			$query = "SELECT *"
					." FROM evento"
					." WHERE Estado=1";
			
			if($this->_evn_Id)
				$query .= " AND EvnId='".$this->_evn_Id."'";
			if($this->_evn_Nombre)
				$query .= " AND EvnNombre LIKE '%".$this->_evn_Nombre."%'";
			if($this->_evn_Lugar)
				$query .= " AND EvnLugar LIKE '%".$this->_evn_Lugar."%'";
			if($this->_evn_FchIni)
				$query .= " AND EvnFchIni ".$this->_evn_FchIni_op." '".$this->_evn_FchIni."'";
			if($this->_evn_FchFin)
				$query .= " AND EvnFchFin ".$this->_evn_FchFin_op." '".$this->_evn_FchFin."'";
			$query .= " ORDER BY ".$order." DESC";
			
			if($limit){
				$ini = $pag*$limit - $limit;
				$query .= " LIMIT $ini,$limit";
			}
			
			if($this->_debug)
				return $query;			
			
			$result = mysql_query($query) or die(mysql_error());
			$resp = array();
			
			if(mysql_num_rows($result)){
				while($info = mysql_fetch_array($result)){
					$i = $info['EvnId'];
					$resp[$i]['EvnId']		= $info['EvnId'];
					$resp[$i]['EvnNombre']	= $info['EvnNombre'];
					$resp[$i]['EvnFchIni']	= $info['EvnFchIni'];
					$resp[$i]['EvnFchFin']	= $info['EvnFchFin'];
					$resp[$i]['EvnLugar']	= $info['EvnLugar'];
					$resp[$i]['EvnDesc']	= $info['EvnDesc'];
					$resp[$i]['EvnDesc_br']		= nl2br($info['EvnDesc']);
					$resp[$i]['EvnDesc_br_s']	= nl2br(substr($info['EvnDesc'],0,100))."...";
					
					$resp[$i]['FchReg']	= $info['FchReg'];
					$resp[$i]['FchAct']	= $info['FchAct'];
					$resp[$i]['Estado']	= $info['Estado'];
				}
			}
			return $resp;
		}
		
		function evnSave(){
			if($this->_evn_Id){
				$query = "UPDATE evento SET EvnNombre='$this->_evn_Nombre', EvnFchIni='$this->_evn_FchIni', EvnFchFin='$this->_evn_FchFin', EvnLugar='$this->_evn_Lugar', EvnDesc='$this->_evn_Desc'"
						.", FchAct='".date('Y-m-d')."'"
						." WHERE EvnId='$this->_evn_Id'";
			}else{
				$this->_evn_Id = return_dato_unico("SELECT MAX(EvnId) FROM evento")+1;
				
				$query = "INSERT INTO evento(EvnId, EvnNombre, EvnFchIni, EvnFchFin, EvnLugar, EvnDesc, FchReg, Estado)"
						." VALUES('$this->_evn_Id', '$this->_evn_Nombre', '$this->_evn_FchIni', '$this->_evn_FchFin', '$this->_evn_Lugar', '$this->_evn_Desc', '".date('Y-m-d')."', 1)";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query);
		}
		
		function evnDelete(){
			if($this->_adv_Id){
				$query = "UPDATE adver_positions SET url='', type=''"
						." WHERE id='$this->_adv_Id'";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());
		}
		
		// ***********************************************************************
		// * __________________ Noticias ___________________________ *
		// *                                                                     *
		// ***********************************************************************
		function ntcGetTotal(){
			return return_dato_unico("SELECT COUNT(id) FROM news WHERE state=1");
		}
		
		function ntcGetAll($order='id', $limit=0, $pag=1){
			$query = "SELECT *"
					." FROM news"
					." WHERE state=1";
			
			if($this->_news_id)
				$query .= " AND id='".$this->_news_id."'";
			if($this->_news_title)
				$query .= " AND title LIKE '%".$this->_news_title."%'";
			if($this->_news_subtitle)
				$query .= " AND subtitle LIKE '%".$this->_news_subtitle."%'";
			if($this->_news_preview)
				$query .= " AND preview LIKE '%".$this->_news_preview."%'";
			if($this->_news_text)
				$query .= " AND text LIKE '%".$this->_news_text."%'";
			
			$query .= " ORDER BY $order DESC";
			
			if($limit){
				$ini = $pag*$limit - $limit;
				$query .= " LIMIT $ini,$limit";
			}
			
			if($this->_debug)
				return $query;

			
			$result = mysql_query($query) or die(mysql_error());
			$resp = array();
			
			if(mysql_num_rows($result)){
				while($info = mysql_fetch_array($result)){
					$i = $info['id'];
					$resp[$i]['NewsId']			= $info['id'];
					$resp[$i]['NewsTitle']		= $info['title'];
					$resp[$i]['NewsSubtitle']	= $info['subtitle'];
					$resp[$i]['NewsPreview']		= $info['preview'];
					$resp[$i]['NewsPreview_br']	= nl2br($info['preview']);
					$resp[$i]['NewsPreview_br_s']= nl2br(substr($info['preview'],0,100))."...";
					$resp[$i]['NewsText']		= $info['text'];
					$resp[$i]['NewsPic']			= $info['picture'];
					
					$resp[$i]['dateAdd']	= $info['dateAdd'];
					$resp[$i]['dateUpd']	= $info['dateUpd'];
					$resp[$i]['state']	= $info['state'];
				}
			}
			return $resp;
		}
		
		function ntcSave(){
			if($this->_news_id){
				$query = "UPDATE news SET title='$this->_news_title', subtitle='$this->_news_subtitle', preview='$this->_news_preview', text='$this->_news_text'"
						.", dateUpd='".date('Y-m-d h:i:s')."'"
						." WHERE id='$this->_news_id'";
			}else{
				$this->_news_id = return_dato_unico("SELECT MAX(id) FROM news")+1;
				
				$query = "INSERT INTO news(id, title, subtitle, preview, text, dateAdd, state)"
						." VALUES('$this->_news_id', '$this->_news_title', '$this->_news_subtitle', '$this->_news_preview', '$this->_news_text', '".date('Y-m-d h:i:s')."', 1)";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());
		}
		
		function ntcSaveImage($img){
			$img = intval($img);
			if($this->_news_id){
				$query = "UPDATE news SET picture='$img', dateUpd='".date('Y-m-d h:i:s')."'"
						." WHERE id='$this->_news_id'";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());
		}
		
		function ntcDelete(){
			if($this->_news_id){
				$query = "UPDATE news SET state=0, dateUpd='".date('Y-m-d h:i:s')."'"
						." WHERE id='$this->_news_id'";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query);
		}
		
		// ***********************************************************************
		// * __________________ Material de Estudio  ___________________________ *
		// *                                                                     *
		// ***********************************************************************
		function mtrGetAll($order='MtrId', $limit=0){
			$query = "SELECT *"
					." FROM material"
					." WHERE Estado=1";
			
			if($this->_mtr_Id)
				$query .= " AND MtrId='".$this->_mtr_Id."'";
			if($this->_mtr_Nombre)
				$query .= " AND MtrNombre LIKE '%".$this->_mtr_Nombre."%'";
			if($this->_mtr_Desc)
				$query .= " AND MtrDesc LIKE '%".$this->_mtr_Desc."%'";
			if($this->_mtr_Materia)
				$query .= " AND MtrMateria LIKE '%".$this->_mtr_Materia."%'";
			if($this->_mtr_Grado)
				$query .= " AND MtrGrado LIKE '%".$this->_mtr_Grado."%'";
			
			$query .= " ORDER BY $order DESC";
			
			if($limit)
				$query .= " LIMIT 0,$limit";
			
			if($this->_debug)
				return $query;

			
			$result = mysql_query($query);
			$resp = array();
			
			if(mysql_num_rows($result)){
				while($info = mysql_fetch_array($result)){
					$i = $info['MtrId'];
					$resp[$i]['MtrId']			= $info['MtrId'];
					$resp[$i]['MtrNombre']		= $info['MtrNombre'];
					$resp[$i]['MtrArchivo']		= $info['MtrArchivo'];
					$resp[$i]['MtrDesc']		= $info['MtrDesc'];
					$resp[$i]['MtrDesc_br']		= nl2br($info['MtrDesc']);
					$resp[$i]['MtrDesc_br_s']	= nl2br(substr($info['MtrDesc'],0,100))."...";
					$resp[$i]['MtrMateria']		= $info['MtrMateria'];
					$resp[$i]['MtrGrado']		= $info['MtrGrado'];
					$resp[$i]['MtrEstado']		= $info['MtrEstado'];
					
					$resp[$i]['FchReg']	= $info['FchReg'];
					$resp[$i]['FchAct']	= $info['FchAct'];
					$resp[$i]['Estado']	= $info['Estado'];
				}
			}
			return $resp;
		}
		
		function mtrGetAgrupado(){
			$query = "SELECT *"
					." FROM material"
					." WHERE Estado=1 AND MtrEstado=1"
					." ORDER BY MtrGrado, MtrMateria";
			
			if($this->_debug)
				return $query;
			
			$result = mysql_query($query);
			$resp = array();
			
			if(mysql_num_rows($result)){
				while($info = mysql_fetch_array($result)){
					$resp[$info['MtrGrado']]['MtrGrado'] = $info['MtrGrado'];
					$resp[$info['MtrGrado']]['materias'][$info['MtrMateria']]['MtrMateria'] = $info['MtrMateria'];
					$resp[$info['MtrGrado']]['materias'][$info['MtrMateria']]['materiales'][$info['MtrId']]['MtrNombre'] 	= $info['MtrNombre'];
					$resp[$info['MtrGrado']]['materias'][$info['MtrMateria']]['materiales'][$info['MtrId']]['MtrArchivo'] 	= $info['MtrArchivo'];
					$resp[$info['MtrGrado']]['materias'][$info['MtrMateria']]['materiales'][$info['MtrId']]['MtrDesc'] 		= $info['MtrDesc'];
					$resp[$info['MtrGrado']]['materias'][$info['MtrMateria']]['materiales'][$info['MtrId']]['MtrDesc_br'] 	= nl2br($info['MtrDesc']);
				}
			}
			return $resp;
		}
		
		function mtrGetMaterias(){
			$query = "SELECT DISTINCT(MtrMateria)"
					." FROM material ORDER BY MtrMateria";
			
			if($this->_debug)
				return $query;

			
			$result = mysql_query($query);
			$resp = array();
			
			if(mysql_num_rows($result)){
				$i = 0;
				while($info = mysql_fetch_array($result)){
					$resp[$i] = $info['MtrMateria'];
					$i++;
				}
			}
			return $resp;
		}
		
		function mtrSave(){
			if($this->_mtr_Id){
				$query = "UPDATE material SET MtrNombre='$this->_mtr_Nombre', MtrDesc='$this->_mtr_Desc', MtrMateria='$this->_mtr_Materia', MtrGrado='$this->_mtr_Grado', MtrEstado='$this->_mtr_Estado'"
						.", FchAct='".date('Y-m-d')."'"
						." WHERE MtrId='$this->_mtr_Id'";
			}else{
				$this->_mtr_Id = return_dato_unico("SELECT MAX(MtrId) FROM material")+1;
				
				$query = "INSERT INTO material(MtrId, MtrNombre, MtrDesc, MtrMateria, MtrGrado, MtrEstado, FchReg, Estado)"
						." VALUES('$this->_mtr_Id', '$this->_mtr_Nombre', '$this->_mtr_Desc', '$this->_mtr_Materia', '$this->_mtr_Grado', '$this->_mtr_Estado', '".date('Y-m-d')."', 1)";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query);
		}
		
		function mtrSaveFile($nombre){
			if($this->_mtr_Id){
				$query = "UPDATE material SET MtrArchivo='$nombre', FchAct='".date('Y-m-d')."'"
						." WHERE MtrId='$this->_mtr_Id'";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query);
		}
		
		function mtrDelete(){
			if($this->_mtr_Id){
				$query = "UPDATE material SET Estado=0, FchAct='".date('Y-m-d')."'"
						." WHERE MtrId='$this->_mtr_Id'";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query);
		}

		// **************************************************************
		// * __________________ Publicidad  ___________________________ *
		// *                                                            *
		// **************************************************************

		function getAllPagesAdver(){
			$query = "SELECT *"
					." FROM adver_pages ORDER BY id";

			$result = mysql_query($query) or die(mysql_error());
			$resp = array();
			
			if(mysql_num_rows($result)){
				$i = 0;
				while($info = mysql_fetch_array($result)){
					$resp[$i]['id'] = $info['id'];
					$resp[$i]['page'] = $info['page'];
					$resp[$i]['number_pos'] = $info['number_pos'];
					$i++;
				}
			}
			return $resp;

		}

		function getPositionsFromPage($pageId = 0, $pos = ''){			
			$query = "SELECT adver_positions.id, adver_positions.id_adver_pages, adver_positions.url, adver_positions.position, adver_positions.type, adver_pages.page"
					." FROM adver_positions INNER JOIN adver_pages ON adver_pages.id = adver_positions.id_adver_pages";
			if($pageId > 0 && $pos ==''){		 
				$query .= " WHERE adver_positions.id_adver_pages='$pageId' ORDER BY id";
			}elseif ($pageId > 0 && $pos !='') {
				$query .= " WHERE adver_positions.id_adver_pages='$pageId' AND position='$pos' ORDER BY id";
			}		
			
			$result = mysql_query($query) or die(mysql_error());
			$resp = array();
			
			if(mysql_num_rows($result)){
				$i = 0;
				while($info = mysql_fetch_array($result)){
					$resp[$i]['id'] = $info['id'];
					$resp[$i]['id_adver_pages'] = $info['id_adver_pages'];
					$resp[$i]['page'] = $info['page'];
					$resp[$i]['url'] = $info['url'];
					$resp[$i]['position'] = $info['position'];
					$resp[$i]['type'] = $info['type'];
					$i++;
				}
			}
			return $resp;

		}

		function adverSave(){
			if($this->_adv_Id){
				$query = "UPDATE adver_positions SET type='$this->_adv_Type'"						
						." WHERE id='$this->_adv_Id'";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());
		}

		function advSaveImage($img){
			$img = $img;
			if($this->_adv_Id){
				$query = "UPDATE adver_positions SET url='$img'"
						." WHERE id='$this->_adv_Id'";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());
		}

		function sizeImageByType($type){
			$img_Size = array();
			switch ($type) {
              case 'bann_hor':
                  $img_Size['width'] = 728;
                  $img_Size['height'] = 90;
                  break;

              case 'bann_ver':
                  $img_Size['width'] = 160;
                  $img_Size['height'] = 600;
                  break;

              case 'bann_hor_short':
                  $img_Size['width'] = 220;
                  $img_Size['height'] = 90;
                  break;    
              
              case 'bann_squ':
                  $img_Size['width'] = 300;
                  $img_Size['height'] = 250;
                  break;
            }

            return $img_Size;
		}

		// **************************************************************
		// * __________________ Magazine  ___________________________ *
		// *                                                            *
		// **************************************************************

		function getAllMagazines($id = 0){
			$query = "SELECT *"
					." FROM magazine";
			if($id > 0)
				$query .= " WHERE id=$id";
			else
				$query .= " ORDER BY id";

			$result = mysql_query($query) or die(mysql_error());
			$resp = array();
			
			if(mysql_num_rows($result)){
				$i = 0;
				while($info = mysql_fetch_array($result)){
					$resp[$i]['id'] = $info['id'];
					$resp[$i]['title'] = $info['title'];
					$resp[$i]['pages'] = $info['pages'];
					$resp[$i]['state'] = $info['state'];
					$i++;
				}
			}
			return $resp;

		}		

		function getPagesMagazineFromMagId($id = 0){			
			$query = "SELECT pagesmagazine.id, pagesmagazine.id_magazine, pagesmagazine.path, magazine.title, magazine.pages"
					." FROM pagesmagazine INNER JOIN magazine ON magazine.id = pagesmagazine.id_magazine"
					." WHERE pagesmagazine.id_magazine='$id' ORDER BY id";						
			
			$result = mysql_query($query) or die(mysql_error());
			$resp = array();			
			
			if(mysql_num_rows($result)){
				$i = 0;
				while($info = mysql_fetch_array($result)){
					$resp[$i]['id'] = (isset($info['id'])) ? $info['id'] : '';
					$resp[$i]['id_magazine'] = (isset($info['id_magazine'])) ? $info['id_magazine'] : '';
					$resp[$i]['path'] = (isset($info['path'])) ? $info['path'] : '';
					$resp[$i]['title'] = (isset($info['title'])) ? $info['title'] : '';
					$resp[$i]['pages'] = (isset($info['pages'])) ? $info['pages'] : '';
					$resp[$i]['page_number'] = $i + 1;					
					$i++;
				}
			}
			return $resp;

		}

		function getPagesMagazineByIdMagazine($id = 0){			
			$query = "SELECT *"
					." FROM pagesmagazine"
					." WHERE id='$id'";						
			
			$result = mysql_query($query) or die(mysql_error());
			$resp = array();			
			
			if(mysql_num_rows($result)){
				$i = 0;
				while($info = mysql_fetch_array($result)){
					$resp[$i]['id'] = (isset($info['id'])) ? $info['id'] : '';
					$resp[$i]['id_magazine'] = (isset($info['id_magazine'])) ? $info['id_magazine'] : '';
					$resp[$i]['path'] = (isset($info['path'])) ? $info['path'] : '';
					$resp[$i]['title'] = (isset($info['title'])) ? $info['title'] : '';
					$resp[$i]['pages'] = (isset($info['pages'])) ? $info['pages'] : '';
					$resp[$i]['page_number'] = $i + 1;					
					$i++;
				}
			}
			return $resp;

		}

		function defaultStateMagazine(){
			$query = "UPDATE magazine SET state='0'";						

			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());

		}

		function updateStateMagazine($id){
			$this->defaultStateMagazine();
			
			$query = "UPDATE magazine SET state='1'"
						." WHERE id='$id'";

			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());

		}

		function magSave(){			
			if($this->_mag_Name){
				$query = "INSERT INTO magazine(title, state)"						
						." VALUES('$this->_mag_Name', 0)";
			}			
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());
		}

		function magSaveImage($img){
			$img = $img;
			if(!$this->_mag_Id_magazine && $this->_mag_Id){				
				$query = "INSERT INTO pagesmagazine(id_magazine, path)"
						." VALUES('$this->_mag_Id', '$img')";
			}else{
				$query = "UPDATE pagesmagazine SET path='$img'"
						." WHERE id='$this->_mag_Id_magazine'";
			}

			unset($_SESSION['id_magazine']);


			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());


		}

		function magDeletePage(){
			if($this->_mag_Id_magazine){
				$query = "DELETE FROM pagesmagazine"
						." WHERE id='$this->_mag_Id_magazine'";
			}
			
			if($this->_debug)
				return $query;
				
			$result = mysql_query($query) or die(mysql_error());
		}
	}
?>