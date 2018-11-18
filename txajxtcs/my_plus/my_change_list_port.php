<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
//		echo $wxyfb;
	$sqldate = ""; 

	$sql = "select * from 危险源  where 工程id='".$gcid."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"危险源类型":"'. $row["危险源类型"].'"},';
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