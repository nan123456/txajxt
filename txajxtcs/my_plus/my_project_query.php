<?php
	require("../conn.php");
	$qsrqvalue=$_POST["qsrqvalue"];//起始日期
	$jsrqvalue=$_POST["jsrqvalue"];//结束日期
	$gcid=$_POST["gcid"];
	$wxyid=$_POST["wxyid"];
	
//	$qsrqvalue ="2018-05-05";
//	$jsrqvalue = "2018-10-08";
	
	$sqldate="";
	$sql = "SELECT * FROM 通知单 WHERE 检查日期 BETWEEN '$qsrqvalue' and '$jsrqvalue' and 工程id='$gcid' and 危险源id='$wxyid'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"id":"'.$row["id"].'","检查单位":"'.$row["检查单位"].'","通知单编号":"'.$row["通知单编号"].'","通知单状态":"'.$row["通知单状态"].'","检查内容":"'.$row["检查内容"].'","检查类型":"'.$row["检查类型"].'","整改期限":"'.$row["整改期限"].'","时间戳":"'.$row["时间戳"].'","检查日期":"'.$row["检查日期"].'","检查对象":"'.$row["检查对象"].'","违章状态":"'.$row["违章状态"].'","时间戳":"'.$row["时间戳"].'","检查层级":"'.$row["检查层级"].'","巡查类别":"'.$row["巡查类别"].'"},';
		 }
	} else {
		//echo "0 results";
	}
	//echo $sqldate;
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'",
				"count":"'.$count.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();		
?>