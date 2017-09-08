<?php
 session_start();
 header("Content-type:text/html;charset=UTF-8");
 require("system/system.inc.php");
 if(isset($_Get["page"])){
	$page = $_GET["page"];	 
}else{
	$page="";	
}
include_once("login.php");
include_once("public.php");
include_once("links.php");
switch($page){
	case "hyzx":
		include_once "member.php";
		$smarty->assign('admin_phtml', 'member.tpl');
		break;
	case 'allpub':
		include_once 'allpub.php';
		$smarty->assign('admin_phtml', 'allpub.php');
		break;
	case 'nom':
		include_once 'allnom.php';
		$smarty->assign('admin_phtml', 'allnom.tpl');
		break;
	case 'new':
		include_once 'allnew.php';
		$smarty->assign('admin_phtml', 'allnew.tpl');
		break;
	case 'hot':
		include_once 'allhot.php';
		$smarty->assign('admin_phtml', 'allhot.tpl');
		break;
	case 'shopcar':
		include_once 'myshopcar.php';
		$smarty->assign('admin_phtml', 'myshopcar.tpl');
		break;
	case 'settle':
		include_once 'settle.php';
		$smarty->assign('admin_phtml', 'settile.tpl');
		break;
	case 'queryform':
		include_once 'queryform.php';
		$smarty->assign('admin_phtml', 'queryform.tpl');
		break;
	default:
		include_once 'newhot.php';
		$smarty->assign('admin_phtml','newhot.tpl');	
}
$smarty->display("index.tpl");
?>
