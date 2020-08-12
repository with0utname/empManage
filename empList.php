<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>雇员信息列表</title>
<script type="text/javascript">
<!--

	function confirmDele(val){
		return window.confirm("是否要删除id="+val+"的用户");
	}
//-->
</script>
</head>
<img src="./images/1.GIF" />
<hr/>
<?php

	require_once 'EmpService.class.php';
	require_once 'FenyePage.class.php';
	require_once 'common.php';
	checkUserValidate();
	
	
	$empService=new EmpService();
	
	//创建一个FenyePage对象实例
	$fenyePage=new FenyePage();
	
	//给fenyePage指定必须的数据
	$fenyePage->pageNow=1;
	$fenyePage->pageSize=6;
	$fenyePage->gotoUrl="empList.php";
	
	
	//这里我们需要根据用户的点击来修改$pageNow这个值
	//这里我们需要判断 是否有这个pageNow发送，有就使用，
	//如果没有，则默认显示第一页
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	//调用getEmpListByPage方法,该方法可以把fenyePage完成
	$empService->getFenyePage($fenyePage);
	
	echo "<table border='1px' bordercolor='green'  cellspacing='0px'  width='700px'>";
	echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>"; 
	
	for($i=0;$i<count($fenyePage->res_array);$i++){
		$row=$fenyePage->res_array[$i];
			echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td>".
		"<td><a onclick='return confirmDele({$row['id']})' href='empProcess.php?flag=del&id={$row['id']}'>删除用户</a></td><td><a href='updateEmpUI.php?id={$row['id']}'>修改用户</a></td></tr>"; 
	}
	echo "<h1>雇员信息列表 </h1>";
	echo "</table>";
	
	
	//显示上一页和下一页
	
	echo $fenyePage->navigate;
	
	//可以使用for打印超链接
	
	
/*	
	
	//指定跳转到某页
	echo "<br/><br/>";*/
	?>
	<form action="empList.php">
	跳转到:<input type="text" name="pageNow" />
	<input type="submit" value="GO">
	</form>
	<hr/>
<img src="./images/mylogo.gif" />
</html>