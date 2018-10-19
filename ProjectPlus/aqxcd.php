<?php
require("../conn.php");
	$userCar = $_GET["fname"];
	$arr="";
	if($_GET["t"] == "0")
		$xllb = "SELECT DISTINCT 风险项 FROM 风险分类  where 分项工程 = '$userCar'";
	else
		$xllb = "SELECT DISTINCT 二级风险项 FROM 风险分类  where 风险项 ='$userCar'";
	$i = 0;
	if($result = mysqli_query($conn,$xllb))
	{// 一条条获取
		while($row=mysqli_fetch_row($result))
		{
			$arr .= $row[0]."?";
		}// 释放结果集合
		echo $arr;
		mysqli_free_result($result);
}?>