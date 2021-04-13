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
</head>

<body>
	<script>
		window.onload = function(){
			starbarchart1();
		};
		function starbarchart1(){
			var ctx = document.getElementById('myChart').getContext('2d');
			var thang = document.getElementById('selectthang').value;
			var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
			<?php
				$thang = $date['mon'];
				$nam = $data['year'];
				$query3 = "SELECT product.id, product.name, catalog.name, SUM(oder_details.amout)";
				$query3 .= " FROM oder, oder_details, product, catalog";
				$query3 .=  " WHERE oder.id=oder_details.oder_id and oder_details.product_id=product.id and product.catalog_id=catalog.id
				and oder.created BETWEEN '$nam-$thang-01' AND '$nam-$thang-31'";
				$query3 .= " GROUP BY product.id, product.name 
				ORDER BY SUM(oder_details.amout) DESC LIMIT 10";
				$str='';
				$str1='';
				$result3 = mysqli_query($sql,$query3);
				while($row3 = mysqli_fetch_array($result3))
				{
					$str.=',"'.$row3[1].'"';
					$str1.=','.$row3[3];
				}
				$str=trim($str,',');
				$str1=trim($str1,',');
			?>
				labels: [<?php echo($str); ?>],
				datasets: [{
					label: '# Top 10 sản phẩm bán chạy trong tháng 4',
					data: [<?php echo($str1) ?>],
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
	<div class="row" style="height: 500px">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Thống kê bán hàng</div>
					<div class="panel-body">
						<div>Top 10 sản phẩm bán chạy trong tháng 
							<?php
								echo $date['mon']
							?>
<!--
							<select id="selectthang" onchange="starbarchart1()">
								<option value="01">Tháng 1</option><option value="02">Tháng 2</option><option value="03">Tháng 3</option><option value="04">Tháng 4</option><option value="05">Tháng 5</option><option value="06">Tháng 6</option><option value="07">Tháng 7</option><option value="08">Tháng 8</option><option value="09">Tháng 9</option><option value="10">Tháng 10</option><option value="11">Tháng 11</option><option value="12">Tháng 12</option>
							</select>
-->
						</div>
						<div style="width: 500px; height: 500px">
						<canvas id="myChart" width="400" height="400"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
