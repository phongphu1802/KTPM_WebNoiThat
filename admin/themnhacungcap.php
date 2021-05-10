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
		//
		
		
		function checkUsername()
		{
			var username = document.getElementById("iduser").value;
			var patt = /^[a-zA-Z\d]+$/;
			result = patt.test(username);
			if(result == false)
			{
				document.getElementById("invalid-username").innerHTML="*Mã hợp lệ không có khoảng trắng, kí tự đặc biệt";
				document.getElementById("invalid-username").style.visibility="visible";
			}
			else
			document.getElementById("invalid-username").style.visibility="hidden";

		}

		function checkName()
		{
			var name = document.getElementById("idname").value;
			var namepattern = /[A-Z][a-zA-Z][^#&<>\"~;$^%{}?\d]{1,}$/;
			result = namepattern.test(name);
			if(result == false)
			{
				document.getElementById("invalid-name").innerHTML="*Tên hợp lệ không có số, kí tự đặc biệt, viết hoa đầu từ";
				document.getElementById("invalid-name").style.visibility="visible";
			}
			else
			{
				document.getElementById("invalid-name").style.visibility="hidden";
			} 
		}

		
		/* function checkPass1()
		{
			var pass1 = document.getElementById("idpass").value;
			var patt =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/;
			var result =  patt.test(pass1);
			if(result == false)
			{
				document.getElementById("invalid-pass").innerHTML="* Mật khẩu chứa ít nhất 1 kí tự thường, 1 kí tự INHOA, ít nhất 1 số ít nhất 8, nhiều nhất 20";
				document.getElementById("invalid-pass").style.visibility="visible";
			}
			else
				document.getElementById("invalid-pass").style.visibility="hidden";

		}

		function checkPassAgain()
		{
			var pass1 = document.getElementById("idpass");
			var pass2 = document.getElementById("idpass2");
			if(pass1.value == "")
			{
				alert("Mật khẩu chưa nhập");   
				pass1.focus(); 
				pass2.value="";  
			}
			else
			{
				if(pass2.value === pass1.value)
				{
					document.getElementById("invalid-pass2").style.visibility="hidden";
				}
				else
				{
					document.getElementById("invalid-pass2").innerHTML="* Mật khẩu nhập lại chưa chính xác";
					document.getElementById("invalid-pass2").style.visibility="visible";
				}
			}    
		} */

		
		
		function checkPhone()
		{
			var phone = document.getElementById("idphone");
			var patt = /^[0-9]{10,13}$/;
			var result = patt.test(phone.value);
			if(result == false)
			{
				document.getElementById("invalid-phone").innerHTML="* Số điện thoại không hợp lệ";
				document.getElementById("invalid-phone").style.visibility="visible";
			}     
			else
				document.getElementById("invalid-phone").style.visibility="hidden";
		}

		function checkAddress()
		{
			var address = document.getElementById("idaddress").value;
			var patt = /^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?]+$/;
			var result = patt.test(address);
			if(result == false)
			{
				document.getElementById("invalid-address").innerHTML="* Địa chỉ không được chứa các kí tự đặc biệt";
				document.getElementById("invalid-address").style.visibility="visible";
			}
			else
				document.getElementById("invalid-address").style.visibility="hidden";
		}
		
		function checkEmail()
		{
			var email = document.getElementById("idemail").value;
			var patt= /^\w+@[a-zA-Z]{3,8}(\.[a-zA-Z]{3,8})?\.[a-zA-Z]{2,5}$/;
			var result = patt.test(email);
			if(result == false)
			{
				document.getElementById("invalid-email").innerHTML="* Email không hợp lệ";
				document.getElementById("invalid-email").style.visibility="visible";
			}
			else
				document.getElementById("invalid-email").style.visibility="hidden";
		}

		
		
	
		function xulysubmitthemnhacungcap()
		{
			var username = document.getElementById("iduser");
			var name = document.getElementById("idname");
			var tel = document.getElementById("idphone");
			var address = document.getElementById("idaddress");
			var email = document.getElementById("idemail");
			var accept = document.getElementById("xacnhan");
			
			if(username.value == "")
			{
				alert("Mã nhà cung cấp đang trống");
				document.getElementById("invalid-username").innerHTML=" Mã nhà cung cấp đang trống";
				document.getElementById("invalid-username").style.visibility="visible";
				username.focus();
				return false;
			}
			var usernamex = document.getElementById("invalid-username").style.visibility;
			if(usernamex == "visible")
			{
				alert("Mã không hợp lệ, vui lòng nhập lại");
				return false;
			}
			
			if(name.value == "") //Tên còn rỗng
			{
				alert("Tên nhà cung cấp đang trống");
				document.getElementById("invalid-name").innerHTML=" Tên nhà cung cấp đang trống";
				document.getElementById("invalid-name").style.visibility="visible";
				name.focus();
				return false;
			}
			var namex = document.getElementById("invalid-name").style.visibility;
			if(namex == "visible")
			{
				alert("Tên không hợp lệ, vui lòng nhập lại");
				return false;
			}

			if(tel.value == "")
			{
				alert("Số điện thoại đang trống");
				document.getElementById("invalid-phone").innerHTML=" Số điện thoại đang trống";
				document.getElementById("invalid-phone").style.visibility="visible";
				tel.focus();
				return false;
			}
			var phonex = document.getElementById("invalid-phone").style.visibility;
			if(phonex == "visible")
			{
				alert("Số điện thoại không hợp lệ, vui lòng nhập lại");
				return false;
			}

			if(address.value == "")
			{
				alert("Địa chỉ đang trống");
				document.getElementById("invalid-address").innerHTML=" Địa chỉ đang trống";
				document.getElementById("invalid-address").style.visibility="visible";
				address.focus();
				return false;
			}
			var addressx = document.getElementById("invalid-address").style.visibility;
			if(addressx == "visible")
			{
				alert("Địa chỉ không hợp lệ, vui lòng nhập lại");
				return false;
			}
			
			if(email.value == "")
			{
				alert("Thư điện tử đang trống");
				document.getElementById("invalid-email").innerHTML=" Thư điện tử đang trống";
				document.getElementById("invalid-email").style.visibility="visible";
				email.focus();
				return false;
			}
			var emailx = document.getElementById("invalid-email").style.visibility;
			if(emailx == "visible")
			{
				alert("Thư điện tử không hợp lệ, vui lòng nhập lại");
				return false;
			}
			
			return true;
		}
		function reset(){
			document.getElementById("idname").value="";
			document.getElementById("iduser").value="";
			document.getElementById("idphone").value="";
			document.getElementById("idaddress").value="";
			document.getElementById("idemail").value="";
		}
		$(document).ready(function() {
			$("#btnsubmitthemnhacungcap").click(function(){
				if(xulysubmitthemnhacungcap()==true){
					$.ajax({
						type:"POST",
						url: "xulythemnhacungcap.php",
						dataType: 'html',
						data:{
							username:$("#iduser").val(),
							name:$("#idname").val(),
							phone:$("#idphone").val(),
							address:$("#idaddress").val(),
							email:$("#idemail").val(),
						},
						success: function(data){
							alert(data);
							if(data="Bạn đã thêm thành công."){
								//location.reload();
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
				<h1 class="page-header">Thêm Nhà Cung Cấp</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
					
								<div class="form-group">
									<label id="id">Mã NCC</label>
									<input class="form-control" placeholder="Mã nhà cung cấp" id="iduser" name="username" value="" onchange="checkUsername()">
									<div id="invalid-username" style="color:red; visibility:hidden;"></div>
								</div>
								
								<div class="form-group">
									<label id="name">Tên NCC</label>
									<input class="form-control" placeholder="Tên nhà cung cấp" id="idname" name="name" value="" onchange="checkName()">
									<div id="invalid-name" style="color:red; visibility:hidden;"></div>
								</div>
								
								<div class="form-group">
									<label id="phone">Số điện thoại</label>
									<input class="form-control" placeholder="Số điện thoại" id="idphone" name="phone" value="" onchange="checkPhone()">
									<div id="invalid-phone" style="color:red; visibility:hidden;"></div>
								</div>	

						</div>
							
						<div class="col-md-6">
							
								<div class="form-group">
									<label id="address">Địa chỉ</label>
									<input class="form-control" placeholder="Địa chỉ của nhà cung cấp" id="idaddress" name="address" value="" onchange="checkAddress()">
									<div id="invalid-address" style="color:red; visibility:hidden;"></div>
								</div>
								
								<div class="form-group">
									<label id="email">Email</label>
									<input class="form-control" placeholder="Thư điện tử" id="idemail" name="email" value="" onchange="checkEmail()">
									<div id="invalid-email" style="color:red; visibility:hidden;"></div>
								</div>
								
								<button id="btnsubmitthemnhacungcap"  name="btnAdd" value="nut" class="btn btn-primary">Thêm </button>
								<button id="idreset" name="reset" type="reset" class="btn btn-default" onClick="reset()">Làm mới</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
</body>

</html>
