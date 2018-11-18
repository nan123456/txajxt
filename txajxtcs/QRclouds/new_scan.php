<?php
	require ("../conn.php");
	$gcid=$_POST["gcid"]; //工程id
	$wxyid=$_POST["wxyid"]; //工程id

	
		$sqldate="";
		$sql = "select * from 通知单 where 工程id='".$gcid."' and 危险源id='".$wxyid."' order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","检查单位":"'. $row["检查单位"].'","检查层级":"'. $row["检查层级"].'","检查对象":"'. $row["检查对象"].'","检查类型":"'. $row["检查类型"].'","违章状态":"'. $row["违章状态"].'","通知单编号":"'.$row["通知单编号"].'","检查日期":"'. $row["检查日期"].'","通知单状态":"'. $row["通知单状态"].'","时间戳":"'. $row["时间戳"].'","截止日期":"'. $row["整改期限"].'","检查内容":"'. $row["检查内容"].'","巡查类别":"'. $row["巡查类别"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		//////////////////////////////// 草稿  ////////////////////////////////////////////////////////// 
	echo $json;
	$conn->close();
?>