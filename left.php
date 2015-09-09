
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>移动文理后台系统管理</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(images/letf.gif);
	background-color: #BDE8FB;
}
-->
</style>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<SCRIPT language=JavaScript>
function tupian(idt){
    var nametu="xiaotu"+idt;
    var tp = document.getElementById(nametu);
    tp.src="images/ico05.gif";//图片ico04为白色的正方形
	
	for(var i=0;i<35;i++)
	{
	  
	  var nametu2="xiaotu"+i;
	  if(i!=idt*1)
	  {
	    var tp2=document.getElementById('xiaotu'+i);
		if(tp2!=undefined)
	    {tp2.src="images/ico06.gif";}//图片ico06为蓝色的正方形
	  }
	}
}

function list(idstr){
	var name1="subtree"+idstr;
	var name2="img"+idstr;
	var objectobj=document.all(name1);
	var imgobj=document.all(name2);
	
	
	//alert(imgobj);
	
	if(objectobj.style.display=="none"){
		for(i=1;i<20;i++){
			var name3="img"+i;
			var name="subtree"+i;
			var o=document.all(name);
			if(o!=undefined){
				o.style.display="none";
				var image=document.all(name3);
				//alert(image);
				image.src="images/ico04.gif";
			}
		}
		objectobj.style.display="";
		imgobj.src="images/ico03.gif";
	}
	else{
		objectobj.style.display="none";
		imgobj.src="images/ico04.gif";
	}
}

</SCRIPT>

<body>
<table width="198" border="0" cellpadding="0" cellspacing="0" class="left-table01" >
  <tr>
    <TD>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="207" height="55" >
				<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="25%" rowspan="2"><img src="images/ico02.gif" width="35" height="35" /></td>
					<td width="75%" height="22" class="left-font01">您好,<span class="left-font02">管理员</span></td>
				  </tr>
				  <tr>
					<td height="22" class="left-font01">
						<li><a href="login_out.php">退出</a></td></li>
				  </tr>
				</table>
			</td>
		  </tr>
		</table>
		


		<!--  动态管理开始    -->
	<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img1" id="img1" src="images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('1');" >动态管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
    </TABLE>
	<table id="subtree1" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu0" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="wenli_manage/dynamic_show.php" target="mainFrame" class="left-font03" onClick="tupian('0');">动态查询</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu1" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="wenli_manage/dynamic_insert.php" target="mainFrame" class="left-font03" onClick="tupian('1');">动态添加</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu1" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="wenli_manage/top_dynamic_show.php" target="mainFrame" class="left-font03" onClick="tupian('1');">滑动动态查询</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu1" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="wenli_manage/top_dynamic_insert.php" target="mainFrame" class="left-font03" onClick="tupian('1');">滑动动态添加</a></td>
				</tr>
				
    </table>
		<!--  动态管理结束    -->

		

		
  
	   
	  <!--  密码管理开始    -->
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29"><table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="8%" height="12"><img name="img8" id="img8" src="images/ico04.gif" width="8" height="11" /></td>
                  <td width="92%"><a href="javascript:" target="mainFrame" class="left-font03" onClick="list('8');" >密码管理</a></td>
                </tr>
            </table></td>
          </tr>
      </table>
	  
	  <table id="subtree8" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
        <tr>
          <td width="9%" height="28" ><img id="xiaotu28" src="images/ico06.gif" width="8" height="12" /></td>
		  <td width="91%"><a href="wenli_manage/user_password_change.php" target="mainFrame" class="left-font03" onClick="tupian('1');">密码修改</a></td>
        </tr>
		
      </table>
	
	  <!--  密码管理结束    -->

	  	<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img15" id="img15" src="images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('15');" >用户管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
    </TABLE>
	<table id="subtree15" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu0" src="images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="wenli_manage/user_list_show.php" target="mainFrame" class="left-font03" onClick="tupian('0');">用户查询</a></td>
				</tr>
      </table>

    </TD>
  </tr>
  
</table>
</body>
</html>
