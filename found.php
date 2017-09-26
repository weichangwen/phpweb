<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/9/26
 * Time: 11:03
 */
header("Content-type:text/html;charset=UTF-8");
require("system/system.inc.php");
$smarty->assign("title","找回密码");
$smarty->display('found.tpl');

?>