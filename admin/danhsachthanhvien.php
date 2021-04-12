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
			if(confirm('Bạn có chắc muốn xóa tài khoản này'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function deleteuser(user){
			if(confirmbefore()){
				$.ajax({
					type:"POST",
					url: "deleteuser.php",
					dataType: 'html',
					data:{
						user:user
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachtaikhoan.php");
					}
				});
			}
		}
		function edituser(obj){
			$.ajax({
					type:"POST",
					url: "suataikhoan.php",
					dataType: 'html',
					data:{
						username:obj.id
					},
					success: function(data){
						$("#suataikhoan").html(data);
						$("#myModalsua").modal(options2);
						 var options2 = {
						'backdrop' : 'static',
						'keyboard' : true,
						'show' :true,
						'focus' : false
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
	<div class="modal " id="myModalthem" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="themtaikhoan"></di>
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
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Danh sách thành viên</div>
					<div class="panel-body">
						<button type="button" class="btn btn-warning" id="adduser" onClick="adduser()">Thêm thành viên mới</button>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true">Tài khoản</th>
						        <th data-sortable="true">Mật khẩu</th>
						        <th data-sortable="true">Số điện thoại</th>
						        <th data-sortable="true">Họ và Tên</th>
								<th data-sortable="true">Giới tính</th>
								<th data-sortable="true">Email</th>
								<th data-sortable="true">Địa chỉ</th>
								<th data-sortable="true">Ngày tạo</th>
								<th data-sortable="true">Loại khách hàng</th>
						    </tr>
							</thead>
								<?php
									include('../connect.php');
			  						$class1=new Database();
									$sqluser="select * from user where position='Khách hàng'";
									$dataluser=$class1->query($sqluser);
									foreach($dataluser as $key=>$value){
											//Lấy thông tin loại thành viên
											$matv=$value['username'];
											$sqlloaikhachhang="select tenlkh from loaikhachhang,xephangthanhvien where matv='$matv' and loaikhachhang.malkh=xephangthanhvien.malkh";
											$datalloaikhachhang=$class1->query($sqlloaikhachhang);
											foreach($datalloaikhachhang as $key=>$value2){
												$lkh=$value2['tenlkh'];
											}
											print_r('<tr>
												<td data-sortable="true">'.$value['username'].'</td>
												<td data-sortable="true">'.md5($value['password']).'</td>
												<td data-sortable="true">'.$value['phonenumber'].'</td>
												<td data-sortable="true">'.$value['name'].'</td>
												<td data-sortable="true">'.$value['gioitinh'].'</td>
												<td data-sortable="true">'.$value['email'].'</td>
												<td data-sortable="true">'.$value['address'].'</td>
												<td data-sortable="true">'.$value['created'].'</td>
												<td data-sortable="true">'.$lkh.'</td>
											</tr>');
									}
									
								?>
						    
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</body>