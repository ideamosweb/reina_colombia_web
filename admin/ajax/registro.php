<?php 
	// Database
	require_once("../../includes/conect.php");
		
	// Global functions
	require_once("../../includes/global.php");
	
	// Classes
	require_once("../../classes/class.all.php");	
	$obj = new All();
	
	$ind = "registro";
	
	$op = 'load';
	if(isset($_GET['op']))
		$op = $_GET['op'];
	
	$filtros = array();
	$order	 = 'id';
	
	if($op=='reload'){		
		$obj->reg_SET_Nombre($_POST['RegNombre']);
		$obj->reg_SET_Apellido($_POST['RegApellido']);		
		$obj->reg_SET_Usuario($_POST['RegUsuario']);		
		$obj->reg_SET_Grado($_POST['RegGrado']);		
		
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
<h1>Registro de Estudiantes</h1>
<div class="ui-widget-content ui-corner-all search_form">
  <h3>Buscar / Filtrar</h3>
    <form id="search_form">
    <table border="0" cellspacing="3" cellpadding="0">
      <tr>
        <td align="right">Nombre</td>
        <td>:</td>
        <td><input name="RegNombre" /></td>
        <td width="50">&nbsp;</td>
        <td align="right">Apellido</td>
        <td>:</td>
        <td><input name="RegApellido" /></td>
      </tr>
      <tr>
        <td align="right">Usuario</td>
        <td>:</td>
    
        <td><input name="RegUsuario" /></td>
        <td>&nbsp;</td>
        <td align="right">Grado</td>
        <td>:</td>
        <td>
        <select name="RegGrado">
        	<option value=""></option>
            <?php for($i=1; $i<=11; $i++){ ?>
            	<option><?php echo $i ?></option>
            <?php } ?>
        </select></td>
      </tr>
      <tr>
        <td align="right">Ordenar Por</td>
        <td>:</td>
        <td>
        <select name="order">
          <option value="id">Id</option>
          <option value="nombre">Nombre</option>
          <option value="apellido">Apellido</option>
          <option value="usr">Usuario</option>
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
			$info = $obj->regGetAll($order);
			//print_r($info);
		 ?>
        <tr>
            <td class="ui-widget-header ui-corner-tl">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">&nbsp;</td>
            <td class="ui-widget-header">Id</td>
            <td class="ui-widget-header">Nombre</td>
            <td class="ui-widget-header">Apellido</td>
            <td class="ui-widget-header">E-mail</td>
            <td class="ui-widget-header">Edad</td>
            <td class="ui-widget-header">Usuario</td>
            <td class="ui-widget-header">Grado</td>
          <td class="ui-widget-header ui-corner-tr">Fecha de Registro</td>
        </tr>
        <?php foreach($info as $row){ ?>
        <tr>
            <td class="ui-widget-content"><img title="Ver" src="../images/famfamfam/page_white_magnify.png" onclick="form_view('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Editar" src="../images/famfamfam/pencil.png" onclick="form_edit('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><img title="Eliminar" src="../images/famfamfam/delete.png" onclick="form_delete('<?php echo $ind ?>', '<?php echo $row['id'] ?>');" /></td>
            <td class="ui-widget-content"><?php echo $row['id'] ?></td>
            <td class="ui-widget-content"><?php echo $row['nombre'] ?></td>
            <td class="ui-widget-content"><?php echo $row['apellido'] ?></td>
            <td class="ui-widget-content"><?php echo $row['email'] ?></td>
            <td class="ui-widget-content"><?php echo $row['edad'] ?></td>
            <td class="ui-widget-content"><?php echo $row['usr'] ?></td>
            <td class="ui-widget-content"><?php echo $row['grado'] ?></td>
            <td class="ui-widget-content"><?php echo $row['dt'] ?></td>
        </tr>
        <?php } ?>
    <?php } ?>
    
<?php if($op=='load'){ ?>
</table>
<?php } ?>

<?php 
	if($op=='view' or $op=='edit' or $op=='delete' or $op=='delete_total'){
		$obj->reg_SET_Id($_GET['id']);
		$info = $obj->regGetAll($order);
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
                <td align="right" valign="top"><strong>Nombre</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['nombre'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Apellido</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['apellido'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Edad</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['edad'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Nombre de Usuario</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['usr'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Contraseña</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['pass'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>E-mail</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['email'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Registrado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['dt'] ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Actualizado</strong></td>
                <td valign="top">:</td>
                <td valign="top"><?php echo $info['actualizado'] ?></td>
              </tr>
            </table>

	<?php
			break;
			case 'edit': ?>
<script type="text/javascript">
				$(function(){
					$("#f_EvnFchIni").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
					$("#f_EvnFchFin").datepicker({ dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true });
				});				
			</script>
            <form id="edit_form">
            <table border="0" cellspacing="8" cellpadding="0">
              <tr>
                <td align="right" valign="top"><strong>Id</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="hidden" name="RegId" value="<?php echo $info['id'] ?>" /><?php 
				if($info['id'])
					echo $info['id'];
				else
					echo return_dato_unico("SELECT MAX(id) FROM usuarios")+1; ?></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Nombre</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="RegNombre" value="<?php echo $info['nombre'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Apellido</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="RegApellido" id="RegApellido" value="<?php echo $info['apellido'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Edad</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="RegEdad" id="RegEdad" value="<?php echo $info['edad'] ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top"><strong>Nombre de Usuario</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="RegUsuario" id="RegUsuario" value="<?php echo $info['usr'] ?>" /></td>
              </tr>
              <?php if($_GET['id'] != ""){ ?>
              <tr>              
                <td align="right" valign="top"><strong>Contraseña</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="RegContrasena" id="RegContrasena" value="<?php echo $info['pass'] ?>" /></td>
              </tr>
              <?php } ?>
              <tr>
                <td align="right" valign="top"><strong>E-mail</strong></td>
                <td valign="top">:</td>
                <td valign="top"><input type="text" name="RegEmail" value="<?php echo $info['email'] ?>" /></td>
              </tr>             
              <tr>
                <td align="right" valign="top"><strong>Grado</strong></td>
                <td valign="top">:</td>
                <td valign="top">
                <select id="RegGrado" name="RegGrado">                	
				<?php for($i=1; $i<=11; $i++){ ?>                	
                	<option value="<?php echo $i ?>" <?php if($info['grado'] == $i) echo "selected" ?>><?php echo $i ?>°</option>
				<?php }?>
                </select></td>
              </tr>
              <tr>
              	<td colspan="3"><div class="nota">
                    	*La contraseña del estudiante es generada automaticamente.                    	
                    </div></td>
              </tr>
            </table>
            </form>
    <?php
				break;
			case 'save':
			    $cont = substr(md5($_SERVER['REMOTE_ADDR'].microtime().rand(1,100000)),0,6);
			    if(isset($_POST['RegContrasena']))
					$cont = $_POST['RegContrasena'];
					
				$obj->reg_SET_Id($_POST['RegId']);
				$obj->reg_SET_Nombre($_POST['RegNombre']);
				$obj->reg_SET_Apellido($_POST['RegApellido']);
				$obj->reg_SET_Edad($_POST['RegEdad']);
				$obj->reg_SET_Usuario($_POST['RegUsuario']);
				$obj->reg_SET_Contrasena($cont);
				$obj->reg_SET_Email($_POST['RegEmail']);				
				$obj->reg_SET_Grado($_POST['RegGrado']);
				
				//$obj->_debug = 1;
				echo $obj->regSave();
			
			break;
			
			case 'delete': ?>
            	<br />
                <div align="center">
                	¿Está seguro que desea eliminar el estudiante:<br /><strong><?php echo $info['id'] ?>. <?php echo $info['nombre'] ?><?php echo " ".$info['apellido'] ?></strong>?
                </div>
                <form id="edit_form"><input type="hidden" name="RegId" value="<?php echo $info['id'] ?>" /></form>
	<?php
			break;
			
			case 'delete_total':
				$obj->reg_SET_Id($_POST['RegId']);
				
				//$obj->_debug = 1;
				echo $obj->regDelete();
			
			break;
	}
?>