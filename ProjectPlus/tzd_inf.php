<?php
 header('Content-type:text/json;charset=utf-8');
 require("../conn.php");

$id = $_POST['id']; 
$flag= $_POST['flag'];
$time_g=$_POST['time_g'];
$time_s=$_POST['time_s'];

if($flag=="zb"){
	$data="";
	$sql = "SELECT * FROM `通知单` WHERE `工程id`='".$id."' AND `检查单位`  like '总部%' AND `检查日期` BETWEEN '".$time_g."' AND '".$time_s."' ORDER BY `检查日期` DESC";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	 while($row = $result->fetch_assoc()) {
	 	$data = $data.'{"时间戳":"'.$row['时间戳'].'","通知单编号":"'.$row['通知单编号'].'","检查层级":"'.$row['检查层级'].'","巡查类别":"'.$row['巡查类别'].'","检查单位":"'.$row['检查单位'].'","检查对象":"'.$row['检查对象'].'","检查类型":"'.$row['检查类型'].'","违章大类":"'.$row['违章大类'].'","检查日期":"'.$row['检查日期'].'","责任人":"'.$row['责任人'].'"},';
	 } 
	 $jsonresult = 'success';
	 $otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$count.'"
							}';
	$json = '['.$data.$otherdate.']';
//  $json=$flag;
	echo json_encode($json);
}else if($flag=="fgs"){
	$data="";
	$sql = "SELECT * FROM `通知单` WHERE `工程id`='".$id."' AND `检查单位`  like '%公司' AND `检查日期` BETWEEN '".$time_g."' AND '".$time_s."' ORDER BY `检查日期` DESC";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	 while($row = $result->fetch_assoc()) {
	 	$data = $data.'{"时间戳":"'.$row['时间戳'].'","通知单编号":"'.$row['通知单编号'].'","检查层级":"'.$row['检查层级'].'","巡查类别":"'.$row['巡查类别'].'","检查单位":"'.$row['检查单位'].'","检查对象":"'.$row['检查对象'].'","检查类型":"'.$row['检查类型'].'","违章大类":"'.$row['违章大类'].'","检查日期":"'.$row['检查日期'].'","责任人":"'.$row['责任人'].'"},';
	 } 
	 $jsonresult = 'success';
	 $otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$count.'"
							}';
	$json = '['.$data.$otherdate.']';
//  $json=$flag;
	echo json_encode($json);
}else if($flag=="xmb"){
	$data="";
	$sql = "SELECT * FROM `通知单` WHERE `工程id`='".$id."' AND `检查单位`= '项目部自检' AND `检查日期` BETWEEN '".$time_g."' AND '".$time_s."' ORDER BY `检查日期` DESC";
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	 while($row = $result->fetch_assoc()) {
	 	$data = $data.'{"时间戳":"'.$row['时间戳'].'","通知单编号":"'.$row['通知单编号'].'","检查层级":"'.$row['检查层级'].'","巡查类别":"'.$row['巡查类别'].'","检查单位":"'.$row['检查单位'].'","检查对象":"'.$row['检查对象'].'","检查类型":"'.$row['检查类型'].'","违章大类":"'.$row['违章大类'].'","检查日期":"'.$row['检查日期'].'","责任人":"'.$row['责任人'].'"},';
	 } 
	 $jsonresult = 'success';
	 $otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$count.'"
							}';
	$json = '['.$data.$otherdate.']';
//  $json=$flag;
	echo json_encode($json);
}


?>