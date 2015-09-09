<?php  
	require('/connect.php');
	session_start();
	
	$user = $_POST['user'];
	$pwd = $_POST['pwd'];
	
	$sql = "SELECT * FROM login WHERE user_name='$user' AND user_pwd='$pwd' limit 1";
	//"select zs_restaurant_id,zs_restaurant_user,zs_restaurant_user,zs_restaurant_pwd from zs_restaurant where zs_restaurant_user='$user' limit 1";
	$result = $sqlconn -> prepare($sql);
	$result -> execute();
	$result -> bind_result($user_id,$user_name,$user_pwd);
	if ($result -> fetch()){
		//有此用户名
		if (strcmp($pwd,$user_pwd) == 0){
			//密码正确
			
			$_SESSION['user_name'] = $user_name;
			$_SESSION['zs_login_rest'] = $user_id;
			
			$url = "/mobileWenLi-AdminSystem/index.php";
			echo "<script>location.href='$url';</script>";
		}else{
			//密码不正确
			$url = "/mobileWenLi-AdminSystem/login.php?pwd_error=1";
			echo "<script>location.href='$url';</script>";
		}
	}else{
		//无此用户名
		$url = "/mobileWenLi-AdminSystem/login.php?user_error=1";
		echo "<script>location.href='$url';</script>";
	}
?>