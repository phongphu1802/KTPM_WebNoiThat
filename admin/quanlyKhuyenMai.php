
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
        function editloaikh(obj){
			$.ajax({
					type:"POST",
					url: "editTypeCustomerForm.php",
					dataType: 'html',
					data:{
						edit_id:obj.id
					},
					success: function(data){
						{ 
							   if(data == 'false') 
							   {
								 alert('Không có loại khách hàng này');
							   }else{
								 $("#sualoaikh").html(data);
								 $("#myModalEditTypeCustomer").modal(options2);
								   var options2 = {
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

    </script>
</head>
<body>
<div class="modal " id="myModalAddTypeOfCustomer" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="themsanpham"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
</div>

<div class="modal " id="myModalEditTypeCustomer" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="sualoaikh"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
</div>
	<div id="danhsachloaikhachhang">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
			</ol>
		</div><!--/.row-->	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Chi tiết khuyến mãi theo loại khách hàng</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true"
						data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true" >Mã loại KH</th>
						        <th data-sortable="true">Tên loại KH</th>
						        <th data-sortable="true">Tổng giá trị thanh toán tối thiểu (đồng)</th>
						        <th data-sortable="true">Tỉ lệ được giảm (%)</th>
								<th data-sortable="true">Thao tác</th>
						    </tr>
							</thead>
								<?php
									include('../connect.php');
									//include('connect.php');
									$class=new Database();
									$sql=$class->connect();
									$sqlloaikh="select * from loaikhachhang";//lấy dữ liệu bảng loaikhachhang
									$data=$class->query($sqlloaikh);
									foreach($data as $value){
										print_r('<tr>
											<td data-sortable="true">'.$value['malkh'].'</td>
											<td data-sortable="true">'.$value['tenlkh'].'</td>
											<td data-sortable="true">'.$value['dieukien'].'</td>
											<td data-sortable="true">'.$value['sotiengian'].'</td>
											<td data-sortable="true">
											<button class="btn btn-info btn-sm" name="edit" title="Chỉnh sửa thông tin KM của loại khách" id="'.$value['malkh'].'" onClick="editloaikh(this)"><i class="fa fa-edit"></i></button>
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

