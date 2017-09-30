<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/9/30
 * Time: 16:52
 */
session_start();
header("Content-type:text/html;charset=UTF-8");
require("system/system.inc.php");
/**
 *  1表示添加成功
 *  2表示用户没有登录
 *  3表示商品已添加过
 *  4表示添加时出现错误
 *  5表示没有商品添加
 */
$reback = '0';

?>