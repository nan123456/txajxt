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
    	<style>
    		.input{
    			width: 600px;
    			border: 0px;
    			outline:none;
    			cursor: pointer;
    		}
    		
    		.hang{
    			height: 45px;
    		}
    		.bj{
    			position: relative;
    		}
    		.ewm{
    			position: absolute;
    			top: 40px;
    			left: 20%;
    		}
    		.wb{
    			position: absolute;
    			top: 40px;
    			left: 50%;
    			width: 800px;
    		}
    		.waikuan{
    			height: 450px;
    		}
    		.foot{
    			position: absolute;
    			top: 380px;
    			left: 50%;
    			transform: translateX(-50%);
    		}
    	</style>
</head>

<body style="width: 100%;">

	<section>
		<!--body wrapper start-->
		<div class="body">
	<div id="xmdj" class="panel panel-info">
		<!--<div class="panel-heading">
			<h3 class="panel-title">危险源二维码打印</h3>
		</div>	
		<div class="wrapper">
			<div class="row">
				<div class="waikuan">
					<section class="panel">
						<div class="panel-body">
							<form class="form-horizontal" role="form" >
							
							<div class="row">
									<div id="user-profile-1"  class="user-profile row bj">
										<div class="ewm">
											
												<div id="qrcode" style="width:200px; height:200px; margin-top:15px;"></div>

										</div>

										<div class="wb">
											</br>
											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row hang">
													<label for="sccj" class="col-sm-3 control-label">分部分项：</label>
													<div class="col-sm-9">
														<input type="text"  class="form-control input" id="wxylx" placeholder="危险源名称/分项名称" >
													</div>
												</div>
												<div class="profile-info-row hang">
													<label for="sccj" class="col-sm-3 control-label">标注部位：</label>
													<div class="col-sm-9">
														<input type="text" class="form-control input" id="bzbw" placeholder="用户输入，允许为空" >
													</div>
												</div>
												<div class="profile-info-row hang">
													<label for="sccj" class="col-sm-3 control-label">安全风险：</label>
													<div class="col-sm-9">
														<input type="text" class="form-control input" id="fxxgs" placeholder="根据本分项工程用户勾选定义的安全风险项数，自动生成" >
													</div>
												</div>
												<div class="profile-info-row hang">
													<label for="sccj" class="col-sm-3 control-label">有效日期：</label>
													<div class="col-sm-9">
														<input type="text" class="form-control input" id="yxdata" placeholder="根据用户定义自动生成" >
													</div>
												</div>
												<div class="profile-info-row hang">
													<label for="sccj" class="col-sm-3 control-label">责任人：</label>
													<div class="col-sm-9">
														<input type="text" class="form-control input" id="zrr" placeholder="用户输入，允许为空" >
													</div>
												</div>
												<div class="profile-info-row hang">
													<label for="sccj" class="col-sm-3 control-label">联系电话：</label>
													<div class="col-sm-9">
														<input type="text" class="form-control input" id="lxdh" placeholder="用户输入，允许为空" >
													</div>
												</div>
												
											</div>
											
										</div>
										<div class="foot">
											<div align="center">
												<input type="text" id="xmmc" class="input" style="font-size:32px;" align="center"  value=""/>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</form>
					</section>
				</div>
			</div>
		</div>-->
		</div>
		<!-- main content end-->
		
		
	</section>

	<script src="../js/Other/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
   	<!--js of bootstrap-table -->
   	<script src="../js/bootstrap-table.min.js"></script>
   	<!--js of bootstrap-table—export -->
   	<script src="../js/export/tableExport.js"></script>
   	<script src="../js/export/bootstrap-table-export.js"></script>
   	<script src="../js/Other/qrcode.js"></script>
	<!--<script src="js/pickers-init.js"></script>-->

	<script type="text/javascript">
		id = window.opener.document.getElementById("wxyid").value;
//		alert(id);
		uid = id.substring(1) ;
//		alert(uid);
		
		
		$.ajax({
			type:"POST",
			url:"php/ewm.php",
			data:{
				uid:uid
			},
			timeout: 10000,
			dataType: "json",
			success : function(data){
				console.log(data);
				var length = data.length;
//				alert(length);
				for(var i=0;i<length-1;i++){
//					$("#wxylx").val(data[i].危险源类型);
//					$("#bzbw").val(data[i].标注部位);
//					$("#fxxgs").val(data[i].风险项个数);
//					$("#yxdata").val(data[i].有效日期);
//					$("#zrr").val(data[i].责任人);
//					$("#lxdh").val(data[i].责任人联系电话);
//					$("#xmmc").val(data[i].项目名称);
					var wxylx = data[i].危险源类型;
					var bzbw = data[i].标注部位;
					var fxxgs = data[i].风险项个数;
					var yxdata = data[i].有效日期;
					var zrr = data[i].责任人;
					var lxdh = data[i].责任人联系电话;
					var xmmc = data[i].项目名称;
					var wxy = data[i].id;
					var gcid = data[i].工程id;
					AddProjectList(wxylx,bzbw,fxxgs,yxdata,zrr,lxdh,xmmc,i);
//					alert(wxy);
					var qrcode = new QRCode(document.getElementById("qrcode"+i+""), {
						width : 280,
						height : 280
					});
					
					function makeCode () {		
						
						qrcode.makeCode('QRscan,'+gcid +','+ wxy);
					}
					
					makeCode();
					
				}				
				
			},
				
				
				error: function(e) {
					alert("ajax数据请求失败，请重新加载！");
				}
			});
			
			var AddProjectList = function(wxylx,bzbw,fxxgs,yxdata,zrr,lxdh,xmmc,i){
				var  muicontent = document.getElementsByClassName("panel panel-info");
				var div=document.createElement('div');
				div.className='panel panel-info';
				div.innerHTML = '<div id="xmdj" class="panel panel-info"><div class="panel-heading"><h3 class="panel-title">危险源二维码打印</h3></div><div class="wrapper"><div class="row"><div class="waikuan"><section class="panel"><div class="panel-body"><form class="form-horizontal" role="form"><div class="row"><div id="user-profile-1"  class="user-profile row bj"><div class="ewm"><div id="qrcode'+i+'" style="width:200px; height:200px; margin-top:15px;"></div></div><div class="wb"></br><div class="profile-user-info profile-user-info-striped"><div class="profile-info-row hang"><label for="sccj" class="col-sm-3 control-label">分部分项：</label><div class="col-sm-9"><input type="text"  class="form-control input" value="'+wxylx+'"></div></div><div class="profile-info-row hang"><label for="sccj" class="col-sm-3 control-label">标注部位：</label><div class="col-sm-9"><input type="text" class="form-control input" value="'+bzbw+'"></div></div><div class="profile-info-row hang"><label for="sccj" class="col-sm-3 control-label">安全风险：</label><div class="col-sm-9"><input type="text" class="form-control input" value="'+fxxgs+'"></div></div><div class="profile-info-row hang"><label for="sccj" class="col-sm-3 control-label">有效日期：</label><div class="col-sm-9"><input type="text" class="form-control input" value="'+yxdata+'"></div></div><div class="profile-info-row hang"><label for="sccj" class="col-sm-3 control-label">责任人：</label><div class="col-sm-9"><input type="text" class="form-control input" value="'+zrr+'"></div></div><div class="profile-info-row hang"><label for="sccj" class="col-sm-3 control-label">联系电话：</label><div class="col-sm-9"><input type="text" class="form-control input" value="'+lxdh+'"></div></div></div></div><div class="foot"><div align="center"><input type="text" id="xmmc" class="input" style="font-size:32px; " align="center"  value="'+xmmc+'"/></div></div></div></div></div></form></section></div></div></div></div>'		
				muicontent[0].appendChild(div);
			}
		
		
		
		
		
	</script>
</body>
</html>