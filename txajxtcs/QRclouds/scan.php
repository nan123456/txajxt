<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
	$id = $_POST["wxyid"];
//		echo $wxyfb;
	$sqldate = ""; 

	$sql = "select * from 危险源  where id='".$id."'and 工程id = '".$gcid."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"风险项id":"'. $row["风险项id"].'","违章大类":"'. $row["危险源类型"].'"},';
		}
	}
//	$sqldate = explode("/",$sqldate)
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'"
				}';
	$json = '['.$sqldate.$otherdate.']';
//	}	
	echo $json;
	$conn->close();		
?>