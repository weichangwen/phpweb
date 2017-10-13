<?php
header("Content-type:text/html;charset=UTF-8");
require("system/system.inc.php");
$sql = "select * from tb_admin";
$man = $admindb->ExecSQL($sql, $conn);
$smarty->assign('arr',$man);
$smarty->assign('title','管理员管理');
$smarty->display('admin.tpl');
?>