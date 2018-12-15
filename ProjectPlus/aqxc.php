
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
		<style>
			.bottom{
				position: relative;
				z-index: 0;
			}
			ul li {
				list-style: none;
			}
			
			.hide {
				display: none
			}
			
			
			.width150 input[type="text"] {
				width: 100%;
				height: 32px;
				border: 1px solid #ccc;
				border-radius: 4px;
				padding-left: 12px;
			}
			
			.width150 ul {
				width: 96%;
				padding: 0 0 0 20px;
				margin: 0;
				border: 1px solid #ccc;
			}
			
			.width150 li {
				position: relative;
				z-index: 100;
				padding: 5px;
			}
			
			.width150 li+li {
				border-top: 1px solid #ccc;
			}
			#selWxy{
	  		position: absolute;
	  		z-index: 10;
	  		margin-right: auto;
	   		margin-left: auto;
	   		background: #FFFFFF;
	  	}
		</style>
    <link rel="icon" href="">
    	
    <title>同欣企业有限公司项目质量安全检查管理系统</title>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">
    
    <!-- Custom styles for bootstrap-table -->
    <link href="../css/bootstrap-table.min.css" rel="stylesheet">
    <link href="../css/mycss.css" rel="stylesheet">
    	

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script type="text/javascript" src="../js/jedate.js"></script>
    <script src="../js/ie-emulation-modes-warning.js"></script>
    

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
 
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
          <a class="navbar-brand" href="../index.php?yhzh=<?php echo $row["账号"];?>"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php?yhzh=<?php echo $row["账号"];?>">项目管理</a></li>
            <li><a href="../seclect.php?yhid=<?php echo $row["id"];?>">综合查询</a></li>
            <li><a href="../system.php?yhid=<?php echo $row["id"];?>">系统管理</a></li>
            <?php
								}
						 ?>
          </ul>
        </div>
      </div>
    </nav>
    <div id="container" class="container">
    	<div class="row">
				<?php
				  $id=$_GET["id"];
					$sql = "select * from 我的工程 where id='$id' ";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) {					
     		?>
											                    
    		<!--左侧导航菜单 -->
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<li ><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">项目管理</a>
    						<ul class="nav">
    							<li  class="active"><a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">人员签到</a></li>
    							<li><a href="sbgl.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">巡查整改</a></li>
    							<li ><a href="zlsc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">质量实测</a></li>
    							<li><a href="tz_table.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">台账报表</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">查询分析</a>
    						<ul class="nav">
									<li ><a href="wxycxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">隐患通知单</a></li>
									<li ><a href="wzcxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid ;?>">违章大类查询</a></li>
    						</ul>
    					</li>	   				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->
    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    			<div id="xmdj" class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">危险源详细填写-<?php echo $row["工程名称"];?></h3>
						</div>	
							<?php
								}							
							?> 
						<div class="panel-body">

							<div class="tab-content">
			
			
								<div role="tabpanel" class="tab-pane fade in active" id="wxyxx">
								
									<div class="panel-body">
										<div class="btn-group">
											<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1" ><i class="glyphicon glyphicon-plus"> 新建</i></button>
											<div class="btn-group">
												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
													危险源类别
													<span class="caret"></span>
												</button>
												<ul class=" dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" >
													<li class="lii"><a href="#aqx7"  tabindex="-1" data-toggle="tab">全部类型</a></li>
													<li class="lii"><a href="#aqx0" tabindex="-1" data-toggle="tab" >基坑支护及降水工程</a></li>
													<li class="lii"><a href="#aqx1"  tabindex="-1" tabindex="-1" data-toggle="tab" >土方开挖工程</a></li>
													<li class="lii"><a href="#aqx2"  tabindex="-1" data-toggle="tab">模板工程支撑体系</a></li>
													<li class="lii"><a href="#aqx3"  tabindex="-1" data-toggle="tab">脚手架工程</a></li>
													<li class="lii"><a href="#aqx4"  tabindex="-1" data-toggle="tab">起重吊装及安装拆卸工程</a></li>
													<li class="lii"><a href="#aqx5"  tabindex="-1" data-toggle="tab">拆除爆破工程</a></li>
													<li class="lii"><a href="#aqx6"  tabindex="-1" data-toggle="tab">其他危险性较大的工程</a></li>
												</ul>
										  </div>
										  <button type="button" class="btn btn-default" data-toggle="modal" onclick="window.open('ewmdy.php')">生成二维码</button>
										  <div class="btn-group">
												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
													分类打印
													<span class="caret"></span>
												</button>
												<ul class=" dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" >
													<li class="lii" onclick="dy()"><a href="#" tabindex="-1" data-toggle="tab">状态类型</a></li>
													<li class="lii" onclick="dy()"><a href="#" tabindex="-1" data-toggle="tab">等级类型</a></li>
													<li class="lii" onclick="dy()"><a href="#" tabindex="-1" data-toggle="tab">类别类型</a></li>
												</ul>
										  </div>
										</div>
										<input type="text" class="hidden" id="wxyid" value="" />
										<!--<input type="text" class="hidden" id="wxystr" value="" />-->
										<div class="tab-content">
								
											<div class="tab-pane fade in active" >
    										<table style="align-content: center;">
			    								<thead >
											      <tr>
											         <th>#</th>
											         <th>危险源类型</th>
											         <th>标注部位</th>
											         <th>安全项数</th>
											         <th>结束日期</th>
											         <th>责任人</th>
											         <th>联系电话</th>
											         <th>风险等级</th>
											         <th>登记日期</th>
											         <th>使用状态</th>
											         <th>操作</th>
											      </tr>
								  		 		</thead>
									   			<tbody style="text-align:center;">
									      		<?php
															$id=$_GET["id"];
		               						$sql = "select * from 危险源   where 工程id='$id'";
		               						$result = $conn->query($sql);
	               							while($row = $result->fetch_assoc()) {
	                        					
	           								?>
               						<tr>
              							<td><input type="checkbox" id="<?php echo $row["id"]?>" onclick="test(this);"/></td>
						                <td><?php echo $row["危险源类型"];?></td>
						                <td><?php echo $row["标注部位"];?></td>
						                <td><?php echo $row["风险项个数"];?></td>
						                <td><?php echo $row["结束日期"];?></td>
						                <td><?php echo $row["责任人"];?></td>
						                <td><?php echo $row["责任人联系电话"];?></td>
						                <td><?php echo $row["风险等级"];?></td>
						                <td><?php echo $row["登记日期"];?></td>
						                <td><?php echo $row["危险源状态"];?></td>
										        <td><a href="aqxcxg.php?id=<?php echo $row["id"];?>&yhid=<?php $yhid=$_GET["yhid"];echo $yhid;?>"><button type="button" class="btn btn-primary">修改</button></a> 
										        	<button id="<?php echo $row["id"];?>" onclick="dianji2(this.id);" type="button" class="btn btn-default">
                   	 						删除
                   	 					</button>
										        </td>
										      </tr>  
										         
									         	<?php
															}	
														?>
								   			</tbody>
    									</table>
    								</div>
    							</div>
    						</div>
								<!-- 模态框（Modal） -->
								<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" style="width: 800px;">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
													&times;
												</button>
												<h4 class="modal-title" id="myModalLabel">危险源详细填写</h4>
											</div>
											<div class="modal-body"> 
												<form id="aqxcform" name="aqxcform" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
													<div class="form-group">
						
														<div class="col-sm-8">
															<?php
															 	$id=$_GET["id"];
							       						$sql = "select * from 我的工程 where  id='$id'";
							       						$result = $conn->query($sql);
							       						while($row = $result->fetch_assoc()) {
								            					
								   						?>
															<label class="col-sm-3 control-label">工程名称：</label>
															<div class="col-sm-6">
																<input type="text" class="form-control" id="gcmc" name="gcmc"  value="<?php echo $row["工程名称"];?>" readonly="readonly">
																<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $id?>"/>
															</div>
															
																<?php
																	} 
																?>
														</div>
														<div class="col-sm-4 width150">
															<input type="text" id="wxylx" name="wxylx" placeholder="请选择危险源类型" readonly>
															
															<ul id="selWxy" class="hide">
															</ul>
														</div>
													</div>
													<div class="bottom">
														<div class="form-group"> 
															<label for="ejlx" class="col-sm-3 control-label" >选择安全风险项：</label>
															<div class="col-sm-3">
																<input type="text"  class="form-control"  readonly="readonly" id="select_wxy" name="select_wxy" onclick="window.open('wxy_select.php')"/>
															</div>
															<label for="aqfxnum" class="col-sm-3 control-label" >查看安全风险项：</label>
															<div class="col-sm-3">
																<button type="button"  class="form-control"  readonly="readonly" id="watch_wxy" name="watch_wxy" onclick="window.open('chakan.php')">查看</button>
																<!--<input type="text"  class="form-control"  readonly="readonly" id="watch_wxy" name="watch_wxy" value="" onclick="window.open('chakan.php')"/>-->
																<input class="hidden"  id="xuanzhong" name="xuanzhong"/>
															</div>
															
														</div>
														
														<div class="form-group">
															
															<label for="yxrq" class="col-sm-3 control-label">风险等级：</label>
															<div class="col-sm-3">
																<input type="text" class="form-control"  name="fxdj" id="fxdj" readonly="readonly" placeholder="" >
															</div>
															<label for="djtime" class="col-sm-3 control-label">登记日期：</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" id="djtime" name="djtime" placeholder="">
															</div>
														</div>
														
										
														<div class="form-group">
															<label for="kwsd" class="col-sm-3 control-label">工作状态：</label>
															<div class="col-sm-3">
																<select id="kwsd" name="kwsd" class="form-control">
																	<option>未巡检</option>
																	<option>已巡检</option>
																</select>
															</div>
															<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
															<div class="col-sm-3">
																<select id="wxyzt" name="wxyzt" class="form-control">
																	<option>使用中</option>
																	<option>已关闭</option>
																</select>
															</div>
														</div>
							
																					
	
														
								
														<div class="form-group">
															<label for="zrr" class="col-sm-3 control-label">责任人：</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" name="zrr" placeholder="" >
															</div>
								
															<label for="lxdh" class="col-sm-3 control-label">联系电话：</label>
															<div class="col-sm-3">
																<input type="text" class="form-control"  name="lxdh" placeholder="" >
															</div>
														</div>
														
														<div class="form-group">
															<label for="bzbw" class="col-sm-3 control-label">危险源名称：</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" name="wxymc" id="wxymc" placeholder="" >
															</div>
								
															<label for="bzbw" class="col-sm-3 control-label">标注部位：</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" name="bzbw" id="bzbw" placeholder="" >
															</div>
														</div>
														<div class="form-group">
															<label for="yxrq" class="col-sm-3 control-label">开始日期：</label>
															<div class="col-sm-3">
																<input type="date" class="form-control"  name="startdata" id="startdata" placeholder="" >
															</div>
								
															<label for="yxrq" class="col-sm-3 control-label">结束日期：</label>
															<div class="col-sm-3">
																<input type="date" class="form-control"  name="enddata" id="enddata" placeholder="" >
															</div>
														</div>
														<div class="form-group">
																
																<input type="button" class="col-sm-3" style="margin-left: 150px;" value="标注危险源" onclick="window.open('marker.php')"/>
																<input type="text" class="hidden" value="" id="jwd" name="jwd" readonly="readonly" />
														</div>
	                        <div class="modal-footer" >
														<button type="button" class="btn btn-default " data-dismiss="modal">关闭 </button>
														<button id="save10" type="button" onclick="window.location.reload()" class="btn btn-primary ">提交保存</button>
													</div>
												</div>
                        </form>
                    	</div>
					
											
							
									</div>				
			 					</div>		
							</div>
						</div>		
					</div>
				</div> 	
		</div><!-- 内容区域 -->
	</div>
</div>
<footer class="bs-docs-footer" role="contentinfo"></footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
   	<script src="../js/bootstrap-table.min.js"></script>
   	<script src="../js/export/tableExport.js"></script>
   	<script src="../js/export/bootstrap-table-export.js"></script>
   	<script src="../js/bootstrap-table-zh-CN.min.js"></script>
    <script type="text/javascript"src="../js/jquery.validate.min.js"></script>
   
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
   
    <script src="../js/ProjectPlus/aqxc.js"></script>
    <script type="text/javascript">
    	(function() {
			var str = '';
			var arr = {
				0: {
					name: '安全管理',
					id: 0
				},
				1: {
					name: '脚手架工程',
					id: 0
				},
				2: {
					name: '基坑工程',
					id: 0
				},
				3: {
					name: '模板工程',
					id: 0
				},
				4: {
					name: '高处作业',
					id: 0
				},
				5: {
					name: '施工用电',
					id: 0
				},
				6: {
					name: '物料提升机',
					id: 0
				},
				7: {
					name: '施工升降机',
					id: 0
				},
				8: {
					name: '物料提升机与施工升降机',
					id: 0
				},
				9: {
					name: '塔式起重机',
					id: 0
				},
				10: {
					name: '起重吊装',
					id: 0
				},
				11: {
					name: '施工机具',
					id: 0
				},
				12: {
					name: '汽车吊作业',
					id: 0
				},
				13: {
					name: '恶劣天气',
					id: 0
				},
				14: {
					name: '现场消防',
					id: 0
				},
				15: {
					name: '施工现场',
					id: 0
				},
				16: {
					name: '其他工程',
					id: 0
				}
			};
			for(let x in arr) {
				str += `<li><label><input type="checkbox" value="${arr[x].id}" data-name="${arr[x].name}">${arr[x].name}</label></li>`;
			}
			$('#selWxy').html(str);
		})();

		$("#wxylx").click(function() {
			$(this).attr('placeholder', '');
			var name = '';
			$('#selWxy input').each(function() { //循环遍历checkbox
				var check = $(this).is(':checked'); //判断是否选中
				if(check) {
					name += $(this).attr('data-name') + ',';
					$(this).attr('name', "selWxy");
				} else {
					$(this).attr('name', "");
				}
			});
			$("#wxylx").val(name.slice(0, -1)); //去除最后的逗号
		});

		$("#selWxy").mouseover(function() {
			if(!$("#selWxy").hasClass('hover')) { //类hover在下面用来验证是否需要隐藏下拉，没有其他用途。
				$("#selWxy").addClass('hover');
			}
		}).mouseout(function() {
			$("#selWxy").removeClass('hover');
		});

		$(document).on('click', function() {
			if(!$("#wxylx").is(":focus") && !$("#selWxy").hasClass('hover')) { //如果没有选中输入框且下拉不在hover状态。

				var name = '';
				$('#selWxy input').each(function() { //遍历checkbox
					var check = $(this).is(':checked'); //判断是否选中
					if(check) {
						name += $(this).attr('data-name') + ',';
						$(this).attr('name', "selWxy");
					} else {
						$(this).attr('name', "");
					}
				});
				$("#wxylx").val(name.slice(0, -1)); //去除最后的逗号
				$("#selWxy").addClass('hide');
			} else {
				$("#selWxy").removeClass('hide');
			}
		});
    	
    	
    	
    	
    	$('table').bootstrapTable({		
					striped : true,	//会有隔行变色效果
					pagination : true,	//表格底部显示分页条
					pageSize : 10,	//页面数据条数
					search : true,	//搜索框
					showRefresh : true,	//刷新按钮
					showToggle : true,	//切换试图（table/card）按钮
					showPaginationSwitch : true,	//数据条数选择框
					showColumns : true,	//内容列下拉框
					toolbar : "#toolbar",	//指明自定义的菜单
					showExport : true	//导出按钮
				
			  });
		  $("#save10").click(function(){ 
				$.ajax({
	        cache: true,
	        type: "POST",
	        url:'aqxcbc.php',
	        data:$('#aqxcform').serialize(),// 你的formid
	        async: false,
	        error: function(request) {
	            alert("Connection error");
	        },
	        success: function(data) {
	            alert("保存成功");
	        }
	    	});
			}); 
			
			//js获取URL参数
			function GetRequest() {
			   var url = location.search; //获取url中"?"符后的字串
			   var theRequest = new Object();
			   if (url.indexOf("?") != -1) {
			      var str = url.substr(1);
			      strs = str.split("&");
			      for(var i = 0; i < strs.length; i ++) {
			         theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
			      }
			   }
			   return theRequest;
			}
			
			function dy(){
				var Request = new Object();
						Request = GetRequest();
				var id='';
				id = Request['id']
				window.location.href = "../phpexcel/my_test/fldy_ztlx.php?id=" + id;
			}
    	
    	function dianji2(id){
//							alert(id);
					$.ajax({
	        cache: true,
	        type: "POST",
	        url:'wxysc.php',
	        data:{
	        	gcid1:id
	        },// 你的formid
	        async: false,
	        error: function(request) {
	            alert("Connection error");
	        },
	        success: function(data) {
	            alert("删除成功");
	            window.location.reload();
	        }
	    	}); 
			};		
 				
 					
		 	function test(o) {
		 		var wxyid = document.getElementById("wxyid").value;
		    if (!o.checked) {
		        return;
		    }
    		var wxyid1 = wxyid + "|" + o.id;
    		document.getElementById("wxyid").value = wxyid1;
			}
   
	    jeDate({
				dateCell:"#djtime",
				format:"YYYY-MM-DD",
				isinitVal:true,
				isTime:true, //isClear:false,
				minDate:"2014-09-19 00:00:00",
				okfun:function(val){alert(val)}
			})

   	</script>
  </body>
</html>