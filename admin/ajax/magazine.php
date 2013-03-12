<?php 
	// Database
	require_once("../../includes/conect.php");
		
	// Global functions
	require_once("../../includes/global.php");
	
	// Classes
	require_once("../../classes/class.all.php");
   include('../../classes/class.upload.php');

	$obj = new All();

  $mags = $obj->getAllMagazines();
	
	$ind = "magazine";
	
	$op = 'load';
	if(isset($_GET['op']))
		$op = $_GET['op'];
	
	//$filtros = array();
	$order	 = 'EvnId';

  $edit_form_id = "edit_form";
	
	if($op=='reload'){		
		$magId	= (isset($_POST['id_mags'])) ? $_POST['id_mags'] : 0;
	}
?>
<?php 

if($op=='set_mag'){
  //$obj->_debug = 1;
  $id = $_POST['id'];
  echo $obj->updateStateMagazine($id);
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
		});

    $("#names_mags").change(function(){      
      $.post('./ajax/magazine.php?op=set_mag', { id : $(this).val() }, function(data){
        form_reload('<?php echo $ind ?>');
      });            
      
      return false;
    });

    $('#add').click(function(){      
      //var intRegex = /^\d+$/;
      var str = $('#MagNumPages').val();      
      item_save('<?php echo $ind ?>', '');      
    })
	})
  $('#show_new_magazine').click(function(){
    //$('#new_magazine').toggle('slow');

    if($('#new_magazine').is(':visible')){
      $('#new_magazine').hide('slow');
      $('#new_magazine form').attr('id', '');
    }else{
      $('#new_magazine').slideDown('slow');
      $('#new_magazine form').attr('id', 'edit_form');
    }
  })  
</script>
<h1>Magazine</h1>
<div class="ui-widget-content ui-corner-all search_form">
  <?php
    $display_mag = '';    
    if(count($mags) > 0){
      $display_mag = 'style = "display : none;"';
      $edit_form_id = "";
  ?>
  <h3>Seleccione revista</h3>
  <form id="search_form">
    <table border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td align="right">Seleccione</td>
        <td>:</td>
        <td>
          <select id="names_mags" name="id_mags">
            <option value=""> - Seleccione - </option>
            <?php foreach ($mags as $mg) { ?>
            <option value="<?php echo $mg['id'] ?>"><?php echo $mg['title'] ?></option>
            <?php } ?>          
          </select>
        </td>
      </tr>      
    </table>
  </form>
  <br />
  <a href="javascript:void(0)" id="show_new_magazine" style="text-decoration:underline;">Crear Nueva Revista</a>
  <br />
  <br />  
  <?php } ?>
  <div id="new_magazine" <?php echo $display_mag; ?>>
    <h3>Nueva revista</h3>
    <form id="<?php echo $edit_form_id; ?>">
      <table border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td align="right">Nombre</td>
          <td>:</td>
          <td>
            <input name="MagName" id="MagName" size = "20" style="width:200px;" />
          </td>
        </tr>        
        <tr>
          <td colspan="3"></td>
        </tr>      
        <tr>
          <td align="right" colspan=2></td>                
          <td>
            <input type="button" name="add" id="add" value="Agregar" style="width:70px;" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<table border="0" align="center" cellspacing="0" width="100%" class="tabla_principal">
<?php } ?>
    <?php if($op=='reload'){
			//$obj->_debug = 1;      
			$info = $obj->getPagesMagazineFromMagId($magId);
      $_SESSION['MagId'] = $magId;      
		 ?> 
        <tr>            
            <td class="ui-widget-header ui-corner-tl">Add/Edit</td>
            <td class="ui-widget-header">Del</td>            
            <td class="ui-widget-header">Revista</td>
            <td class="ui-widget-header">Imagen Página</td>            
            <td class="ui-widget-header ui-corner-tr">Página</td>
        </tr>
        <?php if(count($info) <= 0){ ?>
        <tr id="row_pages_1" class='row_mag_table'>            
            <td class="ui-widget-content"><img title="Editar" src="../images/famfamfam/pencil.png" onclick="form_edit('<?php echo $ind ?>', '');" /></td>
            <td class="ui-widget-content"><img title="Eliminar" src="../images/famfamfam/delete.png" onclick="form_delete('<?php echo $ind ?>', '');" /></td>
            <td class="ui-widget-content"><i style='color:#CCC;'>Campo Vacío</i></td>
            <td class="ui-widget-content"><i style='color:#CCC;'>Campo Vacío</i></td>
            <td class="ui-widget-content"><i style='color:#CCC;'>Campo Vacío</i></td>            
        </tr>
        <?php }else{ ?>
        <?php foreach($info as $row){ ?>
        <tr id="row_pages_<?php echo $row['page_number'] ?>" class='row_mag_table'>            
            <td class="ui-widget-content"><img title="Editar" src="../images/famfamfam/pencil.png" onclick="form_edit('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Eliminar" src="../images/famfamfam/delete.png" onclick="form_delete('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><?php echo $row['title'] ?></td>
            <td class="ui-widget-content"><?php echo $row['path'] ?></td>
            <?php $number_of_page =  ($row['page_number'] == 1) ? 'Portada' : $row['page_number'] - 1; ?>
            <td class="ui-widget-content"><?php echo $number_of_page ?></td>            
        </tr>
        <?php } } ?>
        <tr>
            <td class="ui-widget-content" colspan="4">&nbsp;</td>            
            <td class="ui-widget-content" align="right">Añadir <img title="Ver" src="../images/famfamfam/add.png" id="add_row_mag" /></td>
        </tr>
        <script type="text/javascript">
          $("#add_row_mag").click(function(){            
            var len = $('.row_mag_table').length;            
            if(len > 0){
              var new_row = "<tr id='row_pages_"+(len + 1)+"' class='row_mag_table'><td class='ui-widget-content'><img title='Editar' src='../images/famfamfam/pencil.png' onclick=\"form_edit('<?php echo $ind ?>', '');\" /></td><td class='ui-widget-content'><img title='Eliminar' src='../images/famfamfam/delete.png' onclick=\"form_delete('<?php echo $ind ?>', '');\" /></td><td class='ui-widget-content'><i style='color:#CCC;'>Campo Vacío</i></td><td class='ui-widget-content'><i style='color:#CCC;'>Campo Vacío</i></td><td class='ui-widget-content'><i style='color:#CCC;'>Campo Vacío</i></td></tr>";

              $('#row_pages_'+len).after(new_row);
            }
          });
        </script> 
    <?php } ?>
    
<?php if($op=='load'){ ?>
</table>
<?php } ?>

<?php 
	if($op=='view' or $op=='edit' or $op=='delete' or $op=='delete_total'){
    if(isset($_GET['id'])){
      $obj->mag_SET_Id_magazine($_GET['id']);
      //$_SESSION['MagId'] = $_GET['id'];
    }
		
    $id = (!isset($_GET['id'])) ? 0 : $_GET['id'];
		$info = $obj->getPagesMagazineByIdMagazine($id);    
    $num_info = count($info);    
    if(!empty($info)){
		  $info = $info[0];
    }    
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
				$(function(){
					$("#f_EvnFchIni").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
					$("#f_EvnFchFin").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
				})
			</script>            
            <form id="edit_form">
            <table border="0" cellspacing="8" cellpadding="0">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <?php $info['id'] = (!isset($info['id'])) ? '' : $info['id']; ?>
                <td valign="top"><input type="hidden" name="id_magazine" value="<?php echo $info['id'] ?>" /><input type="hidden" name="id" value="<?php echo $_SESSION['MagId'] ?>" />
                  <?php 
          				if($info['id']){
          					echo $num_info = $info['id'];
                    //$num_page = $info['page_number'];
          				}else{          					
                    echo $num_info = return_dato_unico("SELECT MAX(id) FROM pagesmagazine")+1;
                    //$num_page = $num_info;
                  }
                  ?>
                  <input type="hidden" name="page_num" value="<?php echo $num_info ?>" />
                </td>
              </tr>             
              <tr>
                <td align="right" valign="top"><strong>Imagen</strong></td>
                <td valign="top">:</td>
                <td valign="top" id="banner-input">                    
                    <input type="file" name="MagazinePic" id="MagazinePic" />
                    <div class="nota">
                      *La imagen subida se redimensionará a un ancho de 191px, el alto será proporcional.
                      <br /> Tamaño máximo del archivo: <strong><?php echo ini_get('upload_max_filesize') ?></strong>
                    </div>
                    <?php if(isset($info['path'])){ ?>
                    <br /><img src="../images/magazine/<?php echo $info['path'] ?>?<?php echo rand(); ?>" title="<?php echo $info['path'] ?>" />
                    <?php } ?>
                </td>
              </tr>
            </table>
            </form>
    <?php
				break;
			case 'save':
				if (isset($_POST['MagName']))
          $obj->mag_SET_Name($_POST['MagName']);

        $_SESSION['id'] = $_POST['id'];

        if (!empty($_POST['id_magazine'])){          
          $obj->mag_SET_Id_Magazine($_POST['id_magazine']);
          $_SESSION['id_magazine'] = $_POST['id_magazine'];          
        }

        $_SESSION['page_num'] = $_POST['page_num'];        
        
				//$obj->_debug = 1;
        if (isset($_POST['MagName']))
				  echo $obj->magSave();
			
			break;

      case 'save_image':
        if(isset($_SESSION['id_magazine']))
          $obj->mag_SET_Id_Magazine($_SESSION['id_magazine']);

        $obj->mag_SET_Id($_SESSION['id']);        

        $fileElementName = "MagazinePic";

        //$obj->_debug = 1;            
        
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
          $cod = $_SESSION['page_num'];
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
              $handle->image_x    = 450;
              $handle->image_y    = 614;
              //$handle->image_ratio_y  = true;
              
              $ruta = "../../images/magazine";
              
              //echo "<br />Ruta: $ruta";
              //echo "<br />Nombre: ".$handle->file_new_name_body;
              
              // now, we start the upload 'process'. That is, to copy the uploaded file
              $handle->Process($ruta);

              $path = $cod.'.'.$type_img; //Image with extension
              
              if($handle->processed)
                echo $obj->magSaveImage($path);
            }
          } 
        }
      
      break;
			
			case 'delete': ?>
            	<br />
                <div align="center">
                	¿Está seguro que desea eliminar la imagen: <br /><strong><?php echo $info['id'] ?>.</strong>?
                </div>
                <form id="edit_form"><input type="hidden" name="id" value="<?php echo $info['id'] ?>" /></form>
	<?php
			break;
			
			case 'delete_total':
				$obj->mag_SET_Id_Magazine($_POST['id']);
				
				//$obj->_debug = 1;
				echo $obj->magDeletePage();
			
			break;
	}
?>