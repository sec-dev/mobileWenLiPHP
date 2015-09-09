<script>
	alert('此操作不可逆');
</script>
	
<?php
	require('../connect.php');
?>
	
<?php
//$id=$_GET["id"];
//echo $id;

	if (!isset($_GET["top_id"]) || $_GET["top_id"] == '')
	{
		exit();
	}
	$top_id=$_GET["top_id"];
	$sql_rest_del =  "DELETE FROM top WHERE top_id = ?";
	$re = $sqlconn -> prepare($sql_rest_del);
	$re->bind_param('i',$top_id);
	$re -> execute();
	$re->close();
	
?>

<script>
	alert('成功删除动态');
	window.history.back();
	location.href="./top_dynamic_show.php";
</script>
