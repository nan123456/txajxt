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
	    $sccj=$_POST["sccj"];//生产厂家
	    $cqdw=$_POST["cqdw"];//产权单位
	    $sydate=$_POST["sydate"];//审验有效期
     	$zrr=$_POST["zrr"];//责任人
     	$lxdh=$_POST["lxdh"];//联系电话
     	$jwd = $_POST["jwd"];
     	
	    $startdata=$_POST["startdata"];//开始日期
	    $enddata=$_POST["enddata"];//结束日期
	    $overpg=$_POST["overpg"];//超过一定规模的危大工程
		$tzpass=$_POST["tzpass"];
	    $djtime=$_POST["djtime"];//登记日期
	    $mc=$_POST["wxymc"];//危险源名称
	    $orgs=$_POST["orgs"];//是否专家认证
	    $bzbw=$_POST["bzbw"];
	    $yxrq=$_POST["yxrq"];
	    $fxdj=$_POST["fxdj"];
//	    $zmmj=$_POST["zmmj"];
//	    $zmgd=$_POST["zmgd"];
//	    $zjlz=$_POST["zjlz"];
//	    $tsgd=$_POST["tsgd"];
//	    $ejlx=$_POST["ejlx"];
//	    $wxydl=$_POST["wxydl"];
	    $wxyzt=$_POST["wxyzt"];//危险源状态
//	    $dqs=$_POST["dqs"];
//	    $dqs1=$_POST["dqs1"];
		$wxymc= $mc.$jkmj;
	    

		
//		echo "$gcmc";	
//  $time=getdate();
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");

	
$sql = "INSERT INTO `危险源` (时间戳,工程名称,工程id,危险源类型,风险项个数,风险项id,使用状态,生产产家,产权单位,审验有效期,责任人,责任人联系电话,经纬度,超过一定规模的危险性较大的分部分项工程,登记日期,是否专家认证,危险源状态,标注部位,开始日期,结束日期,危险源名称,风险等级)VALUES('$sjc','$gcmc','$gcid','$jkmj','$select_wxy','$watch_wxy','$kwsd','$sccj','$cqdw','$sydate','$zrr','$lxdh','$jwd','$overpg','$djtime','$orgs','$wxyzt','$bzbw','$startdata','$enddata','$wxymc','$fxdj')";

if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>