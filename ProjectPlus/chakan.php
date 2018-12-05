<!DOCTYPE html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>同欣企业有限公司项目质量安全检查管理系统</title>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    
    <!-- Custom styles for bootstrap-table -->
    <link href="../css/bootstrap-table.min.css" rel="stylesheet">
    <link href="../css/mycss.css" rel="stylesheet">
</head>

<body style="width: 100%;margin-left: 120px;">

	<section>
		<!--body wrapper start-->
		<div class="wrapper">
			<div class="row">
				<div class="col-sm-8" >
					<section class="panel">
						<h2 align="center" style="margin-right: 200px;">已选择的危险源</h2>
						<div class="panel-body">
							<button  class="btn btn-primary" id="sure" >
							确定
							</button>
							<table class="display table table-bordered table-striped" id="dynamic-table" style="width: 1200px;">
								<thead>
									<tr>
										<th class="hidden">id</th>
										<th>分项工程</th>
										<th>风险项</th>
										<th>二级风险项</th>
										<th>风险等级</th>
									</tr>
								</thead>

							</table>
							<!-- form end -->
						</div>
					</section>
				</div>
			</div>
		</div>
		<!--body wrapper end-->
		</div>
		<!-- main content end-->
	</section>

	<script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
   	<!--js of bootstrap-table -->
   	<script src="../js/bootstrap-table.min.js"></script>
   	<!--js of bootstrap-table—export -->
   	<script src="../js/export/tableExport.js"></script>
   	<script src="../js/export/bootstrap-table-export.js"></script>
	<!--<script src="js/pickers-init.js"></script>-->

	<script type="text/javascript">
		var ck = window.opener.document.getElementById("watch_wxy").value
//		alert(ck);
		$.ajax({
			type:"POST",
			url:"see.php",
			data:{
				ck:ck
			},
			timeout: 10000,
			dataType: "json",
			success : function(data){
				var length = data.length;
//				alert(length);
	console.log(length);
				var str = "";
				for(var i=0;i<length-1;i++){
				
				var hybjm = data[i].id;
				var hyxz = data[i].分项工程;
				var hydw = data[i].风险项;
				var fxdj = data[i].风险等级;
				var ejfxx = data[i].二级风险项;
				var str =  '<tr>' +'<td class="hidden">'+hybjm+'</td>' + '<td>'+hyxz+'</td>'+ '<td>'+hydw+'</td>' +'<td>'+fxdj+'</td>' + '<td>'+ejfxx+'</td>' + '</tr>';
				$("#dynamic-table").append(str);
				var str = "";
				}				
				
			},
				
				
				error: function(e) {
					alert("ajax数据请求失败，请重新加载！");
				}
			});
		var chek_sure = document.getElementById("sure"); //监控按钮点击事件
		chek_sure.addEventListener("click", function() {
			var tb = document.getElementById("dynamic-table");
			window.close();
		});
			</script>
		</body>
</html>