<?php
	if(isset($_POST['idcart']))
	{
		$idcart=$_POST['idcart'];
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
	<h2 style="color: black; margin-left: 35%;" id="billDetail">Chi tiết hóa đơn</h2>
	<?php
			//lấy tên tài khoản địa chỉ
			include('../connect.php');
			$class7=new Database();
			//Lấy tên khách hàng số điện thoại
				//1 lấy tài khoản khách hàng
				$sqlusernamekh1="SELECT user_username, total_price, created FROM cart WHERE id = $idcart";
				$datalname1=$class7->query($sqlusernamekh1);
				foreach($datalname1 as $key1=>$value1){
					$name=$value1['user_username'];
					$sum=$value1['total_price'];
					$day=$value1['created'];
				};
				//2 lấy tên với sdt khách
				$sqlusernamekh2="SELECT `username`, `password`, `phonenumber`, `name`, `gioitinh`, `email`, `address`, `created`, `position` FROM user WHERE `username` = '$name'";
				$datalname2=$class7->query($sqlusernamekh2);
				foreach($datalname2 as $key1=>$value1){
					$name1=$value1['name'];
					$sdt=$value1['phonenumber'];
				};
			$sqlcart="SELECT * FROM cart WHERE id=$idcart";
			$datalcart1=$class7->query($sqlcart);
			foreach($datalcart1 as $key=>$value){
				?>
				<h4>Tên Khách hàng: <?php echo $name1 ?></h4>
				<h4>Địa chỉ giao hàng: <?php echo $value['address'] ?></h4>
				<h4>Số điện thoại: 0<?php echo $sdt ?></h4>
				<h5>-----------------------------------------------------------</h5>
				<h4>Ngày giao hàng: <?php echo $day; ?></h4>
				<?php
			}
	?>
	<div style="width: 100%;height: 400px">
	<table data-toggle="table">
		<thead>
			<tr>
				<th data-sortable="true" name="name">Tên sản phẩm</th>
				<th data-sortable="true" id="amount">Số lượng</th>
				<th data-sortable="true" id="price">Giá một sản phẩm</th>
				<th data-sortable="true" id="total">Tổng giá</th>
			</tr>
		</thead>
		<?php
			include('laynameproduct.php');
			$product=new search();
			$sqlcart="SELECT * FROM cart_details WHERE cart_id=$idcart";
			$datalcartdetails=$class7->query($sqlcart);
			foreach($datalcartdetails as $key=>$value){
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
	<h2>Tổng hóa đơn: <?php echo number_format($sum)?> </h2>
	<?php
	}
?>