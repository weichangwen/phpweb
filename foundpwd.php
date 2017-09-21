<?php
header("Content-type:text/html;charset=UTF-8");
require("system/system.in.php");
$smarty->assign('title','找回密码');
$reback = '0';
if(!isset($_GET))
?>