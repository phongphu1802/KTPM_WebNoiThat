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
		function confirmbefore()
		{
			if(confirm('Bạn có chắc muốn lưu hóa đơn này'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function save(obj){
			if(confirmbefore()){
				$.ajax({
					type:"POST",
					url: "luuhoadon.php",
					dataType: 'html',
					data:{
						idcart:obj.id
					},
					success: function(data){
						{ 
							   if(data == 'false') 
							   {
								 	alert('Không có người dùng');
							   }else{
								 	alert(data);
								   	$("#content").load("danhsachhoadon.php");
							   }
						  }
					}
				})
			}
		}
		function detail(obj){
			$.ajax({
				type:"POST",
				url: "hienthichitiethoadon.php",
				dataType: 'html',
				data:{
					idcart:obj.id
				},
				success: function(data){
					{ 
						if(data == 'false') 
						{
							alert('Không có người dùng');
						}else{
							$("#themchitiethoadon").html(data);
							$("#myModalchitiet").modal(options8);
							var options8 = {
							'backdrop' : 'static',
							'keyboard' : true,
							'show' :true,
							'focus' : false
							}
						}
					}
				}
			})
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
	</script>
</head>
<body>
	<div class="modal " id="myModalchitiet" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="themchitiethoadon"></di>
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
				<li class="active">Bảng hóa đơn</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bảng hóa đơn</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bảng hóa đơn</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true">Mã hóa đơn</th>
						        <th data-sortable="true">Tên tài khoản khách</th>
						        <th data-sortable="true">Nhân Viên Kiểm Đơn</th>
						        <th data-sortable="true">Tổng tiền hóa đơn</th>
								<th data-sortable="true">Ngày kiểm đơn</th>
								<th data-sortable="true">Địa chỉ giao</th>
								<th data-sortable="true"></th>
						    </tr>
							</thead>
								<?php
									include('../connect.php');
			  						$class2=new Database();
									$sqlcart="select * from cart";
									$datalcart=$class2->query($sqlcart);
									foreach($datalcart as $key=>$value){
										if($value['status']==1)
										{
											print_r('<tr>
												<td data-sortable="true">'.$value['id'].'</td>
												<td data-sortable="true">'.$value['user_username'].'</td>												
												<td data-sortable="true">'.number_format($value['total_price']).'</td>
												<td data-sortable="true">'.$value['created'].'</td>
												<td data-sortable="true">'.$value['address'].'</td>
												<td data-sortable="true">
												<button class="btn btn-info btn-sm" name="edit" title="Xem chi tiết hóa đơn" id="'.$value['id'].'" onClick="detail(this)"><i class="fa fa-list-ul"></i></button>
												<button class="btn btn-danger btn-sm" id="'.$value['id'].'" name="print" title="In hóa đơn"><i class="fa fa-print"></i></button>
												<button class="btn btn-danger btn-sm" name="save" title="Lưu hóa đơn" id="'.$value['id'].'" onClick="save(this)"><i class="fa fa-floppy-o"></i></button>
												</td>
											</tr>');
										}
									}
								?>
						    
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</body>