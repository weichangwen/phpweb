<link  rel="stylesheet" href="css/member.css"/>
<script language="JavaScript" src="js/member.js"></script>
{if $check=="find"}
<p align="left">{$smarty.session.member}&gt;&gt;&gt;<a href='?page_type=hyzx' id="mem">查看信息</a>&gt;&gt;&gt;</p>
<table id="member" width="300" border="0" cellpadding="0" cellspacing="0">
<form id="member" name="member" method="post" action="modify_pwd_chk.php" onsubmit="return pwd(member)">
    <tr>
        <td height="25" colspan="2" align="center" valign="middle" id="first">
            <font color="#f0f0f0"></font>
        </td>
    </tr>
</form>
</table>