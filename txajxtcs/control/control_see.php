<?php
	require ("../conn.php");
	$gcid=$_POST["gcid"]; //工程id
	$qdlx=$_POST["qdlx"]; //清单类型
	
	if($qdlx=="aLevel"){
		//////////////////////////////// A级  ////////////////////////////////////////////////////////// 
		$sqldate="";
		$riskLevel="A";
		$sql = "select * from 风险管控  where 工程id='".$gcid."' and 风险等级='".$riskLevel."' order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","风险等级":"'. $row["风险等级"].'","危险源名称":"'. $row["危险源名称"].'","有效日期":"'. $row["有效日期"].'","责任人":"'. $row["责任人"].'","联系电话":"'. $row["联系电话"].'","地理信息":"'. $row["地理信息"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		//////////////////////////////// A级  ////////////////////////////////////////////////////////// 
	}else{}
	echo $json;
	$conn->close();
?>