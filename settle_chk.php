<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/10/11
 * Time: 14:00
 */
header("Content-type:text/html;charset=UTF-8");
require("system/system.inc.php");
$sql = "insert into tb_form(formid,commo_id,commo_name,commo_num,agoprice,fold,total,vendee,taker,address,tel,code,pay_method,del_method,formtime,state)values(";
$formid = time();
$tmpid = explode(',',$_POST['fst']);
$tmpnm = explode(',',$_POST['snd']);
$number = count($tmpid);
$tmpna = array();
$tmpvp = array();
$tmpfd = array();
$tmptt = 0;
if($number >1){
    for($i=0;$i<$number;$i++){
        $tmpsql = "select name,v_price,fold from tb_commo where id = '".$tmpid[$i]."'";
        $tmprst = $admindb->ExecSQL($tmpsql,$conn);
        $tmpna[$i] = $tmprst[0]['name'];
        $tmpvp[$i] = $tmprst[0]['v_price'];
        $tmpfd[$i] = $tmprst[0]['fold'];
        $tmptt += $tmprst[0]['v_price']*$tmpnm[$i];
        @$tmpsell = $tmprst[0]['sell'] + 1;
        $addsql = "update tb_commo set sell = '".$tmpsell."' where id = '".$tmpid[$i]."'";
        $addrst = $admindb->ExecSQL($addsql,$conn);
    }
    $sql .= "'".$formid."','".$_POST['fst']."', '".implode(',',$tmpna)."','".$_POST['snd']."','".implode(',',$tmpvp)."','".implode(',',$tmpfd)."'";
}


?>