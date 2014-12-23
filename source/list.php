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

	
	//还是有问题
	$sql="
	select 
	concat(substr(id,6),'-',incr_id) `id`,
	case when `status`=0 and substr(id, 6)=$week then 'open' 
		 when `status`=0 and substr(id, 6)<$week then 'going'  
		 when `status`=1 and date_format(closetime,'%v')=$week then 'close'
		 when `status`=1 and date_format(closetime,'%v')>$week then 'going'
		 when `status`=1 and date_format(closetime,'%v')>$week and substr(id, 6)>$week then null
		 end st,
	`name`,
	`deadline`,
	`content`,
	`respons`,
	e_id
	from pro2_work_plan_entries
	having st is not null
	";

	if (isset($_SESSION['usrname'])) {
		$name=$_SESSION['usrname'];
		$sql=$sql."and respons='$name'";
	} 

	$ret=mysql_query($sql);

	echo "<table class='table table-hover'>";
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
		// echo "<tr>";
		if ($row['st']=='close') {
			echo "<tr class='success'>";
		} elseif($row['deadline']<date('Y-m-d')) {
			echo "<tr class='danger'>";	
		}else{
			echo "<tr>";
		}
		
		echo "<td>";
		echo $row['id'];
		echo "</td>";
		echo "<td>";	
		echo $row['st'];
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
	echo '    <li class="previous"><a class="nav-self" href="source/list.php?action=all&e='.($week==1?54:$week-1).'">&larr; '.($week==1?54:$week-1).'周</a></li>';
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
	status,
	`name`,
	`deadline`,
	`content`,
	`respons`,
	createtime,
	closetime,
	e_id
	from pro2_work_plan_entries
	where e_id=$e
	";

	$ret=mysql_query($sql);

	$row=mysql_fetch_array($ret);

	echo json_encode($row);
	// echo "done";

}

?>