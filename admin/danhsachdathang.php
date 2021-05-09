<head>
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
		function confirmGiaohang()
		{
			if(confirm('Bạn muốn giao đơn hàng này?'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function confirmDahang()
		{
			if(confirm('Bạn đã giao đơn hàng này?'))
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
			if(confirm('Bạn muốn hủy đơn hàng này?'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function confirmbefore2()
		{
			if(confirm('Bạn muốn lưu đơn hàng này?'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function setStatusGiaohang(obj){
			if(confirmGiaohang()){
				$.ajax({
					type:"POST",
					url: "xulyDanggiao.php",
					dataType: 'html',
					data:{
						idoder:obj.id
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachdathang.php");
					}
				})
			}
		}
		function setStatusDagiao(obj){
			if(confirmDahang()){
				$.ajax({
					type:"POST",
					url: "xulyDagiao.php",
					dataType: 'html',
					data:{
						idoder:obj.id
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachdathang.php");
					}
				})
			}
		}
		function deleteoder(obj){
			if(confirmbefore1()){
				$.ajax({
					type:"POST",
					url: "huydathang.php",
					dataType: 'html',
					data:{
						idoder:obj.id
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachdathang.php");
					}
				})
			}
		}
		function detail(obj){
			$.ajax({
				type:"POST",
				url: "hienthichitietdathang.php",
				dataType: 'html',
				data:{
					idoder:obj.id
				},
				success: function(data){
					$("#themchitietdonhang").html(data);
					$("#myModalchitiet1").modal(options11);
					var options11 = {
						'backdrop' : 'static',
						'keyboard' : true,
						'show' :true,
						'focus' : false
						}
				}
			});
		}
		function adduser(){
			$("#themtaikhoan").load("themtaikhoan.php");
			$("#myModalthem").modal(options1);
			var options1 = {
				  'backdrop' : 'static',
				  'keyboard' : true,
				  'show' :true,
				  'focus' : false
			}
		}
		function save(obj){
			if(confirmbefore2()){
				$.ajax({
					type:"POST",
					url: "luudathang.php",
					dataType: 'html',
					data:{
						idoder:obj.id
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachdathang.php");
					}
				})
			}
		}
	</script>
</head>
<body>
	<div class="modal " id="myModalchitiet1" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="themchitietdonhang"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
	<div class="modal " id="myModalsua" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="suataikhoan"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Danh sách đặt hàng</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách đặt hàng</h1>
			</div>
		</div><!--/.row-->
			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Danh sách đặt hàng</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true">Mã đơn hàng</th>
						        <th data-sortable="true">Tên tài khoản khách</th>
						        <th data-sortable="true">Tổng tiền hóa đơn</th>
								<th data-sortable="true">Ngày tạo đơn</th>
								<th data-sortable="true">Địa chỉ giao</th>
								<th data-sortable="true">Trạng thái</th>
								<th data-sortable="true">Thao tác</th>
						    </tr>
							</thead>
								<?php
									include('../connect.php');
			  						$class2=new Database();
									$sqloder="select * from oder";
									$dataloder=$class2->query($sqloder);
									foreach($dataloder as $key=>$value){
										if($value['status']<=4)
										{
											//$value['statuscart']==1-> chưa check đơn
											//$value['statuscart']==2-> đã check đơn
											$string="";
											switch($value['status'])
											{
												case 1:{
													$string=$string."Chờ xác nhận";
													break;
												}
												case 2:{
													$string=$string."Đang giao";
													break;
												}
												case 3:{
													$string=$string."Đã giao";
													break;
												}												
												case 4:{
													$string=$string."Đã hủy";
													break;
												}
											}
											?>
											<tr>
												<td data-sortable="true"><?php echo $value['id']?></td>
												<td data-sortable="true"><?php echo $value['user_username']?></td>
												<td data-sortable="true"><?php echo number_format($value['total_price'])?></td>
												<td data-sortable="true"><?php echo $value['created']?></td>
												<td data-sortable="true"><?php echo $value['address']?></td>
												<td data-sortable="true"><p style="color: red"><?php echo $string; ?></p></td>
												<td data-sortable="true">
												<button class="btn btn-info btn-sm" name="edit" title="Xem chi tiết đặt hàng" id="<?php echo $value['id']?>" onClick="detail(this)"><i class="fa fa-list-ul"></i></button>
												
												<?php if($value['status']==1){//Chưa xác nhận thì có hiện button Giao hàng?>
													<button class="btn btn-danger btn-sm" id="<?php echo $value['id']?>" name="print" title="Giao hàng" onClick="setStatusGiaohang(this)"><i class="fa fa-truck" aria-hidden="true"></i></button>
												<?php
												}
												?>
												<?php if($value['status']==2){//Đang giao thì có hiện button xác nhận đã giao?>
													<button class="btn btn-danger btn-sm" id="<?php echo $value['id']?>" name="print" title="Hoàn tất giao hàng" onClick="setStatusDagiao(this)"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
												<?php
												}
												?>
												<?php if($value['status']>2){//Chưa xác nhận thì không có button Lưu?>
												<button class="btn btn-danger btn-sm" name="save" title="Lưu đơn hàng" id="<?php echo $value['id']?>" onClick="save(this)"><i class="fa fa-floppy-o"></i></button>
												<?php
												}
												?>
												<?php if($value['status']<3){//Chưa xác nhận và Đang giao thì được Hủy đơn?>
													<button class="btn btn-danger btn-sm" name="delete" title="Hủy đơn hàng" id="<?php echo $value['id']?>" onClick="deleteoder(this)"><i class="fa fa-times" aria-hidden="true"></i></button>
												<?php
												}
												?>
												</td>
											</tr>
											<?php
										}
									}
								?>
						    
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</body>