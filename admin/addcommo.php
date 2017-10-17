<?php
header("Content-type:text/html;charset=UTF-8");
require("system/system.inc.php");
$smarty->assign('title','商品添加');
$smarty->assign('date',date("Y-m-d"));
$smarty->display("addcommo.tpl");
?>