<?php
include 'db_connect.php';
session_start();
$action=$_GET['action'];
db_connect();

if ($action=="all") {
	$sql="
	select 
	concat(substr(id,6),'-',incr_id) id,
	case when `status`=0 then 'open' when `status`=1 then 'going' when `status`=2 then 'close' end status,
	`name`,
	`deadline`,
	`content`,
	`respons`,
	e_id
	from pro2_work_plan_entries
	";

	$ret=mysql_query($sql);


	echo "<table class='table table-striped'>";
	echo 	"<tr>";
	echo 		"<th>";
	echo 		"排序";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"状态";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"描述";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"完成标识";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"主要内容及完成情况跟踪";
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
		echo $row['name'];
		echo "</td>";
		echo "<td>";
		echo $row['deadline'];
		echo "</td>";
		echo "<td>";
		echo $row['content'];
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
}elseif ($action=='item') {
	$e=$_GET['e'];
	$sql="
	select 
	concat(substr(id,6),'-',incr_id) id,
	case when `status`=0 then 'open' when `status`=1 then 'going' when `status`=2 then 'close' end status,
	`name`,
	`deadline`,
	`content`,
	`respons`
	from pro2_work_plan_entries
	where e_id=$e
	";

	$ret=mysql_query($sql);

	$row=mysql_fetch_array($ret);

	echo json_encode($row);
	// echo "done";

}

?>