<?php
	require("../conn.php");

	$gcid=$_POST["gcid"];
	$wxyid=$_POST["wxyid"];
	
//	$gcid="661";
//	$wxyid="338";
	
	$sqldate="";
	$sql = "SELECT * FROM 通知单 where 工程id='$gcid' and 危险源id='$wxyid'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"检查对象":"'.$row["检查对象"].'"},';
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