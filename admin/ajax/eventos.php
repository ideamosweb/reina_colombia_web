<?php 
	// Database
	require_once("../../includes/conect.php");
		
	// Global functions
	require_once("../../includes/global.php");
	
	// Classes
	require_once("../../classes/class.all.php");	
	$obj = new All();
	
	$ind = "eventos";
	
	$op = 'load';
	if(isset($_GET['op']))
		$op = $_GET['op'];
	
	$filtros = array();
	$order	 = 'EvnId';
	
	if($op=='reload'){
		$obj->evn_SET_Nombre($_POST['EvnNombre']);
		$obj->evn_SET_Lugar($_POST['EvnLugar']);
		$obj->evn_SET_FchIni($_POST['EvnFchIni'], $_POST['EvnFchIni_op']);
		$obj->evn_SET_FchFin($_POST['EvnFchFin'], $_POST['EvnFchFin_op']);
		
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
<h1>Eventos</h1>
<div class="ui-widget-content ui-corner-all search_form">
  <h3>Buscar / Filtrar</h3>
    <form id="search_form">
    <table border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td align="right">Nombre</td>
        <td>:</td>
        <td><input name="EvnNombre" /></td>
        <td width="50">&nbsp;</td>
        <td align="right">Fecha de Inicio</td>
        <td>:</td>
        <td>
        <select name="EvnFchIni_op">
            <option value=">">&gt;</option>
            <option value="<">&lt;</option>
            <option value="=" selected="selected">=</option>
        </select> a 
        <input name="EvnFchIni" id="EvnFchIni" size="9" /></td>
      </tr>
      <tr>
        <td align="right">Lugar</td>
        <td>:</td>
    
        <td><input name="EvnLugar" /></td>
        <td>&nbsp;</td>
        <td align="right">Fecha de Finalización</td>
        <td>:</td>
        <td>
        <select name="EvnFchFin_op">
          <option value=">">&gt;</option>
          <option value="<">&lt;</option>
          <option value="=" selected="selected">=</option>
        </select>
        a <input name="EvnFchFin" id="EvnFchFin" size="9" /></td>
      </tr>
      <tr>
        <td align="right">Ordenar Por</td>
        <td>:</td>
        <td>
        <select name="order">
          <option value="EvnId">Id</option>
          <option value="EvnNombre">Nombre</option>
          <option value="EvnFchIni">Fecha de Inicio</option>
          <option value="EvnLugar">Lugar</option>
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
			$info = $obj->evnGetAll($order);
			//print_r($info);
		 ?>
        <tr>
            <td class="ui-widget-header ui-corner-tl">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">Id</td>
            <td class="ui-widget-header">Nombre</td>
            <td class="ui-widget-header">Inicio</td>
            <td class="ui-widget-header">Finalización</td>
            <td class="ui-widget-header">Lugar</td>
            <td class="ui-widget-header">Descripcion</td>
          <td class="ui-widget-header ui-corner-tr">Fecha de Registro</td>
        </tr>
        <?php foreach($info as $row){ ?>
        <tr>
            <td class="ui-widget-content"><img title="Ver" src="../images/famfamfam/page_white_magnify.png" onclick="form_view('<?php echo $ind ?>', '<?php echo $row['EvnId'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Editar" src="../images/famfamfam/pencil.png" onclick="form_edit('<?php echo $ind ?>', '<?php echo $row['EvnId'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Eliminar" src="../images/famfamfam/delete.png" onclick="form_delete('<?php echo $ind ?>', '<?php echo $row['EvnId'] ?>');" /></td>
            <td class="ui-widget-content"><?php echo $row['EvnId'] ?></td>
            <td class="ui-widget-content"><?php echo $row['EvnNombre'] ?></td>
            <td class="ui-widget-content"><?php echo $row['EvnFchIni'] ?></td>
            <td class="ui-widget-content"><?php echo $row['EvnFchFin'] ?></td>
            <td class="ui-widget-content"><?php echo $row['EvnLugar'] ?></td>
            <td class="ui-widget-content"><?php echo $row['EvnDesc_br_s'] ?></td>
            <td class="ui-widget-content"><?php echo $row['FchReg'] ?></td>
        </tr>
        <?php } ?>
    <?php } ?>
    
<?php if($op=='load'){ ?>
</table>
<?php } ?>

<?php 
	if($op=='view' or $op=='edit' or $op=='delete' or $op=='delete_total'){
		$obj->evn_SET_Id($_GET['id']);
		$info = $obj->evnGetAll($order);
		$info = $info[$_GET['id']];
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
                <td valign="top"><input type="hidden" name="EvnId" value="<?php echo $info['EvnId'] ?>" /><?php 
				if($info['EvnId'])
					echo $info['EvnId'];
				else
					echo return_dato_unico("SELECT MAX(EvnId) FROM evento")+1; ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Nombre</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="EvnNombre" value="<?php echo $info['EvnNombre'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Fecha Inicio</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="EvnFchIni" id="f_EvnFchIni" value="<?php echo $info['EvnFchIni'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Fecha Fin</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="EvnFchFin" id="f_EvnFchFin" value="<?php echo $info['EvnFchFin'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Lugar</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="EvnLugar" value="<?php echo $info['EvnLugar'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Descripción</strong></td>
                <td valign="top">:</td>
                <td valign="top"><textarea cols="20" rows="8" name="EvnDesc"><?php echo $info['EvnDesc'] ?></textarea></td>
              </tr>
            </table>
            </form>
    <?php
				break;
			case 'save':
				$obj->evn_SET_Id($_POST['EvnId']);
				$obj->evn_SET_Nombre($_POST['EvnNombre']);
				$obj->evn_SET_Lugar($_POST['EvnLugar']);
				$obj->evn_SET_FchIni($_POST['EvnFchIni'], $_POST['EvnFchIni_op']);
				$obj->evn_SET_FchFin($_POST['EvnFchFin'], $_POST['EvnFchFin_op']);
				$obj->evn_SET_Desc($_POST['EvnDesc']);
				
				//$obj->_debug = 1;
				echo $obj->evnSave();
			
			break;
			
			case 'delete': ?>
            	<br />
                <div align="center">
                	¿Está seguro que desea eliminar el evento:<br /><strong><?php echo $info['EvnId'] ?>. <?php echo $info['EvnNombre'] ?></strong>?
                </div>
                <form id="edit_form"><input type="hidden" name="EvnId" value="<?php echo $info['EvnId'] ?>" /></form>
	<?php
			break;
			
			case 'delete_total':
				$obj->evn_SET_Id($_POST['EvnId']);
				
				//$obj->_debug = 1;
				echo $obj->evnDelete();
			
			break;
	}
?>