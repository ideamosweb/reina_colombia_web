<?php 
	// Database
	require('../includes/conect.php');
	// Global functions
	require('../includes/global.php');
	
	// Classes
	require('../classes/class.all.php');
	
	$obj = new All();
	
	$id = 0;
	if(isset($_GET['id']))
		$id = intval($_GET['id']);
	
	$obj->ntc_SET_Id($id);
	$info = $obj->ntcGetAll();
	
	if(!$info)
		header('location:news.php');
	
	$info = $info[$id];
	if($info['NtcImg'])
		$scr = "images/noticias/".$info['NtcId'].".jpg";
	else
		$scr = "images/news_ico.png"; ?>
        
    <h1><?php echo $info['NtcTitulo'] ?></h1>
    <h3><?php echo $info['NtcSubtitulo'] ?></h3>
      <img class="img-principal" src="<?php echo $scr ?>" title="<?php echo $info['NtcTitulo'] ?>" />
      <p><?php echo $info['NtcTexto'] ?></p>
    <div class="clear"></div>