<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/9/29
 * Time: 14:59
 */
    session_start();
    header("Content-type:text/html;charset=UTF-8");
    session_destroy();
    echo  '<script>alert(\'用户已安全退出！\');location=(\'index.php\');</script>';

?>