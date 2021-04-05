<?php
include('connect.php');
include('kiemtrasession.php');
include('funtion.php');
$sum=0;
$total=0;
if ( !isset($_SESSION['shoppingcart']) || count($_SESSION['shoppingcart']) == 0) {
	$_SESSION['tongtien']=0;
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
		function confirmbefore()
		{
			if(confirm('Bạn có chắc muốn xóa sản phẩm này'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function confirmbefore1()
		{
			if(confirm('Bạn có chắc muốn thay đổi sản phẩm này'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function thanhtoanhoadon(){
			$.ajax({
				type:"POST",
				url: "thanhtoan.php",
				dataType: 'html',
				data:{
					
				},
				success: function(data){
					if(data=="Bạn phải đăng nhập mới thực hiện được chức năng này"){
						alert(data);
						$("#myModaldn").show(true);
						$("#myModaldn").modal(options11);
							var options11 = {
								'backdrop' : 'static',
								'keyboard' : true,
								'show' :true,
								'focus' : false
							}
					}else if(data=="Không có sản phẩm để thanh toán"){
						alert(data);
					}else{
						$("#chitietthanhtoan").html(data);
						$("#myModalthanhtoan").modal(thanhtoan);
						var thanhtoan = {
							  'backdrop' : 'static',
							  'keyboard' : true,
							  'show' :true,
							  'focus' : false
						}
					}
				}
			});
		}
		function xoasanpham(obj){
			if(confirmbefore()){
				$.ajax({
					type:"POST",
					url: "deletecart.php",
					dataType: 'html',
					data:{
						key:obj.id
					},
					success: function(data){
						alert(data);
						location.reload();
					}
				});
			}
		}
		function chinhsuagiohang(obj){
			if(confirmbefore1()){
				$.ajax({
					type:"POST",
					url: "updatecart.php",
					dataType: 'html',
					data:{
						key:obj.id,
						amout:$("#amout").val()
					},
					success: function(data){
						alert(data);
						location.reload();
					}
				});
			}
		}
	</script>
<div style="1000px;" >
	<section class="box-main1" >
		<h2 class="title-main" style="text-align: center; color:#E25D33">Giỏ hàng của bạn </h2>
		<table class="table table-hover" style="width: 100%">
			<thead>
				<tr>
                    <th >STT</th>
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Số lượng</th>
					<th>Giá</th>
					<th>Tổng tiền</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody id="tbody">
				
				<?php if(isset($_SESSION['shoppingcart'])){$stt =1;foreach ($_SESSION['shoppingcart'] as $key => $value){ ?>
				
				<tr>
                	<td><?php echo $stt ?></td>
					<td><?php echo $value['name'] ?></td>

					<td>
						<img src="<?php echo $value["image"];?>" width="80%" height="200px">
					</td>
					<td>
						<input type="number" name="amout" style="width: 50px;" value="<?php echo $value['amout'] ?>" class="format-control" id="amout" min=1 >
					</td>
					<td><?php echo number_format($value['price'])?>đ</td>

					<td><?php echo number_format($value['price'] * $value['amout'])?>đ</td>
					<td>
						<a href="#" class="btn btn-xs btn-info updatecart" data-key="<?php echo $key?>" id="<?php echo $key?>" onClick="chinhsuagiohang(this)"> <i class="fa fa-refresh"></i>Cập nhật</a>
						<a href="#" id="<?php echo $key?>" style="width:100%" class="btn btn-xs btn-danger" onClick="xoasanpham(this)"> <i class="fa fa-remove"></i>Xóa</a>
					</td>
				</tr>
				<?php $total += $value['price'] * $value['amout']; ?>
				<?php $sum+= ($value['price'] * $value['amout']); $_SESSION['tongtien'] = $sum  ; ?>
				<?php  $stt++;}} ?>
			</tbody>
		</table>
		<div class="col-md-5" style="margin-left:50%" >
			<ul class="list-group"  style="width:120%">
				<h3 style="text-align: center; color:#E25D33">Thông tin đơn hàng</h3>
				<li class="list-group-item">
					Tổng tiền: <span class="badge"><?php echo number_format($total);?>đ</span>					
				</li>
				
				<li class="list-group-item">
					Tổng thanh toán:<span class="badge"><?php echo number_format($_SESSION['tongtien']);?>đ</span>
					 
				</li>
				<li class="list-group-item">
					<a href="index.php" class="btn btn-info">Tiếp tục mua hàng</a>
					<span onClick="thanhtoanhoadon()" style="width:40%" class="btn btn-success">Thanh toán</span>
				</li>
			</ul>
		</div>
	</section>
</div>
