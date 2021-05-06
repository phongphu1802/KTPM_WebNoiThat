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
			if(confirm('Bạn có chắc muốn ẩn quyền này.'))
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
			if(confirm('Bạn có chắc muốn ẩn chức vụ này.'))
			{
				return true;
			}
			else
			{
				return false;
			}                
		}
		function hidenquyen(user){
			if(confirmbefore()){
				$.ajax({
					type:"POST",
					url: "xulyanquyen.php",
					dataType: 'html',
					data:{
						quyen:user
					},
					success: function(data){
						alert(data);
						$("#content").load("quanlyquyen.php");
					}
				});
			}
		}
		function hidenchucvu(chucvu){
			if(confirmbefore1()){
				$.ajax({
					type:"POST",
					url: "xulyanchucvu.php",
					dataType: 'html',
					data:{
						macv:chucvu
					},
					success: function(data){
						alert(data);
						$("#content").load("quanlyquyen.php");
					}
				});
			}
		}
		function editquyen(obj){
			$.ajax({
					type:"POST",
					url: "suaquyen.php",
					dataType: 'html',
					data:{
						maq:obj.id
					},
					success: function(data){
						$("#suaquyen").html(data);
						$("#myModalsuaquyen").modal(options2);
						 var options2 = {
						'backdrop' : 'static',
						'keyboard' : true,
						'show' :true,
						'focus' : false
						}
					}
				})
		}
		function editchucvu(obj){
			$.ajax({
					type:"POST",
					url: "suachucvu.php",
					dataType: 'html',
					data:{
						macv:obj.id
					},
					success: function(data){
						$("#suachucvu").html(data);
						$("#myModalsuachucvu").modal(options2);
						 var options2 = {
						'backdrop' : 'static',
						'keyboard' : true,
						'show' :true,
						'focus' : false
						}
					}
				})
		}
		function addquyen(){
			$("#themquyen").load("themquyen.php");
			$("#myModalthemquyen").modal(options1);
			var options1 = {
				  'backdrop' : 'static',
				  'keyboard' : true,
				  'show' :true,
				  'focus' : false
			}
		}
		function addchucvu(){
			$("#themchucvu").load("themchucvu.php");
			$("#myModalthemchucvu").modal(options1);
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
	<div class="modal " id="myModalthemquyen" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="themquyen"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
	<div class="modal " id="myModalsuaquyen" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="suaquyen"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
	<div class="modal " id="myModalthemchucvu" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="themchucvu"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
	<div class="modal " id="myModalsuachucvu" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <di id="suachucvu"></di>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Quản lý quyền</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bảng danh sách quyền</h1>
			</div>
		</div><!--/.row-->
		
		
		<div class="row" style="height: 500px">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Bảng danh sách quyền theo chức vụ</div>
					<div class="panel-body">
						<button type="button" class="btn btn-warning" id="addchucvu" onClick="addchucvu()">Thêm chức vụ mới</button>
						<button type="button" class="btn btn-warning" id="addquyen" onClick="addquyen()">Thêm quyền mới</button>
						<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
								<th data-sortable="true">Quyền</th>
								<?php
									include('../connect.php');
			  						$class1=new Database();
									$temp1=1;
									$sqlchucvu="select * from chucvu";
									$datalchucvu=$class1->query($sqlchucvu);
									foreach($datalchucvu as $key=>$value){
										$temp1++;
										if($temp1>2){
											if($value['trangthai']==1){
												print_r('<th data-sortable="true">'.$value['chucvu'].'
												<button class="btn btn-info btn-sm" name="editchucvu" title="Chỉnh sửa thông tin chức vụ" id="'.$value['macv'].'" onClick="editchucvu(this)"><i class="fa fa-edit"></i></button>
												<button class="btn btn-danger btn-sm" name="deletechucvu" title="Ẩn chức vụ" onClick="hidenchucvu(\''.$value['macv'].'\')"><i class="fa fa-trash-o"></i></button></th>');
											}
										}
									}
								?>
						    </tr>
							</thead>
								<?php
									$sqldsquyen="select * from dsquyen";
									$dataldsquyen=$class1->query($sqldsquyen);
									foreach($dataldsquyen as $key=>$value){
										if($value['trangthai']==1){
											print_r('<tr><td data-sortable="true">
											<button class="btn btn-info btn-sm" name="edit" title="Chỉnh sửa thông tin quyền" id="'.$value['maq'].'" onClick="editquyen(this)"><i class="fa fa-edit"></i></button>
											<button class="btn btn-danger btn-sm" id="btnan'.$value['maq'].'" name="delete" title="Ẩn quyền" onClick="hidenquyen(\''.$value['maq'].'\')"><i class="fa fa-trash-o"></i></button>' .$value['tenq'].'</td>');
											$bien1=$value['maq'];
											$temp2=1;
											foreach($datalchucvu as $key=>$value2){
												$temp2++;
												if($temp2>2&&$value2['trangthai']==1){
													$bien2=$value2['macv'];
													$sqlphanquyen="select * from nhomquyen,dsquyen where nhomquyen.maq = '$bien1' and nhomquyen.macv ='$bien2' and dsquyen.trangthai='1'";
													$sq=$class1->connect();
													$query=mysqli_query($sq,$sqlphanquyen);
													if(mysqli_num_rows($query)!=0)
														print_r('<td data-sortable="true">x</td>');
													else
														print_r('<td data-sortable="true"></td>');
												}
											}
										}
										print_r('</tr>');
									}
								?>
						</table>
					</div>
				</div>
			</div>
		</div>/.row	
</body>