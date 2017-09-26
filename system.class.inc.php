<?php
//数据路链接类
class ConnDB{
	var $dbtype;
	var $host;
	var $user;
	var $pwd;
	var $dbname;
	//构造方法
	function ConnDB($dbtype,$host,$user,$pwd,$dbname){
		$this->dbtype = $dbname;
		$this->host = $host;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->dbname = $dbname;
		
	}
	//实现数据库的链接并返回链接对象
	function GetConnId(){
		if($this->dbtype=="mysql" || $this->dbtype == "mssql"){
			$dsn = "$this->dbtype:host=$this->host;dbname=$this->dbname";	
		}else{
			$dsn="$this->dbtype:dbname=$this->dbname";			
		}
		try{
			$conn = new PDO($dsn, $this->user, $this->pwd);
			//初始化一个PDO对象,就是创建了数据库链接对象$pdo
			$conn->query("set names utf8");
			return $conn;
		}catch(PDOException $e){
			die("Error!:".$e->getMessage()."<br/>");			
		}
		
	}
	
}
//数据库管理类
class AdminDB{
	function ExecSQL($sqlstr,$conn){
		$sqltype=strtolower(substr(trim($sqlstr),0,6));
		$rs=$conn->prepare($sqlstr);                   //准备查询语句
		$rs->execute();
		if($sqltype=="select"){
			$array=$rs->fetchAll(PDO::FETCH_ASSOC);    //获取结果集所有数据
			if(count($array)==0||$rs==false){
				return false;	
			}
			else{
				return $array;	
			}
		}
		else if($sqltype=="update"||$sqltype=="insert"||$sqltype=="delete"){
			if($rs)	
				return true;
			else 
				return false;
		}
	}	
}
//分页类
class SepPage{
	var $rs;
	var $pagesize;
	var $nowpage;
	var $array;
	var $conn;
	var $sqlstr;
	function ShowData($sqlstr,$conn,$pagesize,$nowpage){
		if(!isset($nowpage)||$nowpage=="")
			$this->nowpage = 1;
		else
			$this->nowpage = $nowpage;
		$this->pagesize = $pagesize;
		$this-$conn = $conn;
		$this->sqlstr = $sqlstr;
		$this->rs = $this->$conn->PageExecute($this->sqlstr,$this->pagesize,$nowpage);
		@$this->array = $this->rs->GetRows();           //获取记录数
			if(count($this->array)==0||$this->rs==false)
				return false;
			else
				return $this->array;
		
	}
	
	function ShowPage($contentname,$utits,$anothersearchstr,$anothersearchstrs,$class){
		$allrs = $this->conn->Execute($this->sqlstr);
		$record = count($allrs->GetRows());
		$pagecount=ceil($record/$this->pagesize);
		$str.=$contentname."&nbsp;".$record."&nbsp;".$utits."&nbsp;每页 &nbsp;".$this->pagesize."&nbsp;".$utits."&nbsp;第&nbsp;".$this->rs->AbsolutePage()."&nbsp;页/共&nbsp;".$pagecount."&nbsp;页";
		$str.="&nbsp;&nbsp;&nbsp;&nbsp;";
		/*if(!$this->rs->AtFirstPage())
			$str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->rs->AbsolutePage()-1)."&parameter1=".$anothersearchstrs."class=".$class.">首页</a>";
		else
			$str.="<font color='#555555'>首页</font>";
		$str.="&nbsp;";
		if(!$this->rs->AtFirstPage())*/
		if($this->nowpage != 1){
            $str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->nowpage+1)."&page_type=1&page_type=".$anothersearchstr."&parameter2=".$anothersearchstrs." class=".$class.">首页</a>";
        }
        else
             $str.="<font color='#555555'>首页</font>";
        $str.="&nbsp";
        if($this->nowpage!=1)
            $str.="<a href=""></a>";
		
		
	}
	
	
}
?>