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

$sql_ord="select IfNULL(max(incr_id),0) incr_id from pro2_work_plan_entries where id='$id'";


$num_ret=mysql_query($sql_ord);
$num_arr=mysql_fetch_array($num_ret);
$count=$num_arr['incr_id']+1;


$sql="insert into pro2_work_plan_entries values ('$id','$name',0,'$content',$dat,$date,null,'$respons',$count,null)";
$ret=mysql_query($sql);

;

?>