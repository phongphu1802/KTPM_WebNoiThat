<?php
	if(isset($_POST['username']))
	{
		$username=$_POST['username'];
		include('connect.php');
		$classlichsu=new Database();
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
<script>
	function detail(obj){
		$.ajax({
			type:"POST",
			url: "chitietlichsumuahang.php",
			dataType: 'html',
			data:{
				cart_id:obj.id
			},
			success: function(data){
				$("#themchitietgiohang").html(data);
				$("#myModalchitietgiohang").modal(options8);
					var options8 = {
					'backdrop' : 'static',
					'keyboard' : true,
					'show' :true,
					'focus' : false
					}
			}
		})
	}
</script>
<div style="1000px;" >
	<section class="box-main1" >
		<h2 class="title-main" style="text-align: center; color:#E25D33">Lịch sử mua hàng</h2>
		<table class="table table-hover" style="width: 100%">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tổng giá</th>
					<th>Ngày mua</th>
					<th>Trạng thái</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="tbody">
<?php
		$sqllichsu="SELECT * FROM cart WHERE user_username='$username'";
		if($datalichsu=$classlichsu->query($sqllichsu)){
			foreach($datalichsu as $key=>$value){
?>				
				<tr>
					<td><?php echo $stt++; ?></td>
					<td><?php echo number_format($value['total_price']) ?></td>
					<td><?php echo $value['created'] ?></td>
					<td><p style="color: red">Đã giao</p></td>
					<td>
						<button class="btn btn-info btn-sm" name="edit" title="Xem chi tiết hóa đơn" id="<?php echo $value['id'] ?>" onClick="detail(this)"><i class="fa fa-list-ul"></i></button>
					</td>
				</tr>
<?php		
			}
		}
?>			</tbody>
		</table>
	</section>
</div>		
<?php				
	}
?>