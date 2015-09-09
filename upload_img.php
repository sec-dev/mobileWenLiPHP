<?php

	if( isset($_GET["user_name"]) && $_GET["user_name"]!="")
   	{
    	$user_name=$_GET['user_name'];
	}
	else
	{
		$ret_code=2;//参数不全
		
		//构建返回json的数组
		$retArray=array('ret_code'=>$ret_code);
					
		//构建返回json包
		$retJson=json_encode($retArray);
		echo $retJson;
		return;
   	}
  
	//获取文件后缀名函数  
    function fileext($filename)
	{
		return substr(strrchr($filename, '.'), 1);
	}
	
	//压缩图片
	function ResizeImage($im,$maxwidth,$maxheight,$name)
	{
		//取得当前图片大小
		$width = imagesx($im);
		$height = imagesy($im);
		//生成缩略图的大小
		if(($width > $maxwidth) || ($height > $maxheight))
		{
			$widthratio = $maxwidth/$width;
			$heightratio = $maxheight/$height;
			
			if($widthratio < $heightratio)
			{
			 	$ratio = $widthratio;
			}
			else
			{
				 $ratio = $heightratio;
			}
			
  			$newwidth = $width * $ratio;
  			$newheight = $height * $ratio;

 			if(function_exists("imagecopyresampled"))
			{
   				$newim = imagecreatetruecolor($newwidth, $newheight);
   				imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
 			}
			else
			{
				$newim = imagecreate($newwidth, $newheight);
   				imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
 			}
			
  			ImageJpeg ($newim,$name);
  			ImageDestroy ($newim);
 		}
		else
		{
  			ImageJpeg ($im,$name);
 		}
	}
	
	//需要压缩的最小图片尺寸
	$pic_width_max=120;
	$pic_height_max=90;
	
	$org_img_name="";	//原始图片名
	$small_img_name="";	//小图片名
	$img_main_name="";  //图片主文件名
   	$uploaddir = "../imgs/";		//保存原始图片目录
	$uploaddir_small = "../imgs/img_s/";	//保存小图片目录
	$uploadimgpath_small = "";	//保存小图片的完整路径
   	//上传文件的参数名
	$upload_input_name="uploadfile";
	//$type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型
	 
   	//得到上传的原始图片
   	$file_type=$_FILES[$upload_input_name]['type'];
   	$filename_a=strtolower(fileext($_FILES[$upload_input_name]['name']));

   	//判断文件类型
 	if($_FILES[$upload_input_name]['size']>50*200*1024)//判断文件上传大小
	{
		$ret_code=5;
	}  
   	else
   	{
		//生成目标文件的文件名
		$img_main_name=$user_name."_".time();
   		$org_img_name=$img_main_name.'.'.$filename_a;	//生成随机文件名函数 
		$small_img_name=$org_img_name;
		$uploadimgpath_org=$uploaddir.$org_img_name;				//上传图片的原始文件路径
		$uploadimgpath_small=$uploaddir_small.$small_img_name;
		
        if (move_uploaded_file($_FILES[$upload_input_name]['tmp_name'],$uploadimgpath_org))
		{  
			$ret_code=0;
			
        }
		else
		{
			$ret_code=4;
			//构建返回json的数组
			$retArray=array('ret_code'=>$ret_code);
					
			//构建返回json包
			$retJson=json_encode($retArray);
			echo $retJson;
			return;
			
		} 
			
   	}  
	
	//压缩
	/*if($_FILES[$upload_input_name]['size'])
	{
	 
		if($file_type == "image/pjpeg"||$file_type == "image/jpg"|$file_type == "image/jpeg")
		{
  			//$im = imagecreatefromjpeg($_FILES[$upload_input_name]['tmp_name']);
			$im = imagecreatefromjpeg($uploadimgpath_org);
 		}
		elseif($file_type == "image/x-png")
		{
  			//$im = imagecreatefrompng($_FILES[$upload_input_name]['tmp_name']);
			$im = imagecreatefromjpeg($uploadimgpath_org);
 		}
		elseif($file_type == "image/gif")
		{
  			//$im = imagecreatefromgif($_FILES[$upload_input_name]['tmp_name']);
			$im = imagecreatefromjpeg($uploadimgpath_org);
 		}
		//else//默认jpg
		//{
		//	$im = imagecreatefromjpeg($uploadimgpath_org);
		//}
 		if($im)
		{
  			ResizeImage($im,$pic_width_max,$pic_height_max,$uploadimgpath_small);
		
  			ImageDestroy ($im);
 		}
	}*/
	
	//修改用户数据库，更新用户图片信息
	$db_host = 'localhost';
	$db_port = '3306';
	$db_user = 'root';
	$db_psw = '';
	$db_name = 'hola';
	
	//获取总记录数
	$sqlconn=new mysqli($db_host.':'.$db_port,$db_user,$db_psw,$db_name);
	$q="set names utf8;";
	$r=$sqlconn->query($q);//设置字符集
	
	$update_sql="update fast_user set zs_user_img=? where zs_user_name=? limit 1"; //验证用户
	$result=$sqlconn->prepare($update_sql); //预处理
	//$result->bind_param("ss",$img_main_name,$user_name); //绑定参数
	//$result->execute();
	
	//$result->close();
	//关闭连接
	//$sqlconn->close();
	
	$retArray=array('ret_code'=>$ret_code,'img_name'=>$img_main_name,'file_type'=>$file_type);
					
	//构建返回json包
   	$retJson=json_encode($retArray);
	echo $retJson;
?> 