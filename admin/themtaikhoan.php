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
//		function anhien(obj){
//			if(obj.value=='admin'){
//				$("#idchucvu").prop('disabled', false);
//			}
//			else{
//				$("#idchucvu").prop('disabled', true);
//				$("#idchucvu").val('cv0');
//			}
//		}
		//username: /^[a-zA-Z\d\s]+$/ username chấp nhận chữ cái và số, không khoảng trắng, không kí tự đặc biệt
		//email: /^\w+@[a-zA-Z]{3,8}(\.[a-zA-Z]{3,8})?\.[a-zA-Z]{2,5}$/
		//tel: /^\d{10,12}$/
		//address: /^[#./,\w\s-]+$/ đúng với trường hợp không có dấu
		//address: /^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?]+$/
		//password: /^[\w]{8,20}/ 
		//password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/ mật khẩu chứ ít nhất 1 kí tự thường, 1 kí tự INHOA, ít nhất 1 số ít nhất 8, nhiều nhất 20
		function checkName()
		{
			var name = document.getElementById("idname").value;
			var namepattern = /[A-Z][a-zA-Z][^#&<>\"~;$^%{}?\d]{1,}$/;
			var result = namepattern.test(name);
			if(result == false)
			{
				document.getElementById("invalid-name").innerHTML="*Tên hợp lệ không có số, kí tự đặc biệt, viết hoa đầu từ";
				document.getElementById("invalid-name").style.visibility="visible";
				return false;
			}
			else
			{
				document.getElementById("invalid-name").style.visibility="hidden";
				return true;
			} 
		}

		function checkUsername()
		{
			var username = document.getElementById("iduser").value;
			var patt = /^[a-zA-Z\d\s]+$/;
			var result = patt.test(username);
			if(result == false)
			{
				document.getElementById("invalid-username").innerHTML="*Tên tài khoản hợp lệ không có khoảng trắng, kí tự đặc biệt";
				document.getElementById("invalid-username").style.visibility="visible";
				return false;
			}
			else{
				document.getElementById("invalid-username").style.visibility="hidden";
				return true;
			}

		}

		function checkPass1()
		{
			var pass1 = document.getElementById("idpass").value;
			var patt =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/;
			var result =  patt.test(pass1);
			if(result == false)
			{
				document.getElementById("invalid-pass").innerHTML="* Mật khẩu chứa ít nhất 1 kí tự thường, 1 kí tự INHOA, ít nhất 1 số ít nhất 8, nhiều nhất 20";
				document.getElementById("invalid-pass").style.visibility="visible";
				return false;
			}
			else{
				document.getElementById("invalid-pass").style.visibility="hidden";
				return true;
			}

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
				return false;  
			}
			else
			{
				if(pass2.value === pass1.value)
				{
					document.getElementById("invalid-pass2").style.visibility="hidden";
					return true;
				}
				else
				{
					document.getElementById("invalid-pass2").innerHTML="* Mật khẩu nhập lại chưa chính xác";
					document.getElementById("invalid-pass2").style.visibility="visible";
					return false;
				}
			}    
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
				return false;
			}
			else{
				document.getElementById("invalid-email").style.visibility="hidden";
				return true;
			}
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
				return false;
			}
			else{
				document.getElementById("invalid-address").style.visibility="hidden";
				return true;
			}
		}

		function checkPhone()
		{
			var phone = document.getElementById("idphone");
			var patt = /^[0-9]{10,13}$/;
			var result = patt.test(phone.value);
			if(result == false)
			{
				document.getElementById("invalid-phone").innerHTML="* Số điện thoại không hợp lệ";
				document.getElementById("invalid-phone").style.visibility="visible";
				return false;
			}     
			else{
				document.getElementById("invalid-phone").style.visibility="hidden";
				return true;
			}
		}
		
		function checkDate(){
			var date = document.getElementById("date").value;
			var today = new Date();
			var birthday = new Date(date);
			var age=parseInt(today.getFullYear() - birthday.getFullYear());
			if(age<18){
				document.getElementById("invalid-birthday").innerHTML="* Khách hàng chưa đủ 18 tuổi";
				document.getElementById("invalid-birthday").style.visibility="visible";
				return false;
			}
			else{
				document.getElementById("invalid-birthday").style.visibility="hidden";
				return true;
			}
		}


		function xulysubmitthemtaikhoan()
		{
			var name = document.getElementById("idname");
			var username = document.getElementById("iduser");
			var pass1 = document.getElementById("idpass");
			var pass2 = document.getElementById("idpass2");
			var email = document.getElementById("idemail");
			var address = document.getElementById("idaddress");
			var tel = document.getElementById("idphone");
			var accept = document.getElementById("xacnhan");
			var date = document.getElementById("date");
			if(name.value == "") //Tên còn rỗng
			{
				alert("Tên đang rỗng !!!");
				document.getElementById("invalid-name").innerHTML="Tên khách hàng đang trống";
				document.getElementById("invalid-name").style.visibility="visible";
				name.focus();
				return false;
			}

			if(username.value == "")
			{
				alert("Tên tài khoản đang rỗng");
				document.getElementById("invalid-username").innerHTML="Tên tài khoản đang rỗng";
				document.getElementById("invalid-username").style.visibility="visible";
				username.focus();
				return false;
			}

			if(pass1.value == "")
			{
				alert("Mật khẩu đang rỗng");
				document.getElementById("invalid-pass").innerHTML="Mật khẩu đang rỗng";
				document.getElementById("invalid-pass").style.visibility="visible";
				pass1.focus();
				return false;
			}
			
			if(tel.value == "")
			{
				alert("Số điện thoại đang rỗng !!!");
				tel.focus();
				return false;
			}

			if(date.value == "")
			{
				alert("Ngày sinh đang rỗng");
				date.focus();
				return false;
			}
			
			if(email.value == "")
			{
				alert("Thư điện tử đang rỗng !!!");
				email.focus();
				return false;
			}
			if(address.value == "")
			{
				alert("Địa chỉ đang rỗng");
				address.focus();
				return false;
			}
			if(checkName()==false||checkUsername()==false||checkPass1()==false||checkEmail()==false||checkAddress()==false||checkPhone()==false||checkDate()==false)
				return false;
			return true;
		}
		function reset(){
			document.getElementById("idname").value="";
			document.getElementById("iduser").value="";
			document.getElementById("idpass").value="";
			document.getElementById("idphone").value="";
			document.getElementById("date").value="";
			document.getElementById("idemail").value="";
			document.getElementById("idaddress").value="";
			document.getElementById("idchucvu").value="cv0";
			document.getElementById("idposition").value="khách hàng";
			$("#idchucvu").prop('disabled', true);
			
		}
		$(document).ready(function() {
			$("#btnsubmitthemtaikhoan").click(function(){
				if(xulysubmitthemtaikhoan()==true){
					$.ajax({
						type:"POST",
						url: "xulythemtaikhoan.php",
						dataType: 'html',
						data:{
							name:$("#idname").val(),
							username:$("#iduser").val(),
							password:$("#idpass").val(),
							phone:$("#idphone").val(),
							email:$("#idemail").val(),
							address:$("#idaddress").val(),
							sex:$("#idsex").val(),
							date:$("#date").val(),
							position:"admin",
							chucvu:$("#idchucvu").val()
						},
						success: function(data){
							alert(data);
							if(data!="Tên tài khoản đã tồn tại vui lòng đổi tên tài khoản khác."){
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
				<h1 class="page-header">Thêm tài khoản</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-6">
					
								<div class="form-group">
									<label>Họ và tên</label>
									<input class="form-control" placeholder="Họ và tên của chủ tài khoản" id="idname" name="name" value="" onchange="checkName()">
									<div id="invalid-name" style="color:red; visibility:hidden;"></div>
								</div>
								<div class="form-group">
									<label>Tên tài khoản</label>
									<input class="form-control" placeholder="Tên tài khoản" id="iduser" name="username" value="" onchange="checkUsername()">
									<div id="invalid-username" style="color:red; visibility:hidden;"></div>
								</div>
								<div class="form-group">
									<label>Mật khẩu</label>
									<input type="password" class="form-control" id="idpass" name="password" value="" onchange="checkPass1()">
									<div id="invalid-pass" style="color:red; visibility:hidden;"></div>
								</div>
								<div class="form-group">
									<label>Số điện thoại</label>
									<input class="form-control" placeholder="Số điện thoại" id="idphone" name="phone" value="" onchange="checkPhone()">
									<div id="invalid-phone" style="color:red; visibility:hidden;"></div>
								</div>
								<div class="form-group">
									<label>Ngày sinh</label>
									<input type="date" name="date" id="date" value="2000-08-28" onchange="checkDate()">
								    <div id="invalid-birthday" style="color:red; visibility:hidden;"></div>
								</div>
							</div>
							<div class="col-md-6">
							
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" placeholder="Thư điện tử" id="idemail" name="email" value="" onchange="checkEmail()">
									<div id="invalid-email" style="color:red; visibility:hidden;"></div>
								</div>
								<div class="form-group">
									<label>Địa chỉ</label>
									<input class="form-control" placeholder="Địa chỉ của tài khoản" id="idaddress" name="address" value="" onchange="checkAddress()">
									<div id="invalid-address" style="color:red; visibility:hidden;"></div>
								</div>
								
								<div class="form-group">
									<label>Giới tính</label>
									<select class="form-control" id="idsex">
										<option value="male">Nam</option>
										<option value="female">Nữ</option>
									</select>
								</div>
								
<!--
								<div class="form-group">
									<label>Quyền truy cập tài khoản</label>
									<select class="form-control" id="idposition" onChange="anhien(this)">
										<option value="khách hàng">Khách hàng</option>
										<option value="admin">Admin</option>
									</select>
								</div>
-->
								
								<div class="form-group">
									<label>Chức vụ</label>
									<select class="form-control" id="idchucvu" name="idchucvu">
										<?php
										include('../connect.php');
										$class1=new Database();
										$sqluser="select * from chucvu";
										$dataluser=$class1->query($sqluser);
										foreach($dataluser as $key=>$value){
											if($value['macv']!='cv1'&&$value['macv']!='cv0'){
												print_r('<option value="'.$value['macv'].'">'.$value['chucvu'].'</option>');
											}
										}
										?>
									</select>
								</div>
								
								<button id="btnsubmitthemtaikhoan" value="nut" class="btn btn-primary">Tạo tài khoản</button>
								<button type="reset" class="btn btn-default" onClick="reset()">Tạo lại</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
</body>

</html>
