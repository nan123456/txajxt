<?php
header("Content-type:text/html;charset=utf-8");
include '../Classes/PHPExcel.php';
require_once('../Classes/PHPExcel/Writer/Excel2007.php'); 
include '../../conn.php';
$id = $_GET["id"];

//创建Excel对象
$objPHPExcel = new PHPExcel(); 
//Set properties 设置文件属性  这部分随意
$objPHPExcel->getProperties()->setCreator("nanshen");  
$objPHPExcel->getProperties()->setLastModifiedBy("nanshen");  
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test 专案导出");  
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");  
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX,专案导出");  
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");  
$objPHPExcel->getProperties()->setCategory("Test result file"); 
//Rename sheet 重命名工作表标签  
$objPHPExcel->getActiveSheet()->setTitle('sheet1');  
/*写进头部*/
$letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M');
//Set column widths 设置列宽度 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(33);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(9);  
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(19);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
//编写表字段
$objPHPExcel->getActiveSheet()->setCellValue('A1','序号');
$objPHPExcel->getActiveSheet()->setCellValue('B1','工程名称');
$objPHPExcel->getActiveSheet()->setCellValue('C1','危险源类型');
$objPHPExcel->getActiveSheet()->setCellValue('D1','危险源名称');
$objPHPExcel->getActiveSheet()->setCellValue('E1','登记日期');
$objPHPExcel->getActiveSheet()->setCellValue('F1','开始日期');
$objPHPExcel->getActiveSheet()->setCellValue('G1','结束日期');
$objPHPExcel->getActiveSheet()->setCellValue('H1','风险等级');
$objPHPExcel->getActiveSheet()->setCellValue('I1','风险项个数');
$objPHPExcel->getActiveSheet()->setCellValue('J1','危险源状态');
$objPHPExcel->getActiveSheet()->setCellValue('K1','使用状态');
//居中
foreach($letter as $ky => $column){
	$objPHPExcel->getActiveSheet()->getStyle($column.'1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);//垂直居中
	$objPHPExcel->getActiveSheet()->getStyle($column.'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//水平居中 	
}
	
$sql_s = "select * from 危险源分类清单 where id = '$id'";	
$result = $conn->query($sql_s);
$i=2;
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$i-1);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$row['工程名称']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$row['危险源类型']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$row['危险源名称']);//显示字符串
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$row['登记日期']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$row['开始日期']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$row['结束日期']*3);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$row['风险等级']*6);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$row['风险项个数']*10);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$i,$row['危险源状态']);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$i,$row['使用状态']);
		$i++;
	}
}else{
	exit("没有数据！");
}	
$conn->close();

//保存
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);  
//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("file_excel/one.xlsx");


//输出下载
sleep(1);
$filename = "file_excel/one.xlsx";
$name = "汇总打印".date("Y年m月d日").".xlsx"; 
if(file_exists($filename)){
	ob_end_clean();
	header('content-disposition:attachment;filename='.$name);
	header('content-length:'.filesize($filename));
	readfile($filename);
}else{
	echo '<script type="text/javascript">alert("文件已被删除或移动了！");window.close();</script>';
}



?>