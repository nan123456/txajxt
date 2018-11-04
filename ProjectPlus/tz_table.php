<?php
	ob_start();
	session_start();
	$tag=$_SESSION["zt"];
	
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>中国华西企业有限公司项目质量安全检查管理系统</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/docs.css"/>
    <link href="../css/theme.css" rel="stylesheet">
    <link href="../css/bootstrap-table.min.css" rel="stylesheet">
    <link href="../css/mycss.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jedate.js"></script>
    <script src="../js/ie-emulation-modes-warning.js"></script>
  
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
//	   							$tag=$row["部门"];
   					?>
          <a class="navbar-brand" href="../index.php?yhzh=<?php echo $row["账号"];?>">中国华西</a>
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
    		<!--左侧导航菜单 -->
    		<?php
//										echo $_GET["id"];
										  $id=$_GET["id"];
										  require("../conn.php");
											$sql = "select * from 我的工程 where id='$id' ";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {
                         					
                     ?>
    		<div class="col-md-2">
    			<div class="bs-docs-sidebar affix" role="complementary">
    				<ul class="nav bs-docs-sidenav">
    					<li  ><a href="Project_in.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">项目登记</a>
    					</li>    					
    					<li>
    						<a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">项目管理</a>
    						<ul class="nav">
    							<li  ><a href="aqxc.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">危险源管理</a></li>
    							<li><a href="ryqd.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">人员签到</a></li>
    							<li><a href="sbgl.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">设备管理</a></li>
    							<li><a href="xczg.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">巡查整改</a></li>
    							<li ><a href="zlsc.php?id=<?php echo $row["id"]; ?>&yhid=<?php echo $yhid; ?>">质量实测</a></li>
    							<li class="active"><a href="tz_table.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">台账报表</a></li>
    						</ul>
    					</li>    					
    					<li>
    						<a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">查询分析</a>
    						<ul class="nav">
									<li><a href="wxycxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">危险源</a></li>
									<li><a href="cxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">隐患通知单</a></li>
									<li ><a href="wzcxfx.php?id=<?php echo $row["id"];?>&yhid=<?php echo $yhid;?>">违章大类查询</a></li>
    						</ul>
    					</li>	   				
    				</ul>
    			</div>    			
    		</div><!--左侧导航菜单 -->

    		
    		<!-- 内容区域 -->
    		<div class="col-md-10">
    		
<div id="xmbj" class="panel panel-info ">
    			
	<div class="panel-heading">
		<h3 class="panel-title">项目信息-<?php echo $row["工程名称"];?></h3>
	</div>
	    		              <?php
													}
													$conn->close();		
												?>
	<div class="panel-body">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation"><a href="#zgs" role="tab" data-toggle="tab">总公司</a></li>
			<li role="presentation"><a href="#fgs" role="tab" data-toggle="tab">分公司</a></li>
			<li role="presentation"><a href="#xmb" role="tab" data-toggle="tab">项目部</a></li>
		</ul>	
    <!-- Tab panes -->
		<div class="tab-content">
			
			  				
	
			 <div role="tabpanel" class="tab-pane fade in active " id="zgs" style="margin-top: 20px;">
			 	<div style="margin-top: 10px;">
				<input type="date" style="height: 30px;" id="zb_g" value="" />—<input type="date" id="zb_s" style="height: 30px;"/>&nbsp;&nbsp;<input type="button"  onclick="zb_select()" value="查询" />
			</div>
			<div class="panel-body" style="margin-top: 30px;">
				<input type="button" value="批量打印" style="position: absolute;top: 170px;" onclick="print('checkbox1')"/>
    					<table id="">
    						<thead >
								      <tr>
								      	 <th><input type="checkbox" id="z"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>违章类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								         <th>责任人</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody id="zb_tb">
								   </tbody>
    					</table>
    				</div>
			 </div>
			 
			 
			 <div role="" class="tab-pane fade " id="fgs" style="margin-top: 20px;">
			 	<div style="margin-top: 10px;">
				<input type="date" style="height: 30px;" id="fgs_g" value="" />—<input type="date" style="height: 30px;" id="fgs_s"/>&nbsp;&nbsp;<input type="button" value="查询" onclick="fgs_select()"/>
			</div>
					<div class="panel-body" style="margin-top: 30px;">
						<input type="button" value="批量打印" style="position: absolute;top: 170px;" onclick="print('checkbox2')"/>
    				<table id="">
    						<thead>
								      <tr>
								      	 <th><input type="checkbox" id="f"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>违章类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								         <th>责任人</th>
								         <th>操作</th>
								         <!--<th>删除</th>-->
								      </tr>
								   </thead>
								   <tbody id="fgs_tb">
								   </tbody>
    					</table>
    				</div>
			 </div>
			 
			 
			 <div role="" class="tab-pane fade" id="xmb" style="margin-top: 20px;">
			 	<div style="margin-top: 0px;">
				<input type="date" style="height: 30px;" id="xmb_g" value="" />—<input type="date" style="height: 30px;" id="xmb_s"/>&nbsp;&nbsp;<input type="button" value="查询" onclick="xmb_select()" />
			</div>
					<div class="panel-body" style="margin-top: 30px;">
						<input type="button" value="批量打印" style="position: absolute;top: 170px;" onclick="print('checkbox3')"/>
						<table id="" >
    						<thead>
								      <tr>
								      	 <th><input type="checkbox" id="x"></th>
								         <th>通知单编号</th>
								         <th>检查层级</th>
								         <th>巡查类别</th>
								         <th>检查单位</th>
								         <th>检查对象</th>
								         <th>违章类别</th>
								         <th>违章大类</th>
								         <th>检查日期</th>
								         <th>责任人</th>
								         <th>操作</th>
								      </tr>
								   </thead>
								   <tbody id="xmb_tb">
								     
								   </tbody>
    					</table>
    				</div>
			 </div>
								 
							</div>
							
									
						</div>
					</div> 	
    		</div><!-- 内容区域 -->
    	</div>
    </div>
    <footer class="bs-docs-footer" role="contentinfo">
    <input id="Lee" value='<?php echo $id;?>' hidden="hidden"/>
    </footer>

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
   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/mySidenav.js" type="text/javascript" charset="utf-8"></script>
   
    <!--<script src="../js/ProjectPlus/aqxc.js"></script>-->
    <script type="text/javascript">
    $('table').bootstrapTable({		
		striped : false,	//会有隔行变色效果
		pagination : false,	//表格底部显示分页条
		pageSize : 10,	//页面数据条数
		search : false,	//搜索框
		showRefresh : false,	//刷新按钮
		showToggle : false,	//切换试图（table/card）按钮
		showPaginationSwitch : false,	//数据条数选择框
		showColumns : false,	//内容列下拉框
		toolbar : "#toolbar",	//指明自定义的菜单
		showExport : false	//导出按钮
		
	  });
    </script>
    <script type="text/javascript"src="../js/jquery.validate.min.js"></script>
    <script type="text/javascript">
			$("#save6").click(function(){ 
			    $.ajax({ 
			        url:'xczgbc.php', 
			        type:"POST", 
			        data:$('#cgform').serialize(),
			    
			    }); 
			});  
		</script>
<script>  
    $(function(){  
        function initTableCheckbox() {  
            var $thr = $('table thead tr ');  
//           var $thr = $('.active').find('thead').children('tr');
//              var $checkAllTh = $('<th><input type="checkbox" id="checkAll" name="checkAll" /></th>');  
//              /*将全选/反选复选框添加到表头最前，即增加一列*/  
//              $thr.prepend($checkAllTh);  
//              /*“全选/反选”复选框*/  
            var $checkAll = $thr.find('input'); 
//           alert($checkAll); 
            $checkAll.click(function(event){ 
//          	alert(this.id);
				//判断层级
            	if(this.id=="z"){
            		var $tbr = $('#zgs').find('tbody').children('tr'); 
            	}else if(this.id=="f"){
            		var $tbr = $('#fgs').find('tbody').children('tr');
            	}else if(this.id=="x"){
            		var $tbr = $('#xmb').find('tbody').children('tr');
            	} 
                /*将所有行的选中状态设成全选框的选中状态*/  
                $tbr.find('input').prop('checked',$(this).prop('checked'));  
                /*并调整所有选中行的CSS样式*/  
                if ($(this).prop('checked')) {  
                    $tbr.find('input').parent().parent().addClass('warning');  
                } else{  
                    $tbr.find('input').parent().parent().removeClass('warning');  
                }  
                /*阻止向上冒泡，以防再次触发点击操作*/  
                event.stopPropagation();  
            });  
            /*点击全选框所在单元格时也触发全选框的点击操作*/  
//              $checkAllTh.click(function(){  
//                  $(this).find('input').click();  
//              });  
            var $tbr = $('table tbody tr');  
//			var $tbr = $('.active').find('tbody').children('tr');
//          var $checkItemTd = $('<td><input type="checkbox" name="checkItem" value="123"/></td>');  
            /*每一行都在最前面插入一个选中复选框的单元格*/  
//          $tbr.prepend($checkItemTd);  
            /*点击每一行的选中复选框时*/  
            $tbr.find('input').click(function(event){  
                /*调整选中行的CSS样式*/  
                $(this).parent().parent().toggleClass('warning');  
                /*如果已经被选中行的行数等于表格的数据行数，将全选框设为选中状态，否则设为未选中状态*/  
                $checkAll.prop('checked',$tbr.find('input:checked').length == $tbr.length ? true : false);  
                /*阻止向上冒泡，以防再次触发点击操作*/  
                event.stopPropagation();  
            });  
            /*点击每一行时也触发该行的选中操作*/  
            $tbr.click(function(){  
                $(this).find('input').click();  
            });  
        }  
        initTableCheckbox();  
   
    });  
   
    jeDate({
		dateCell:"#jcrq",
		format:"YYYY-MM-DD hh:mm ",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2014-09-19 00:00:00",
		okfun:function(val){alert(val)}
	}) 

//批量打印
	function print(name){
		if(name=="checkbox1"||name=="checkbox2"||name=="checkbox3"){
			var name = name;
			var box = document.getElementsByName(name);
			var value = new Array();
			value[0] = $('#zb_g').val()+'||'+$('#zb_s').val();
			for(var i=0,j=1; i<box.length; i++,j++){
				if(box[i].checked){
					value[j]=box[i].value;
	//				alert(value[i]);
				}
		}
			window.info = value;
		}else{
			var value = new Array();
			value[0] = '*^^*||*^^*';
			value[1] = name.value;
			window.info = value;
		}
		
		window.open('tz_table.html');
	}
//总部查询
function zb_select(){
	var time_g = $('#zb_g').val();
	var time_s = $('#zb_s').val();
	var tby = document.getElementById('zb_tb');
	
//	alert(time_g+time_s);
	   //获取通知单信息
   var id = $('#Lee').val();
   $.ajax({
        type: "POST",
        url: "tzd_inf.php",
        data: {
        	flag:'zb',
        	id:id,
        	time_g:time_g,
        	time_s:time_s
        },
        dataType: "json",
        success: function (data) {
//      	alert(data)
        	tby.innerHTML="";
        	var ob=JSON.parse(data) ;
        	var length=ob.length;
        	var tb='zb_tb';
        	var box = 'checkbox1';
        	for(var i=0; i<length-1; i++){
        		var sjc = ob[i].时间戳;
        		var tzdbh = ob[i].通知单编号;
        		var jccj = ob[i].检查层级;
        		var xclb = ob[i].巡查类别;
        		var jcdw = ob[i].检查单位;
        		var jcdx = ob[i].检查对象;
        		var jclx = ob[i].检查类型;
        		var wzdl = ob[i].违章大类;
        		var jcrq = ob[i].检查日期;
        		var zrr = ob[i].责任人;
        		tzd_cr(tb,id,sjc,tzdbh,jccj,xclb,jcdw,jcdx,jclx,wzdl,jcrq,zrr,box);
        	}
        },
        error: function (data) {
            alert("提交数据失败！");
        }
    });
}
//分公司查询
function fgs_select(){
	var time_g = $('#fgs_g').val();
	var time_s = $('#fgs_s').val();
	var tby = document.getElementById('fgs_tb');
//	alert(time_g+time_s);
	   //获取通知单信息
   var id = $('#Lee').val();
   $.ajax({
        type: "POST",
        url: "tzd_inf.php",
        data: {
        	flag:'fgs',
        	id:id,
        	time_g:time_g,
        	time_s:time_s
        },
        dataType: "json",
        success: function (data) {
//      	alert(data)
			tby.innerHTML="";
        	var ob=JSON.parse(data) ;
        	var length=ob.length;
        	var tb='fgs_tb';
        	var box = 'checkbox2';
        	for(var i=0; i<length-1; i++){
        		var sjc = ob[i].时间戳;
        		var tzdbh = ob[i].通知单编号;
        		var jccj = ob[i].检查层级;
        		var xclb = ob[i].巡查类别;
        		var jcdw = ob[i].检查单位;
        		var jcdx = ob[i].检查对象;
        		var jclx = ob[i].检查类型;
        		var wzdl = ob[i].违章大类;
        		var jcrq = ob[i].检查日期;
        		var zrr = ob[i].责任人;
        		tzd_cr(tb,id,sjc,tzdbh,jccj,xclb,jcdw,jcdx,jclx,wzdl,jcrq,zrr,box);
        	}
        },
        error: function (data) {
            alert("提交数据失败！");
        }
    });
}
//项目部查询
function xmb_select(){
	var time_g = $('#xmb_g').val();
	var time_s = $('#xmb_s').val();
	var tby = document.getElementById('xmb_tb');
		
//	alert(time_g+time_s);
	   //获取通知单信息
   var id = $('#Lee').val();
   $.ajax({
        type: "POST",
        url: "tzd_inf.php",
        data: {
        	flag:'xmb',
        	id:id,
        	time_g:time_g,
        	time_s:time_s
        },
        dataType: "json",
        success: function (data) {
//      	alert(data)
			tby.innerHTML="";
        	var ob=JSON.parse(data) ;
        	var length=ob.length;
        	var tb='xmb_tb';
        	var box = 'checkbox3';
        	for(var i=0; i<length-1; i++){
        		var sjc = ob[i].时间戳;
        		var tzdbh = ob[i].通知单编号;
        		var jccj = ob[i].检查层级;
        		var xclb = ob[i].巡查类别;
        		var jcdw = ob[i].检查单位;
        		var jcdx = ob[i].检查对象;
        		var jclx = ob[i].检查类型;
        		var wzdl = ob[i].违章大类;
        		var jcrq = ob[i].检查日期;
        		var zrr = ob[i].责任人;
        		tzd_cr(tb,id,sjc,tzdbh,jccj,xclb,jcdw,jcdx,jclx,wzdl,jcrq,zrr,box);
        	}
        },
        error: function (data) {
            alert("提交数据失败！");
        }
    });
}

function tzd_cr(tb,id,sjc,tzdbh,jccj,xclb,jcdw,jcdx,jclx,wzdl,jcrq,zrr,box){
//  	alert(id+sjc+tzdbh+jccj+xclb+jcdw+jcdx+jclx+wzdl+jcrq+zrr);
		var tb = document.getElementById(tb);
		var tr = document.createElement('tr');
		tb.appendChild(tr);
		var td1 = document.createElement('td');
		tr.appendChild(td1); 
		td1.innerHTML='<input type="checkbox" name="'+box+'" value="'+sjc+'/'+id+'/'+tzdbh+'"/>';
		var td2 = document.createElement('td');
		tr.appendChild(td2); 
		td2.innerHTML=tzdbh;
		var td3 = document.createElement('td');
		tr.appendChild(td3); 
		td3.innerHTML=jccj;
		var td4 = document.createElement('td');
		tr.appendChild(td4); 
		td4.innerHTML=xclb;
		var td5 = document.createElement('td');
		tr.appendChild(td5); 
		td5.innerHTML=jcdw;
		var td6 = document.createElement('td');
		tr.appendChild(td6); 
		td6.innerHTML=jcdx;
		var td7 = document.createElement('td');
		tr.appendChild(td7); 
		td7.innerHTML=xclb;
		var td8 = document.createElement('td');
		tr.appendChild(td8); 
		td8.innerHTML=wzdl;
		var td9 = document.createElement('td');
		tr.appendChild(td9); 
		td9.innerHTML=jcrq;
		var td10 = document.createElement('td');
		tr.appendChild(td10); 
		td10.innerHTML=zrr;
		var td11 = document.createElement('td');
		tr.appendChild(td11);
		td11.innerHTML='<button type="button" class="btn btn-default" value="'+sjc+'/'+id+'/'+tzdbh+'" onclick="print(this)" >打印</button>'
    }

function dianji3(id){
var msg = "是否删除?";
if (confirm(msg)==true){$.ajax({
				                cache: true,
				                type: "POST",
				                url:'xczgsc.php',
				                data:{
				                	tpid1:id
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
return true;
}else{
return false;
}
}
			function save4(){
				var check=document.getElementsByName("checkbox");  
				var s = "";
				var t = "";
				var x=0;
				for(var i=0;i<check.length;i++){
   				if(check[i].checked){
						t+=check[i].parentNode.title+'||';
   					s+=check[i].value+'||'; 	
   				} 
   			}
   			var y=t.split("||");
   			for(var x=1;x<y.length-1;x++){
   				if(y[x-1].slice(0,1)!==y[x].slice(0,1)){
   					alert("请选择相同的检查层级");
   					return false;
   				}
   			}
   			var z=y[0].slice(0,1);
   			var tzdbh=s;
   			if(s==''){    							
   				alert("请选择通知单");    					
   			}else{
   				 switch(z)
   				 {
   				 	case "项":
   				 	window.open("llbb/xmbaqpl.php?tzdbh="+tzdbh);
   				 	break;
   				 	case "分":
   				 	window.open("llbb/fgspl.php?tzdbh="+tzdbh);
   				 	break;
   				 	case "总":
   				 	window.open("llbb/zbxmpl.php?tzdbh="+tzdbh);
   				 	break;
   				 	default:
   				 	alert("检查层级的开头并不是总部/分公司/项目部");
   				 }  	
   			 }
   			  
			};
	</script>
  </body>
</html>


