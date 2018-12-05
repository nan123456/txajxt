<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>同欣企业有限公司项目质量安全检查管理系统</title>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
    <link href="../css/theme.css" rel="stylesheet">
    
    <link href="../css/bootstrap-table.min.css" rel="stylesheet">
    <link href="../css/mycss.css" rel="stylesheet">
    <style>
    	img{
    		height: 360px;
    		width: 420px;
    	}
    	#tb1 tr td {
    		padding-bottom:5px;
    		padding-top:5px;
				text-align: center;
			}
    </style>

    <script src="js/ie-emulation-modes-warning.js"></script>

  </head>
  <body>
  	<!-- 头部导航条 -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php
	   						require("../conn.php");
								$yhid=$_GET["yhid"];
	   						$sql = "select * from 用户信息   where id='$yhid'";
	   						$result = $conn->query($sql);
	   						while($row = $result->fetch_assoc()) {
   					?>
          <a class="navbar-brand" href="../index.php?yhzh=<?php echo $row["账号"];?>">同欣</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php?yhzh=<?php echo $row["账号"];?>">项目管理</a></li>
            <li><a href="../seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a></li>
            <li><a href="../system.php?yhid=<?php echo $row["id"];?>">系统管理</a></li>
            <?php
								}
								$conn->close();		
						 ?>
          </ul>
        </div>
      </div>
    </nav>
    <div id="container" class="container">
    	<div class="row">
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10 col-lg-offset-1">
				 	<div id="xmdj" class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title "></h3>
						</div>
						<div class="panel-body">
							<div class="col-lg-6">
								<table class="col-lg-12" id="tb1" border="1">
									<thead>
										<tr>
											<td class="col-lg-3">楼层</td>
											<td class="col-lg-6">选择文件</td>
											<td class="col-lg-3">操作</td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="col-lg-6">
								<img id="previewimg" src="../img/addimage.png" />
							</div>
						</div>
					</div> 			
    		</div>
    		<!-- 内容区域 -->
    	</div>
    </div>
    

    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
   	<script src="../js/bootstrap-table.min.js"></script>
   	<script src="../js/export/tableExport.js"></script>
   	<script src="../js/export/bootstrap-table-export.js"></script>
   	<script src="../js/bootstrap-table-zh-CN.min.js"></script>
   	<script language="javascript" src="../js/PCASClass.js"></script>
   
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
    	var cs = window.opener.document.getElementById("cs").value;
    	var ds = window.opener.document.getElementById("ds").value;
//  	var cs = 12;
//  	var ds = 2;
//  	alert(cs+"  "+ds)
    	
    	var dNum=new Array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
    	var i = 1;
    	var j = 0;
    	var index = 0;
    	for(j=0;j<ds;j++){
    		var d = dNum[j];
    		for(i=1;i<=cs;i++){
    			var floor = d + i;
    			var str = '<tr><td>'+floor+'</td><td><input type="file" id="ffile'+index+'" onchange="upload(this)"/></td><td><input type="button" name='+floor+' id="file'+index+'" value="文件上传" onclick="shangchuan(this)"/></td></tr>'
//  			alert(floor);
    			$("#tb1").append(str);
    			index++;
    		}
    	}
    	
    	function upload(obj){
    		 	var img = document.getElementById("previewimg");
        	img.src = window.URL.createObjectURL(obj.files[0]);
    	}
    	
	 		function shangchuan(id){
	 				var xxx = "f"+id.id;
	 				var floor = id.name;
//					console.log(id.name)
        	var val = document.getElementById(xxx).files;
        	
		    	if(!val.length){
		        	alert('请选择文件后上传')
		        	return
		    	}else{
		    		//获取数据
				    fData = new FormData();
				    fData.append("flag",'addNew')
				    fData.append("Img",val[0])
				    fData.append("lc",floor)
				    $.ajax({
				        type:"post",
				        url:"php/Imgfile.php",
				        async:true,
				        dataType:'json',
				        data:fData,
				        processData:false,
				        contentType:false,
				        success:function(data){
				        	console.log(data)
				            alert("上传成功")
				            //刷新表格数据
		//			            tabMesSimple.ajax.reload();
				        },
				        error:function(s,e,t){
				            alert('出现错误，请及时联系管理员')
				        }
			    	});
			    }
      	}
    </script>
  </body>
</html>