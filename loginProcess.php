<?php
	
	require_once 'AdminService.class.php';
	//接收用户的数据
	//1.id
	$id=$_POST['id'];
	//2.密码
	$password=$_POST['password'];
	
	$checkCode=$_POST['checkcode'];
	
	
	//先看看验证码是否 ok
	session_start();
	if($checkCode!=$_SESSION['myCheckCode']){
		header("Location: login.php?errno=2");
		exit();
	}
	
	//3. 获取用户是否选中了保存id
	if(empty($_POST['keep'])){
		if(!empty($_COOKIE['id'])){
		setcookie("id",$id,time()-100);
		}
	}else{
		setcookie("id",$id,time()+7*2*24*3600);
	}
	
	
	
	
	//实例化一个AdminServive方法
	$adminService=new AdminService();
	$name=$adminService->chekcAdimn($id,$password);
	if($name!=""){
		//把登陆信息写入cookie 'loginname':$name
		//把登陆表 把登陆的人ip id..
		//合法
		session_start();
		$_SESSION['loginuser']=$name;
		header("Location: empManage.php?name=$name"); 
		exit();
	}else{
		//非法
		header("Location: login.php?errno=1");
		exit();
	}
	
	
?>