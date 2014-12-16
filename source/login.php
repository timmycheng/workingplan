<?php
session_start();
if (!isset($_SESSION['usrname'])) {

	$usrname=$_POST['usrname'];
	$pasword=$_POST['pasword'];

	$_SESSION['usrname']=$usrname;
	$_SESSION['pasword']=$pasword;

}else
{
	session_destroy();
}

header('Location:../index.php');

?>