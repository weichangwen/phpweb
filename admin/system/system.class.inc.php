<?php
//数据库链接类
class ConnDB{
    var $dbtype;
    var $host;
    var $user;
    var $pwd;
    var $dbname;

    /*构造方法*/
    function ConnDB($dbtype,$host,$user,$pwd,$dbname){
        $this->dbtype=$dbtype;
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->dbname = $dbname;
    }

    /*实现数据库的链接并返回链接对象*/
    function GetConnId(){
        if($this->dbtype == "mysql" || $this->dbtype=="mssql"){
            $dsn="$this->dbtype:host=$this->host;dbname=$this->dbname";
        }else{
            $dsn = "$this->dbtype:dbname=$this->dbname";
        }
        try{
            $conn = new PDO($dsn,$this->user,$this->pwd);
            $conn->query("set names utf8");
            return $conn;
        }catch(PDOException $e){
            die("Error!:".$e.getMessage()."<br/>");
        }
    }
}

/*数据库管理类*/
class AdminDB{
    function ExecSQL($sqlstr,$conn){

    }
}
?>