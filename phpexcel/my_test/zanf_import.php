<?php
//require("../Classes/PHPExcel.php");
//require("../Classes/PHPExcel/Reader/Excel2007.php");
require("../Classes/PHPExcel/IOFactory.php");
require("../../conn.php");

$filename = "file_excel/建筑施工安全风险辨识分级管控清单.xls";
$path_info = pathinfo($filename);
print_r($path_info);
$ext = $path_info["extension"];
$filename = iconv("utf-8", "gbk", $filename);
if(file_exists($filename)){
	if($ext == "xlsx" || $ext == "xls"){
		$reader = PHPExcel_IOFactory::createReader('Excel5');
	}else{
		exit("文件类型不对！");
	}	
}else{
	exit("数据读取失败，文件不存在！");
}

$PHPExcel = $reader->load($filename); // 载入文件
$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表  
$highestRow = $sheet->getHighestRow(); // 取得总行数  
$highestColumm = $sheet->getHighestColumn(); // 取得总列数  
$arr = array(1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'E', 6 => 'F', 7 => 'G', 8 => 'H', 9 => 'I', 10 => 'J', 11 => 'K', 12 => 'L', 13 => 'M', 14 => 'N', 15 => 'O', 16 => 'P', 17 => 'Q', 18 => 'R', 19 => 'S', 20 => 'T', 21 => 'U', 22 => 'V', 23 => 'W', 24 => 'X', 25 => 'Y', 26 => 'Z', 27=>'AA',28=>'AB',29=>'AC',30=>'AD');

echo $highestRow."//".$highestColumm."<br/>";//输出行数与列数

/** 循环读取每个单元格的数据 */
echo "<table border='1'>";
for($row=2;$row<=$highestRow;$row++){//行循环
	echo "<tr>";
	for($column = 'A';$column <= 'X';$column++){//列循环
		echo "<td>".$sheet->getCell($column.$row)->getValue()."</td>";
	}
	echo "</tr>";
}
echo "</table>";

//装载数据
$data_excel = "";
$i = 0;
for($row=2;$row<=$highestRow;$row++){//行循环
//	for($column = 'A';$column <= 'X';$column++){//列循环
//		$data_excel[$i][] = $sheet->getCell($column.$row)->getValue();
//	}
	for($j=1;$j<9;$j++){
		$data_excel[$i][] = $sheet->getCell($arr[$j].$row)->getValue();
	}
	$i++; 
}   
print_r($data_excel);
 


function Set_Date($date_start,$y,$m,$d){
	$str = $y."years,".$m."months,".$d."days";
	return date("Y-m-d",strtotime($str,strtotime($date_start)));
}

function getMillisecond() {
    list($t1, $t2) = explode(' ', microtime());
    // return $t2 . '.' .  ceil( ($t1 * 1000) );
    return $t2 . ceil( ($t1 * 1000) );
}
//for($i=0;$i<250;$i++){
//	$data ="";
//	usleep(1000000);
//	$data[i] = getMillisecond();
//}

foreach($data_excel as $ky => $data_info){
	$sql = "INSERT INTO `风险分类`(分项工程,风险项,二级风险项,可能导致事故类型,风险等级,主要防护措施,工作依据) VALUES('".$data_info[1]."','".$data_info[2]."','".$data_info[3]."','".$data_info[4]."','".$data_info[5]."','".$data_info[6]."','".$data_info[7]."')";
	$result = $conn->query($sql);
//for($i=0;$i<250;$i++){
//	$sql1 = "INSERT INTO pc_资料知识子类型(资料知识类型,资料知识子类型) VALUES('".$data_info[0]."','".$data_info[1]."')";
//	$result = $conn->query($sql1);
//}
}



//输出处理失败的信息
$conn->close();
//print_r($data_default); 
?>