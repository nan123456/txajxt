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
										<tr>
											<td>A栋一层</td>
											<td><input type="file" onchange="upload(this)"/></td>
											<td><button type="submit" class="btn-success">上传</button></td>
										</tr>
										<tr>
											<td>A栋二层</td>
											<td><input type="file" onchange="upload(this)"/></td>
											<td><button type="submit" class="btn-success">上传</button></td>
										</tr>
										<tr>
											<td>A栋三层</td>
											<td><input type="file" onchange="upload(this)"/></td>
											<td><button type="submit" class="btn-success">上传</button></td>
										</tr>
										<tr>
											<td>A栋四层</td>
											<td><input type="file" onchange="upload(this)"/></td>
											<td><button type="submit" class="btn-success">上传</button></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-lg-6">
								<img id="previewimg" src="../img/shuijiao.jpg" />
							</div>
						</div>
					</div> 			
    		</div>
    		<!-- 内容区域 -->
    	</div>
    </div>
    

    <script src="../js/jquery-1.10.2.min.js"></script>
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
    	function upload(obj){
    		 	var img = document.getElementById("previewimg");
        	img.src = window.URL.createObjectURL(obj.files[0]);
    	}
    </script>
  </body>
</html>