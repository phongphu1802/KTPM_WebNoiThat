<?php
	if(isset($_POST['idoder']))
	{
		$idoder=$_POST['idoder'];
?>
	<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-table.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<h2 style="color: black; margin-left: 35%;">Chi tiết đặt hàng</h2>
	<?php
			//lấy tên tài khoản địa chỉ
			include('../connect.php');
			$class8=new Database();
			//Lấy tên khách hàng số điện thoại
				//1 lấy tài khoản khách hàng
				$sqlusernamekh1="SELECT user_username, total_price, created FROM oder WHERE id = $idoder";
				$datalname1=$class8->query($sqlusernamekh1);
				foreach($datalname1 as $key1=>$value1){
					$name=$value1['user_username'];
					$sum=$value1['total_price'];
					$day=$value1['created'];
				};
				//2 lấy tên với sdt khách
				$sqlusernamekh2="SELECT `username`, `password`, `phonenumber`, `name`, `gioitinh`, `email`, `address`, `created`, `position` FROM user WHERE `username` = '$name'";
				$datalname2=$class8->query($sqlusernamekh2);
				foreach($datalname2 as $key1=>$value1){
					$name1=$value1['name'];
					$sdt=$value1['phonenumber'];
				};
			$sqloder="SELECT * FROM oder WHERE id=$idoder";
			$dataloder1=$class8->query($sqloder);
			foreach($dataloder1 as $key=>$value){
				?>
				<h4>Tên Khách hàng: <?php echo $name1 ?></h4>
				<h4>Địa chỉ giao hàng: <?php echo $value['address'] ?></h4>
				<h4>Số điện thoại: 0<?php echo $sdt ?></h4>
				<h4>Ngày tạo: <?php echo $value['created'] ?></h4>
				<?php
			}
	?>
	<div style="width: 100%;height: 400px">
	<table data-toggle="table">
		<thead>
			<tr>
				<th data-sortable="true">Tên sản phẩm</th>
				<th data-sortable="true">Số lượng</th>
				<th data-sortable="true">Giá một sản phẩm</th>
				<th data-sortable="true">Tổng giá</th>
			</tr>
		</thead>
		<?php
			include('laynameproduct.php');
			$product=new search();
			$sqloder1="SELECT * FROM oder_details WHERE oder_id=$idoder";
			$dataloderdetails=$class8->query($sqloder1);
			foreach($dataloderdetails as $key=>$value){
				//Tìm tên sản phẩm
				print_r('<tr>
				<td data-sortable="true">'.$product->searchnameproduct($value['product_id']).'</td>
				<td data-sortable="true">'.$value['amout'].'</td>
				<td data-sortable="true">'.number_format($value['price']).'</td>
				<td data-sortable="true">'.number_format($value['amout']*$value['price']).'</td>							
				</tr>');
			}	
		
		?>
	</table>
	</div>
	<h2>Tổng hóa đơn: <?php echo number_format($sum) ?> </h2>
	<?php
	}
?>