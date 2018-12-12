<?php
	require ("../conn.php");
	$gcid=$_POST["gcid"]; //工程id
	$qdlx=$_POST["qdlx"]; //类型
	
	if($qdlx=="aLevel"){
		//////////////////////////////// A级  ////////////////////////////////////////////////////////// 
		$sqldate="";
		$riskLevel="A";
		$sql = "select * from 危险源  where 工程id='".$gcid."' and 风险等级='".$riskLevel."' order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"wxyid":"'. $row["id"].'","gcid":"'. $row["工程id"].'","危险源名称":"'. $row["危险源名称"].'","风险等级":"'. $row["风险等级"].'","有效日期":"'. $row["结束日期"].'","工作状态":"'. $row["使用状态"].'","责任人":"'. $row["责任人"].'","联系电话":"'. $row["责任人联系电话"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		//////////////////////////////// A级  ////////////////////////////////////////////////////////// 
	}else if($qdlx=="bLevel"){
		//////////////////////////////// B级  ////////////////////////////////////////////////////////// 
		$sqldate="";
		$riskLevel="B";
		$sql = "select * from 危险源  where 工程id='".$gcid."' and 风险等级='".$riskLevel."' order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"wxyid":"'. $row["id"].'","gcid":"'. $row["工程id"].'","危险源名称":"'. $row["危险源名称"].'","风险等级":"'. $row["风险等级"].'","有效日期":"'. $row["结束日期"].'","工作状态":"'. $row["使用状态"].'","责任人":"'. $row["责任人"].'","联系电话":"'. $row["责任人联系电话"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		//////////////////////////////// B级  ////////////////////////////////////////////////////////// 
	}else if($qdlx=="cLevel"){
		/////////////////////////////// C级 ////////////////////////////////////////////////////////////
		$sqldate="";
		$riskLevel="C";
		$sql = "select * from 危险源  where 工程id='".$gcid."' and 风险等级='".$riskLevel."' order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"wxyid":"'. $row["id"].'","gcid":"'. $row["工程id"].'","危险源名称":"'. $row["危险源名称"].'","风险等级":"'. $row["风险等级"].'","有效日期":"'. $row["验收日期"].'","工作状态":"'. $row["使用状态"].'","责任人":"'. $row["责任人"].'","联系电话":"'. $row["责任人联系电话"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		/////////////////////////////// C级  ////////////////////////////////////////////////////////////
	}else if($qdlx=="dLevel"){
		/////////////////////////////// D级  ////////////////////////////////////////////////////////////
		$sqldate="";
		$riskLevel="D";
		$sql = "select * from 危险源  where 工程id='".$gcid."' and 风险等级='".$riskLevel."' order by id desc";
		$result = $conn->query($sql);
		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"wxyid":"'. $row["id"].'","gcid":"'. $row["工程id"].'","危险源名称":"'. $row["危险源名称"].'","风险等级":"'. $row["风险等级"].'","有效日期":"'. $row["验收日期"].'","工作状态":"'. $row["使用状态"].'","责任人":"'. $row["责任人"].'","联系电话":"'. $row["责任人联系电话"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'",
						"count":"'.$class.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
		/////////////////////////////// D级  ////////////////////////////////////////////////////////////
	}else if($qdlx=="wwc"){}else if($qdlx=="ywc"){}else if($qdlx=="sfyz"){
		/////////////////////////////// 判断该工程是否存在值  //////////////////////////////////////////////////	
		$sqldate="";
		$sql = "select * from 通知单   where 工程id='".$gcid. "'";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			 
		} else {
			
		}
		//echo $sqldate;
		$jsonresult='success';
		$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$count.'"
					}';
					
		$json = '['.$sqldate.$otherdate.']';
		/////////////////////////////// 判断该工程是否存在值  //////////////////////////////////////////////////
	}else{}
	echo $json;
	$conn->close();
?>