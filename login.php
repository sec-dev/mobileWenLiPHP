<?php include 'config.php' ?>
<?php
$error = '';
if ((isset($_GET['user_error'])) && ($_GET['user_error'] != '')){
	$error = 'user_error';
}
if ((isset($_GET['pwd_error'])) && ($_GET['pwd_error'] != '')){
	$error = 'pwd_error';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

	
	
<script type="text/javascript">
//表单验证（触发隐藏div中的button）
function validate(){
	var zs_user = document.getElementById('zs_user').value;
	var zs_pwd = document.getElementById('zs_pwd').value;
	
	if (zs_user == ""){  
		document.getElementById('alert_user').click(); 
		return false;
	}
	if (zs_pwd == ""){  
		document.getElementById('alert_pwd').click(); 
		return false;
	}
	return true;
}
</script>
	
</head>

<body>

    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>后台管理</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info" id="alert_div">
                <span id="alert_span">请使用您的用户名和密码登陆。</span>
            </div>
            <form class="form-horizontal" action="login_do.php" method="post" onSubmit="return validate();">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user blue"></i></span>
                        用户名： <input type="text" id="user_name" name="user" class="form-control" placeholder="用户名">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        密&nbsp;&nbsp;&nbsp;&nbsp;码： <input type="password" id="user_pwd" name="pwd" class="form-control" placeholder="密码">
						   
                    </div>
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">登陆</button>
                    </p>
					
					<!-- 隐藏表单验证提醒信息 -->
					<div style="display:none">
					<button class="btn btn-primary noty"
                            data-noty-options="{&quot;text&quot;:&quot;用户名不能为空！&quot;,&quot;layout&quot;:&quot;center&quot;,&quot;type&quot;:&quot;error&quot;,&quot;closeButton&quot;:&quot;true&quot;}" type="button" id="alert_user">
                    </button>
					<button class="btn btn-primary noty"
                            data-noty-options="{&quot;text&quot;:&quot;密码不能为空！&quot;,&quot;layout&quot;:&quot;center&quot;,&quot;type&quot;:&quot;error&quot;,&quot;closeButton&quot;:&quot;true&quot;}" type="button" id="alert_pwd">
                    </button>
					</div>
					<!-- 隐藏表单验证提醒信息 结束-->
					
					
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
	
<script type="text/javascript">
	<!-- 提示登陆错误 -->
	var error = "<?php echo $error?>";
	loginError(error);
	function loginError(error){
		if (error == "user_error"){
			document.getElementById('alert_div').setAttribute("class","alert alert-danger");
			document.getElementById('alert_span').innerText = ("无此用户！");
		}
		if (error == "pwd_error"){
			document.getElementById('alert_div').setAttribute("class","alert alert-danger");
			document.getElementById('alert_span').innerText = ("密码不正确！");
		}
	}
</script>	

<?php require('/footer.php'); ?>