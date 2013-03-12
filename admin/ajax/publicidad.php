<?php 
	// Database
	require_once("../../includes/conect.php");
		
	// Global functions
	require_once("../../includes/global.php");
	
	// Classes
	require_once("../../classes/class.all.php");
  include('../../classes/class.upload.php');

	$obj = new All();

  $dataPages = $obj->getAllPagesAdver();
	
	$ind = "publicidad";
	
	$op = 'load';
	if(isset($_GET['op']))
		$op = $_GET['op'];
	
	$filtros = array();
	$order	 = 'id';
	
	if($op=='reload'){
		/*$obj->evn_SET_Nombre($_POST['EvnNombre']);
		$obj->evn_SET_Lugar($_POST['EvnLugar']);
		$obj->evn_SET_FchIni($_POST['EvnFchIni'], $_POST['EvnFchIni_op']);
		$obj->evn_SET_FchFin($_POST['EvnFchFin'], $_POST['EvnFchFin_op']);
		
		$order	= $_POST['order'];*/

    $pageId = $_POST['pages_adver'];
	}
?>

<?php if($op=='load'){ ?>
<script type="text/javascript">
	$(function(){
		$("#EvnFchIni").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
		$("#EvnFchFin").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
		
		$("#search_form").submit(function(){
			form_reload('<?php echo $ind ?>');
			return false;
		})

    $("#pages_adver").change(function(){      
      form_reload('<?php echo $ind ?>');
      return false;
    })
	})
</script>
<h1>Publicidad</h1>
<div class="ui-widget-content ui-corner-all search_form">
  <h3>Seleccione página</h3>
    <form id="search_form">
    <table border="0" cellspacing="3" cellpadding="0">      
      <tr>
        <td align="right">Seleccionar página</td>
        <td>:</td>
        <td>           
        <select id="pages_adver" name="pages_adver">
          <option value=""> - Seleccione - </option>
          <?php foreach ($dataPages as $pages) { ?>
          <option value="<?php echo $pages['id'] ?>"><?php echo $pages['page'] ?></option>
          <?php } ?>          
        </select>
       </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </form>
</div>
<table border="0" align="center" cellspacing="0" width="100%" class="tabla_principal">
<?php } ?>
    <?php if($op=='reload'){
			//$obj->_debug = 1;
			$info = $obj->getPositionsFromPage($pageId);			
		 ?>
        <tr>            
            <td class="ui-widget-header ui-corner-tl">Add/Edit</td>
            <td class="ui-widget-header">Del</td>
            <td class="ui-widget-header">Página</td>
            <td class="ui-widget-header" colspan="5">Banner</td>            
            <td class="ui-widget-header ui-corner-tr">Posición</td>
        </tr>
        <?php foreach($info as $row){ ?>
        <tr>            
            <td class="ui-widget-content"><img title="Editar" src="../images/famfamfam/pencil.png" onclick="form_edit('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Eliminar" src="../images/famfamfam/delete.png" onclick="form_delete('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><?php echo $row['page'] ?></td>
            <td class="ui-widget-content" colspan="5"><?php echo $row['url'] ?></td>
            <td class="ui-widget-content"><?php echo $row['position'] ?></td>
        </tr>
        <?php } ?>
    <?php } ?>
    
<?php if($op=='load'){ ?>
</table>
<?php } ?>

<?php 
	if($op=='view' or $op=='edit' or $op=='delete' or $op=='delete_total'){
		$obj->adv_SET_Id($_GET['id']);
		$info = $obj->getPositionsFromPage();
		$info = $info[($_GET['id'] - 1)];
	}
	
	// Ver, Editar, Eliminar
	switch($op){
		case 'view': ?>
        	<table border="0" cellspacing="0" cellpadding="0" class="table_view">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['EvnId'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Nombre</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['EvnNombre'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Fecha Inicio</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['EvnFchIni'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Fecha Fin</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['EvnFchFin'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Lugar</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['EvnLugar'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Descripción</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['EvnDesc_br'] ?></td>
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
			case 'edit': ?>
            <script type="text/javascript">
              var nameInput = '';
              var inputFile = '';
              var width = '';
              var height = '';
              $('#type-banner').change(function(){
                //alert('change')
                if($(this).val() != ''){                  
                  if($(this).val() == 'bann_squ'){
                     nameInput =  'bann_squ';
                     width = '300';
                     height = '250';
                  }else if ($(this).val() == 'bann_hor') {
                     nameInput =  'bann_hor';
                     width = '728';
                     height = '90';
                  }else if ($(this).val() == 'bann_ver') {
                     nameInput =  'bann_ver';
                     width = '200';
                     height = '446';
                  }else if ($(this).val() == 'bann_hor_short') {
                     nameInput =  'bann_hor_short';
                     width = '220';
                     height = '90';
                  }
                  inputFile = '<input type="file" name="'+nameInput+'" id="'+nameInput+'" />';                  
                  if($('#add_edit_table tr').length > 3)
                    $('#add_edit_table tr').last().remove();

                  $('#add_edit_table').append('<tr><td align="right" valign="top"><strong>Imagen</strong></td><td valign="top">:</td><td valign="top" id="banner-input">'+inputFile+'<div class="nota">*La imagen subida se redimensionará a una medidad de '+width+'px X '+height+'px, el alto será proporcional.<br /> Tamaño máximo del archivo: <strong><?php echo ini_get("upload_max_filesize") ?></strong></div></td></tr>');
                }                
              });
            </script>
            <form id="edit_form">
            <table border="0" cellspacing="8" cellpadding="0" id="add_edit_table">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="hidden" name="id" value="<?php echo $info['id'] ?>" /><?php 
          				if($info['id'])
          					echo $info['id'];
          				else
          					echo return_dato_unico("SELECT MAX(id) FROM adver_positions")+1; ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Tipo Publicidad</strong></td>
                <td valign="top">:</td>
                <td>                  
                  <select id="type-banner" name="type-banner">
                    <option value=""> - Seleccione - </option>
                    <option value="bann_squ" <?php echo $selected = $info['type'] == 'bann_squ'? 'selected=selected' : '' ?>>Banner Cuadrado</option>
                    <option value="bann_ver" <?php echo $selected = $info['type'] == 'bann_ver'? 'selected=selected' : '' ?>>Banner Vertical</option>
                    <option value="bann_hor" <?php echo $selected = $info['type'] == 'bann_hor'? 'selected=selected' : '' ?>>Banner Horizontal</option>
                    <option value="bann_hor_short" <?php echo $selected = $info['type'] == 'bann_hor_short'? 'selected=selected' : '' ?>>Banner Horizontal Pequeño</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Posición</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['position'] ?></td>
              </tr>
              <?php if($info['url']){ ?>
              <tr>
                <td align="right" valign="top"><strong>Imagen</strong></td>
                <td valign="top">:</td>
                <td valign="top" id="banner-input">
                    <input type="file" name="<?php echo $info['type'] ?>" id="<?php echo $info['type'] ?>" />
                    <div class="nota">
                      *La imagen subida se redimensionará a un ancho de 191px, el alto será proporcional.
                      <br /> Tamaño máximo del archivo: <strong><?php echo ini_get('upload_max_filesize') ?></strong>
                    </div>
                    <?php if($info['url']){ ?>
                    <br /><img src="../images/banners/<?php echo $info['url'] ?>?<?php echo rand(); ?>" title="<?php echo $info['url'] ?>" />
                    <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </table>
            </form>
    <?php
				break;
			case 'save':
				$obj->adv_SET_Id($_POST['id']);
				$obj->adv_SET_Type($_POST['type-banner']);				
				
				//$obj->_debug = 1;
				echo $obj->adverSave();
			  $_SESSION['AdvId'] = $obj->adv_GET_Id();
        $_SESSION['AdvType'] = $obj->adv_GET_Type();
        echo $_SESSION['AdvId'].'<br>';
        echo $_SESSION['AdvType'].'<br>';
			break;

      case 'save_image':
        $obj->adv_SET_Id($_SESSION['AdvId']);
        
        $fileElementName = $_SESSION['AdvType'];        

        $image_size = $obj->sizeImageByType($fileElementName); //Get size of image       
        
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
          $type_img = substr($_FILES[$fileElementName]['type'], 6);
          $cod = $obj->adv_GET_Id();
          if($cod){
            $file = $_FILES[$fileElementName];
            
            // we instanciate the class for each element of $file
            $handle = new Upload($file);
            
            // then we check if the file has been uploaded properly
            if ($handle->uploaded) {
              // PROPIEDADES DEL ARCHIVO
              $name = $_FILES[$fileElementName]['name'];
              //echo "********";
              //echo $name;              
              $handle->file_new_name_body = $cod;
              $handle->allowed = array('image/*');
              $handle->file_overwrite = true;
              //$handle->file_max_size  = (1024*1024)*2; // 1KB * 1024
              
              // PROPIEDADES DE LA IMAGEN
              $handle->image_convert      = $type_img;
              $handle->image_background_color = '#FFFFFF';
              
              // La redireccionamos
              $handle->image_resize   = true;
              $handle->image_x    = $image_size['width'];
              $handle->image_y    = $image_size['height'];
              //$handle->image_ratio_y  = true;
              
              $ruta = "../../images/banners";
              
              //echo "<br />Ruta: $ruta";
              //echo "<br />Nombre: ".$handle->file_new_name_body;
              
              // now, we start the upload 'process'. That is, to copy the uploaded file
              $handle->Process($ruta);

              $path = $cod.'.'.$type_img; //Image with extension
              
              if($handle->processed)
                echo $obj->advSaveImage($path);
            }
          } 
        }
      
      break;
			
			case 'delete': ?>
            	<br />
                <div align="center">
                	¿Está seguro que desea eliminar el banner publicitario:<br /><strong><?php echo $info['id'] ?></strong>, en la posición <strong><?php echo $info['position'] ?></strong>?
                </div>
                <form id="edit_form"><input type="hidden" name="id" value="<?php echo $info['id'] ?>" /></form>
	<?php
			break;
			
			case 'delete_total':
				$obj->adv_SET_Id($_POST['id']);
				
				//$obj->_debug = 1;
				echo $obj->evnDelete();
			
			break;
	}
?>