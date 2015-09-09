<script>
	alert('此操作不可逆');
</script>
	
<?php
	require('../connect.php');
?>
	
<?php
//$id=$_GET["id"];
//echo $id;

	if (!isset($_GET["id"]) || $_GET["id"] == '')
	{
		exit();
	}
	$id=$_GET["id"];
	$sql_rest_del =  "DELETE FROM food WHERE id = ?";
	$re = $sqlconn -> prepare($sql_rest_del);
	$re->bind_param('i',$id);
	$re -> execute();
	$re->close();
	
?>

<script>
	alert('成功删除动态');
	window.history.back();
	location.href="./mypage.php";
</script>
