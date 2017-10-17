<?php
require("libs/Smarty.class.php");
class SmartyProject extends Smarty{
    function SmartyProject(){
        $this->template_dir="./system/templates";
        $this->compile_dir = "./system/templates_c/";
        $this->config_dir = "./system/config/";
        $this->cache_dir = "./system/cache";
    }
}
?>