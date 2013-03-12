<?php
	//session_unset(); 
	//session_destroy();
	// Database
	require_once("../includes/conect.php");
		
	// Global functions
	require_once("../includes/global.php");
	
	// Classes
	require_once("../classes/class.all.php");	
	$obj = new All();

	if(isset($_SESSION['intentos']))
		$_SESSION['intentos']++;
	else
		$_SESSION['intentos'] = 1;
	
	if(isset($_POST['f_user'])){
		//$usuario 	= $obj->CNF_get('admin_usuario');
		//$clave 		= $obj->CNF_get('admin_clave');

		$result = $obj->exist_user($_POST['f_user'], $_POST['f_pass']);
		
		/*if($_POST['f_user']==$usuario and $_POST['f_pass']==$clave)
			$_SESSION['admin'] = 1;
		else{
			if(isset($_SESSION['intentos']))
				$_SESSION['intentos']++;
			else
				$_SESSION['intentos'] = 1;
			$error = 'Los datos de Acceso son Inv&aacute;lidos.';
		}*/
		 
		if($result != "")
			$_SESSION['admin'] = 1;
		else{
			if(isset($_SESSION['intentos']))
				$_SESSION['intentos']++;
			else
				$_SESSION['intentos'] = 1;

			$error = 'Los datos de Acceso son Inv&aacute;lidos.';
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reina Colombia - Administrador</title>
<link href="./css/admin_style.css" rel="stylesheet" type="text/css" media="screen" />
<?php /* jQuery & jQuery UI */?>
<script type="text/javascript" src="../js/jquery/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="../js/jquery/jquery-ui-1.8.16.custom.min.js"></script>
<link href="../css/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" media="screen" />
<?php  // Html Box 4.0 (Rich Text Editor) http://remiya.com/htmlbox/index.php/6/download/latest-version.html ?>
<script language="Javascript" src="../js/htmlbox/htmlbox.colors.js" type="text/javascript"></script>
<script language="Javascript" src="../js/htmlbox/htmlbox.styles.js" type="text/javascript"></script>
<script language="Javascript" src="../js/htmlbox/htmlbox.syntax.js" type="text/javascript"></script>
<script language="Javascript" src="../js/htmlbox/xhtml.js" type="text/javascript"></script>
<script language="Javascript" src="../js/htmlbox/htmlbox.min.js" type="text/javascript"></script>
<?php /* Ajax File upload Doc http://www.phpletter.com/Our-Projects/AjaxFileUpload/ */?>
<script type="text/javascript" src="../js/jquery/ajaxfileupload.js"></script>

<script type="text/javascript">
	$(function(){
		$("#main_menu ul li").click(function(){			
			value = $(this).attr('id');
			$("#main_menu ul li").removeClass('selected');
			$("#"+value).addClass('selected');
			
			loadContent(value);
		});
		
		loadContent('news');
	})
	
	function loadContent(file_name){
		$.ajax({
			url: './ajax/'+file_name+'.php',
			beforeSend: function( xhr ) {
				$("#contenido_ajax").html('<div style="margin:20px; text-align:center"><img src="../images/loading58.gif" align="absmiddle" /></div>');
			},
			success: function( data ) {
				$("#contenido_ajax").html(data);
			}
		});
	}
	
	function form_reload(mod){
		$.ajax({
			type: "POST",
			url: './ajax/'+mod+'.php?op=reload',
			data: $("#search_form").serialize(),
			beforeSend: function( xhr ) {
				$(".tabla_principal").animate({  opacity: 0.25 });
			},
			success: function( data ) {
				$(".tabla_principal").animate({  opacity: 1 });
				$(".tabla_principal").html(data);
			}
		});
	}
	
	function form_view(mod, id){
		$('#dialog').attr('title','Ver');
		$('#dialog').html('<img src="../images/loading58.gif" align="absmiddle" />');
		$('#dialog').load('./ajax/'+mod+'.php?op=view&id='+id);
		$("#dialog").dialog({
			bgiframe: true,
			autoOpen: true,
			height: 600,
			width: 700,
			modal: true,
			close:  function() { $("#dialog").dialog('destroy') },
			buttons: {
				'Salir': function() {
					$("#dialog").dialog('destroy');
				}
			}
		});
	}
	
	function form_edit(mod, id){
		$('#dialog').attr('title','Agregar / Editar');
		$('#dialog').html('<img src="../images/loading58.gif" align="absmiddle" />');
		$('#dialog').load('./ajax/'+mod+'.php?op=edit&id='+id);
		$("#dialog").dialog({
			bgiframe: true,
			autoOpen: true,
			height: 600,
			width: 700,
			modal: true,
			close:  function() { $("#dialog").dialog('destroy') },
			buttons: {
				'Guardar': function() {
					switch(mod){
						case 'news':
							item_save(mod, 'NewsPic');
							break;
						
						case 'publicidad':							
							item_save(mod, 'PublicPic');
							break;

						case 'magazine':							
							item_save(mod, 'MagazinePic');
							break;
						
						default:
							item_save(mod, '');
							break;
					}
					
				},
				'Salir': function() {
					$("#dialog").dialog('destroy');
				}
			}
		});
	}
	
	function item_save(mod, idElementAjaxUpload){		
		$.ajax({
			type: "POST",
			url: './ajax/'+mod+'.php?op=save',
			data: $("#edit_form").serialize(),
			beforeSend: function( xhr ) {
				$(".edit_form").animate({  opacity: 0.25 });
			},
			success: function( data ) {				
				if(idElementAjaxUpload.length > 0){
					if(idElementAjaxUpload == 'PublicPic'){
						idElementAjaxUpload = $("#type-banner").val();												
						ajaxFileUpload(mod, idElementAjaxUpload);
					}else{						
						ajaxFileUpload(mod, idElementAjaxUpload);
					}					
				}else{
					//alert("Cambios Guardados."+data);
					$("#dialog").dialog('destroy');
					form_reload(mod);
				}
			}
		});
	}
	
	function ajaxFileUpload(mod, idElementAjaxUpload)
	{
		//alert(mod+' '+idElementAjaxUpload);
		$.ajaxFileUpload
		(
			{
				url:'./ajax/'+mod+'.php?op=save_image',
				secureuri:false,
				fileElementId:idElementAjaxUpload,
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status){
					if(typeof(data.error) != 'undefined'){
						if(data.error != ''){
							alert(data.error);
						}else{
							$("#dialog").dialog('destroy');
							form_reload(mod);
						}
					}
				},
				error: function (data, status, e){
					alert(e);
				}
			}
		)
		
		return false;

	}
	
	function item_delete(mod){
		$.ajax({
			type: "POST",
			url: './ajax/'+mod+'.php?op=delete_total',
			data: $("#edit_form").serialize(),
			beforeSend: function( xhr ) {
				$(".edit_form").animate({  opacity: 0.25 });
			},
			success: function( data ) {
				//alert("Elemento Eliminado."+data);
				$("#dialog").dialog('destroy');
				form_reload(mod);
			}
		});
	}
	
	function form_delete(mod, id){
		$('#dialog').attr('title','Eliminar');
		$('#dialog').html('<img src="../images/loading58.gif" align="absmiddle" />');
		$('#dialog').load('./ajax/'+mod+'.php?op=delete&id='+id);
		$("#dialog").dialog({
			bgiframe: true,
			autoOpen: true,
			height: 200,
			width: 300,
			modal: true,
			close:  function() { $("#dialog").dialog('destroy') },
			buttons: {
				'Eliminar': function() {
					item_delete(mod);
				},
				'Salir': function() {
					$("#dialog").dialog('destroy');
				}
			}
		});
	}
</script>
</head>

<body>
    <div id="header">
        <img src="../images/logo-a.png" />
        <div style="float:right">
        	<?php if(isset($_SESSION['admin'])){ ?>
            	<strong><a href="../logout.php"><img src="images/icn_exit.png" align="absmiddle" /> Cerrar Sesi&oacute;n</a></strong>
            <?php } ?>
            <img src="../images/logo3.png" align="absmiddle" />
        </div>
	</div>
	<div id="content">
    	<?php if(!isset($_SESSION['admin'])){ ?>
        	<?php if(isset($error)){ ?>
            	<div class="msj_error">Datos incorrectos, tiene <strong><?php echo (15-$_SESSION['intentos']) ?></strong> intentos disponibles.</div>
            <?php }else{ ?>
        		<div class="msj_alert">Debe ingresar como administrador.</div>
            <?php } ?>
            <div class=" ui-widget-content ui-corner-all" style="width:250px; margin:20px 0 20px 370px; padding:5px">
            	<?php   	
            	 
            	if($_SESSION['intentos'] >= 15){ ?>
                	<div class="msj_error">H&aacute; superado el m&aacute;ximo de intentos disponibles, para volver a intentarlo debe esperar 1 hora.</div>
                <?php }else{ ?>
            	<form method="post">
                	<table border="0" cellpadding="2" cellspacing="3">
                      <tr>
                        <td>Usuario:</td>
                        <td><input type="text" name="f_user" /></td>
                      </tr>
                      <tr>
                        <td>Clave:</td>
                        <td><input type="password" name="f_pass" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>
                        	<input type="submit" name="ok" value="Ingresar" />
                        </td>
                      </tr>
                    </table>
              </form>
              <?php } ?>
            </div>
        <?php }else{ ?>
    	<div id="main_menu">
            <ul>
                <li class="selected" id="news"><img src="images/icn_book.png" width="64" height="64" /><br />
              	<h2>Noticias</h2></li>
              	<li id="publicidad"><img src="images/advertising-ebooks-authors.jpg" width="64" height="64" /><br />
              	<h2>Publicidad</h2></li>
                <li id="magazine"><img src="images/magazine.jpg" width="64" height="64" /><br />
            	<h2>Magazine</h2></li>                
            </ul>
            <div class="clear"></div>
        </div>
		<div id="contenido_ajax">
        <h1>Content Here!</h1>
        </div>
        <?php } ?>
      <div class="clear"></div>
	</div>
    
    <div id="footer">
    	<div class="container">
        	&copy; Copirigth Reina de Colombia 2013 - Todos los derechos reservados
        </div>
    </div>
</body>
<div id="dialog"></div>
</html>