<?php
	require("../conn.php");

	$gcid=$_POST["gcid"];
	$wxyid=$_POST["wxyid"];
	
//	$gcid="705";
//	$wxyid="350";
	
	$sqldate="";
	$sql = "SELECT * FROM 危险源 where 工程id='$gcid' and id='$wxyid'";
	$result = $conn->query($sql);
//	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"检查对象":"'.$row["工程名称"].'"},';
		 }
	} else {
		//echo "0 results";
	}
	//echo $sqldate;
	$jsonresult='success';
	$otherdate = '{"result":"'.$jsonresult.'"
				}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();		
?>