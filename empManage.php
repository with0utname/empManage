<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<img src="./images/1.GIF" />
<hr/>
<?php
	require_once 'common.php';
	checkUserValidate();
	//先验证
	if (!empty($_GET['name']))
	echo "欢迎 ".$_GET['name']." 登录成功!";
	echo "<br/><a href='login.php'>返回重新登录</a>";
	
	//显示上次登录时间
	getLastTime();
	
	
	
	
?>
<h1>主界面</h1>
<a href='empList.php'>管理用户</a><br/>
<a href='addEmp.php'>添加用户</a><br/>
<a href='#'>查询用户</a><br/>
<a href='#'>退出系统</a><br/>
<hr/>
<img src="./images/mylogo.gif" />
</html>