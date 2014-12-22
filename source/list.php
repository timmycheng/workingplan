<?php
include 'db_connect.php';
session_start();
$action=$_GET['action'];
db_connect();

// echo is_int($action);

if ($action=="all") {

	if (isset($_GET['e'])) {
		$week=$_GET['e'];
	}else{
		$week=date('W');
	}
	$id=date('Y-').$week;

	
	//已改
	$sql="
	select 
	concat(substr(id,6),'-',incr_id) `id`,
	case when `status`<>1 and substr(id, 6)=$week then 'open' 
		 when `status`<>1 and substr(id, 6)<$week then 'going' 
		 when `status`=1 and substr(id, 6)=$week then 'close' end status,
	`name`,
	`deadline`,
	`content`,
	`respons`,
	e_id
	from pro2_work_plan_entries
	having status is not null
	";

	if (isset($_SESSION['usrname'])) {
		$name=$_SESSION['usrname'];
		$sql=$sql."and respons='$name'";
	} 

	$ret=mysql_query($sql);

	echo "<table class='table table-striped table-hover'>";
	echo 	"<tr>";
	echo 		"<th>";
	echo 		"排序";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"状态";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"完成标识";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"描述";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"责任人";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"操作";
	echo 		"</th>";
	echo 	"</tr>";
	while ($row=mysql_fetch_array($ret)) {
		echo "<tr>";
		echo "<td>";
		echo $row['id'];
		echo "</td>";
		echo "<td>";	
		echo $row['status'];
		echo "</td>";
		echo "<td>";
		echo $row['deadline'];
		echo "</td>";
		echo "<td>";
		echo $row['name'];
		echo "</td>";
		echo "<td>";
		echo $row['respons'];
		echo "</td>";
		echo "<td>";
		echo "<a href='source/list.php?action=item&e=".$row['e_id']."' id='entry'>查看</a>";
		echo "</td>";
		echo "</tr>";
	}

	echo "</table>";

	echo '<nav>';
	echo '  <ul class="pager">';
	echo '    <li class="previous"><a class="nav-self" href="source/list.php?action=all&e='.($week==0?54:$week-1).'">&larr; '.($week==0?54:$week-1).'周</a></li>';
	echo '	  <li>第'.$week.'周</li>';
	echo '    <li class="next"><a class="nav-self" href="source/list.php?action=all&e='.($week==54?1:$week+1).'">'.($week==54?1:$week+1).'周 &rarr;</a></li>';
	echo '  </ul>';
	echo '</nav>';
	// echo $id;
}elseif ($action=='item') {
	$e=$_GET['e'];
	$sql="
	select 
	concat(substr(id,6),'-',incr_id) id,
	case when `status`=0 then 'open' when `status`=1 then 'going' when `status`=2 then 'close' end status,
	`name`,
	`deadline`,
	`content`,
	`respons`,
	createtime,
	closetime
	from pro2_work_plan_entries
	where e_id=$e
	";

	$ret=mysql_query($sql);

	$row=mysql_fetch_array($ret);

	echo json_encode($row);
	// echo "done";

}

?>