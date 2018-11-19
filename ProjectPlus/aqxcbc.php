<?php
	//引入连接数据库文件
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//		$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");	
	$sjc = time();
		
	
	require("../conn.php");
		$gcmc=$_POST["gcmc"];
		$gcid=$_POST["gcid"];
		$sgbw=$_POST["sgbw"];
		$jkmj=$_POST["jkmj"];//危险源类型
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
		$wxymc= $mc.$jkmj;
		$str = explode(",",$wxylx);
		$length = count($str);
	   
		for($i=0;$i<$length;$i++){
			$sql = "INSERT INTO `危险源` (时间戳,工程名称,工程id,危险源类型,风险项个数,风险项id,使用状态,责任人,责任人联系电话,经纬度,登记日期,危险源状态,标注部位,开始日期,结束日期,危险源名称,风险等级)VALUES('$sjc','$gcmc','$gcid','$str[$i]','$select_wxy','$watch_wxy','$kwsd','$zrr','$lxdh','$jwd','$djtime','$wxyzt','$bzbw','$startdata','$enddata','$wxymc','$fxdj')";
			if ($conn->query($sql) === TRUE) {
			    echo "保存成功";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		

		

$conn->close();		
?>