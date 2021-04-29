<?php
include('../connect.php');
$class=new Database();
$sql=$class->connect();
$date = getdate();
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Tables</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		var today = new Date();
		var thanggoc = today.getMonth();
		$(document).ready(function() { 
			starbarchart1(thanggoc);
			starbarchart2(thanggoc);
			starbarchart3(thanggoc);
		});
//		document.onload = function() {
//			starbarchart1(04);
//			starbarchart2(04);
//			starbarchart3(04);
//		}
	</script>
</head>

<body>
	<script>
		//Khai báo Chart
		var myChart1;
		var ctx1 = document.getElementById('myChart1').getContext('2d');
		var myChart2;
		var ctx2 = document.getElementById('myChart2').getContext('2d');
		var myChart3;
		var ctx3 = document.getElementById('myChart3').getContext('2d');
		//------------------------------------------------------------------------------------------------------------------------------------------------------------
		function starbarchart1(obj){
			$.ajax({
				type:"POST",
				url: "xulythongke.php",
				dataType: 'html',
				data:{
					thang:$("#selectthang_01").val()
				},
				success: function(data){
					//alert(data);
					var s1=data.split("/");
					var str1= new String(s1[1]);
					var str1a=s1[2];
					//cắt chuỗi str1
					var s2=str1.split(",");
					//Cắt chuỗi str1a
					var s3=str1a.split(",");
					if(myChart1==null){
							myChart1 = new Chart(ctx1, {
								type: 'bar',
								data: {
									labels: s2,//?????????????????????????????????????????????????????????
									datasets: [{
										label: 'Sản phẩm',
										data: s3,
										backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
										],
										borderColor: [
											'rgba(255, 99, 132, 1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
										],
										borderWidth: 1
									}]
								},
								options: {
									scales: {
										y: {
											beginAtZero: true
										}
									}
								}
							});
						}
					else{
							//Phá hủy chart
							myChart1.destroy();
							//Tạo lại chrat dữ liệu mới
							myChart1 = new Chart(ctx1, {
								type: 'bar',
								data: {
									labels: s2,//?????????????????????????????????????????????????????????
									datasets: [{
										label: 'Sản phẩm',
										data: s3,
										backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
										],
										borderColor: [
											'rgba(255, 99, 132, 1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
										],
										borderWidth: 1
									}]
								},
								options: {
									scales: {
										y: {
											beginAtZero: true
										}
									}
								}
							});
						}
				}
			})
		}
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
		function starbarchart2(obj){
			$.ajax({
				type:"POST",
				url: "xulythongke2.php",
				dataType: 'html',
				data:{
					thang:$("#selectthang_02").val(),
					loai:$("#selectloai").val()
				},
				success: function(data){
					//alert(data);
					var s1=data.split("/");
					var str2= new String(s1[1]);
					var str2a=s1[2];
					//cắt chuỗi str1
					var s2=str2.split(",");
					//Cắt chuỗi str1a
					var s3=str2a.split(",");
					if(myChart2==null){
						myChart2 = new Chart(ctx2, {
								type: 'bar',
								data: {
									labels: s2,
									datasets: [{
										label: 'Sản phẩm',
										data: s3,
										backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
										],
										borderColor: [
											'rgba(255, 99, 132, 1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
										],
										borderWidth: 1
									}]
								},
								options: {
									scales: {
										y: {
											beginAtZero: true
										}
									}
								}
							});
					}
					else{
						//Phá hủy chart
						myChart2.destroy();
						//Tạo lại chrat dữ liệu mới
						myChart2 = new Chart(ctx2, {
								type: 'bar',
								data: {
									labels: s2,
									datasets: [{
										label: 'Sản phẩm',
										data: s3,
										backgroundColor: [
											'rgba(255, 99, 132, 0.2)',
											'rgba(54, 162, 235, 0.2)',
											'rgba(255, 206, 86, 0.2)',
											'rgba(75, 192, 192, 0.2)',
											'rgba(153, 102, 255, 0.2)',
											'rgba(255, 159, 64, 0.2)'
										],
										borderColor: [
											'rgba(255, 99, 132, 1)',
											'rgba(54, 162, 235, 1)',
											'rgba(255, 206, 86, 1)',
											'rgba(75, 192, 192, 1)',
											'rgba(153, 102, 255, 1)',
											'rgba(255, 159, 64, 1)'
										],
										borderWidth: 1
									}]
								},
								options: {
									scales: {
										y: {
											beginAtZero: true
										}
									}
								}
							});
					}
				}
			})
		}
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
		function starbarchart3(obj){
			$.ajax({
				type:"POST",
				url: "xulythongke3.php",
				dataType: 'html',
				data:{
					thang:$("#selectthang_03").val(),
				},
				success: function(data){
					//alert(data);
					var s1=data.split("/");
					var str3= new String(s1[1]);
					var str3a=s1[2];
					//cắt chuỗi str1
					var s2=str3.split(",");
					//Cắt chuỗi str1a
					var s3=str3a.split(",");
					if(myChart3==null){
						myChart3 = new Chart(ctx3, {
							type: 'bar',
							data: {
								labels: s2,
								datasets: [{
									label: 'Sản phẩm',
									data: s3,
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									y: {
										beginAtZero: true
									}
								}
							}
						});
					}
					else{
						//Phá hủy chart
						myChart3.destroy();
						//Tạo lại chrat dữ liệu mới
						myChart3 = new Chart(ctx3, {
							type: 'bar',
							data: {
							labels: s2,
							datasets: [{
								label: 'Sản phẩm',
								data: s3,
								backgroundColor: [
									'rgba(255, 99, 132, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(255, 206, 86, 0.2)',
									'rgba(75, 192, 192, 0.2)',
									'rgba(153, 102, 255, 0.2)',
									'rgba(255, 159, 64, 0.2)'
								],
								borderColor: [
									'rgba(255, 99, 132, 1)',
									'rgba(54, 162, 235, 1)',
									'rgba(255, 206, 86, 1)',
									'rgba(75, 192, 192, 1)',
									'rgba(153, 102, 255, 1)',
									'rgba(255, 159, 64, 1)'
								],
								borderWidth: 1
								}]
							},
							options: {
								scales: {
									y: {
										beginAtZero: true
									}
								}
							}
						});
					}
				}
			})
		}
	</script>
	<div class="row">
		<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
		<li class="active">Thống kê bán hàng</li>
		</ol>
	</div><!--/.row-->
		
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thống kê bán hàng</h1>
		</div>
	</div><!--/.row-->
	<div class="row" style="height: 500px">
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">Thống kê bán hàng</div>
				<div class="panel-body">
					<div>Top 10 sản phẩm bán chạy trong tháng 
					<div name="mon" id="mon"></div>
					<select id="selectthang_01" name="selectthang_01" onchange="starbarchart1(this);">
						<option value="01">Tháng 1</option><option value="02">Tháng 2</option><option value="03">Tháng 3</option><option value="04">Tháng 4</option><option value="05">Tháng 5</option><option value="06">Tháng 6</option><option value="07">Tháng 7</option><option value="08">Tháng 8</option><option value="09">Tháng 9</option><option value="10">Tháng 10</option><option value="11">Tháng 11</option><option value="12">Tháng 12</option>
					</select>
					</div>
					<div style="width: 100%; height: 500px">
						 <canvas id="myChart1" width="400" height="400"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">Tình hình kinh doanh của các sản phẩm theo loại</div>
				<div class="panel-body">
					<div>Tình hình kinh doanh của các sản phẩm theo loại
					<select id="selectloai" id="selectloai">
					<?php
                         $querycatalog="select * from catalog";
                         $resultcatalog= mysqli_query($sql,$querycatalog);
                         while($row=mysqli_fetch_array($resultcatalog))
                         {
							echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
                         }                      
                    ?>
					</select>
					Chọn tháng:<select id="selectthang_02" name="selectthang_02" onchange="starbarchart2(this);">
						<option value="01">Tháng 1</option><option value="02">Tháng 2</option><option value="03">Tháng 3</option><option value="04">Tháng 4</option><option value="05">Tháng 5</option><option value="06">Tháng 6</option><option value="07">Tháng 7</option><option value="08">Tháng 8</option><option value="09">Tháng 9</option><option value="10">Tháng 10</option><option value="11">Tháng 11</option><option value="12">Tháng 12</option>
					</select>
					</div>
					<div style="width: 100%; height: 500px">
						 <canvas id="myChart2" width="400" height="400"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">Thống kê mỗi loại bán được bao nhiêu sản phẩm</div>
				<div class="panel-body">
				<div>Thống kê loại sản phẩm bán chạy trong tháng <br>
                	<select id="selectthang_03" name="selectthang_03" onchange="starbarchart3(this);">
					<option value="01">Tháng 1</option><option value="02">Tháng 2</option><option value="03">Tháng 3</option><option value="04">Tháng 4</option><option value="05">Tháng 5</option><option value="06">Tháng 6</option><option value="07">Tháng 7</option><option value="08">Tháng 8</option><option value="09">Tháng 9</option><option value="10">Tháng 10</option><option value="11">Tháng 11</option><option value="12">Tháng 12</option>
					</select>
				</div>
				<div style="width: 100%; height: 500px">
					<canvas id="myChart3" width="400" height="400"></canvas>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
