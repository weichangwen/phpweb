<?php
require("system.smarty.inc.php");
require("system.class.inc.php");
$connobj=new ConnDB("mysql","localhost","root","111","db_database24");
$conn=$connobj->GetConnId();
$admindb=new AdminDB();
$seppage=new SepPage();
$smarty=new SmartyProject();
?>