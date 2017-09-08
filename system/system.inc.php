<?php
require("system.smarty.inc.php");
require("system.class.ini.php");

$connobj = new ConnDB("mysql","127.0.0.1","root","root","db_database24");
$conn = $connobj->GetConnId();
$admindb = new AdminDB();
$seppage = new SepPage();
$usefun = new UseFun();
$smarty = SmartyProject();

function unhtml($params){
	extract($params);
	$text = $content;
	global $usefun;
	return $usefun->UnHtml($text);	
	}
	$smarty->register_function("unhtml","unhtml");

?>