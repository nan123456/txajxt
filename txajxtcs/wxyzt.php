<?php
	require ("../conn.php");
	$gcid=$_POST["gcid"]; //工程id
	$id=$_POST["id"]; //清单类型
//	$gcid = 705;
//	$gcmc ="测试1022";
	
		$sqldate="";
		$sql = "select * from 危险源  where 工程id='".$gcid."' and id='".$id."' order by id desc";
		$result = $conn->query($sql);
//		$class = mysqli_num_rows($result); 
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 	$sqldate= $sqldate.'{"工作状态":"'. $row["使用状态"].'"},';
			}
		} else { 
			
		} 
		$jsonresult = 'success';
		$otherdate = '{"result":"'.$jsonresult.'"
					}';
		$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();
?>