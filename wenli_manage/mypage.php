<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>食品追溯管理</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tabfont01 {	
	font-family: "宋体";
	font-size: 9px;
	color: #555555;
	text-decoration: none;
	text-align: center;
}
.font051 {font-family: "宋体";
	font-size: 12px;
	color: #333333;
	text-decoration: none;
	line-height: 20px;
}
.font201 {font-family: "宋体";
	font-size: 12px;
	color: #FF0000;
	text-decoration: none;
}
.button {
	font-family: "宋体";
	font-size: 14px;
	height: 37px;
}
html { overflow-x: auto; overflow-y: auto; border:0;} 
-->
</style>

<link href="../css/css.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

</script>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<?php
require ('../connect.php');
?>
<?php
	$default_psize=10;
	$page_size=$default_psize; //页大小
	$baserow=0;		//记录偏移
	$page_no=0;		//当前页号码
	$row_no=1;
	
	$total_count=0;
	$page_count=0;

	//-----获取传递过来的页大小--------------------------------
	
	if( isset($_GET["page_size"]) && $_GET["page_size"]!="")
	{
    	$page_size=$_GET['page_size'];
	}
	else
	{
		$page_size=$default_psize;
	}
	//-----获取传递过来的页号-------------------------------
	if( isset($_GET["page_no"]) && $_GET["page_no"]!="")
	{
    	$page_no=$_GET['page_no'];
	}
	else
	{
		$page_no=0;
	}
	
	
	
	//------------计算当期页号、总页号、基编号、偏移量---------------------
	$offset=$page_size;
	
	if(!is_numeric($page_no))//不是数字的话，默认为1
	{
		$page_no=1;
		$baserow=0;
	}
	
	//获取总记录数
	$sqlconn=new mysqli($db_host.':'.$db_port,$db_user,$db_psw,$db_name);
	$q="set names utf8;";
	$r=$sqlconn->query($q);//设置字符集
	
	$query_sql="select count(*) from food"; //有查询条件的话，将条件加入
	$result=$sqlconn->prepare($query_sql); //预处理

	$result->execute();
	$result->bind_result($total_count); //绑定结果
	
	
	if(!$result->fetch())//没有记录
	{
		$total_count=0;
	}
	$result->close();
	
	$page_result=array();
	if($total_count>0)
	{
	
		$page_count=(int)(($total_count+$page_size-1)/$page_size);
				
				
		if($page_count<1)
		{
			$page_count=1;
		}
		
		if($page_no>$page_count)
		{
			$page_no=$page_count;
		}
					
		$baserow=$page_no*$page_size;
		
		
		$row_no=$page_no*$page_size+1;//每页起始行号

?>


<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">

      
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="62" background="../images/nav04.gif">
	  
	  <table width="100%" border="0" align="center" >
  <tr>
    <td width="5%"><img src="../images/ico07.gif" width="20" height="18" align="right"></td>
    <td width="3%"><div align="right"></div></td>
    <td width="15%">&nbsp;</td>
    <td width="5%"><div align="right"></div></td>
    <td width="18%">&nbsp;</td>
	<form action="select_food_do.php" method="get">
	动态名称: <input type="text" name="dy_name" />
	<input type="submit" />
	</form>
  </tr>
</table>
	  
	  </td>
	  </tr>
	  </table>
    </td>
  </tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="20">&nbsp;</td>
          </tr>
          <tr>
            <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">
              <tr>
                <td height="20" colspan="8" align="center" bgcolor="#EEEEEE"class="tablestyle_title"> 动态列表，共<?php echo $total_count ?>条</td>
              </tr>
              <tr style="background-color:#D3DCE3">
      
      <td width="4%" align="center" valign="middle" bgcolor="#EEEEEE" >编号</td>
      <td width="9%" align="center" valign="middle" bgcolor="#EEEEEE" >动态名称</td>
      <td width="10%" align="center" valign="middle" bgcolor="#EEEEEE" >动态简介</td>
      <td width="28%" align="center" valign="middle" bgcolor="#EEEEEE" >动态内容</td>
      <td width="26%" align="center" valign="middle" bgcolor="#EEEEEE" >动态作者</td>
      <td colspan="2" align="center" valign="middle" bgcolor="#EEEEEE" >操作</td>
      </tr>
	<?php
		
		$query_sql="select id,dy_name,dy_in,dy,dy_w from food limit $baserow,$offset";
		$result=$sqlconn->prepare($query_sql); //预处理
		$result->execute();
		$result->bind_result($id,$dy_name,$dy_in,$dy,$dy_w); //绑定结果
		
		while($result->fetch())
		{
	
	?>
    <tr>
		<td  height="25" align="center" valign="middle" bgcolor="#FFFFFF" ><?php echo $row_no ?></td>
		<td align="center" valign="middle" bgcolor="#FFFFFF" ><?php echo $dy_name ?></td>
		<td align="center" valign="middle" bgcolor="#FFFFFF" ><?php echo $dy_in ?></td>
		<td align="center" valign="middle" bgcolor="#FFFFFF" ><?php echo $dy ?></td>
		<td align="center" valign="middle" bgcolor="#FFFFFF" ><?php echo $dy_w ?></td>
		<td bgcolor="#FFFFFF"><button name="update" value="update" width="11%" align="center" valign="middle" onclick="location.href='update_dynamic_do.php?id=<?php echo$id;?>'">修改</button></td>
		<td bgcolor="#FFFFFF"><button name="delete" value="delete" width="11%" align="center" valign="middle" onclick="location.href='delete_dynamic_do.php?id=<?php echo$id;?>'">删除</button></td>
    </tr>
	
	<?php
		$row_no++;
			
		}
		$result->close();
	}
	//关闭连接
	$sqlconn->close();
	$ret_code=0;
	
	?>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="6"><img src="../images/spacer.gif" width="1" height="1"></td>
          </tr>
          <tr>
            <td height="33"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="right-font08">
                <tr>
                  <td width="50%"><?php if($total_count>0){?>
                    共 <span class="right-text09"><?php echo $page_count ?></span> 页 | 第 <span class="right-text09"><?php echo $page_no+1 ?></span> 页
                    <?php }else{ ?>
                    0条结果
                    <?php } ?>
                  </td>
                  <td width="49%" align="right">[<?php if($page_no>0) { ?>
        <a href="?page_no=0">首页</a>
        <?php } ?>|
                      <?php if($page_no>0) { ?><a href="?page_no=<?php echo $page_no-1 ?>">上一页</a>
                      <?php } ?>
                    |
                    <?php if($page_no<$page_count-1){?> <a href="?page_no=<?php echo $page_no+1 ?>">下一页</a>
                    <?php } ?>
                    |
                    <?php if($page_no<$page_count-1){?>
                    <a href="?page_no=<?php echo $page_count-1 ?>">尾页</a>
                    <?php } ?>
                    ] </td>
                  <td width="1%"><table width="20" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="87%">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
