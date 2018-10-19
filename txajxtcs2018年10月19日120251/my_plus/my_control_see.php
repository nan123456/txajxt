<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
	$wxyid = $_POST["wxyid"];
//		echo $wxyfb;
	$sqldate = ""; 
//	$wxyfb= "111";
//	if($wxyfb=="111"){
	$sql = "select * from 通知单  where 工程id='".$gcid."'and 危险源id='".$wxyid."' ";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"id":"'. $row["id"].'","整改情况":"'. $row["通知单状态"].'","巡查日期":"'. $row["检查日期"].'"},';
		}
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"
				}';
	$json = '['.$sqldate.$otherdate.']';
//	}	
	echo $json;
	$conn->close();		
?>