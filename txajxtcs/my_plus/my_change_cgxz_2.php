<?php
	require("../conn.php");

	$gcid=$_POST["gcid"];
	
	$sqldate="";
	$sql = "SELECT * FROM 我的工程 where id='$gcid' ";
	$result = $conn->query($sql);
//	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"地区省":"'.$row["地区省"].'","地区市":"'.$row["地区市"].'"},';
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