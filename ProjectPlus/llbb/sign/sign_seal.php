<?php
require("../../../conn.php");
$sjc = $_POST['sjc'] ;

$sql = "select id from 通知单 where 时间戳='".$sjc."'";
$result = $conn -> query($sql);
if($result -> num_rows>0){
				while($row = $result->fetch_assoc()){
					$id = $row['id'];
				}
			}
$sqlsign = "select * from 通知单签名 where 通知单id ='".$id."'";
$resultsign = $conn -> query($sqlsign);
if($resultsign -> num_rows>0){
				while($row = $resultsign->fetch_assoc()){
					$data = $row['签名A1']."|". $row['签名A2']."|".$row['签名A3']."|".$row['签名B']."|".$row['签名D']."|".$row['签名E']."|".$row['印章']."|".$row['签名C']."|".$row['签名C2'];
				}
			}
echo $data;

?>