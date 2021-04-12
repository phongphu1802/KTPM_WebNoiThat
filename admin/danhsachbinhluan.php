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
		function confirmbl()
		{
			if(confirm('Bạn có chắc muốn ẩn bình luận này'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function confirmTraloi()
		{
			if(confirm('Bạn muốn trả lời bình luận này'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function save(obj){
			if(confirmbl()){
				$.ajax({
					type:"POST",
					url: "luubinhluan.php",
					dataType: 'html',
					data:{
						idbl:obj.id,
						trangthai:2
					},
					success: function(data){
						{ 
							   if(data == 'false') 
							   {
								 	alert('Không có người dùng');
							   }else{
								 	alert(data);
								   	$("#content").load("danhsachbinhluan.php");
							   }
						  }
					}
				})
			}
		}
		function setStatusTraloi(obj){
					if(confirmTraloi()){
						$.ajax({
							type:"POST",
							url: "xulyTraloi.php",
							dataType: 'html',
							data:{
								idtl:obj.id,
								idtrangthai:1
							},
							success: function(data){
								alert(data);
								$("#content").load("danhsachbinhluan.php");
							}
						})
					}
				}
	</script>
</head>
<body>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Danh sách bình luận</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách bình luận</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Danh sách bình luận</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true">Mã sản phẩm</th>
						        <th data-sortable="true">Tên tài khoản khách</th>
						        <th data-sortable="true">Nội dung</th>
						        <th data-sortable="true">Đánh giá</th>
								<th data-sortable="true">Trạng thái</th>
								<th data-sortable="true"></th>
						    </tr>
							</thead>
								<?php
									include('../connect.php');
			  						$class2=new Database();
									$sqlbl="select * from binhluan, user where binhluan.mauser=user.username";
									$datalbl=$class2->query($sqlbl);
									foreach($datalbl as $key=>$value){
										if($value['trangthaibl']<=1)
										{
											//$value['statuscart']==1-> chưa check đơn
											//$value['statuscart']==2-> đã check đơn
											$string="";
											switch($value['trangthaibl'])
											{
												case 0:{
													$string=$string."Chưa trả lời";
													break;
												}
												case 1:{
													$string=$string."Đã trả lời";
													break;
												}
											}
											?>
											<tr>
												<td data-sortable="true"><?php echo $value['masp']?></td>
												<td data-sortable="true"><?php echo $value['mauser']?></td>
												<td data-sortable="true"><?php echo $value['noidung']?></td>
												<td data-sortable="true"><?php echo $value['danhgia']?></td>
												<td data-sortable="true"><p style="color: red"><?php echo $string; ?></p></td>
												<td data-sortable="true">
												
												<?php if($value['trangthaibl']==0){//Chưa trả lời thì có hiện button trả lời?>
													<button class="btn btn-danger btn-sm" id="<?php echo $value['idbinhluan']?>" name="print" title="Trả lời" onClick="setStatusTraloi(this)"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
												<?php
												}
												?>
												<?php if($value['trangthaibl']==1){//Đã trả lời thì hiện nút lưu?>
													<button class="btn btn-danger btn-sm" name="save" title="Lưu bình luận" id="<?php echo $value['idbinhluan']?>" onClick="save(this)"><i class="fa fa-floppy-o"></i></button>
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