<?php 
	// Database
	require_once("../../includes/conect.php");
		
	// Global functions
	require_once("../../includes/global.php");
	
	// Classes
	require_once("../../classes/class.all.php");	
	include('../../classes/class.upload.php');
	
	$obj = new All();
	
	$ind = "material";
	
	$op = 'load';
	if(isset($_GET['op']))
		$op = $_GET['op'];
	
	$filtros = array();
	$order	 = 'MtrId';
	
	if($op=='reload'){
		$obj->mtr_SET_Nombre($_POST['MtrNombre']);
		$obj->mtr_SET_Desc($_POST['MtrDesc']);
		$obj->mtr_SET_Materia($_POST['MtrMateria']);
		$obj->mtr_SET_Grado($_POST['MtrGrado']);
		
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
<h1>Material de Estudio</h1>
<div class="ui-widget-content ui-corner-all search_form">
  <h3>Buscar / Filtrar</h3>
    <form id="search_form">
    <table border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td align="right">Nombre</td>
        <td>:</td>
        <td><input name="MtrNombre" /></td>
        <td width="50">&nbsp;</td>
        <td align="right">Materia</td>
        <td>:</td>
        <td><input name="MtrMateria" /></td>
      </tr>
      <tr>
        <td align="right">Descripción</td>
        <td>:</td>
    
        <td><input name="MtrDesc" /></td>
        <td>&nbsp;</td>
        <td align="right">Grado</td>
        <td>:</td>
        <td>
        <select name="MtrGrado">
        	<option value=""></option>
            <?php for($i=1; $i<=11; $i++){ ?>
            	<option><?php echo $i ?></option>
            <?php } ?>
        </select>
        </td>
      </tr>
      <tr>
        <td align="right">Ordenar Por</td>
        <td>:</td>
        <td>
        <select name="order">
          <option value="MtrId">Id</option>
          <option value="MtrNombre">Nombre</option>
          <option value="MtrMateria">Materia</option>
          <option value="MtrGrado">Grado</option>
          <option value="FchReg">Fecha de Registro</option>
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
			$info = $obj->mtrGetAll($order);
			//print_r($info);
		 ?>
        <tr>
            <td class="ui-widget-header ui-corner-tl">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">Id</td>
            <td class="ui-widget-header">Nombre</td>
            <td class="ui-widget-header">Grado</td>
            <td class="ui-widget-header">Materia</td>
            <td class="ui-widget-header">Desc</td>
            <td class="ui-widget-header">Visible</td>
          <td class="ui-widget-header ui-corner-tr">Fecha de Registro</td>
        </tr>
        <?php foreach($info as $row){ ?>
        <tr>
            <td class="ui-widget-content"><img title="Ver" src="../images/famfamfam/page_white_magnify.png" onclick="form_view('<?php echo $ind ?>', '<?php echo $row['MtrId'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Editar" src="../images/famfamfam/pencil.png" onclick="form_edit('<?php echo $ind ?>', '<?php echo $row['MtrId'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Eliminar" src="../images/famfamfam/delete.png" onclick="form_delete('<?php echo $ind ?>', '<?php echo $row['MtrId'] ?>');" /></td>
            <td class="ui-widget-content" align="center"><?php if($row['MtrArchivo']){ ?>
            	<a href="../material/<?php echo $row['MtrArchivo'] ?>" target="_blank"><img src="../images/famfamfam/drive_go.png" title="Descargar" /></a>
                <?php 
				$trozos = explode(".", $row['MtrArchivo']);
				echo "<br />".strtoupper(end($trozos)) ?>
			<?php } ?></td>
            <td class="ui-widget-content"><?php echo $row['MtrId'] ?></td>
            <td class="ui-widget-content"><?php echo $row['MtrNombre'] ?></td>
            <td class="ui-widget-content" align="center"><?php echo $row['MtrGrado'] ?></td>
            <td class="ui-widget-content"><?php echo $row['MtrMateria'] ?></td>
            <td class="ui-widget-content"><?php echo $row['MtrDesc_br_s'] ?></td>
            <td class="ui-widget-content" align="center"><img src="../images/famfamfam/lightbulb<?php if(!$row['MtrEstado']){ echo "_off"; } ?>.png" /></td>
            <td class="ui-widget-content"><?php echo $row['FchReg'] ?></td>
        </tr>
        <?php } ?>
    <?php } ?>
    
<?php if($op=='load'){ ?>
</table>
<?php } ?>

<?php 
	if($op=='view' or $op=='edit' or $op=='delete' or $op=='delete_total'){
		$obj->mtr_SET_Id($_GET['id']);
		$info = $obj->mtrGetAll($order);
		$info = $info[$_GET['id']];
	}
	
	// Ver, Editar, Eliminar
	switch($op){
		case 'view': ?>
        	<table border="0" cellspacing="0" cellpadding="0" class="table_view">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['MtrId'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Nombre</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['MtrNombre'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Materia</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['MtrMateria'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Grado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['MtrGrado'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Desc</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['MtrDesc_br'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Estado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><img src="../images/famfamfam/lightbulb<?php if(!$info['MtrEstado']){ echo "_off"; } ?>.png" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Archivo</strong></td>
                <td valign="top">:</td>
                <td valign="top">
					<?php if($info['MtrArchivo']){ ?>
                    <a href="../material/<?php echo $info['MtrArchivo'] ?>" target="_blank"><img src="../images/famfamfam/drive_go.png" title="Descargar" align="absmiddle" /> Descargar Material</a>
                    <?php } ?>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Registrado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['FchReg'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Actualizado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['FchAct'] ?></td>
              </tr>
            </table>

	<?php
			break;
			
			
			case 'edit':
				$materias = $obj->mtrGetMaterias(); ?>
            <script>
				$(function(){
					/* $("#f_MtrDesc").css("height","100%").css("width","550px").htmlbox({
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
							"separator","fomtrolor","highlight"
							]
						],
						skin:"blue"
					}); */
					
					$("#addMateria").click(function(){
						valor 		= $("#MtrMateria").val();
						contenedor 	= $("#MtrMateria").parent().html('');
						contenedor.html('<input type="text" name="MtrMateria" value="'+valor+'" />');
					})
				})
			</script>
            <form id="edit_form">
            <table border="0" cellspacing="8" cellpadding="0">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="hidden" name="MtrId" value="<?php echo $info['MtrId'] ?>" /><?php 
				if($info['MtrId'])
					echo $info['MtrId'];
				else
					echo return_dato_unico("SELECT MAX(MtrId) FROM material")+1; ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Nombre</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="MtrNombre" value="<?php echo $info['MtrNombre'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Materia</strong></td>
                <td valign="top">:</td>
                <td valign="top">
                	<select name="MtrMateria" id="MtrMateria">
                    	<?php foreach($materias as $mat){ ?>
                        	<option <?php if($mat==$info['MtrMateria']){ ?>selected="selected"<?php } ?>><?php echo $mat ?></option>
                        <?php } ?>
                    </select>
                    <img class="link" id="addMateria" src="../images/famfamfam/pencil.png" />
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Grado</strong></td>
                <td valign="top">:</td>
                <td valign="top">
                <select name="MtrGrado">
                    <option value=""></option>
                    <?php for($i=1; $i<=11; $i++){ ?>
                        <option <?php if($info['MtrGrado']==$i){ ?>selected="selected"<?php } ?>><?php echo $i ?></option>
                    <?php } ?>
                </select>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Descripción</strong></td>
                <td valign="top">:</td>
                <td valign="top">
                	<textarea cols="20" rows="8" name="MtrDesc" id="f_MtrDesc"><?php echo $info['MtrDesc'] ?></textarea>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Estado</strong></td>
                <td valign="top">:</td>
                <td valign="top">
                <select name="MtrEstado">
                    <option value="0">Oculto</option>
                    <option <?php if($info['MtrEstado']){ ?> selected="selected"<?php } ?> value="1">Visible</option>
                </select>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Archivo</strong></td>
                <td valign="top">:</td>
                <td valign="top">
                	<input type="file" name="MtrArchivo" id="MtrArchivo" />
                    <div class="nota">
                    	Tamaño máximo del archivo: <strong><?php echo ini_get('upload_max_filesize') ?></strong>
                    </div>
					<?php if($info['MtrArchivo']){ ?>
                    <br /><a href="../material/<?php echo $info['MtrArchivo'] ?>" target="_blank"><img src="../images/famfamfam/drive_go.png" title="Descargar" align="absmiddle" /> Descargar Material</a>
                    <?php } ?>
                </td>
              </tr>
            </table>
</form>
    <?php
			break;
			
			
			case 'save':
				$obj->mtr_SET_Id($_POST['MtrId']);
				$obj->mtr_SET_Nombre($_POST['MtrNombre']);
				$obj->mtr_SET_Desc($_POST['MtrDesc']);
				$obj->mtr_SET_Materia($_POST['MtrMateria']);
				$obj->mtr_SET_Grado($_POST['MtrGrado']);
				$obj->mtr_SET_Estado($_POST['MtrEstado']);
				
				//$obj->_debug = 1;
				echo $obj->mtrSave();
				$_SESSION['MtrId'] = $obj->mtr_GET_Id();
			break;
			
			
			case 'save_image':
				$obj->mtr_SET_Id($_SESSION['MtrId']);
				
				$fileElementName = 'MtrArchivo';
				
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
					$cod = $obj->mtr_GET_Id();
					$info = $obj->mtrGetAll();
					$info = $info[$cod];
					$name_file = preg_replace('/\.[^.]+$/','',$info['MtrArchivo']);
					
					if(!$name_file)
						$name_file = generateClave();
					
					if($cod){
						$file = $_FILES[$fileElementName];
						
						// we instanciate the class for each element of $file
						$handle = new Upload($file);
						
						// then we check if the file has been uploaded properly
						if ($handle->uploaded) {
							// PROPIEDADES DEL ARCHIVO
							$handle->file_new_name_body = $name_file;
							$handle->file_overwrite = true;
							
							$ruta	= "../../material";
							
							//echo "<br />Ruta: $ruta";
							//echo "<br />Nombre: ".$handle->file_new_name_body;
							
							// now, we start the upload 'process'. That is, to copy the uploaded file
							$handle->Process($ruta);
							if($handle->processed){
								$name_file .= ".".$handle->file_src_name_ext;
								echo $obj->mtrSaveFile($name_file);
							}
						}
					} 
				}
			
			break;
			
			
			case 'delete': ?>
            	<br />
                <div align="center">
                	¿Está seguro que desea eliminar la noticia:<br /><strong><?php echo $info['MtrId'] ?>. <?php echo $info['MtrNombre'] ?></strong>?
                </div>
                <form id="edit_form"><input type="hidden" name="MtrId" value="<?php echo $info['MtrId'] ?>" /></form>
	<?php
			break;
			
			case 'delete_total':
				$obj->mtr_SET_Id($_POST['MtrId']);
				
				//$obj->_debug = 1;
				echo $obj->mtrDelete();
			
			break;
	}
?>