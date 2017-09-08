<?php
	session_start();
	header("Content-type:text/html;charset=UTF-8;");
	require("system/system.inc.php");
	$reback='0';
	$sql = "select * from tb_user where name='".$_GET['user']"'";
	

?>