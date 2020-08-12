<?php
	
	require_once 'EmpService.class.php';
	//接收用户要删除的用户id
	//创建了EmpService对象实例
	$empService=new EmpService();
	
	//接收
	
	
	
	//先看看用户要分页还是删除某个雇员
	if(!empty($_REQUEST['flag'])){
		
			//接收flag值.
			$flag=$_REQUEST['flag'];
			//如果$flag="del", 说明用户要执行删除请求
			if($flag=="del"){
				//这是我们知道要删除用户
				$id=$_REQUEST['id'];
				//echo "你希望删除的用户id=$id";
				if($empService->delEmpById($id)==1){
					//成功!
					header("Location: ok.php");
					exit();
				}else{
					//失败!
					header("Location: error.php");
					exit();
				}
			}else if($flag=="addemp"){
				//说明用户希望执行添加雇员
				//接收数据
				$name=$_POST['name'];
				$grade=$_POST['grade'];
				$email=$_POST['email'];
				$salary=$_POST['salary'];
				//完成添加->数据库.
				$res=$empService->addEmp($name,$grade,$email,$salary);
				if($res==1){
					header("Location: ok.php");
					exit();
				}else{
					//失败!
					header("Location: error.php");
					exit();
				}
			}//处理修改请求
			else if($flag=="updateemp"){
				//说明用户希望执行修改雇员
				//接收数据
				$id=$_POST['id'];
				$name=$_POST['name'];
				$grade=$_POST['grade'];
				$email=$_POST['email'];
				$salary=$_POST['salary'];
				//完成修改->数据库.
				$res=$empService->updateEmp($id,$name,$grade,$email,$salary);
				if($res==1){
					header("Location: ok.php");
					exit();
				}else{
					//失败!
					header("Location: error.php");
					exit();
				}
				
			}
	}
?>