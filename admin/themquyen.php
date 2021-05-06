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
			var name = document.getElementById("idquyen").value;
			var namepattern = /[A-Z][a-zA-Z][^#&<>\"~;$^%{}?\d]{1,}$/;
			result = namepattern.test(name);
			if(result == false)
			{
				document.getElementById("invalid-quyen").innerHTML="*Quyền hợp lệ không có số, kí tự đặc biệt, viết hoa đầu từ";
				document.getElementById("invalid-quyen").style.visibility="visible";
				return false;
			}
			else
			{
				document.getElementById("invalid-quyen").style.visibility="hidden";
				return true;
			} 
		}

		function xulysubmitthemquyen()
		{
			var quyen = document.getElementById("idquyen");
			
			if(quyen.value == "") //Tên còn rỗng
			{
				alert("Tên đang rỗng !!!");
				document.getElementById("invalid-quyen").innerHTML=" Quyền đang trống";
				document.getElementById("invalid-quyen").style.visibility="visible";
				quyen.focus();
				return false;
			}
			if(checkQuyen()==false){
				return false;		
			}
			return true;
		}
		function reset(){
			document.getElementById("idquyen").value="";
		}
		$(document).ready(function() {
			$("#btnsubmitthemquyen").click(function(){
				if(xulysubmitthemquyen()==true){
					$.ajax({
						type:"POST",
						url: "xulythemquyen.php",
						dataType: 'html',
						data:{
							quyen:$("#idquyen").val(),
						},
						success: function(data){
							alert(data);
							if(data!="Quyền đã tồn tại vui lòng thêm quyền khác."){
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
				<h1 class="page-header">Thêm quyền</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-12">
					
								<div class="form-group">
									<label>Quyền cần thêm</label>
									<input class="form-control" placeholder="Quyền cần thêm" id="idquyen" name="quyen" value="" onchange="checkQuyen()">
									<div id="invalid-quyen" style="color:red; visibility:hidden;"></div>
								</div>
								<button id="btnsubmitthemquyen" value="nut" class="btn btn-primary">Tạo quyền mới</button>
								<button type="reset" class="btn btn-default" onClick="reset()">Tạo lại</button>
						</div>
						
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
</body>

</html>
