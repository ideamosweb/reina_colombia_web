<?php 
	// Database
	require_once("../../includes/conect.php");
		
	// Global functions
	require_once("../../includes/global.php");
	
	// Classes
	require_once("../../classes/class.all.php");	
	include('../../classes/class.upload.php');
	
	$obj = new All();
	
	$ind = "news";
	
	$op = 'load';
	if(isset($_GET['op']))
		$op = $_GET['op'];
	
	$filtros = array();
	$order	 = 'id';
	
	if($op=='reload'){
		$obj->ntc_SET_Titulo($_POST['news_title']);
		$obj->ntc_SET_Subtitulo($_POST['news_subtitle']);
		$obj->ntc_SET_Resumen($_POST['news_preview']);
		$obj->ntc_SET_Texto($_POST['news_text']);
		
		$order	= $_POST['order'];
	}
?>

<?php if($op=='load'){ ?>
<script type="text/javascript">
	$(function(){
		$("#search_form").submit(function(){
			form_reload('<?php echo $ind ?>');
			return false;
		})
	})
</script>
<h1>Noticias</h1>
<div class="ui-widget-content ui-corner-all search_form">
  <h3>Buscar / Filtrar</h3>
    <form id="search_form">
    <table border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td align="right">Titulo</td>
        <td>:</td>
        <td><input name="news_title" /></td>
        <td width="50">&nbsp;</td>
        <td align="right">Resumen</td>
        <td>:</td>
        <td><input name="news_preview" /></td>
      </tr>
      <tr>
        <td align="right">Subtitulo</td>
        <td>:</td>
    
        <td><input name="news_subtitle" /></td>
        <td>&nbsp;</td>
        <td align="right">Texto</td>
        <td>:</td>
        <td><input name="news_text" /></td>
      </tr>
      <tr>
        <td align="right">Ordenar Por</td>
        <td>:</td>
        <td>
        <select name="order">
          <option value="id">Id</option>
          <option value="news_title">Titulo</option>
          <option value="dateAdd">Fecha de Registro</option>
        </select></td>
        <td>&nbsp;</td>
        <td align="right">
        	<input type="submit" name="ok" value="Buscar" /></td>
        <td>&nbsp;</td>
        <td><input type="button" onclick="form_edit('<?php echo $ind ?>', '')" name="add" value="Agregar" /></td>
      </tr>
    </table>
    </form>
</div>
<table border="0" align="center" cellspacing="0" width="100%" class="tabla_principal">
<?php } ?>
<?php if($op=='load' or $op=='reload'){
			//$obj->_debug = 1;
			$info = $obj->ntcGetAll($order);
			//print_r($info);
		 ?>
        <tr>
            <td class="ui-widget-header ui-corner-tl">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">Id</td>
            <td class="ui-widget-header">Titulo</td>
            <td class="ui-widget-header">Subtitulo</td>
            <td class="ui-widget-header">Resumen</td>
          <td class="ui-widget-header ui-corner-tr">Fecha de Registro</td>
        </tr>
        <?php foreach($info as $row){ ?>
        <tr>
            <td class="ui-widget-content"><img title="Ver" src="../images/famfamfam/page_white_magnify.png" onclick="form_view('<?php echo $ind ?>', '<?php echo $row['NewsId'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Editar" src="../images/famfamfam/pencil.png" onclick="form_edit('<?php echo $ind ?>', '<?php echo $row['NewsId'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Eliminar" src="../images/famfamfam/delete.png" onclick="form_delete('<?php echo $ind ?>', '<?php echo $row['NewsId'] ?>');" /></td>
            <td class="ui-widget-content"><?php echo $row['NewsId'] ?></td>
            <td class="ui-widget-content"><?php echo $row['NewsTitle'] ?></td>
            <td class="ui-widget-content"><?php echo $row['NewsSubtitle'] ?></td>
            <td class="ui-widget-content"><?php echo $row['NewsPreview_br_s'] ?></td>
            <td class="ui-widget-content"><?php echo $row['dateAdd'] ?></td>
        </tr>
        <?php } ?>
    <?php } ?>
    
<?php if($op=='load'){ ?>
</table>
<?php } ?>

<?php 
	if($op=='view' or $op=='edit' or $op=='delete' or $op=='delete_total'){
		if(!empty($_GET['id']))
			$obj->ntc_SET_Id($_GET['id']);

		$info = $obj->ntcGetAll($order);

		if(!empty($_GET['id'])){
			$infoId = $_GET['id'];
			$info = $info[$infoId];
		}else{
			$info['NewsId']			= '';
			$info['NewsTitle']		= '';
			$info['NewsSubtitle']	= '';
			$info['NewsPreview']		= '';
			$info['NewsPreview_br']	= '';
			$info['NewsPreview_br_s']= '';
			$info['NewsText']		= '';
			$info['NewsPic']			= '';
			
			$info['dateAdd']	= '';
			$info['dateUpd']	= '';
			$info['state']	= '';
		}		
		
	}
	
	// Ver, Editar, Eliminar
	switch($op){
		case 'view': ?>
        	<table border="0" cellspacing="0" cellpadding="0" class="table_view">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['NewsId'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Titulo</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['NewsTitle'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Subtitulo</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['NewsSubtitle'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Resumen</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['NewsPreview_br'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Texto</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['NewsText'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Imagen</strong></td>
                <td valign="top">:</td>
                <td valign="top">
					<?php if($info['NewsPic']){ ?>
                    <img src="../images/noticias/<?php echo $info['NewsId'] ?>.jpg?<?php echo rand(); ?>" title="<?php echo $info['NewsTitle'] ?>" />
                    <?php } ?>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Registrado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['dateAdd'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Actualizado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['dateUpd'] ?></td>
              </tr>
            </table>

	<?php
			break;
			
			
			case 'edit':
				$temp = rand(); ?>
            <script>
				$(function(){
					$("#NtcTexto_<?php echo $temp ?>").css("height","100%").css("width","550px").htmlbox({
						toolbars:[
							[
							// Cut, Copy, Paste
							"separator","cut","copy","paste",
							// Undo, Redo
							"separator","undo","redo",
							// Bold, Italic, Underline, Strikethrough, Sup, Sub
							"separator","bold","italic","underline","strike","sup","sub",
							// Left, Right, Center, Justify
							"separator","justify","left","center","right",
							// Ordered List, Unordered List, Indent, Outdent
							"separator","ol","ul","indent","outdent",
							// Hyperlink, Remove Hyperlink, Image
							"separator","link","unlink","image"
							],
							[// Show code
							"separator","code",
							// Formats, Font size, Font family, Font color, Font, Background
							"separator","formats","fontfamily",
							"separator","fontcolor","highlight"
							]
						],
						skin:"blue"
					});
				})
			</script>
            <form id="edit_form">
            <table border="0" cellspacing="8" cellpadding="0">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="hidden" name="NewsId" value="<?php echo $info['NewsId'] ?>" /><?php 
				if($info['NewsId'])
					echo $info['NewsId'];
				else
					echo return_dato_unico("SELECT MAX(id) FROM news")+1; ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Titulo</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="NewsTitle" value="<?php echo $info['NewsTitle'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Subtitulo</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="NewsSubtitle" id="f_NtcSubtitulo" value="<?php echo $info['NewsSubtitle'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Resumen</strong></td>
                <td valign="top">:</td>
                <td valign="top"><textarea cols="20" rows="8" name="NewsPreview"><?php echo $info['NewsPreview'] ?></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Texto</strong></td>
                <td valign="top">:</td>
                <td valign="top"><textarea cols="20" rows="8" name="NewsText" id="NtcTexto_<?php echo $temp ?>"><?php echo $info['NewsText'] ?></textarea></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Imagen</strong></td>
                <td valign="top">:</td>
                <td valign="top">
                	<input type="file" name="NewsPic" id="NewsPic" />
                    <div class="nota">
                    	*La imagen subida se redimensionará a un ancho de 191px, el alto será proporcional.
                    	<br /> Tamaño máximo del archivo: <strong><?php echo ini_get('upload_max_filesize') ?></strong>
                    </div>
					<?php if($info['NewsPic']){ ?>
                    <br /><img src="../images/noticias/<?php echo $info['NewsId'] ?>.jpg?<?php echo rand(); ?>" title="<?php echo $info['NewsTitle'] ?>" />
                    <?php } ?>
                </td>
              </tr>
            </table>
</form>
    <?php
			break;
			
			
			case 'save':
				$obj->ntc_SET_Id($_POST['NewsId']);
				$obj->ntc_SET_Titulo($_POST['NewsTitle']);
				$obj->ntc_SET_Subtitulo($_POST['NewsSubtitle']);				
				$obj->ntc_SET_Resumen($_POST['NewsPreview']);
				$obj->ntc_SET_Texto($_POST['NewsText']);
				
				//$obj->_debug = 1;
				echo $obj->ntcSave();
				$_SESSION['NewsId'] = $obj->ntc_GET_Id();
			break;
			
			
			case 'save_image':
				$obj->ntc_SET_Id($_SESSION['NewsId']);
				
				$fileElementName = 'NewsPic';

				$error = '';
        		$msg = '';
				
				switch($_FILES[$fileElementName]['error'])
				{
			
					case '1':
						$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
						break;
					case '2':
						$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
						break;
					case '3':
						$error = 'The uploaded file was only partially uploaded';
						break;
					/*case '4':
						$error = 'No file was uploaded.';
						break;*/
					case '6':
						$error = 'Missing a temporary folder';
						break;
					case '7':
						$error = 'Failed to write file to disk';
						break;
					case '8':
						$error = 'File upload stopped by extension';
						break;
					case '999':
						break;
				}
				
				echo "{";
				echo "error: '". $error . "',\n";
				echo "msg: '" . $msg . "'\n";
				echo "}";
				
				// Si no hay error, Subimos el archivo
				if(!$error and $_FILES[$fileElementName]['name']){
					$cod = $obj->ntc_GET_Id();
					if($cod){
						$file = $_FILES[$fileElementName];
						
						// we instanciate the class for each element of $file
						$handle = new Upload($file);
						
						// then we check if the file has been uploaded properly
						if ($handle->uploaded) {
							// PROPIEDADES DEL ARCHIVO
							$handle->file_new_name_body = $cod;
							$handle->allowed = array('image/*');
							$handle->file_overwrite = true;
							//$handle->file_max_size 	= (1024*1024)*2; // 1KB * 1024
							
							// PROPIEDADES DE LA IMAGEN
							$handle->image_convert 			= 'jpg';
							$handle->image_background_color = '#FFFFFF';
							
							// La redireccionamos
							$handle->image_resize   = true;
							$handle->image_x 		= 213;
							$handle->image_ratio_y	= true;
							
							$ruta	= "../../images/noticias";
							
							//echo "<br />Ruta: $ruta";
							//echo "<br />Nombre: ".$handle->file_new_name_body;
							
							// now, we start the upload 'process'. That is, to copy the uploaded file
							$handle->Process($ruta);
							if($handle->processed)
								echo $obj->ntcSaveImage(1);
						}
					} 
				}
			
			break;
			
			
			case 'delete': ?>
            	<br />
                <div align="center">
                	¿Está seguro que desea eliminar la noticia:<br /><strong><?php echo $info['NewsId'] ?>. <?php echo $info['NewsTitle'] ?></strong>?
                </div>
                <form id="edit_form"><input type="hidden" name="NewsId" value="<?php echo $info['NewsId'] ?>" /></form>
	<?php
			break;
			
			case 'delete_total':
				$obj->ntc_SET_Id($_POST['NewsId']);
				
				//$obj->_debug = 1;
				echo $obj->ntcDelete();
			
			break;
	}
?>