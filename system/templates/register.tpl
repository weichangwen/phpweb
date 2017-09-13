<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>{$title}</title>
<link rel="stylesheet" href="css/reg.css" />

</head>

<script language="javascript" src="js/createxmlhttp.js"></script>
<script language="javascript" src="js/check.js"></script>
<body onload="javascript:register.name.focus()">
<table widht="500" border="0" align="center" cellpadding="0" cellspacing="0">
	<form id="register" name="register" action="reg_chk.php" method="post" onsubmit="return chkinput(this)">
    	<tr>
        	<td colspan="5" align="center" valign="middle"><h2>新用户注册</h2></td>
        </tr>
        <tr>
        	<td width="95" height="25"><div align="right">用户名: </div></td>
            <td height="25" colspan="3">&nbsp;
            	<input  id="name" name="name" type="text" onblur="javascript:chkname(register)" onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#e8f4ff'"/><input id="c_name" name="c_name" type="hidden" value="not">&nbsp;<font color="red">*</font></td>
            </td>
            <td height="25"><div id="name1"><font color="#999999">请输入用户名</font></div></td>
        </tr>
        
        <tr>
        	<td height="25"><div align="right">注册密码: </div></td>
            <td height="25" colspan="3">&nbsp;
            	<input id="pwd1" name="pwd1" type="password" onblur="javascript:chkpwd1(register)" onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#e8f4ff'"/>&nbsp;<font color="red">*</font></td>
            <td width="183"><div id="pwd1"><font color="#999999">请输入密码</font></div></td>
        </tr>
        
        
        <tr>
        	<td height="25"><div align="right">确认密码: </div></td>
            <td height="25" colspan="3">&nbsp;
            	<input  id="pwd2" name="pwd2" type="password" onblur="javascript:chkpwd2(register)" onmousemove="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#e8f4ff'"/>&nbsp;<font color="red">*</font></td>
            <td height="25"><div id="pwd2"><font color="#999999">确认密码</font></div></td>
        </tr>
        
        <tr>
        	<td height="25"><div align="right">密保问题: </div></td>
            <td height="25" colspan="3">&nbsp;
            	<input id="answer" name="answer" type="text" onblur="javascript:chkanswer(register)" onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#e8f4ff'" />$nbsp;<font color="#999999">*</font></td>
            <td height="25"><div id="answer1"><font color="#999999">请填写密码保护答案</font></div></td>
        </tr>
        
        <tr>
        	<td height="25"><div align="right">真实姓名: </div></td>
            <td height="25" colspan="3">&nbsp;
            	<input id="realname" name="realname" type="text" onblur="javascript:chkrealname(register)" onmouseover="this.style.backgroundColor='ffffff'" onmouseout="this.style.backgroundColor='#e8f4ff'"/>&nbsp;<font color="red">*</font></td>
            <td height="25"><div id="realname1"><font color="#999999">请填写真实姓名</font></div></td>
        </tr>
        
        <tr>
        	<td height="25"><div align="right">身份证号: </div></td>
            <td>
            	<input id="card" name="card" type="text" maxlength="18" onblur="javascript:chkcarc(register)" onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#e8f4ff'"/>&nbsp;
            <font color="red">*</font></td>
            <td height="25"><div id="card1"><font color='#999999'>请输入准确的身份证帐号</font></div></td>
        </tr>
        
        <tr>
        	<td height="25"><div align="right">移动电话: </div></td>
            <td height="25" colspan="3">&nbsp;
            	<input  id="tel" type="text" name="tel" onblur="javascript:chktel(register)" onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#e8f4ff'" />&nbsp;<font color="red">*</font></td>
             <td height="25"><div id="tel1"><font color="#999999">请输入移动电话</font></div></td>
        </tr>
    </form>
</table>