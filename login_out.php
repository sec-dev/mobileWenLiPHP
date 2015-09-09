<?php  
	session_start();
	
	$_SESSION['user_name'] = '';
	$_SESSION['zs_login_rest'] = '';
	echo "<script>location.href='login.php';</script>";
?>