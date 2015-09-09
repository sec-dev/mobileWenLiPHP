<?php
session_start();
if ((!isset($_SESSION['user_name'])) || (!isset($_SESSION['zs_login_rest']))){
	echo "<script>location.href='/MobileWenLi-AdminSystem/login.php';</script>";
	exit();
}else{
	if (($_SESSION['user_name'] == '') || ($_SESSION['zs_login_rest'] == '')){
		echo "<script>location.href='/MobileWenLi-AdminSystem/login.php';</script>";
		exit();
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MobileWenLi</title>
</head>

<frameset rows="59,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="top.html" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset cols="213,*" frameborder="no" border="0" framespacing="0">
    <frame src="left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="mainfra.html" name="mainFrame" id="mainFrame" title="mainFrame" />
  </frameset>
</frameset>
</html>
