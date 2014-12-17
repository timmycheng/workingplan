<?php

include 'db_connect.php';

session_start();
if (!isset($_SESSION['usrname'])) {

	db_connect();

	$usrname=stripcslashes(trim($_POST['usrname']));
	$pasword=md5(stripcslashes(trim($_POST['pasword'])));

	$existsql="SELECT * FROM pro2_work_plan_users WHERE id= '$usrname' and pass= '$pasword'";

	$exist = mysql_query($existsql);
	// echo $exist;  //执行SQL
	

	if (mysql_num_rows($exist)==1) {
		$row=mysql_fetch_array($exist);
		$_SESSION['usrname']=$row['name'];
		echo $row['name'];
	} else {
		echo "error";
	}
}else
{
	session_destroy();
	echo "out";
}

// header('Location:../index.php');

?>