<?php
     $connect = new mysqli("localhost","root","","csdl_ban_hang");
     mysqli_query($connect,"SET NAMES UTF8");
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Tables</title>
<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/thongke.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script>
	$(document).ready(function(){
		$("#addproduct").click(function(){
			if($("#from").val()!="",$("#to").val()!="",$("#idtypes").val()!=""){
				$.ajax({
					type:"POST",
					url: "xulythongke.php",
					dataType: 'html',
					data:{
						submittk:"1",
						datefrom:$("#from").val(),
						dateto:$("#to").val(),
						types:$("#idtypes").val()
					},
					success: function(data){
						{ 
							if(data == 'false') 
							{
								alert('Không có người dùng');
							}else{
								$("#themthongke").html(data);
								$("#myModalthongke").modal(thongke);
								var thongke = {
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
		});
		$("#addproduct1").click(function(){
			if($("#from1").val()!="",$("#to1").val()!=""){
				$.ajax({
					type:"POST",
					url: "xulythongke2.php",
					dataType: 'html',
					data:{
						submittk1:"1",
						datefrom1:$("#from1").val(),
						dateto1:$("#to1").val()
					},
					success: function(data){
						{ 
						   if(data == 'false') 
							{
								alert('Không có người dùng');
							}else{
								$("#themthongke1").html(data);
								$("#myModalthongke1").modal(thongke1);
								var thongke1 = {
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
		});
		$("#addproduct2").click(function(){
			if($("#from2").val()!="",$("#to2").val()!=""){
				$.ajax({
					type:"POST",
					url: "xulythongke3.php",
					dataType: 'html',
					data:{
						submittk2:"1",
						datefrom2:$("#from2").val(),
						dateto2:$("#to2").val()
					},
					success: function(data){
						{ 
							if(data == 'false') 
							{
								alert('Không có người dùng');
							}else{
								$("#themthongke2").html(data);
								$("#myModalthongke2").modal(thongke2);
								var thongke2 = {
									'backdrop' : 'static',
									'keyboard' : true,
									'show' : true,
									'focus' : false
								}
							}
						}
					}
				})
			}
		});
	});
</script>
</head>

<body>
	<!--Modal hien thi thống kê-->
	<div class="modal fade " id="myModalthongke" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <div id="themthongke"></div>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
	</div>
	<div class="modal fade" id="myModalthongke1" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <div id="themthongke1"></div>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
	</div>
	<div class="modal fade" id="myModalthongke2" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				  <div id="themthongke2"></div>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
	</div>
	<!--Thống kê 1 -->
	<div>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Thống kê bán hàng</li>
			</ol>
		</div><!--/.row-->	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">THỐNG KÊ</div>
					<div class="panel-body">
                        <div name="thongke">
                            <p>Tình hình kinh doanh của các sản phẩm theo loại</p>
                            <label>Loại sản phẩm</label>
                            
                            <select name="types" id="idtypes" value="">
							<option value="">--Loại--</option>
                            <?php
								
                                $query1="select * from catalog";
                                $result1= mysqli_query($connect,$query1);
                                while($row=mysqli_fetch_array($result1))
                                {
									echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
                                }                      
                            ?>
                            </select>
                            <label>Từ</label>
                            <input type="date" name="datefrom" id="from" value="">
                            <label>Đến</label>
                            <input type="date" name="dateto" id="to" value="">
                            <br/>
                            <input type="button" class="btn btn-warning" name="submittk" id="addproduct" value="Thống kê" onClick="xulysubmit();">
                        </div>
					</div>
				</div>
			</div>
	    </div><!--/.row-->
	</div>
	<div class="panel panel-default" id="hienthithongke"></div>
	<!--Thống kê 2 -->
	<div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">THỐNG KÊ</div>
					<div class="panel-body">
                        <div name="thongke1">
                            <p>Thống kê mỗi loại bán được bao nhiêu sản phẩm</p>
                            <label>Trong khoảng thời gian từ</label>
                            <input type="date" name="datefrom1" id="from1" value="">
                            <label>đến</label>
                            <input type="date" name="dateto1" id="to1" value="">
                            <br/>
                            <input type="button" class="btn btn-warning" name="submittk1" id="addproduct1" value="Thống kê" onClick="xulysubmit1();">
                        </div>
					</div>
				</div>
			</div>
	    </div><!--/.row-->
		<div class="panel panel-default" id="hienthithongke1"></div>
	</div>
	<!--Thống kê 3 -->
	<div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">THỐNG KÊ SẢN PHẨM BÁN CHẠY</div>
					<div class="panel-body">
                        <div name="thongke2">                           
                            <label>Trong khoảng thời gian từ</label>
                            <input type="date" name="datefrom2" id="from2" value="">
                            <label>đến</label>
                            <input type="date" name="dateto2" id="to2" value="">
                            <br/>
                            <input type="submit" class="btn btn-warning" name="submittk2" id="addproduct2" value="Thống kê" onClick="xulysubmit2();">
                        </div>
					</div>
				</div>
			</div>
	    </div><!--/.row-->
		<div class="panel panel-default" id="hienthithongke2"></div>
	</div>
</body>
