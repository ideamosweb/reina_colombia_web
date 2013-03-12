<?php 
	// Database
	require_once("../../includes/conect.php");
		
	// Global functions
	require_once("../../includes/global.php");
	
	// Classes
	require_once("../../classes/class.all.php");	
	$obj = new All();
	
	$ind = "servicios";
	
	$op = 'load';
	if(isset($_GET['op']))
		$op = $_GET['op'];
	
	$filtros = array();
	$order	 = 'id';
	
	if($op=='reload'){		
		$obj->srv_SET_Servicio($_POST['SrvServicio']);		
		
		$order	= $_POST['order'];
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
	})
</script>
<h1>Control de servicios</h1>
<div class="ui-widget-content ui-corner-all search_form">
  <h3>Buscar / Filtrar</h3>
    <form id="search_form">
    <table border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td align="right">Servicio</td>
        <td>:</td>
        <td><input name="SrvServicio" /></td>
        <td width="50">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>      
      <tr>
        <td align="right">Ordenar Por</td>
        <td>:</td>
        <td>
        <select name="order">
          <option value="id">Id</option>
          <option value="servicio">Servicio</option>          
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
			$info = $obj->srvGetAll($order);
			//print_r($info);
		 ?>
        <tr>
            <td class="ui-widget-header ui-corner-tl">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">Id</td>
            <td class="ui-widget-header">Alias</td>
            <td class="ui-widget-header">Titulo</td>
            <td class="ui-widget-header">Contenido</td>            
            <td class="ui-widget-header">Visible</td>            
            <td class="ui-widget-header">Fecha de Registro</td>
            <td class="ui-widget-header ui-corner-tr">Actualizado</td>
        </tr>
        <?php foreach($info as $row){ 
		$cad = htmlentities(html_entity_decode($row['contenido']));
		?>
         
        <tr>
            <td class="ui-widget-content"><img title="Ver" src="../images/famfamfam/page_white_magnify.png" onclick="form_view('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Editar" src="../images/famfamfam/pencil.png" onclick="form_edit('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Eliminar" src="../images/famfamfam/delete.png" onclick="form_delete('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><?php echo $row['id'] ?></td>
            <td class="ui-widget-content"><?php echo $row['alias'] ?></td>
            <td class="ui-widget-content"><?php echo $row['servicio'] ?></td>
            <td class="ui-widget-content"><?php if(strlen($cad) > 100) echo substr($cad, 0, 80)." ..."; else echo $cad; ?></td>            
            <td class="ui-widget-content" align="center"><img src="../images/famfamfam/lightbulb<?php if(!$row['estado']){ echo "_off"; } ?>.png" onclick="form_visible('<?php echo $ind ?>', '<?php echo $row['id'] ?>')" /></td>
            <td class="ui-widget-content"><?php echo $row['fecha'] ?></td>
            <td class="ui-widget-content"><?php echo $row['actualizado'] ?></td>            
        </tr>
        <?php } ?>
    <?php } ?>
    
<?php if($op=='load'){ ?>
</table>
<?php } ?>

<?php 
	if($op=='view' or $op=='edit' or $op=='delete' or $op=='delete_total'){
		$obj->srv_SET_Id($_GET['id']);
		$info = $obj->srvGetAll($order);
		$info = $info[$_GET['id']];		
	}
	
	// Ver, Editar, Eliminar
	switch($op){
		case 'view': ?>            
        	<table border="0" cellspacing="0" cellpadding="0" class="table_view">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['id'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Alias</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['alias'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Titulo</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['servicio'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Contenido</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['contenido'] ?></td>
              </tr>                            
              <tr>
                <td align="right" valign="top"><strong>Fecha de Registro</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['fecha'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Actualizado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['actualizado'] ?></td>
              </tr>
            </table>

	<?php
			break;
			case 'edit': 
			$temp = rand(); ?>
<script type="text/javascript">
				$(function(){
					$("#f_EvnFchIni").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
					$("#f_EvnFchFin").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
				});				
			</script>
            <script>
				$(function(){
					$("#SrvContenido_<?php echo $temp ?>").css("height","100%").css("width","550px").htmlbox({
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
                <td valign="top"><input type="hidden" name="SrvId" value="<?php echo $info['id'] ?>" /><?php 
				if($info['id'])
					echo $info['id'];
				else
					echo return_dato_unico("SELECT MAX(id) FROM servicios")+1; ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Alias</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="SrvAlias" value="<?php echo $info['alias'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Servicio</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="SrvServicio" value="<?php echo $info['servicio'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Contenido</strong></td>
                <td valign="top">:</td>
                <td valign="top"><textarea cols="75" rows="35" name="SrvContenido" id="SrvContenido_<?php echo $temp ?>"><?php echo $info['contenido'] ?></textarea></td>
              </tr>              
            </table>
            </form>
    <?php
				break;
			case 'save':				
				$obj->srv_SET_Id($_POST['SrvId']);
				$obj->srv_SET_Alias($_POST['SrvAlias']);
				$obj->srv_SET_Servicio($_POST['SrvServicio']);				
				$obj->srv_SET_Contenido($_POST['SrvContenido']);				
				
				//$obj->_debug = 1;
				echo $obj->srvSave();
			
			break;
			
			case 'delete': ?>
            	<br />
                <div align="center">
                	¿Está seguro que desea eliminar el servicio:<br /><strong><?php echo $info['id'] ?>. <?php echo $info['servicio'] ?></strong>?
                </div>
                <form id="edit_form"><input type="hidden" name="SrvId" value="<?php echo $info['id'] ?>" /></form>
	<?php
			break;
			
			case 'delete_total':
				$obj->srv_SET_Id($_POST['SrvId']);
				
				//$obj->_debug = 1;
				echo $obj->srvDelete();
			
			break;
			
			case 'visible':
				$obj->srv_SET_Id($_POST['SrvId']);
				
				echo $obj->srvVisible();
			break;	
	}
?>