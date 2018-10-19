<?php
header("Content-Type:application/json");

require("../conn.php"); 
/*
 * 整理字符串：去掉回车，中间空格，去除一个字符串两端空格 
 * */
function Settle_string($str){
	$str = str_replace(array("\r\n", "\r", "\n", "\t"), "", $str);//去掉回车
	$str = str_replace(" ", "", $str);//去掉空格 
	$str = trim($str);//去除一个字符串两端空格
	return $str; 
}
	
	
	
	$jkmj = $_POST["jkmj"];
//	$id = array_key_exists("id", $_POST) ? $_POST("id") : "";
	
//	$id = "31";
	
	$ret_arr = array(
		"state"=>"0",
		"message"=>"服务器错误",
		"data" => array()
	);
	
	$sql = "select id,分项工程,风险项,风险等级,二级风险项 from 风险分类 where 分项工程 = '$jkmj' ORDER BY 风险等级";
//	echo $sql;
	$result = $conn->query($sql);
	if($result ->num_rows>0){
		$i = 0;
		while($row = $result->fetch_assoc()) {
			//整理数据库数据
			foreach($row as $ky => $datafon ){
				$row[$ky] = Settle_string($datafon);
			}
			
			$ret_arr["data"][$i] = $row;
			$i++;
		}
		$ret_arr["state"] = "1";
		$ret_arr["message"] = "获取成功";
	}else{
		$ret_arr["message"] = "无数据";
	}
		
	$json = json_encode($ret_arr);
	echo $json;

?>