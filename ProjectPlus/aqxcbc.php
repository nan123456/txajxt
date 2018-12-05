<?php
	require("../conn.php");
	
	$sjc = time();
	$gcmc=$_POST["gcmc"];
	$gcid=$_POST["gcid"];
	$select_wxy = $_POST["select_wxy"];//风险项个数
	$watch_wxy=$_POST["xuanzhong"];//风险项id
    $kwsd=$_POST["kwsd"];//工作状态
 	$zrr=$_POST["zrr"];//责任人
 	$lxdh=$_POST["lxdh"];//联系电话
 	$jwd = $_POST["jwd"];
   	$wxylx = $_POST["wxylx"];
 	
    $startdata=$_POST["startdata"];//开始日期
    $enddata=$_POST["enddata"];//结束日期
    $djtime=$_POST["djtime"];//登记日期
    $mc=$_POST["wxymc"];//危险源名称
    $bzbw=$_POST["bzbw"];
    $fxdj=$_POST["fxdj"];
    $wxyzt=$_POST["wxyzt"];//危险源状态
	$str = explode(",",$wxylx);
	$length = count($str);
		
	
	function count_fxxgs($conn,$jkmj,$watch_wxy){
		$count_fxxgs = 0;
		//根据"危险源类型"【$jkmj】查表`风险分类`的id ------》$fxfl_arr
		$fxfl_arr = array();//`风险分类`的id
		$sql = "select id from 风险分类  where 分项工程 = '$jkmj'";
		$result = $conn -> query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_row()){
				$fxfl_arr[] = $row[0];
			}
		}
	
		//使用数组对应方法比较两个数组的相同部分
		$count_fxxgsdata = explode("/",$watch_wxy);
		foreach($count_fxxgsdata as $ky => $fxfl_id){
			if(in_array($fxfl_id, $fxfl_arr)){
				$count_fxxgs++;
			}
		}

		return $count_fxxgs;
	}
	

	   	
		for($i=0;$i<$length;$i++){
			$jkmj = $str[$i];
			$wxymc= $mc.$jkmj;
			
			$count_fxxgs = count_fxxgs($conn,$jkmj,$watch_wxy);//风险项个数
			$count_fxxgs = $count_fxxgs.'项';
			
			$sql1 = "INSERT INTO `危险源` (时间戳,工程名称,工程id,危险源类型,风险项个数,风险项id,使用状态,责任人,责任人联系电话,经纬度,登记日期,危险源状态,标注部位,开始日期,结束日期,危险源名称,风险等级)VALUES('$sjc','$gcmc','$gcid','$jkmj','$count_fxxgs','$watch_wxy','$kwsd','$zrr','$lxdh','$jwd','$djtime','$wxyzt','$bzbw','$startdata','$enddata','$wxymc','$fxdj')";
			if ($conn->query($sql1) === TRUE) {
			    echo "保存成功";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

$conn->close();		
?>