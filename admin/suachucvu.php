<?php
if(isset($_POST['macv'])){
	include('../connect.php');
	$macv=$_POST['macv'];
	$class=new Database();
	$sql="select * from dsquyen";
	$dataldsquyen=$class->query($sql);
//	$datal=$class->query($sql);
//	foreach($datal as $key=>$value){
//		$maq=$value['maq'];
//		$tenq=$value['tenq'];
//		$trangthai=$value['trangthai'];
//	}
	$sql1="select * from chucvu where macv='$macv'";
	$datalchucvu=$class->query($sql1);
	foreach($datalchucvu as $key=>$value){
		$chucvu=$value['chucvu'];
	}
}
?>
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
	<script>
		//username: /^[a-zA-Z\d\s]+$/ username chấp nhận chữ cái và số, không khoảng trắng, không kí tự đặc biệt
		//email: /^\w+@[a-zA-Z]{3,8}(\.[a-zA-Z]{3,8})?\.[a-zA-Z]{2,5}$/
		//tel: /^\d{10,12}$/
		//address: /^[#./,\w\s-]+$/ đúng với trường hợp không có dấu
		//address: /^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?]+$/
		//password: /^[\w]{8,20}/ 
		//password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/ mật khẩu chứ ít nhất 1 kí tự thường, 1 kí tự INHOA, ít nhất 1 số ít nhất 8, nhiều nhất 20
		function checkChucvu(){
			var name = document.getElementById("idchucvu").value;
			var namepattern = /[A-Z][a-zA-Z][^#&<>\"~;$^%{}?\d]{1,}$/;
			var result = namepattern.test(name);
			if(result == false)
			{
				document.getElementById("invalid-chucvu").innerHTML="*Chức vụ hợp lệ không có số, kí tự đặc biệt, viết hoa đầu từ.";
				document.getElementById("invalid-chucvu").style.visibility="visible";
			}
			else
			{
				document.getElementById("invalid-chucvu").style.visibility="hidden";
			} 
		}
		function xulysubmitsuachucvu(){
			var chucvu = document.getElementById("idchucvu");
			
			if(chucvu.value == "") //Tên còn rỗng
			{
				alert("Tên đang rỗng !!!");
				document.getElementById("invalid-chucvu").innerHTML=" Chức vụ đang trống";
				document.getElementById("invalid-chucvu").style.visibility="visible";
				chucvu.focus();
				return false;
			}
			return true;
		}
		function reset(){
			document.getElementById("idchucvu").value="";
		}
		function batsukien(){
			var chuoi="";
			<?php
				foreach($dataldsquyen as $key=>$value){
					print_r('if(document.getElementById("'.$value['maq'].'").checked){chuoi+="'.$value['maq'].',";}');
				}
			?>
			return chuoi;
		}
		$(document).ready(function() {
			$("#btnsubmitsuachucvu").click(function(){
				if(xulysubmitsuachucvu()==true){
					$.ajax({
						type:"POST",
						url: "xulythemchucvu.php",
						dataType: 'html',
						data:{
							macv:$("#macv").val(),
							tencv:$("#idchucvu").val(),
							chucnang:batsukien()
						},
						success: function(data){
							alert(data);
							if(data!="Chức vụ đã tồn tại vui lòng sửa chức vụ khác."){
								location.reload();
							}
						}

					});
				}
			});
		});
		
	</script>
</head>

<body>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Cập nhật chức vụ</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-12">
							<div class="form-group">
								<div id="macv" name="macv" value="<?php echo $macv; ?>"></div>
								<label>Chức vụ cần cập nhật thêm</label>
								<input class="form-control" placeholder="Chức vụ cần thêm" id="idchucvu" name="chucvu" value="<?php echo $chucvu; ?>" onchange="checkChucvu()"></input>
								<div id="invalid-chucvu" style="color:red; visibility:hidden;"></div>
							</div>
							<div class="form-group">
									<label>Quyền truy cập tài khoản</label>
									<?php
										$sq=$class->connect();
										foreach($dataldsquyen as $key=>$value){
											if($value['trangthai']==1&&$value['maq']!='q12'&&$value['maq']!='q13'){
												$maq1=$value['maq'];
												$sql2="select * from nhomquyen where macv='$macv' and maq='$maq1'";
												$query=mysqli_query($sq,$sql2);
												if(mysqli_num_rows($query)!=0){
													print_r('<div class="pretty p-switch p-fill">
													<input type="checkbox" id="'.$value['maq'].'" value="'.$value['maq'].'" checked="checked"> '.$value['tenq'].'</input></div>');
												}else{
													print_r('<div class="pretty p-switch p-fill">
													<input type="checkbox" id="'.$value['maq'].'" value="'.$value['maq'].'"> '.$value['tenq'].'</input></div>');
												}
											}
										}
									?>
							</div>
							<button id="btnsubmitsuachucvu" value="nut" class="btn btn-primary">Lưu nội dung đã sửa</button>
							<button type="reset" class="btn btn-default" onClick="reset()">Tạo lại</button>
						</div>
						
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
</body>

</html>
