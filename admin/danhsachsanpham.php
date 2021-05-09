
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
		function confirmShow()
        {
            if(confirm('Bạn có chắc muốn hiện sản phẩm này'))
            {
                return true;
            }
            else
            {
                return false;
            }                
		}
		function confirmHide()
        {
            if(confirm('Bạn có chắc muốn ẩn sản phẩm này'))
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
		function setStatusSanPhamHide(id){
			if(confirmHide()){
				$.ajax({
					type:"POST",
					url: "xuLyAnSP.php",
					dataType: 'html',
					data:{
						id:id
					},
					success: function(data){
						{ 
							   if(data == 'false') 
							   {
								 alert('Không có sản phẩm');
							   }else{
								 alert(data);
							   }
						  }
					}
				})
			}
		}
		function setStatusSanPhamShow(id){
			if(confirmShow()){
				$.ajax({
					type:"POST",
					url: "xuLyHienSP.php",
					dataType: 'html',
					data:{
						id:id
					},
					success: function(data){
						{ 
							   if(data == 'false') 
							   {
								 alert('Không có sản phẩm');
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
								 alert('Không có sản phẩm');
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
								 alert('Không có sản phẩm');
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
				<div class="panel panel-default" id="productsTittle">
					<h1 class="panel-heading" id="products";>Bảng sản phẩm</h1>
					<div class="panel-body">
					<button type="button" class="btn btn-warning" id="addproduct" onClick="addproduct()" name="addpro">Thêm sản phẩm mới</button>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true"
						data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true" id="idid">Mã sản phẩm</th>
						        <th data-sortable="true">Loại</th>
						        <th data-sortable="true" id="name">Tên sản phẩm</th>
						        <th data-sortable="true" id="quantity">Số lượng</th>
								<th data-sortable="true" id="price">Giá</th>
								<th data-sortable="true" id="color">Màu sắc</th>
								<th data-sortable="true" id="img">Hình ảnh</th>
								<th data-sortable="true" id="watch">Lượt xem</th>
								<th data-sortable="true" id="status">Trạng thái</th>
								<th data-sortable="true" id="operate">Thao tác</th>
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
										if ($value['status']==1){
											$status="Hiện";
										}
										else $status="Ẩn";?>
										
										<tr>
											<td data-sortable="true"> <?php echo $value['id'] ?></td>
											<td data-sortable="true"> <?php echo $loai ?></td>
											<td data-sortable="true"> <?php echo $value['name'] ?></td>
											<td data-sortable="true"> <?php echo $value['amout'] ?></td>
											<td data-sortable="true"> <?php echo number_format($value['price'])?></td>
											<td data-sortable="true"> <?php echo $value['color'] ?></td>
											<td data-sortable="true"><img src="../<?php echo $value['image'] ?>" width="50px" height="50px"></td>
											<td data-sortable="true"> <?php echo $value['view'] ?></td>
											<td data-sortable="true"> <?php echo $status ?></td>
											<td data-sortable="true">
											
											<?php if ($value['status']==1){?>
											<button class="btn btn-dark btn-sm" name="print" title="Ẩn sản phẩm" onClick="setStatusSanPhamHide(<?php echo $value['id']?>)"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
											<?php
											}
											?>
											<?php if ($value['status']==0){?>
											<button class="btn btn-dark btn-sm" name="print" title="Hiện sản phẩm" onClick="setStatusSanPhamShow(<?php echo $value['id']?>)"><i class="fa fa-eye" aria-hidden="true"></i></button>
											<?php
											}
											?>
											<button class="btn btn-info btn-sm" name="edit" title="Chỉnh sửa thông tin sản phẩm" id="<?php echo $value['id']?>" onClick="editproduct(this)"><i class="fa fa-edit"></i></button>
											<button class="btn btn-danger btn-sm" name="delete" title="Xóa sản phẩm" onClick="deleteproduct(<?php echo $value['id']?>)"><i class="fa fa-trash-o"></i></button>
											</td>
										</tr>
											<?php 
											}
											?>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
</body>

