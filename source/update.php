<?php
session_start();
$id=$_POST['id'];

include 'db_connect.php';
db_connect();
$sql="";
if (isset($_SESSION['usrname'])) {
	if (isset($id)) {
		$sql="update pro2_work_plan_entries set status=1 where e_id=$id";
	}

	$ret= mysql_query($sql)?'成功':'失败';
}else{
	$ret='未登录，请登录后再操作！';
}


echo $ret;

// echo $id;
?>