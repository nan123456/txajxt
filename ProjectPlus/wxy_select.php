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
						<h2 align="center">选择风险项</h2>
						<div class="panel-body">
							<button  class="btn btn-primary" id="sure" >
							确定
							</button>
							<table class="display table table-bordered table-striped" id="dynamic-table" style="align-content: center;">
								<thead>
									<tr>
										<th>#</th>
										<th class="hidden">id</th>
										<th style="width: 100px;">分项工程</th>
										<th style="width: 80px;">风险项</th>
										<th>二级风险项</th>
										<th>风险等级</th>
									</tr>
								</thead>
								<!--<tbody>
									<?php
										require("../conn.php");
										$sql = "select id,分项工程,风险项,风险等级,二级风险项 from 风险分类 where 分项工程 = '脚手架工程' ORDER BY 风险等级";
										$result = $conn->query($sql);
										if($result->num_rows >0){
										$i = 0;
										while($row = $result->fetch_assoc()){
										$i += 1;
									?>
									<tr>
										<td><input type="checkbox" id="<? $i ?>" name="" /></td>
										<td class="hidden"><?php echo $row["id"]; ?></td>
										<td><?php echo $row["分项工程"]; ?></td>
										<td><?php echo $row["风险项"]; ?></td>
										<td><?php echo $row["二级风险项"]; ?></td>
										<td><?php echo $row["风险等级"]; ?></td>
									</tr>
									<?php
										}
									}
									?>
								</tbody>-->

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
		var chek_sure = document.getElementById("sure"),//监控按钮点击事件
		jkmj = window.opener.document.getElementById("wxylx").value,
		fxdj = window.opener.document.getElementById("fxdj");
		$.ajax({
			type:"post",
			url:"wxy_menu.php",
			async:true,
			data:{
				jkmj:jkmj
			},
			timeout: 10000,
			dataType:"json",
			success : function(data){
				console.log(data);
				if(data.state){
					var mydata = data.data;
					var length = mydata.length;
					for(var i=0;i<length-1;i++){
						var hydw = mydata[i].id;
						var hdmc = mydata[i].分项工程;
						var bmr = mydata[i].风险项;
						var bmrzw = mydata[i].二级风险项;
						var fxdj = mydata[i].风险等级;
						var str = '<tr>'+'<td><input type="checkbox"/></td>' +'<td class="hidden">'+hydw+'</td>' + '<td>'+hdmc+'</td>' + '<td>'+bmr+'</td>' + '<td>'+bmrzw+'</td>' + '<td>'+fxdj+'</td>' + '</tr>';
						$("#dynamic-table").append(str);
						var str = "";
					}
					
				}else{
					alert(data.message);
				}
			},
			
			
			error: function(e) {
				alert("ajax数据请求失败，请重新加载！");
			}

		});
		
		
		chek_sure.addEventListener("click", function() {
			 	fWindowText1 = window.opener.document.getElementById("select_wxy"); 
			 	chakan = window.opener.document.getElementById("watch_wxy");
			 	
			 	xuanzhong = window.opener.document.getElementById("xuanzhong");
			 	
				var tb = document.getElementById("dynamic-table");
				var tb_num = tb.rows.length; //判断表格行数
	//					alert(tb_num);
				var name = new Array(); //将联系人名设为数组，方便多数据传输
				var data_str = new String();
				var data_wxydj = "";
	//					alert(1);
				var y = 0;

//				alert(fxdj);
				for(var i = 1; i < tb_num; i++) {
		//						alert("if");
				var mas = tb.rows[i].cells[0].getElementsByTagName("input")[0].checked;
				if(mas == true) {
					data_str = data_str + tb.rows[i].cells[1].innerHTML + "/";
					data_wxydj =data_wxydj + tb.rows[i].cells[5].innerHTML + "/";
					}
					
				}

					data_str = data_str.substring(0, data_str.length - 1); //去掉最后面的一根“/”
					var str = data_str.split('/');
					fWindowText1.value =str.length + "项";
					chakan.value = data_str ;
					fxdj.value = data_wxydj[0];
					xuanzhong.value =data_str;
//					window.returnValue = data_str;
					window.close();
					});
			</script>
		</body>
</html>