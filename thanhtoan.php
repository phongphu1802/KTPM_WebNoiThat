<?php
include('connect.php');
include('kiemtrasession.php');
include('funtion.php');
if( !isset($_SESSION['username'])){
	echo "Bạn phải đăng nhập mới thực hiện được chức năng này";
	exit;
}
if($_SESSION['tongtien']==0){
	echo "Không có sản phẩm để thanh toán";
	exit;
}
$db=new Database();
//$db2 = mysqli_connect("localhost","root","","csdl_ban_hang") or die ();
$key = $_SESSION['username'];
$user = $db->fetchuser("user",$key);
$sqlloaikh="select * from loaikhachhang,xephangthanhvien where loaikhachhang.malkh=xephangthanhvien.malkh and matv='".$_SESSION['username']."'";
$data=$db->query($sqlloaikh);
foreach ($data as $value){
	$loai=$value['tenlkh'];
	$giam=$value['sotiengian'];
	break;
}
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
    <script>
	$(document).ready(function(){
		$("#btnsubmit12").click(function(){
			$.ajax({
				type:"POST",
				url: "xulythanhtoan.php",
				dataType: "html",
				data:{
					total:$("#total").val(),
					user:$("#user").val(),
					diachi:$("#diachi").val()
				},
				success: function(data){
					alert("Thanh toán thành công");
					location.reload();
				}
			});
		});	
	});
	</script>
<body>
<div class="col-md-9">
	<section class="box-main1">
		<h3 class="title-main" style="text-align: left;"> Thanh toán đơn hàng</h3>
			<div class="form-group">
				<label for="exampleInputEmail1">Họ và tên</label>
					<input type="text" readonly="" class="form-control"  name="name" value="<?php echo $user['name'] ?>">
					<!--thông báo -->
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1"  >Email</label>
					<input type="email"  readonly="" class="form-control"  name="email" value="<?php echo $user['email'] ?>">
					<!--thông báo -->
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1" >Số điện thoại</label>
					<input type="text" readonly=""  class="form-control"  name="phone" value="<?php echo $user['phonenumber'] ?>">
					<!--thông báo -->
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1"  >Địa chỉ</label>
					<input type="text" id="diachi"   class="form-control"   name="address" value="<?php echo $user['address'] ?>">
					<!--thông báo -->
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1"  >Loại khách hàng</label>
					<input type="text" readonly=""  class="form-control"  name="loaikh" value="<?php echo $loai ?>">
					<!--thông báo -->
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1" >Tạm tính</label>
					<input type="text" readonly="" class="form-control"  value="<?php echo  number_format($_SESSION['tongtien'])?>" >
					<!--thông báo -->
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1" >Giảm ( <?php echo $giam ?>% )</label>
					<input type="text" readonly="" class="form-control"  value="<?php echo  number_format($_SESSION['tongtien']*$giam/100)?>" >
					<!--thông báo -->
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1" ><b>Tổng tiền</b></label>
					<input type="text" readonly="" class="form-control"  value="<?php echo  number_format($_SESSION['tongtien']*(100-$giam)/100)?>" >
					<!--thông báo -->
			</div>
			<input type="hidden" readonly="" id="total" class="form-control"  value="<?php echo ($_SESSION['tongtien']*(100-$giam)/100)?>">
			<input type="hidden" id="user" class="form-control"  name="name" value="<?php echo $key ?>">

			
			<div class="form-group">
				<div>
					<button  id="btnsubmit12" value="" class="btn btn-success">Thanh toán</button>
				</div>
			</div>
		<!-- nội dung -->
	</section>
</div>
</body>