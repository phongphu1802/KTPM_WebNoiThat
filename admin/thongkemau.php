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
		window.onload = function(){
			starbarchart1();
			starbarchart2();
			starbarchart3();
		};
	</script>
</head>

<body>
	<script>
		//------------------------------------------------------------------------------------------------------------------------------------------------------------
		function starbarchart1(obj){
			var ctx1 = document.getElementById('myChart1').getContext('2d');
			$.ajax({
					type:"POST",
					url: "xulythongke.php",
					dataType: 'html',
					data:{
						thang:obj.value
					},
					success: function(data){
						//alert(data);
						var s1=data.split("/");
						var str1= new String(s1[1]);
						var str1a=s1[2];
						alert(str1);
						//alert(str1a);
						var myChart1 = new Chart(ctx1, {
							type: 'bar',
							data: {
								labels: [str1],//?????????????????????????????????????????????????????????
								datasets: [{
									label: 'Sản phẩm',
									data: [parseInt(str1a)],
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
				})
		}
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
		function starbarchart2(obj){
			<?php
			$query2 ="SELECT catalog.id, product.id, product.name, SUM(oder_details.amout), product.price ";
	   		$query2.="FROM oder, oder_details, product, catalog ";
	  		$query2.="WHERE oder.id=oder_details.oder_id and oder_details.product_id=product.id and product.catalog_id=catalog.id and catalog.id='1' ";
	   		$query2.="and oder.created BETWEEN '2021-04-01' AND '2021-04-31' ";
	   		$query2.="GROUP BY catalog.id, product.id, product.price ";
	   		$result2 = mysqli_query($sql,$query2);
			$str2='';
			$str2a='';
			while($row2 = mysqli_fetch_array($result2))
			{
				$str2.=',"'.$row2[2].'"';
				$str2a.=','.$row2[3];
			}
			$str2=trim($str2,',');
			$str2a=trim($str2a,',');
			?>
			var ctx2 = document.getElementById('myChart2').getContext('2d');
			var myChart2 = new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: [<?php echo $str2?>],
					datasets: [{
						label: 'Sản phẩm',
						data: [<?php echo $str2a?>],
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
		//---------------------------------------------------------------------------------------------------------------------------------------------------------------------
		function starbarchart3(obj){
			<?php
				$query3 = "SELECT catalog.id, catalog.name, SUM(oder_details.amout) ";
			    $query3.= "FROM oder, oder_details, product, catalog ";
			    $query3.=" where oder.id=oder_details.oder_id and oder_details.product_id=product.id and product.catalog_id=catalog.id ";
			    $query3.=" and oder.created BETWEEN '2021-04-01' AND '2021-04-31' ";
			    $query3.=" GROUP BY catalog.id, catalog.name ";
			    $result3 = mysqli_query($sql,$query3);
				$str3='';
				$str3a='';
				while($row3 = mysqli_fetch_array($result3)){
					$str3.=',"'.$row3[1].'"';
					$str3a.=','.$row3[2];
				}
				$str3=trim($str3,',');
				$str3a=trim($str3a,',');
			?>
			var ctx3 = document.getElementById('myChart3').getContext('2d');
			var myChart3 = new Chart(ctx3, {
				type: 'bar',
				data: {
					labels: [<?php echo $str3?>],
					datasets: [{
						label: 'Sản phẩm',
						data: [<?php echo $str3a?>],
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
					<select id="selectthang" name="selectthang" onchange="starbarchart1(this);">
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
					<select id="selectthang" id="selectthang" onchange="starbarchart2(this);">
						<option value="">--Loại--</option>
					<?php
                         $querycatalog="select * from catalog";
                         $resultcatalog= mysqli_query($sql,$querycatalog);
                         while($row=mysqli_fetch_array($resultcatalog))
                         {
							echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
                         }                      
                    ?>
					</select>
					Chọn tháng:<select id="selectthang" name="selectthang" onchange="starbarchart2(this);">
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
                	<select id="selectthang" name="selectthang" onchange="starbarchart3(this);">
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
