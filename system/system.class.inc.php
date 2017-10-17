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
		$str =$contentname."&nbsp;".$record."&nbsp;".$utits."&nbsp;每页 &nbsp;".$this->pagesize."&nbsp;".$utits."&nbsp;第&nbsp;".$this->rs->AbsolutePage()."&nbsp;页/共&nbsp;".$pagecount."&nbsp;页";
		$str.="&nbsp;&nbsp;&nbsp;&nbsp;";
		if(!$this->rs->AtFirstPage())
			$str.="<a href=".$_SERVER['PHP_SELF']."?page=1&parameter1=".$anothersearchstr."&parameter2=".$anothersearchstrs." class=".$class.">首页</a>";
		else
			$str.="<font color='#555555'>首页</font>";
		$str.="&nbsp;";
		if(!$this->rs->AtFirstPage())
			$str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->rs->AbsolutePage()-1)."&parameter1=".$anothersearchstrs."&parameter2=".$anothersearchstrs." class=".$class">上一页</a>";
		else
			$str.="<font color="#555555">上一页</font>";
		$str.="&nbsp;";
		if(!$this->rs->AtFirstPage())
			$str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->rs->AbsolutePage()+1)."&parameter1=".$anothersearchstrs."&parameter2=".$anothersearchstrs." class=".$class">下一页</a>";
		else
			$str.="<font color="#555555">下一页</font>";
		$str.="&nbsp;";
		if(!$this->rs->AtFirstPage())
			$str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->rs->AbsolutePage()+1)."&parameter1=".$anothersearchstrs."&parameter2=".$anothersearchstrs." class=".$class">尾页</a>";
		else
			$str.="<font color="#555555">尾页</font>";
		if(count($this->array)==0 || $this->rs==false)
			return "";
		else
			return $str;	
	
}

//系统常用方法
class UseFun{
	function UnHtml($text){
		$content = (nl2br(htmlspecialchars($text)));
		$content = str_replace("[strong]","<strong>",$content);
		$content = str_replace("[/strong]","</strong>",$content);
		$content = str_replace("[em]","<em>",$content);
		$content = str_replace("[/em]","</em>",$content);
		$content = str_replace("[u]","<u>",$content);
		$content = str_replace("[/u]","<u>",$content);
		
		$content = str_replace("[font color=#FF0000]","<font color=#FF0000>",$content);
		$content = str_replace("[font color=#00FF00]","<font color=#00FF00>",$content);
		$content = str_replace("[font color=#0000FF]","<font color=#0000FF>",$content);
		
		$content = str_replace("[font face=楷体_GB2312]","<font face=楷体_GB2312>",$content);
		$content = str_replace("[font face=宋体]","<font face=新宋体>",$content);
		$content = str_replace("[font face=隶书]","<font face=隶书>",$content);
		$content = str_replace("[/font]","</font>",$content);
		
		$content =  str_replace("[font size=1]","<font size=1>",$content);
		$content =  str_replace("[font size=2]","<font size=2>",$content);
		$content =  str_replace("[font size=3]","<font size=3>",$content);
		$content =  str_replace("[font size=4]","<font size=4>",$content);
		$content =  str_replace("[font size=5]","<font size=5>",$content);
		$content =  str_replace("[font size=6]","<font size=6>",$content);
	
		$content = str_replace("[FIELDSET][LEGEND]","<FIELDSET><LEGEND>",$content);
		$content = str_replace("[/LEGEND]","</LEGEND>",$content);
		$content = str_replace("[/FIELDSET]","</FIELDSET>",$content);
		
		return $content;		
	}
}
?>