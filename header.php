<?php include 'config.php' ?>
<?php
//检查SEESION
session_start();
if ((!isset($_SESSION['user_name'])) || (!isset($_SESSION['zs_login_rest']))){
	echo "<script>location.href='/login.php';</script>";
	exit();
}else{
	if (($_SESSION['user_name'] == '') || ($_SESSION['zs_login_rest'] == '')){
		echo "<script>location.href='/login.php';</script>";
		exit();
	}
}
?>
<html lang="en">
<head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8" />
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- The styles -->
    <link id="bs-css" href="../main/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="../main/css/charisma-app.css" rel="stylesheet">
    <link href='../main/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='../main/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='../main/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='../main/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='../main/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='../main/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='../main/css/jquery.noty.css' rel='stylesheet'>
    <link href='../main/css/noty_theme_default.css' rel='stylesheet'>
    <link href='../main/css/elfinder.min.css' rel='stylesheet'>
    <link href='../main/css/elfinder.theme.css' rel='stylesheet'>
    <link href='../main/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='../main/css/uploadify.css' rel='stylesheet'>
    <link href='../main/css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="../main/bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="../main/img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../main/index.php"> <img alt="Charisma Logo" src="../main/img/logo20.png" class="hidden-xs"/>
                <span>后台管理</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['zs_restaurant_name']?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="../restaurant/change_pwd.php?id=<?php echo $_SESSION['zs_login_rest']?>">密码更改</a></li>
                    <li class="divider"></li>
                    <li><a href="../main/login_out.php">安全退出</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->
        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <label id="for-is-ajax" for="is-ajax"> 功能面板</label>
                        <li><a class="ajax-link" href="../main/index.php"><i class="glyphicon glyphicon-home"></i><span> 主页</span></a>
                        </li>
						
						<li class="nav-header hidden-md">餐馆</li>
                        <li><a id="a_rest" class="ajax-link" href="../restaurant/show_rest.php?id=<?php echo $_SESSION['zs_login_rest']?>"><i class="glyphicon glyphicon-chevron-right"></i><span> 餐馆信息</span></a></li>
						<li id="li_rest"></li>
						
						<li class="nav-header hidden-md">食品</li>
						<li><a class="ajax-link" href="../restaurant/add_food.php?id=<?php echo $_SESSION['zs_login_rest']?>"><i class="glyphicon glyphicon-chevron-right"></i><span> 添加食品</span></a></li>
                        <li><a id="a_food" class="ajax-link" href="../restaurant/food.php?id=<?php echo $_SESSION['zs_login_rest']?>"><i class="glyphicon glyphicon-chevron-right"></i><span> 食品管理</span></a></li>
						<li id="li_food"></li>
						
						<li class="nav-header hidden-md">订单</li>
						<li><a id="a_order" class="ajax-link" href="../restaurant/order.php?id=<?php echo $_SESSION['zs_login_rest']?>"><i class="glyphicon glyphicon-chevron-right"></i><span> 订单管理</span></a></li>
						<li id="li_order"></li>
						
						<li class="nav-header hidden-md">安全</li>
						<li><a id="a_safe" class="ajax-link" href="../restaurant/change_pwd.php?id=<?php echo $_SESSION['zs_login_rest']?>"><i class="glyphicon glyphicon-cog"></i><span> 密码更改</span></a></li>
						<li id="li_safe"></li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->
		
		
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
