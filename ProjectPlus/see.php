<?php
	require("../conn.php");
	$ck = $_POST["ck"];
//	$ck = "717/718/719/720/723";
	$str = explode("/",$ck);
	$i = count($str);
	$sqldate='';
	for($j=0;$j<$i;$j++){
		$sql = "select id,分项工程,风险项,风险等级,二级风险项 from 风险分类 where id = '$str[$j]'";
		
		$result = $conn -> query($sql);
		$count = mysqli_num_rows($result);
//		print_r($result);
//		echo "</br>";
		if ($result -> num_rows > 0){
			while ($row = $result -> fetch_assoc()) {
			$sqldate = $sqldate . '{"id":"'. $row["id"].'","分项工程":"'.$row["分项工程"].'","风险项":"'.$row["风险项"].'","风险等级":"'.$row["风险等级"].'","二级风险项":"'.$row["二级风险项"].'"},';
			}
		} else {
//			print_r("44566");
		}
		
	}	
		
		
		
//		print_r($sqldate);
		$jsonresult='success';
		$otherdate ='{"result":"'.$jsonresult.'",		
					"count":"'.$count.'"
					}';
				
		$json ='['.$sqldate.$otherdate.']';
		echo $json;
		$conn->close();	
	
?>