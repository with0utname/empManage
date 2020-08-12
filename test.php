<?php 

	require_once 'SqlHelper.class.php';
	
	$sqlHelper=new SqlHelper();
	//测试一下我们的SqlHelper方法是否好用
	$arr=$sqlHelper->execute_dql2("select * from emp limit 0,20");
	print_r($arr);

?>