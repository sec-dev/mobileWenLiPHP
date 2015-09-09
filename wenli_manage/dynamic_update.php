<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>移动文理后台系统管理</title>
<link rel="stylesheet" rev="stylesheet" href="../css/style.css" type="text/css" media="all">

<script  language="JavaScript" src="../js/string_trim.js" type="text/javascript">
</script>

<?php
require ('../connect.php');
@$id=$_GET["id"];
?>
<?php
		@$dy_name=$_POST["dy_name"];
		@$dy_in=$_POST["dy_in"];
		@$dy=$_POST["dy"];
		@$dy_w=$_POST["dy_w"];
		

	
	
		if($dy_name=="" || $dy_in=="" || $dy== "" ||$dy_w== "")
		{
			echo "<script language='javascript'> alert('请输入完整信息');</script>";
		}
		else
		{
	
			$insert_sql="UPDATE food SET dy_name=?,dy_in=?,dy=?,dy_w=? WHERE id=?";
	
			$result=$sqlconn->prepare($insert_sql);
	
	
	
			$result->bind_param('ssssi',$dy_name,$dy_in,$dy,$dy_w,$id);
			
			$result->execute();
	
			$result->close();
			$sqlconn->close();
			
			echo "<script language='javascript'> alert('修改成功');	window.history.back();location.href=\"./mypage.php\";</script>";
		}
	
	
?>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
<body class="ContentBody">
<form action="update_dynamic_do.php?id=<?php echo$id;?>" name="update_dynamic_form"  method="post" >
<div class="MainDiv">
<fieldset style="height:100%;">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >修改校园动态信息</th>
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
				<legend>动态信息</legend>
                <table width="100%" border="0" >
  
  <tr>
    <td width="16%"><div align="right">动态名称</div></td>
    <td><input name="dy_name" maxlength="20"  />
      <span class="STYLE1">*</span></td>
  </tr>
  <tr>
    <td><div align="right">动态简介</div></td>
    <td><input name="dy_in"   maxlength="20"/>
      <span class="STYLE1">*</span></td>
  </tr>
  <tr>
    <td><div align="right">内容</div></td>
	<input name="file" type="file">
    <td><textarea name="dy" rows="3"   length="50"></textarea>
      <span class="STYLE1">*</span></td>
  </tr>
  <tr>
    <td><div align="right">作者</div></td>
    <td><input name="dy_w"  maxlength="20" />
      <span class="STYLE1">*</span></td>
  </tr>
  
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
			<input type="submit" name="Submit" value="添加" class="button"> 
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
