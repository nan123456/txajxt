<?php
header("Content-type:text/html;charset=utf-8");
include '../Classes/PHPExcel.php';
require_once('../Classes/PHPExcel/Writer/Excel2007.php'); 
include '../../conn.php';

//创建Excel对象
$objPHPExcel = new PHPExcel(); 
//Set properties 设置文件属性  这部分随意
$objPHPExcel->getProperties()->setCreator("KingShen");  
$objPHPExcel->getProperties()->setLastModifiedBy("KingShen");  
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test 专案导出");  
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");  
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX,专案导出");  
$objPHPExcel->getProperties()->setKeywords("office 2007 openxml php");  
$objPHPExcel->getProperties()->setCategory("Test result file"); 
//Rename sheet 重命名工作表标签  
$objPHPExcel->getActiveSheet()->setTitle('sheet1');  
/*写进头部*/
$letter = array('A','B','C','D','E','F','G','H','I','J');
//Set column widths 设置列宽度 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(38);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
//编写表字段
$objPHPExcel->getActiveSheet()->setCellValue('A1','序号');
$objPHPExcel->getActiveSheet()->setCellValue('B1','会员单位');
$objPHPExcel->getActiveSheet()->setCellValue('C1','会员性质');
$objPHPExcel->getActiveSheet()->setCellValue('D1','会费缴纳得分');
$objPHPExcel->getActiveSheet()->setCellValue('E1','用工实名制管理得分	');
$objPHPExcel->getActiveSheet()->setCellValue('F1','参加活动得分');
$objPHPExcel->getActiveSheet()->setCellValue('G1','观摩工地得分');
$objPHPExcel->getActiveSheet()->setCellValue('H1','其他得分');
$objPHPExcel->getActiveSheet()->setCellValue('I1','主管部门的行政处罚扣分');
$objPHPExcel->getActiveSheet()->setCellValue('J1','综合评价结果');
//居中
foreach($letter as $ky => $column){
	$objPHPExcel->getActiveSheet()->getStyle($column.'1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);//垂直居中
	$objPHPExcel->getActiveSheet()->getStyle($column.'1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//水平居中 	
}
	
$sql_s = "select `会员单位`,`会员性质`,`会费缴纳得分`,`用工实名制管理`,`参加活动得分`,`主管部门的行政处罚`,`观摩工地得分`,`其他得分`,`综合评价结果`,会员标记码  from 会员评价 order by 综合评价结果  desc";	
$result = $conn->query($sql_s);
$i=2;
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		$hybjm = $row["会员标记码"];
		$sql2 = "select * from 活动报名 where 会员标记码='$hybjm' and 是否签到='已签到'";
		$result2 = $conn->query($sql2);
		$bmrs = $result2->num_rows;
	
		$hddf = '0';
		if($bmrs >'0' and $bmrs <'3'){
			$hddf = '1';
		}else if($bmrs>'2' and $bmrs <'5'){
			$hddf = '2';
		}else if($bmrs >'4'){
			$hddf = '3';
		}
		
		
		if($row["主管部门的行政处罚"]=="一票否定"){
				$zhpj = "0";
			}else{
				$zhpj = $row["会费缴纳得分"]+$row["用工实名制管理"]+$row["主管部门的行政处罚"]+$row["观摩工地得分"]+$row["其他得分"]+$hddf;
			}
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$i-1);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$row['会员单位']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$row['会员性质']);
		$objPHPExcel->getActiveSheet()->setCellValueExplicit('D'.$i,$row['会费缴纳得分']);//显示字符串
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$row['用工实名制管理']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$hddf);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$row['观摩工地得分']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$row['其他得分']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$row['主管部门的行政处罚']);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$i,$zhpj);
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
	header('content-disposition:attachment;filename='.$name);
	header('content-length:'.filesize($filename));
	readfile($filename);
}else{
	echo '<script type="text/javascript">alert("文件已被删除或移动了！");window.close();</script>';
}



?>