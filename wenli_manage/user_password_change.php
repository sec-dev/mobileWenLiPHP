<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>移动文理后台系统管理</title>
<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all">

<script language="JavaScript" src="../js/string_trim.js" type="text/javascript">
</script>

<?php
require ('../connect.php');
		@$user_name=$_POST["user_name"];
		@$user_pwd=$_POST["user_pwd"];
		@$new_user_pwd=$_POST["new_user_pwd"];
?>

<?php

		
		
		if($user_name=="" || $user_pwd==""||$new_user_pwd =="")
		{
			echo "<script language='javascript'> alert('请输入完整信息');</script>";
		}
		else
		{
	
			$insert_sql="UPDATE login SET user_pwd=? WHERE user_name=? AND user_pwd=?";
	
			$result=$sqlconn->prepare($insert_sql);
			$result->bind_param('sss',$new_user_pwd,$user_name,$user_pwd);
			
			$result->execute();
	
			$result->close();
			$sqlconn->close();
			
			//echo "<script language='javascript'> alert('修改成功');</script>";
			//echo "<script language='javascript'>window.history.back();location.href=\"./user_list.php\";</script>";
		}
?>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
<body class="ContentBody">
<form action="change_user_pwd_do.php" name="update_food_form"  method="post" >
<div class="MainDiv">
<fieldset style="height:100%;">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >修改用户密码</th>
  </tr>
  <tr>
    <td class="CPanel">
		
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
		<tr><td align="left">
		
		</td></tr>

		<tr align="center">
          <td class="TablePanel"></td>
		  </tr>
		  <tr align="center"><td></td></tr>
		<TR>
			<TD width="100%">
				<fieldset style="height:100%;">
				<legend>修改用户密码</legend>
                <table width="100%" border="0" >
  
  <tr>
    <td width="16%"><div align="right">用户名：</div></td>
    <td><input name="user_name" maxlength="20"/>
      <span class="STYLE1">*</span></td>
  </tr>
  <tr>
    <td><div align="right">原始密码：</div></td>
    <td><input type="password" name="user_pwd" maxlength="20"/>
      <span class="STYLE1">*</span></td>
  </tr>
  <tr>
    <td><div align="right">更新密码：</div></td>
    <td><input type="password" name="new_user_pwd" id="new_user_pwd" maxlength="20" />
      <span class="STYLE1">*</span></td>
  </tr>
   <tr>
    <td><div align="right">重复密码：</div></td>
    <td><input type="password" name="re_new_user_pwd" id="re_new_user_pwd" maxlength="20"" />
      <span class="STYLE1">*</span></td>
  </tr>

<script>
function checkpasswd(){
var new_user_pwd = document.getElementByIdx_x("new_user_pwd").value;
var re_new_user_pwd = document.getElementByIdx_x("re_new_user_pwd").value;
if(new_user_pwd == re_new_user_pwd){
alert('修改成功');
window.history.back();location.href='./user_list.php';
}
else{
alert('两次密码不一致');
}
}
 </script>
  
  <tr>
    <td>&nbsp;</td>
    <td><span class="STYLE1">*</span>为必填</td>
  </tr>
</table>
    </fieldset>
  
			</TD>
		</TR>
		<TR>
			<TD width="100%">
				
			</TD>
		</TR>
		<TR>
			<TD width="100%">
						
			</TD>
		</TR>
		<TR>
			<TD width="100%">
				
			</TD>
		</TR>
		</TABLE>

	 </td>
  </tr>

		<TR>
			<TD colspan="2" align="center" height="50px">
			<input type="submit" name="Submit" value="修改" class="button"> 
			</TD>
		</TR>
	</TABLE>

	 </td>
  </tr>
  
  </table>
</fieldset>
</div>
</form>
</body>
</html>
