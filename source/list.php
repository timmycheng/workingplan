<?php
include 'db_connect.php';
session_start();
$action=$_GET['action'];
db_connect();

// echo is_int($action);

if ($action=="all") {

	//for pages
	if (isset($_GET['e'])) {
		$week=$_GET['e'];
	}else{
		$week=date('W');
	}
	$id=date('Y-').$week;

	
	//还是有问题
	$sql="
	select 
	concat(date_format(createtime,'%u'),'-',incr_id) `id`,
	case when yearweek(createtime)=yearweek(curdate()) and yearweek(closetime)>yearweek(curdate()) then 'open'
		 when yearweek(createtime)<yearweek(curdate()) and yearweek(closetime)>yearweek(curdate()) then 'going'
		 when yearweek(createtime)<yearweek(curdate()) and yearweek(closetime)=yearweek(curdate()) then 'close'
	end st, 
	`name`,
	`deadline`,
	`content`,
	`respons`,
	e_id
	from pro2_work_plan_entries
	having st is not null
	order by e_id
	";

	if (isset($_SESSION['usrname'])) {
		$name=$_SESSION['usrname'];
		$sql="
			select 
			concat(date_format(createtime,'%u'),'-',incr_id) `id`,
			case when yearweek(createtime)=yearweek(curdate()) and yearweek(closetime)>yearweek(curdate()) then 'open'
				 when yearweek(createtime)<yearweek(curdate()) and yearweek(closetime)>yearweek(curdate()) then 'going'
				 when yearweek(createtime)<yearweek(curdate()) and yearweek(closetime)<=yearweek(curdate()) then 'close'
			end st, 
			`name`,
			`deadline`,
			`content`,
			`respons`,
			e_id
			from pro2_work_plan_entries
			where respons='$name'
			having st is not null
			order by e_id
			";
	} 

	$ret=mysql_query($sql);

	echo "<table class='table table-hover'>";
	echo 	"<tr>";
	echo 		"<th class='hidden-xs'>";
	echo 		"排序";
	echo 		"</th>";
	echo 		"<th class='hidden-xs'>";
	echo 		"状态";
	echo 		"</th>";
	echo 		"<th class='hidden-xs'>";
	echo 		"完成标识";
	echo 		"</th>";
	echo 		"<th>";
	echo 		"描述";
	echo 		"</th>";
	echo 		"<th class='hidden-xs'>";
	echo 		"责任人";
	echo 		"</th>";
	echo 		"<th class='hidden-xs'>";
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
		
		echo "<td class='hidden-xs'>";
		echo $row['id'];
		echo "</td>";
		echo "<td class='hidden-xs'>";	
		echo $row['st'];
		echo "</td>";
		echo "<td class='hidden-xs'>";
		echo $row['deadline'];
		echo "</td>";
		echo "<td>";
		echo "<a href='source/list.php?action=item&e=".$row['e_id']."' id='entry'>".$row['name']."</a>";
		echo "</td>";
		echo "<td class='hidden-xs'>";
		echo $row['respons'];
		echo "</td>";
		echo "<td class='hidden-xs'>";
		echo "<a href='source/list.php?action=item&e=".$row['e_id']."' id='entry'>追加</a>";
		echo "</td>";
		echo "</tr>";
	}

	echo "</table>";

	// echo '<nav>';
	// echo '  <ul class="pager">';
	// echo '    <li class="previous"><a class="nav-self" href="source/list.php?action=all&e='.($week==1?54:$week-1).'">&larr; '.($week==1?54:$week-1).'周</a></li>';
	// echo '	  <li>第'.$week.'周</li>';
	// echo '    <li class="next"><a class="nav-self" href="source/list.php?action=all&e='.($week==54?1:$week+1).'">'.($week==54?1:$week+1).'周 &rarr;</a></li>';
	// echo '  </ul>';
	// echo '</nav>';
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