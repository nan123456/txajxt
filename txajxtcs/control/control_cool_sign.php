<?php
	require("../conn.php"); //引用conn
	
	$x=$_POST["x"];
	$y=$_POST["y"];
	$content=$_POST["content"];

	
	//$zhuhe=$fgsxz.'-'.$bmxz;
	$sqli = "insert into sign (x,y,content) values ('$x', '$y', '$content')";
	if ($conn->query($sqli) === TRUE) {
		$jsonresult='success';
	} else {
	$jsonresult='error';
	}
			
	$json = '{"result":"'.$jsonresult.'"		
				}';
	echo $json;
	$conn->close();

	
?>