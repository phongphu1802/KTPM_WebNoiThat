
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Tables</title>
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
        function confirmdelete()
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
		function confirmedit()
        {
            if(confirm('Bạn có chắc muốn chỉnh sửa sản phẩm này'))
            {
                return true;
            }
            else
            {
                return false;
            }                
        }
		function deleteproduct(id){
			if(confirmdelete()){
				$.ajax({
					type:"POST",
					url: "deleteproduct.php",
					dataType: 'html',
					data:{
						id:id
					},
					success: function(data){
						{ 
							   if(data == 'false') 
							   {
								 alert('Không có người dùng');
							   }else{
								 alert(data);
							   }
						  }
					}
				})
			}
		}
		/*function editproduct(user){
			if(confirmedit()){
				$.ajax({
					type:"POST",
					url: "editproduct.php",
					dataType: 'html',
					data:{
						user:user
					},
					success: function(data){
						{ 
							   if(data == 'false') 
							   {
								 alert('Không có người dùng');
							   }else{
								 alert(data);
							   }
						  }
					}
				})
			}
		}*/

		function addproduct(){
			$("#themsanpham").load("addproductform2.php");
			$("#myModalAddProduct").modal(options1);
			var options1 = {
				  'backdrop' : 'static',
				  'keyboard' : true,
				  'show' :true,
				  'focus' : false
			}
		}

		function editproduct(obj){
			$.ajax({
					type:"POST",
					url: "editproductform.php",
					dataType: 'html',
					data:{
						edit_id:obj.id
					},
					success: function(data){
						{ 
							   if(data == 'false') 
							   {
								 alert('Không có người dùng');
							   }else{
								 $("#suasanpham").html(data);
								 $("#myModalEditProduct").modal(options2);
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
<div class="modal " id="myModalAddProduct" role="dialog" >
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

<div class="modal " id="myModalEditProduct" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="suasanpham"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
</div>
	<div id="danhsachsanpham">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Bảng sản phẩm</li>
			</ol>
		</div><!--/.row-->	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bảng sản phẩm</div>
					<div class="panel-body">
					<button type="button" class="btn btn-warning" id="addproduct" onClick="addproduct()">Thêm sản phẩm mới</button>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true"
						data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true" >Mã sản phẩm</th>
						        <th data-sortable="true">Loại</th>
						        <th data-sortable="true">Tên sản phẩm</th>
						        <th data-sortable="true">Số lượng</th>
								<th data-sortable="true">Giá</th>
								<th data-sortable="true">Màu sắc</th>
								<th data-sortable="true">Hình ảnh</th>
								<th data-sortable="true">Lượt xem</th>
								<th data-sortable="true">Thao tác</th>
						    </tr>
							</thead>
								<?php
									include('../connect.php');
									//include('connect.php');
									$class=new Database();
									$sqd=$class->connect();
									$sqlproduct="select * from product";//lấy sản phẩm từ SQL
									$datalproduct=$class->query($sqlproduct);
									$sqlcatalog="select * from catalog";//lấy loại sản phẩm từ SQL
									$datalcatalog=$class->query($sqlcatalog);
									foreach($datalproduct as $key=>$value){
										foreach($datalcatalog as $key=>$value1){
											if($value['catalog_id']==$value1['id']){
												$loai=$value1['name'];
												break;
											}
										}
										print_r('<tr>
											<td data-sortable="true">'.$value['id'].'</td>
											<td data-sortable="true">'.$loai.'</td>
											<td data-sortable="true">'.$value['name'].'</td>
											<td data-sortable="true">'.$value['amout'].'</td>
											<td data-sortable="true">'.number_format($value['price']).'</td>
											<td data-sortable="true">'.$value['color'].'</td>
											<td data-sortable="true"><img src="../'.$value['image'].'" width="50px" height="50px"></td>
											<td data-sortable="true">'.$value['view'].'</td>
											<td data-sortable="true">
											<button class="btn btn-info btn-sm" name="edit" title="Chỉnh sửa thông tin sản phẩm" id="'.$value['id'].'" onClick="editproduct(this)"><i class="fa fa-edit"></i></button>
											<button class="btn btn-danger btn-sm" name="delete" title="Xóa sản phẩm" onClick="deleteproduct(\''.$value['id'].'\')"><i class="fa fa-trash-o"></i></button>
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

