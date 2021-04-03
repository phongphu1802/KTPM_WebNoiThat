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
		function checkQuyen()
		{
			var name = document.getElementById("idtenq").value;
			var namepattern = /[A-Z][a-zA-Z][^#&<>\"~;$^%{}?\d]{1,}$/;
			result = namepattern.test(name);
			if(result == false)
			{
				document.getElementById("invalid-quyen").innerHTML="*Quyền hợp lệ không có số, kí tự đặc biệt, viết hoa đầu từ";
				document.getElementById("invalid-quyen").style.visibility="visible";
			}
			else
			{
				document.getElementById("invalid-quyen").style.visibility="hidden";
			} 
		}

		function xulysubmitsuaquyen()
		{
			var quyen = document.getElementById("idtenq");
			
			if(quyen.value == "") //Tên còn rỗng
			{
				alert("Tên đang rỗng !!!");
				document.getElementById("invalid-quyen").innerHTML=" Quyền đang trống";
				document.getElementById("invalid-quyen").style.visibility="visible";
				quyen.focus();
				return false;
			}
			return true;
		}
		function reset(){
			document.getElementById("idquyen").value="";
		}
		$(document).ready(function() {
			$("#btnsubmitsuaquyen").click(function(){
				if(xulysubmitsuaquyen()==true){
					$.ajax({
						type:"POST",
						url: "xulysuaquyen.php",
						dataType: 'html',
						data:{
							maq:$("#idmaq").val(),
							tenq:$("#idtenq").val(),
							trangthai:$("#idtrangthai").val()
						},
						success: function(data){
							alert(data);
							if(data!="Quyền đã tồn tại vui lòng sửa quyền khác."){
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
		<?php
			if(isset($_POST['maq']))
			{
				$maq=$_POST['maq'];
				include('../connect.php');
				$class=new Database();
				$sqd=$class->connect();
				$sql="SELECT * FROM dsquyen WHERE maq='$maq'";
				$datal=$class->query($sql);
				foreach($datal as $key=>$value)
				{
					$maq=$value['maq'];
					$tenq=$value['tenq'];
					$trangthai=$value['trangthai'];
				}
			}
		?>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sửa quyền</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-12">
					
								<div class="form-group">
									<label>Mã quyền</label>
									<input class="form-control" placeholder="Mã quyền" id="idmaq" name="maq" value="<?php echo $maq;?>" readonly="">
									<label>Quyền cần thêm</label>
									<input class="form-control" placeholder="Quyền cần thêm" id="idtenq" name="tenq" value="<?php echo $tenq; ?>" onchange="checkQuyen()">
									<div id="invalid-quyen" style="color:red; visibility:hidden;"></div>
									<label>Trạng thái</label>
									<input class="form-control" placeholder="Mã quyền" id="idtrangthai" name="trangthai" value="<?php if($trangthai==1){echo("Hiển thị");}?>" readonly="">
								</div>
								<button id="btnsubmitsuaquyen" value="nut" class="btn btn-primary">Sửa quyền</button>
								<button type="reset" class="btn btn-default" onClick="reset()">Hủy</button>
						</div>
						
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
</body>

</html>
