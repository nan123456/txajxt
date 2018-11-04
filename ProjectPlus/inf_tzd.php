<?php
require('../conn.php');
$flag = $_POST['flag'];
$sjc_L = $_POST['sjc_L'];
$gcid_L = $_POST['gcid_L'];

if($flag=="zgs_in"){
	$data="";
	$sql = "SELECT `检查单位`,`通知单`.`工程名称`,`内容`,`对象`,`下发整改时间`,`整改期限`,`回复日期`,`项目经理`,`通知单状态`,`批复人`,`总公司批复意见`,`总公司批复日期` FROM `通知单`,`处罚条目` WHERE  `通知单`.`工程id`='".$gcid_L."' AND `通知单`.时间戳 in ('".$sjc_L."') AND `通知单`.`时间戳`=`处罚条目`.时间戳"; 
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	 while($row = $result->fetch_assoc()) {
	 	$data = $data.'{"检查单位":"'.$row['检查单位'].'","工程名称":"'.$row['工程名称'].'","内容":"'.$row['内容'].'","对象":"'.$row['对象'].'","下发整改时间":"'.$row['下发整改时间'].'","整改期限":"'.$row['整改期限'].'","回复日期":"'.$row['回复日期'].'","项目经理":"'.$row['项目经理'].'","通知单状态":"'.$row['通知单状态'].'","批复人":"'.$row['批复人'].'","总公司批复意见":"'.$row['总公司批复意见'].'","总公司批复日期":"'.$row['总公司批复日期'].'"},';
	 } 
	 $jsonresult = 'success';
	 $otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$count.'"
							}';
	$json = '['.$data.$otherdate.']';
	echo json_encode($json);
}else if($flag=="fgs_in"){
	$data="";
	$sql = "SELECT `检查单位`,`通知单`.`工程名称`,`内容`,`对象`,`下发整改时间`,`整改期限`,`回复日期`,`项目经理`,`通知单状态`,`批复人`,`批复意见`,`批复日期` FROM `通知单`,`处罚条目` WHERE  `通知单`.`工程id`='".$gcid_L."' AND `通知单`.时间戳 in ('".$sjc_L."') AND `通知单`.`时间戳`=`处罚条目`.时间戳"; 
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	 while($row = $result->fetch_assoc()) {
	 	$data = $data.'{"检查单位":"'.$row['检查单位'].'","工程名称":"'.$row['工程名称'].'","内容":"'.$row['内容'].'","对象":"'.$row['对象'].'","下发整改时间":"'.$row['下发整改时间'].'","整改期限":"'.$row['整改期限'].'","回复日期":"'.$row['回复日期'].'","项目经理":"'.$row['项目经理'].'","通知单状态":"'.$row['通知单状态'].'","批复人":"'.$row['批复人'].'","批复意见":"'.$row['批复意见'].'","批复日期":"'.$row['批复日期'].'"},';
	 } 
	 $jsonresult = 'success';
	 $otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$count.'"
							}';
	$json = '['.$data.$otherdate.']';
	echo json_encode($json);
}else if($flag=="xmb_in"){
	$data="";
	$sql = "SELECT `检查单位`,`通知单`.`工程名称`,`内容`,`对象`,`下发整改时间`,`整改期限`,`回复日期`,`安全员`,`通知单状态`,`项目部回复意见` FROM `通知单`,`处罚条目` WHERE  `通知单`.`工程id`='".$gcid_L."' AND `通知单`.时间戳 in ('".$sjc_L."') AND `通知单`.`时间戳`=`处罚条目`.时间戳"; 
	$result = $conn->query($sql);
	$count = mysqli_num_rows($result);
	 while($row = $result->fetch_assoc()) {
	 	$data = $data.'{"检查单位":"'.$row['检查单位'].'","工程名称":"'.$row['工程名称'].'","内容":"'.$row['内容'].'","对象":"'.$row['对象'].'","下发整改时间":"'.$row['下发整改时间'].'","整改期限":"'.$row['整改期限'].'","回复日期":"'.$row['回复日期'].'","安全员":"'.$row['安全员'].'","通知单状态":"'.$row['通知单状态'].'","项目部回复意见":"'.$row['项目部回复意见'].'"},';
	 } 
	 $jsonresult = 'success';
	 $otherdate = '{"result":"'.$jsonresult.'",
								"count":"'.$count.'"
							}';
	$json = '['.$data.$otherdate.']';
	echo json_encode($json);
}

?>