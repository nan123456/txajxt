<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <style>
    html,
    body,
    #container {
      width: 100%;
      height: 100%;
    }
    .input {
		  display: inline-block;
		  font-weight: 400;
		  text-align: center;
		  white-space: nowrap;
		  vertical-align: middle;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		  border: 1px solid transparent;
		  transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
		  background-color: transparent;
		  background-image: none;
		  color: #25A5F7;
		  border-color: #25A5F7;
		  padding: .25rem .5rem;
		  line-height: 1.5;
		  border-radius: 1rem;
		  -webkit-appearance: button;
		  cursor:pointer;
		}
    </style>
    <title>椭圆的绘制和编辑</title>
    <link rel="stylesheet" href="https://a.amap.com/jsapi_demos/static/demo-center/css/demo-center.css" />
    <script src="https://webapi.amap.com/maps?v=1.4.10&key=6441f53831cd39962d12597089d1a5db&plugin=AMap.MouseTool"></script>
    <script src="https://a.amap.com/jsapi_demos/static/demo-center/js/demoutils.js"></script>
</head>
<body>
	
<div id="container"></div>
<div class="input-card" style="width: 200px">
   <h4 style="margin-bottom: 10px; font-weight: 600">利用mouseTool绘制覆盖物</h4>
 	<input class="input" type="type" name="floor_NUM" id="floor_NUM" value="" placeholder="请填写绘画模型层数" />
   	<button class="btn" onclick="drawPolyline()" style="margin-bottom: 5px">绘制线段</button> 
   	<button class="btn" onclick="drawPolygon()" style="margin-bottom: 5px">绘制多边形</button> 
   	<button class="btn" onclick="drawRectangle()" style="margin-bottom: 5px">绘制矩形</button> 
   <!--<button class="btn" onclick="drawCircle()" style="margin-bottom: 5px">绘制圆形</button>--> 
 
   <button  class="btn btn-primary" id="sure" >关闭</button>
</div>
<script type="text/javascript">
	var chek_sure = document.getElementById("sure"); //监控按钮点击事件
    var map = new AMap.Map("container", {
	 	resizeEnable: true,
        zoom: 14
    });
            AMap.plugin('AMap.Geolocation', function() {
        var geolocation = new AMap.Geolocation({
            enableHighAccuracy: true,//是否使用高精度定位，默认:true
            timeout: 10000,          //超过10秒后停止定位，默认：5s
            buttonPosition:'RB',    //定位按钮的停靠位置
            buttonOffset: new AMap.Pixel(10, 20),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            zoomToAccuracy: true,   //定位成功后是否自动调整地图视野到定位点

        });
        map.addControl(geolocation);
        geolocation.getCurrentPosition(function(status,result){
            if(status=='complete'){
                onComplete(result)
            }else{
                onError(result)
            }
        });
    });

    var mouseTool = new AMap.MouseTool(map)

    function drawPolyline () {
      mouseTool.polyline({
        strokeColor: "#3366FF", 
        strokeOpacity: 1,
        strokeWeight: 6,
        // 线样式还支持 'dashed'
        strokeStyle: "solid",
        // strokeStyle是dashed时有效
        // strokeDasharray: [10, 5],
      })
    }

    function drawPolygon () {
      mouseTool.polygon({
        strokeColor: "#FF33FF", 
        strokeOpacity: 1,
        strokeWeight: 6,
        strokeOpacity: 0.2,
        fillColor: '#1791fc',
        fillOpacity: 0.4,
        // 线样式还支持 'dashed'
        strokeStyle: "solid",
        // strokeStyle是dashed时有效
        // strokeDasharray: [30,10],
      })
    }

    function drawRectangle () {
      mouseTool.rectangle({
        strokeColor:'red',
        strokeOpacity:0.5,
        strokeWeight: 6,
        fillColor:'blue',
        fillOpacity:0.5,
        // strokeStyle还支持 solid
        strokeStyle: 'solid',
        // strokeDasharray: [30,10],
      })
    }

    function drawCircle () {
      mouseTool.circle({
        strokeColor: "#FF33FF",
        strokeOpacity: 1,
        strokeWeight: 6,
        strokeOpacity: 0.2,
        fillColor: '#1791fc',
        fillOpacity: 0.4,
        strokeStyle: 'solid',
        // 线样式还支持 'dashed'
        // strokeDasharray: [30,10],
      })
    }

    mouseTool.on('draw', function(e,obj,type) {
      // event.obj 为绘制出来的覆盖物对象
      	log.info('覆盖物对象绘制完成')
      	var str = e.obj.getPath();
// 		console.log(str.length);
		for(var i=0;i<str.length;i++){
        	var a = str[i].lng+","+str[i].lat
//          console.log(str[i].lng+","+str[i].lat);
            var arr = arr + "|" + a;
            
//          alert(str);
            
        } 
   		
   		a = arr.substring(10) ;
// 		console.log(jwd);
		chek_sure.addEventListener("click", function() {
			 	jwd = window.opener.document.getElementById("jwd1"); 
			 	jwd.value = a
					window.close();
					});
		
    })

</script>
</body>
</html>