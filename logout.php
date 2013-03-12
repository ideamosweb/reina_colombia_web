<?php
	include('./includes/global.php');
	include('./includes/conect.php');
	
	session_destroy();
	
	header("location: ./index.php");