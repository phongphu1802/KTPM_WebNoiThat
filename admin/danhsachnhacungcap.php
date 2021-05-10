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
			if(confirm('Bạn có chắc muốn ẩn NCC này.'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function deleteuser(nhaccungcap){
			if(confirmbefore()){
				$.ajax({
					type:"POST",
					url: "deletenccc.php",
					dataType: 'html',
					data:{
						nhaccungcap:nhaccungcap
					},
					success: function(data){
						alert(data);
						$("#content").load("danhsachnhacungcap.php");
					}
				});
			}
		}
		
		function edituser(obj){
			$.ajax({
					type:"POST",
					url: "suanhacungcap.php",
					dataType: 'html',
					data:{
						mancc:obj.id
					},
					success: function(data){
						$("#suanhacungcap").html(data);
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
			$("#themtaikhoan").load("themnhacungcap.php");
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
				  <di id="suanhacungcap"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Danh sách nhà cung cấp</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
			<!--	<h1 class="page-header">Danh sách nhà cung cấp</h1>  style="background:#ffffff ; color:#5f6468  ; border-bottom:#eeeeee"-->
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading" id="myStyle" name="myStyle" >Danh sách nhà cung cấp</div>
					<div class="panel-body">
						<button type="button" class="btn btn-warning" id="adduser" name="addncc" onClick="adduser()">Thêm nhà cung cấp mới</button>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true">Mã NCC</th>
						        <th data-sortable="true">Tên NCC</th>
						        <th data-sortable="true">Số điện thoại NCC</th>
								<th data-sortable="true">Địa chỉ</th>
								<th data-sortable="true">Email</th>
								<th data-sortable="true">Thao tác</th>
						    </tr>
							</thead>
								<?php
									include('../connect.php');
									$class=new Database();
									$sqlncc="select * from nhaccungcap";//lấy NCC từ SQL
									$datalncc=$class->query($sqlncc);
									foreach($datalncc as $key=>$value){
										print_r('<tr>
											<td data-sortable="true">'.$value['mancc'].'</td>
											<td data-sortable="true">'.$value['tenncc'].'</td>
											<td data-sortable="true">'.$value['sdtncc'].'</td>
											<td data-sortable="true">'.$value['diachi'].'</td>
											<td data-sortable="true">'.$value['gmail'].'</td>
											<td data-sortable="true">
											<button class="btn btn-info btn-sm" name="edit" title="Chỉnh sửa nhà cung cấp" id="'.$value['mancc'].'" onClick="edituser(this)"><i class="fa fa-edit"></i></button>
											<button class="btn btn-danger btn-sm" name="delete" title="Ẩn nhà cung câp" onClick="deleteuser(\''.$value['mancc'].'\')"><i class="fa fa-trash-o"></i></button>
											</td>
										</tr>');
									}
									
								?>
						    
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</body>