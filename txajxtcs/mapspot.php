<?php
	header("Conent-Type:application/json");
	require ("../conn.php");
//	$gcid=$_POST["gcid"]; //工程id
	$wxyid=$_POST["wxyid"]; //工程id

		$sqldate="";
		$sql = "select * from 危险源  where id='".$wxyid."'";
		$result = $conn->query($sql)->fetch_assoc();
//			 	$sqldate= $sqldate.'{"id":"'. $row["id"].'","经纬度":"'. $row["经纬度"].'"},';
//	 	$data['dataA'] = $result["经纬度"];
//		$data['dataB'] = $result["id"];
		
//		$data[0] = [116.403322, 39.920255];
//		$data[1] = [116.410703, 39.897555];
//		$data[2] = [116.402292, 39.892353];
		$dataP = explode("|",$result["经纬度"]);
//		echo count($dataP);
//		print_r($dataP);
		$ret_data["data"] = $dataP;
//		$json= '[{"id":"1","name":"\u5f20\u96ea\u6885","age":"27","subject":"\u8ba1\u7b97\u673a\u79d1\u5b66\u4e0e\u6280\u672f"},{"id":"2","name":"\u5f20\u6c9b\u9716","age":"21","subject":"\u8f6f\u4ef6\u5de5\u7a0b"}]';

		$data = '[';
		for($i = 0;$i<count($dataP);$i++)
		{
			$data .= '['.$dataP[$i].''.'],';
		}
		$data = substr($data,0,strlen($data)-1); 
		$data .=']';
//		echo $data;
//		$json = $data;
//		echo $json;
		
//		echo $data;
		
//		$json = json_encode($data);
//		echo $data;
		
		echo '{"data":'.$data.'}';
	
	$conn->close();
?>