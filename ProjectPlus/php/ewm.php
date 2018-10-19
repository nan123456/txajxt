<?php
require("../../conn.php");
	$uid = $_POST["uid"];
//	$ck = "717/718/719/720/723";
	$str = explode("|",$uid);
	$i = count($str);
	$sqldate='';
	for($j=0;$j<$i;$j++){
		$sql = "select id,工程id,工程名称,时间戳,危险源类型,标注部位,风险项个数,结束日期,责任人,责任人联系电话 from 危险源  where id = '$str[$j]'";
		
		$result = $conn -> query($sql);
		$count = mysqli_num_rows($result);
//		print_r($result);
//		echo "</br>";
		if ($result -> num_rows > 0){
			while ($row = $result -> fetch_assoc()) {
//				echo $row["id"];
				$xmmc = $row['工程名称'].'项目部';
				$sqldate = $sqldate . '{"id":"'.$row["id"].'","工程id":"'. $row["工程id"].'","工程名称":"'.$row["工程名称"].'","时间戳":"'.$row["时间戳"].'","危险源类型":"'. $row["危险源类型"].'","标注部位":"'.$row["标注部位"].'","风险项个数":"'.$row["风险项个数"].'","有效日期":"'.$row["结束日期"].'","责任人":"'.$row["责任人"].'","责任人联系电话":"'.$row["责任人联系电话"].'","项目名称":"'.$xmmc.'"},';
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