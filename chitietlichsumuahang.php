<?php
	if(isset($_POST['cart_id']))
	{
		$cart_id=$_POST['cart_id'];
		include('connect.php');
		$classchitietlichsu=new Database();
		$stt=1;
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
<div style="1000px;" >
	<section class="box-main1" >
		<h2 class="title-main" style="text-align: center; color:#E25D33">Chi tiết đơn hàng</h2>
		<?php
			//lấy tên tài khoản địa chỉ
			//Lấy tên khách hàng số điện thoại
				//1 lấy tài khoản khách hàng
				$sqlusernamekh1="SELECT user_username, total_price, created FROM cart WHERE id = $cart_id";
				$datalname1=$classchitietlichsu->query($sqlusernamekh1);
				foreach($datalname1 as $key1=>$value1){
					$name=$value1['user_username'];
					$sum=$value1['total_price'];
					$day=$value1['created'];
				};
				//2 lấy tên với sdt khách
				$sqlusernamekh2="SELECT `username`, `password`, `phonenumber`, `name`, `gioitinh`, `email`, `address`, `created`, `position` FROM user WHERE `username` = '$name'";
				$datalname2=$classchitietlichsu->query($sqlusernamekh2);
				foreach($datalname2 as $key1=>$value1){
					$name1=$value1['name'];
					$sdt=$value1['phonenumber'];
				};
			$sqlcart="SELECT * FROM cart WHERE id=$cart_id";
			$datalcart1=$classchitietlichsu->query($sqlcart);
			foreach($datalcart1 as $key=>$value){
				?>
				<h4>Tên Khách hàng: <?php echo $name1 ?></h4>
				<h4>Địa chỉ giao hàng: <?php echo $value['address'] ?></h4>
				<h4>Số điện thoại: 0<?php echo $sdt ?></h4>
				<h5>-----------------------------------------------------------</h5>
				<h4>Nhân viên kiểm đơn: <?php echo $value['employee'] ?> </h4>
				<h4>Ngày giao hàng: <?php echo $day; ?></h4>
				<?php
			}
	?>
		<table class="table table-hover" style="width: 100%">
			<thead>
				<tr>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Giá một sản phẩm</th>
					<th>Tổng giá</th>
				</tr>
			</thead>
			<tbody id="tbody">
<?php
		include('admin/laynameproduct.php');
		$product=new search();
		$sqlchitietlichsu="SELECT * FROM cart_details WHERE cart_id='$cart_id'";
		if($datachitietlichsu=$classchitietlichsu->query($sqlchitietlichsu)){
			foreach($datachitietlichsu as $key=>$value){
?>
				<tr>
					<td><?php echo $product->searchnameproduct($value['product_id']) ?></td>
					<td><?php echo $value['amout'] ?></td>
					<td><?php echo number_format($value['price']) ?></td>
					<td><?php echo number_format($value['price']*$value['amout'])?></td>
				</tr>
<?php		
			}
		}
?>			</tbody>
		</table>
	</section>
	<h2>Tổng hóa đơn: <?php echo number_format($sum) ?> </h2>
</div>		
<?php				
	}
?>