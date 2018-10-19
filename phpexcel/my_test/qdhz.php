<?php
header("Content-type:text/html;charset=utf-8");
include '../Classes/PHPExcel.php';
require_once('../Classes/PHPExcel/Writer/Excel2007.php'); 
include '../../conn.php';
$id=$_REQUEST['id'];

//创建Excel对象
$objPHPExcel = new PHPExcel(); 
//Set properties 设置文件属性  这部分随意
$objPHPExcel->getProperties()->setCreator("KingShen");  
$objPHPExcel->getProperties()->setLastModifiedBy("KingShen");  
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX");  
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");  
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");  
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");  
$objPHPExcel->getProperties()->setCategory("Test result file"); 
//Rename sheet 重命名工作表标签  
$objPHPExcel->getActiveSheet()->setTitle('sheet1');  
/*写进头部*/
$letter = array('A','B','C','D','E','F');
//Set column widths 设置列宽度 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(38);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
//编写表字段
$objPHPExcel->getActiveSheet()->setCellValue('A1','序号');
$objPHPExcel->getActiveSheet()->setCellValue('B1','会员单位');
$objPHPExcel->getActiveSheet()->setCellValue('C1','活动名称');
$objPHPExcel->getActiveSheet()->setCellValue('D1','报名人姓名');
$objPHPExcel->getActiveSheet()->setCellValue('E1','报名人职务	');
$objPHPExcel->getActiveSheet()->setCellValue('F1','报名人手机号码');
//居中
foreach($letter as $ky => $column){
	$objPHPExcel->getActiveSheet()->getStyle($column.'1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);//垂直居中
	$objPHPExcel->getActiveSheet()->getStyle($column.'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//水平居中 	
}
	
	$sql = "select * from 活动  where id='$id'";
 	$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$hdmc = $row["活动名称"];
			$sql2 = "select * from 活动报名 where 活动名称='$hdmc' and 是否签到='已签到'";
			$i=2;
			$result2 = $conn->query($sql2);
			while($row2 = $result2->fetch_assoc()){
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$i-1);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$row2['会员单位']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$row2['活动名称']);
				$objPHPExcel->getActiveSheet()->setCellValueExplicit('D'.$i,$row2['报名人姓名']);//显示字符串
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$row2['报名人职务']);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$row2['报名人手机号码']);
				$i++;
			}
		}
	
$conn->close();

//保存
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);  
//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$objWriter->save("file_excel/qdhz.xlsx");

//输出下载
sleep(1);
$filename = "file_excel/qdhz.xlsx";
$name = "报名汇总".date("Y年m月d日").".xlsx"; 
if(file_exists($filename)){
	header('content-disposition:attachment;filename='.$name);
	header('content-length:'.filesize($filename));
	readfile($filename);
}else{
	echo '<script type="text/javascript">alert("文件已被删除或移动了！");window.close();</script>';
}



?>