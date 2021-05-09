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
	<?php
		session_start();
		include('../connect.php');
		$class1=new Database();
		$sqluser="select * from user where position='admin'";
		$dataluser=$class1->query($sqluser);
		$quyenuser=$_SESSION['quyenuser'];
	?>
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
				<li class="active">Danh sách nhân viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách nhân viên</h1>
			</div>
		</div><!--/.row-->	
	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Danh sách nhân viên</div>
					<div class="panel-body">
						<button type="button" class="btn btn-warning" id="adduser" onClick="adduser()">Thêm nhân viên mới</button>
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
								<th data-sortable="true">Quyền truy cập</th>
								<?php 
									foreach($dataluser as $key=>$value){
									if($quyenuser=='cv1'){
										print_r('<th data-sortable="true"></th>');
									}
								}
								?>
						    </tr>
							</thead>
								<?php
									foreach($dataluser as $key=>$value){
										//Lấy chức vụ
										$chucvu=$value['chucvu'];
										$sqlchucvu="select chucvu from chucvu where macv='$chucvu'";
										$datalchucvu=$class1->query($sqlchucvu);
										foreach($datalchucvu as $key=>$value2){
											$chucvu1=$value2['chucvu'];
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
											<td data-sortable="true">'.$chucvu1.'</td>');
											if($quyenuser=='cv1'){
											print_r('<td data-sortable="true">
												<button class="btn btn-info btn-sm" name="edit" title="Chỉnh sửa thông tin nhân viên" id="'.$value['username'].'" onClick="edituser(this)"><i class="fa fa-edit"></i></button>
												<button class="btn btn-danger btn-sm" name="delete" title="Xóa nhân viên" onClick="deleteuser(\''.$value['username'].'\')"><i class="fa fa-trash-o"></i></button>
												</td>');
											}
												
										print_r('</tr>');
									}
									
								?>
						    
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</body>