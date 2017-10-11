<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/10/11
 * Time: 10:42
 */
session_start();
header("Content-type:text/html;charset=UTF-8");
require("system/system.inc.php");
$fst = $_GET['fst'];
$snd = $_GET['uid'];
$smarty->assign('title','收银台');
$smarty->assign('fst',$fst);
$smarty->assign('snd',$snd);
$smarty->assign('uid',$uid);
$smarty->display('settle.tpl');
?>