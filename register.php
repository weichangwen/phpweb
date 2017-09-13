<?php
header("Content-type:text/thml;charset=UTF-8");
require("system/system.inc.php");
$smarty->assign('title','新用户注册');
$smarty->display('register.tpl');
?>