<?php
	require ("../conn.php");
//	资料知识类别
//	$zlkmc=$_POST["zlkmc"];
	$wxymc=$_POST["wxymc"];
	$gcid=$_POST["gcid"];
	
	$sqldate="";
	$sql = "select * from 危险源  where 危险源名称 LIKE '%".$wxymc."%' and 工程id='".$gcid."'  order by id desc";
//	$sql = "SELECT * FROM  原始记录 WHERE (卡片名称 or 验收部位   LIKE '%".$gcmc."%') and 卡片状态 = '已保存'";
	$result = $conn->query($sql);
	$class = mysqli_num_rows($result); 
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"wxyid":"'. $row["id"].'","gcid":"'. $row["工程id"].'","危险源名称":"'. $row["危险源名称"].'","风险等级":"'. $row["风险等级"].'","有效日期":"'. $row["结束日期"].'","责任人":"'. $row["责任人"].'","联系电话":"'. $row["责任人联系电话"].'"},';
			}
	} else { 
	} 
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",
					"count":"'.$class.'"
				}';
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>