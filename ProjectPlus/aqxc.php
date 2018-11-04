

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
													<li class=" lii"><a href="#aqx0" tabindex="-1" data-toggle="tab" >基坑支护及降水工程</a></li>
													<li class="lii"><a href="#aqx1"  tabindex="-1" tabindex="-1" data-toggle="tab" >土方开挖工程</a></li>
													<li class="lii"><a href="#aqx2"  tabindex="-1" data-toggle="tab">模板工程支撑体系</a></li>
													<li class="lii"><a href="#aqx3"  tabindex="-1" data-toggle="tab">脚手架工程</a></li>
													<li class="lii"><a href="#aqx4"  tabindex="-1" data-toggle="tab">起重吊装及安装拆卸工程</a></li>
													<li class="lii"><a href="#aqx5"  tabindex="-1" data-toggle="tab">拆除爆破工程</a></li>
													<li class="lii"><a href="#aqx6"  tabindex="-1" data-toggle="tab">其他危险性较大的工程</a></li>
												</ul>
										  </div>
										  <button type="button" class="btn btn-default" data-toggle="modal" onclick="window.open('ewmdy.php')">生成二维码</button>
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
												<div>		  
													<div class="form-group">
						
														<div class="col-sm-8">
															<?php
															 	$id=$_GET["id"];
							       						$sql = "select * from 我的工程 where  id='$id'";
							       						$result = $conn->query($sql);
							       						while($row = $result->fetch_assoc()) {
								            					
								   						?>
							
															<input type="text" class="form-control" id="" name=""  value="工程名称：<?php echo $row["工程名称"];?>" readonly="readonly">
																<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $id?>"/>
																<?php
																	} 
																?>
														</div>
														<div class="btn-group" >
															<button type="button  " class="btn btn-default dropdown-toggle" data-toggle="dropdown">
																选择
															</button>
															<ul class="dropdown-menu field">
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">安全管理</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">脚手架工程</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">基坑工程</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">模板工程</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">高处作业</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">施工用电</a></li>
																<li class="lii lii1"><a href="#xmxz6" tabindex="-1" data-toggle="tab">物料提升机</a></li>
																<li class="lii lii1"><a href="#xmxz6" tabindex="-1" data-toggle="tab">施工升降机</a></li>
																<li class="lii lii1"><a href="#xmxz6" tabindex="-1" data-toggle="tab">物料提升机与施工升降机</a></li>
																<li class="lii lii1"><a href="#xmxz6" tabindex="-1" data-toggle="tab">塔式起重机</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">起重吊装</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">施工机具</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">汽车吊作业</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">恶劣天气</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">现场消防</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">施工现场</a></li>
																<li class="lii lii6"><a href="#xmxz6" tabindex="-1" data-toggle="tab">其他工程</a></li>      
															</ul>
													 	</div>
													</div>
												</div>
											<!-- 更改 -->         
												<div class="form-group tab-pane fade my_none "  id="xmxz6">
													<form id="aqxcform" name="aqxcform" action="aqxcbc.php" method="post" class="form-horizontal" role="form" >
														<div class="form-group"> 
															<label for="jkmj" class="col-sm-3 control-label" >危险源类型：</label>
															<div class="col-sm-3">
																<input type="text" class="form-control" id="jkmj" name="jkmj" readonly="readonly">
															</div>
								
															<!--<label for="ejlx" class="col-sm-3 control-label" >二级类型：</label>
															<div class="col-sm-3">
																<select class="form-control" id="xllb1"></select> 
															</div>-->
															<label for="ejlx" class="col-sm-3 control-label" >选择安全风险项：</label>
															<div class="col-sm-3">
																<input type="text"  class="form-control"  readonly="readonly" id="select_wxy" name="select_wxy" onclick="window.open('wxy_select.php')"/>
															</div>
															
														</div>
							
														<!--<div class="form-group">
															<label for="sgbw" class="col-sm-3 control-label">施工部位：</label>
															<div class="col-sm-9">
															<select class="form-control" id="xllb2">		</select>				
															</div>
														</div>-->
														<label for="aqfxnum" class="col-sm-3 control-label" >查看安全风险项：</label>
															<div class="col-sm-3">
																<button type="button"  class="form-control"  readonly="readonly" id="watch_wxy" name="watch_wxy" onclick="window.open('chakan.php')">查看</button>
																<!--<input type="text"  class="form-control"  readonly="readonly" id="watch_wxy" name="watch_wxy" value="" onclick="window.open('chakan.php')"/>-->
																<input class="hidden"  id="xuanzhong" name="xuanzhong"/>
															</div>
								
														<div class="form-group">
															<label for="overpg" class="col-sm-3 control-label">超过一定规模的危大工程：</label>
																<div class="col-sm-3">
																	<select id="overpg" name="overpg" class="form-control">
																		<option>是</option>
																		<option>否</option>
																	</select>
																</div>
																	
															
														</div>
										
														<div class="form-group">
															<!--<label for="uses" class="col-sm-3 control-label">安全状态：</label>
															<div class="col-sm-3">
																<select id="overpg" name="overpg" class="form-control">
																	<option>极度危险(红)</option>
																	<option>特别危险(黄)</option>
																</select>
															</div>-->
															<label for="kwsd" class="col-sm-3 control-label">工作状态：</label>
															<div class="col-sm-3">
																<select id="kwsd" name="kwsd" class="form-control">
																	<option>未巡检</option>
																	<option>已巡检</option>
																</select>
															</div>
															
								
								
															<label for="orgs" class="col-sm-3 control-label">是否专家认证：</label>
															<div class="col-sm-3">
																<select id="orgs" name="orgs" class="form-control">
																	<option>是</option>
																	<option>否</option>
																</select>
															</div>
														</div>
							
														<label for="wxyzt" class="col-sm-3 control-label">危险源状态：</label>
														<div class="col-sm-3">
															<select id="wxyzt" name="wxyzt" class="form-control">
																<option>使用中</option>
																<option>已关闭</option>
															</select>
														</div>
								
														<div id="yc">	
															<div class="form-group ">	
																<label for="sccj" class="col-sm-3 control-label">生产厂家：</label>
																<div class="col-sm-3">
																	<input type="text" class="form-control" name="sccj" placeholder="" >
																</div>
															</div>
								
															<div class="form-group">
																<label for="cqdw" class="col-sm-3 control-label">产权单位：</label>
																<div class="col-sm-3">
																	<input type="text" class="form-control" name="cqdw" placeholder="" >
																</div>
								
																<label for="sydate" class="col-sm-3 control-label">审验有效期：</label>
																<div class="col-sm-3">
																	<input type="date" class="form-control" name="sydate" placeholder="" >
																</div>
															</div>
														</div>							
	
														<div class="form-group">
															<label for="djtime" class="col-sm-3 control-label">登记日期：</label>
																<div class="col-sm-3">
																	<input type="text" class="form-control" id="djtime" name="djtime" placeholder="">
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
															<div id="result">
																<label for="yxrq" class="col-sm-3 control-label">风险等级：</label>
																<div class="col-sm-3">
																	<input type="text" class="form-control"  name="fxdj" id="fxdj" placeholder="" >
																</div>
																<input type="button" class="col-sm-3" style="margin-left: 150px;" value="标注危险源" onclick="window.open('marker.php')"/>
																<input type="text" class="hidden" value="" id="jwd" name="jwd" readonly="readonly" />
															</div>
														</div>
													
														<!--<div id="allmap" style="overflow:hidden;zoom:1;position:relative;">	
															<div id="map" style="height:100%;-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out;"></div>
														</div>-->
															<?php
																$id=$_GET["id"];
							       						$sql = "select * from 我的工程 where  id='$id'";
							       						$result = $conn->query($sql);
							       						while($row = $result->fetch_assoc()) {
									            					
								   						?>
									
														<input type="text" class="form-control hidden" id="gcid" name="gcid" value="<?php echo $row["id"];?>">	
														<input type="text" class="form-control hidden" id="gcmc" name="gcmc" value="<?php echo $row["工程名称"];?>">
														<input type="text" class="form-control hidden" id="dqs" name="dqs" value="<?php echo $row["地区省"];?>">
														<input type="text" class="form-control hidden" id="dqs1" name="dqs1" value="<?php echo $row["地区市"];?>">
														<?php
															}	
														?>
													</div>
							
													<div class="form-group hidden">
			                      <label for="sjc" class="control-label col-lg-2">时间戳：</label>
		                        <div class="col-lg-6">
		                        	<!--<input id="jwd" name="jwd" class="form-control"  size="16" type="text" value="" />-->
	                           	<input id="sjc" name="sjc" class="form-control"  size="16" type="text" value="" />
		                        </div>
	                        </div>
	                        <div class="modal-footer" >
														<button type="button" class="btn btn-default " data-dismiss="modal">关闭 </button>
														<button id="save10" type="button" onclick="window.location.reload()" class="btn btn-primary ">提交保存</button>
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
   	<!--js of bootstrap-table -->
   	<script src="../js/bootstrap-table.min.js"></script>
   	<!--js of bootstrap-table—export -->
   	<script src="../js/export/tableExport.js"></script>
   	<script src="../js/export/bootstrap-table-export.js"></script>
   	<script src="../js/bootstrap-table-zh-CN.min.js"></script>
    <script type="text/javascript"src="../js/jquery.validate.min.js"></script>
    <!--<script src='../js/map.js'></script>-->
   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
   
    <script src="../js/ProjectPlus/aqxc.js"></script>
    <script type="text/javascript">
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
		  
		  function goback(){
				 window.location.href="aqxc.php";
				}
				
				
				
	    $(function() {
        $(".lii").click(function() {
            //          第一种方法
             $(".lii").removeClass("active");//删除指定的 class 属性
             $(this).addClass("active");//向被选元素添加一个或多个类
             $(this).toggleClass("active");//该函数会对被选元素进行添加/删除类的切换操作
            var text = $(this).text();//获取当前选中的文本
        	});
		 		$(".lii5").click(function() {          
             $("#xmxz5").removeClass("my_none");
             $("#xmxz6").addClass("my_none");  
        	});
     		$(".lii6").click(function() {          
	         $("#xmxz6").removeClass("my_none");
	         $("#xmxz5").addClass("my_none");
	         $("#yc").addClass("my_none");
        	});
        $(".lii1").click(function() {          
         $("#xmxz6").removeClass("my_none");
         $("#yc").removeClass("my_none");
         $("#xmxz5").addClass("my_none");
        });	
    	})
    	
    	
    	
    	
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
	   </script>
<!-- 更改 -->
<script>	
  	$("ul.field").on("click","li",function(){
  		document.getElementById("jkmj").value=$(this).text();
  		var id=$(this).text();
  							$.ajax({
			                type: "GET",
			                url:'aqxcd.php',
			                data:{
			                	fname:id,
			                	t:0
			                },// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
			                	$("#xllb2").empty();
												$("#xllb1").empty();//刷新下拉列表
												var data = data.split("?");//切割传回来的字符串
												var sel = document.getElementById("xllb1");
												var i=0;
												while(i<data.length-1)//添加下拉列表
												{
													var option = new Option(data[i]);	      
												  sel.options.add(option); 
												  i++;
												}
			                }
			            });
		});			              		
						document.getElementById('xllb1').addEventListener('change',function(){
								var id=this.value;
									$.ajax({
			                type: "GET",
			                url:'aqxcd.php',
			                data:{
			                	fname:id,
			                	t:1
			                },// 你的formid
			                async: false,
			                error: function(request) {
			                    alert("Connection error");
			                },
			                success: function(data) {
												$("#xllb2").empty();//刷新
												var data = data.split("?");
												var sel = document.getElementById("xllb2");
												var i=0;
												while(i<data.length-1)
												{
//													alert(data[i]);
													var option = new Option(data[i]);	      
												  sel.options.add(option); 
												  i++;
												}	
										 	}	
							});						
 					});
 					
 				
 					
 					 function test(o) {
 					 		var wxyid = document.getElementById("wxyid").value;
// 							var wxystr = document.getElementById("wxystr").value;
	            if (!o.checked) {
	                return;
	            }
	            var wxyid1 = wxyid + "|" + o.id;
	            document.getElementById("wxyid").value = wxyid1;
//          	alert(o.id);
//	            var tr = o.parentNode.parentNode;
//	            var tds = tr.cells;
//	            var str = "";
//	            for(var i = 1;i < tds.length;i++){
//	                if (i < 7) {
//	                    str = str + tds[i].innerHTML + ",";
//	                }
//	             	
//         	 		}
//	        		var wxystr1 = wxystr + "|" + str;
//	        		document.getElementById("wxystr").value = wxystr1;
//	            alert(str);
        	}
</script>
<!-- 更改 -->
<script type="text/javascript">
   
    jeDate({
		dateCell:"#djtime",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})

    jeDate({
		dateCell:"#djtime1",
		format:"YYYY-MM-DD",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	})
	  	$("ul.field").on("click","li",function(){
  
  });
</script>
  </body>
</html>