<?php
//header("Content-Type:application/json");

require("../conn.php"); 
	
	$jkmj = $_POST["jkmj"];
	$str = explode(",",$jkmj);
	$length = count($str);
	
	$i = 0;
	$ret_arr = array(
		"state"=>"0",
		"message"=>"服务器错误",
		"data" => array()
	);
	for($j=0;$j<$length;$j++){
		$sql = "select id,分项工程,风险项,风险等级,二级风险项 from 风险分类 where 分项工程 = '$str[$j]' ORDER BY 风险等级";
		$result = $conn->query($sql);
		if($result ->num_rows>0){
			while($row = $result->fetch_assoc()) {
				
				$ret_arr["data"][$i] = $row;
				$i++;
			}
			$ret_arr["state"] = "1";
			$ret_arr["message"] = "获取成功";
		}else{
			$ret_arr["message"] = "无数据";
		}
	}
	$json = json_encode($ret_arr);
	echo $json;

?>