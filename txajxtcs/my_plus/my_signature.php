<?php
	require '../conn.php';
	$flag = $_POST['flag'];
	
	switch($flag) {
		case "save_ASet_1" ://保存检查员签名
			$tzdId = $_POST['tzdId'];
			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img_1'];
				$tzdId = $_POST['tzdId'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 签名A1= '".$img."',时间A1= '".$date."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				echo 2;
			}else{//如果是第一次签名
				$img = $_POST['img_1'];
				$tzdId = $_POST['tzdId'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,签名A1,时间A1) values ('".$tzdId."','".$img."','".$date."')";
				$result = $conn->query($sql);
				echo 1;
			}
		break;
		case "save_ASet_2" ://保存检查员签名
			$tzdId = $_POST['tzdId'];
			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img_2'];
				$tzdId = $_POST['tzdId'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 签名A2= '".$img."',时间A2= '".$date."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				echo 2;
			}else{//如果是第一次签名
				$img = $_POST['img_2'];
				$tzdId = $_POST['tzdId'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,签名A2,时间A2) values ('".$tzdId."','".$img."','".$date."')";
				$result = $conn->query($sql);
				echo 1;
			}
		break;
		case "save_ASet_3" ://保存检查员签名
			$tzdId = $_POST['tzdId'];
			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img_3'];
				$tzdId = $_POST['tzdId'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 签名A3= '".$img."',时间A3= '".$date."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				echo 2;
			}else{//如果是第一次签名
				$img = $_POST['img_3'];
				$tzdId = $_POST['tzdId'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,签名A3,时间A3) values ('".$tzdId."','".$img."','".$date."')";
				$result = $conn->query($sql);
				echo 1;
			}
		break;
		case "ChaStu"://查询是否签了名，通知单签名中是否有签名记录
			$tzdId = $_POST['tzdId'];
			$sql = "select * from 通知单签名 where 通知单id = '".$tzdId."'";
			$ConNum = 0;
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					if($row['签名A1']!=null){
						$ConNum++;
					}
					if($row['签名A2']!=null){
						$ConNum++;
					}
					if($row['签名A3']!=null){
						$ConNum++;
					}
				}
			}
			echo $ConNum;
		break;
		case "ShowSign"://查看签名
			$tzdId = $_POST['tzdId'];
			$data = '';
			$sql = "select * from 通知单签名 where 通知单id = '".$tzdId."'";
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$data = $row['签名A1']."|%|".$row['签名A2']."|%|".$row['签名A3'];
				}
			}
			echo $data;
		break;
		case "save_ASet2"://保存项目负责人签名
			$tzdId = $_POST['tzdId'];
//			$sql = "insert into 通知单签名(通知单id,签名B,时间B) values ('".$tzdId."','".$img."','".$date."')";
			
			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 签名B= '".$img."',时间B= '".$date."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				if($result){
					echo 2;
				}
			}else{//如果是第一次签名
				$img = $_POST['img'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,签名B,时间B) values ('".$tzdId."','".$img."','".$date."')";
				$result = $conn->query($sql);
				echo 1;
			}
		break;
		case "ShowSign_A"://查看签名A
			$tzdId = $_POST['tzdId'];
			$data = '';
			$sql = "select 签名B from 通知单签名 where 通知单id = '".$tzdId."'";
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$data = $row['签名B'];
				}
			}
			echo $data;
		break;
		case "save_BSet_1"://保存回复人签名
			$tzdId = $_POST['tzdId'];

			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img_1'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 签名C= '".$img."',时间C= '".$date."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				echo 2;
			}else{//如果是第一次签名
				$img = $_POST['img_1'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,签名C,时间C) values ('".$tzdId."','".$img."','".$date."')";
				$result = $conn->query($sql);
				echo 1;
			}
		break;
		case "save_BSet_2"://保存回复人签名
			$tzdId = $_POST['tzdId'];

			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img_2'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 签名C2= '".$img."',时间C2= '".$date."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				echo 2;
			}else{//如果是第一次签名
				$img = $_POST['img_2'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,签名C2,时间C2) values ('".$tzdId."','".$img."','".$date."')";
				$result = $conn->query($sql);
				echo 1;
			}
		break;
		case "ShowSign_B"://查看签名B
			$tzdId = $_POST['tzdId'];
			$data = '';
			$sql = "select 签名C,签名C2 from 通知单签名 where 通知单id = '".$tzdId."'";
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$data = $row['签名C']."|%|".$row['签名C2'];
				}
			}
			echo $data;
		break;
		case "save_DSet"://保存分公司批复人签名
			$tzdId = $_POST['tzdId'];
//			$sql = "insert into 通知单签名(通知单id,签名D,时间D) values ('".$tzdId."','".$img."','".$date."')";
			
			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 签名D= '".$img."',时间D= '".$date."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				echo 2;
			}else{//如果是第一次签名
				$img = $_POST['img'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,签名D,时间D) values ('".$tzdId."','".$img."','".$date."')";
				$result = $conn->query($sql);
				echo 1;
			}
		break;
		case "ShowSign_D"://查看签名D
			$tzdId = $_POST['tzdId'];
			$data = '';
			$sql = "select 签名D from 通知单签名 where 通知单id = '".$tzdId."'";
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$data = $row['签名D'];
				}
			}
			echo $data;
		break;
		case "save_ESet"://保存总公司批复人签名
			$tzdId = $_POST['tzdId'];
//			$sql = "insert into 通知单签名(通知单id,签名E,时间E) values ('".$tzdId."','".$img."','".$date."')";
			
			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 签名E= '".$img."',时间E= '".$date."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				echo 2;
			}else{//如果是第一次签名
				$img = $_POST['img'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,签名E,时间E) values ('".$tzdId."','".$img."','".$date."')";
				$result = $conn->query($sql);
				echo 1;
			}
		break;
		case "ShowSign_E"://查看签名E
			$tzdId = $_POST['tzdId'];
			$data = '';
			$sql = "select 签名E from 通知单签名 where 通知单id = '".$tzdId."'";
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$data = $row['签名E'];
				}
			}
			echo $data;
		break;
		case "CheStuO"://查询通知单是否签了名
			$tzdId = $_POST['tzdId'];
			$SignB = $SignD = $SignE = "";
			$sql = "select 签名C,签名C2,签名D,签名E from 通知单签名 where 通知单id = '".$tzdId."'";
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$SignB = $row['签名C']."|".$row['签名C2'];
					$SignD = $row['签名D'];
					$SignE = $row['签名E'];
				}
			}
			echo $SignB."|".$SignD."|".$SignE;
		break;
		case "ChePhone"://查询手机号码
			$gcid = $_POST['gcid'];
			$PhoneA = $PhoneB = $PhoneC = "";
			$sql = "select 项目经理手机,安全主管手机,生产经理手机 from 我的工程 where id = '".$gcid."'";
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$PhoneA = $row['项目经理手机'];
					$PhoneB = $row['安全主管手机'];
					$PhoneC = $row['生产经理手机'];
				}
			}
			echo $PhoneA."|".$PhoneB."|".$PhoneC;
		break;
		case "seal_A"://查看签名A
			$tzdId = $_POST['tzdId'];
			$data = '';
			$sql = "select 印章 from 通知单签名 where 通知单id = '".$tzdId."'";
			$result = $conn->query($sql);
			if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$data = $row['印章'];
				}
			}
			echo $data;
		break;
		case "save_seal_A"://保存分公司批复人签名
			$tzdId = $_POST['tzdId'];
//			$sql = "insert into 通知单签名(通知单id,签名D,时间D) values ('".$tzdId."','".$img."','".$date."')";
			
			//检查是不是第一次签名
			$sqlChe = "select 通知单id from 通知单签名 where 通知单id = '".$tzdId."'";
			$resultChe = $conn->query($sqlChe);
			if($resultChe -> num_rows>0){//如果不是第一次签名
				$img = $_POST['img'];
				$date = date('Y-m-d H:i:s');
				$sql = "update 通知单签名 set 印章= '".$img."' where 通知单id = '".$tzdId."'";
				$result = $conn->query($sql);
				echo 1;
			}else{//如果是第一次签名
				$img = $_POST['img'];
				$date = date('Y-m-d H:i:s');
				$sql = "insert into 通知单签名(通知单id,印章) values ('".$tzdId."','".$img."')";
				$result = $conn->query($sql);
				echo 2;
			}
		break;
		case "check"://盖章验证
		$mobile = $_POST['mobile'];
		$sjc = $_POST['sjc'];
		$sqli = "SELECT * FROM `通知单` WHERE `时间戳` = '$sjc' AND `草稿新建人电话` = '$mobile'";
		$result_L = $conn->query($sqli);
		if($result_L -> num_rows>0){
			echo "ok";
		}else{
			echo "no";
		}
		break;
		
		default:break;
	}
	
?>