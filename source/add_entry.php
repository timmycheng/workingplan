<?php
session_start();
include 'db_connect.php';

$name=$_POST['ename'];
$content=$_POST['econtent'];
$dat=$_POST['ebdate'];
$respons=$_SESSION['usrname'];

db_connect();

$year=date('Y');
$week=date('W');
$id=$year."-".$week;

$date=date('Y-m-d');

$sql="insert into pro2_work_plan_entries values ('$id','$name',0,'$content',$dat,$date,'$respons',null)";

$num=mysql_query($sql);

echo $num;

?>