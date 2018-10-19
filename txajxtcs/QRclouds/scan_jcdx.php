<?php
    require("../conn.php");
	$gcid = $_POST["gcid"];
//	$gcid ="661";
//		echo $wxyfb;
	$sqldate = ""; 
//	$wxyfb= "111";
//	if($wxyfb=="111"){
	$sql = "select * from 我的工程  where id='".$gcid."'";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$sqldate = $sqldate.'{"工程名称":"'. $row["工程名称"].'"},';
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