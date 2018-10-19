<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>绘画标注点</title>
    <link rel="stylesheet"  href="../css/amap.css"/>
 	<link rel="stylesheet" href="https://a.amap.com/jsapi_demos/static/demo-center/css/demo-center.css" />
    <script src="https://cache.amap.com/lbs/static/es5.min.js"></script>
		<style>
			html,
			body,
			#container {
				width: 100%;
				height: 100%;
				
			}
			/*标记样式*/
			.amap-icon img{
            width: 25px;
            height:25px;
            z-index: 100;
            
        }
		</style>
<script src="https://webapi.amap.com/maps?v=1.4.10&key=6441f53831cd39962d12597089d1a5db&plugin=Map3D,ElasticMarker"></script>
<script type="text/javascript" src='https://a.amap.com/jsapi_demos/static/resource/js/tiantan.js'></script>
<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.10&key=6441f53831cd39962d12597089d1a5db"></script>
<script src="https://webapi.amap.com/maps?v=1.4.10&key=6441f53831cd39962d12597089d1a5db&plugin=AMap.PolyEditor"></script>
<script src="https://a.amap.com/jsapi_demos/static/demo-center/js/demoutils.js"></script>
<script src="../js/jquery-1.11.3.min.js"></script>
</head>
<body>
	
<div id="container" >

</div>
<div class="input-card" style="width: 200px">
   <button  class="btn btn-primary" id="sure" >关闭</button>
</div>
<script>
	var gcid = window.opener.document.getElementById("gcid").value;
//	alert(gcid);
	var path = {};
    //缩放地图看看！！！
    var map = new AMap.Map('container', {
        resizeEnable: true,
        zoom: 16
    });
    
    $.ajax({
    	type:"post",
    	url:"php/map.php",
    	async:true,
    	data: {
    		gcid:gcid

		},
		dataType: 'json',
		timeout: 10000,
		success: function(data) {
			console.log(data);
			console.log(path)
			var polygon = new AMap.Polygon({
				path: data,
				isOutline: true,
				borderWeight: 10,
				strokeColor: "#FF33FF",
				strokeWeight: 6,
				strokeOpacity: 0.2,
				fillOpacity: 0.4,
				// 线样式还支持 'dashed'
				fillColor: '#1791fc',
				bubble:true,
				zIndex: 50,
			})

			polygon.setMap(map)
					// 缩放地图到合适的视野级别
					map.setFitView([polygon])

					var polyEditor = new AMap.PolyEditor(map, polygon)

					polyEditor.on('addnode', function(event) {
						log.info('触发事件：addnode')
					})

					polyEditor.on('adjust', function(event) {
						log.info('触发事件：adjust')
					})

					polyEditor.on('removenode', function(event) {
						log.info('触发事件：removenode')
					})

					polyEditor.on('end', function(event) {
						log.info('触发事件： end')
						// event.target 即为编辑后的多边形对象
					})
		},
		error: function(xhr, type, errorThrown) {
			//alert('ajax错误'+type+'---'+errorThrown);
		}
    });
  

   
  	var str =""
   	map.on('click',function(e){
	// 	alert(e.lnglat.lng+"    "+e.lnglat.lat);
	   	a = e.lnglat.lng+","+e.lnglat.lat;
	    marker = new AMap.Marker({
	        icon: "http://webapi.amap.com/theme/v1.3/markers/n/mark_b.png",
	        position: [e.lnglat.lng,e.lnglat.lat]
	    });
	    marker.setMap(map);
	   	str += a + "|";
	   basic = str.substr(0, str.length - 1);

	    console.log(str)
	  	var chek_sure = document.getElementById("sure"); //监控按钮点击事件
	  	chek_sure.addEventListener("click", function() {
			jwd = window.opener.document.getElementById("jwd"); 
			jwd.value = basic;
			window.close();
		});
   	})

  
   new AMap.Polygon({
    cursor:'pointer',
    bubble:true,
    path:[[116.419763,39.882967],[116.419791,39.882397],[116.419674,39.882398],[116.419632,39.882376],[116.419086,39.882371],[116.41912,39.88163],[116.41769,39.881571],[116.417726,39.880507],[116.417791,39.879454],[116.417847,39.878396],[116.417896,39.87733],[116.418027,39.874746],[116.418002,39.874715],[116.417888,39.874716],[116.417732,39.874711],[116.417141,39.874692],[116.416588,39.874675],[116.415591,39.874645],[116.413683,39.874562],[116.413676,39.874127],[116.412921,39.874095],[116.41292,39.874514],[116.412799,39.874549],[116.412244,39.874536],[116.411768,39.874504],[116.411358,39.874478],[116.410034,39.874414],[116.408755,39.874363],[116.408182,39.874332],[116.407259,39.87431],[116.406883,39.8743],[116.406732,39.877576],[116.406254,39.877576],[116.405835,39.877582],[116.40576,39.877621],[116.40574,39.878041],[116.405721,39.878541],[116.404778,39.878539],[116.404748,39.878529],[116.404722,39.87849],[116.404622,39.878493],[116.403535,39.878467],[116.402885,39.878451],[116.402863,39.879073],[116.403702,39.879094],[116.404528,39.879117],[116.404525,39.879152],[116.404636,39.879157],[116.405664,39.879199],[116.405639,39.879913],[116.405593,39.880618],[116.404583,39.880596],[116.404308,39.880602],[116.403795,39.880609],[116.403062,39.880597],[116.402629,39.880599],[116.40199,39.88061],[116.401413,39.880621],[116.400929,39.880633],[116.400889,39.880849],[116.400792,39.880896],[116.400505,39.880913],[116.400405,39.880918],[116.400393,39.88117],[116.400955,39.881193],[116.40089,39.881923],[116.400878,39.882144],[116.400849,39.882624],[116.400794,39.883245],[116.400741,39.883927],[116.400742,39.884154],[116.401057,39.885182],[116.400731,39.885279],[116.400931,39.885696],[116.401043,39.885883],[116.40131,39.886259],[116.401549,39.886532],[116.401668,39.88664],[116.403101,39.886729],[116.403125,39.886766],[116.403145,39.886835],[116.403133,39.886969],[116.403102,39.887379],[116.403144,39.88749],[116.403868,39.88768],[116.404604,39.887846],[116.40549,39.887973],[116.406221,39.888038],[116.40773,39.888094],[116.409536,39.888147],[116.411578,39.888205],[116.413718,39.888269],[116.414653,39.888295],[116.415318,39.888293],[116.41583,39.888257],[116.416241,39.888216],[116.416638,39.88812],[116.416952,39.88804],[116.417343,39.887944],[116.417594,39.887849],[116.417843,39.887737],[116.41803,39.887623],[116.418233,39.887495],[116.418504,39.887327],[116.418719,39.887187],[116.418956,39.887043],[116.419171,39.886916],[116.419415,39.886666],[116.419618,39.886341],[116.42003,39.885517],[116.420323,39.884945],[116.420455,39.88462],[116.420547,39.884246],[116.420558,39.883975],[116.420572,39.883615],[116.420455,39.883601],[116.419832,39.883562],[116.419749,39.883521],[116.41974,39.88346],[116.419763,39.882967]],
    map:map,
    fillOpacity:0.3,
    strokeWeight:1,
    fillColor:'green'

   })

   
</script>

</body>
</html>