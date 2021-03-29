
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <link rel="stylesheet" href="css/dk3.css" type="text/css">
    <title>Đăng ký</title>
	
<script>	
//username: /^[a-zA-Z\d\s]+$/ username chấp nhận chữ cái và số, không khoảng trắng, không kí tự đặc biệt
		//email: /^\w+@[a-zA-Z]{3,8}(\.[a-zA-Z]{3,8})?\.[a-zA-Z]{2,5}$/
		//tel: /^\d{10,12}$/
		//address: /^[#./,\w\s-]+$/ đúng với trường hợp không có dấu
		//address: /^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?]+$/
		//password: /^[\w]{8,20}/ 
		//password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/ mật khẩu chứ ít nhất 1 kí tự thường, 1 kí tự INHOA, ít nhất 1 số ít nhất 8, nhiều nhất 20
		function checkName(){
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

		function checkUsername(){
			var username = document.getElementById("iduser").value;
			var patt = /[a-zA-Z\d]$/;
			result = patt.test(username);
			if(result == false)
			{
				document.getElementById("invalid-username").innerHTML="*Tên tài khoản hợp lệ không có khoảng trắng, kí tự đặc biệt";
				document.getElementById("invalid-username").style.visibility="visible";
			}
			else
			document.getElementById("invalid-username").style.visibility="hidden";

		}

		function checkPass1(){
			var pass1 = document.getElementById("idpass").value;
			var patt =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,20}$/;
			var result =  patt.test(pass1);
			if(result == false)
			{
				document.getElementById("invalid-pass").innerHTML="* Mật khẩu chứa ít nhất 1 kí tự thường, 1 kí tự INHOA, ít nhất 1 số,độ dài ít nhất 8,độ dài nhiều nhất 20";
				document.getElementById("invalid-pass").style.visibility="visible";
			}
			else
				document.getElementById("invalid-pass").style.visibility="hidden";

		}

		function checkPassAgain(){
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
		}

		function checkEmail(){
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

		function checkAddress(){
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

		function checkPhone(){
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

		function checkDate(){
			var date = document.getElementById("date").value;
			var today = new Date();
			var birthday = new Date(date);
			var age=parseInt(today.getFullYear() - birthday.getFullYear());
			if(age<18){
				document.getElementById("invalid-birthday").innerHTML="* Khách hàng chưa đủ 18 tuổi";
				document.getElementById("invalid-birthday").style.visibility="visible";
			}
			else
				document.getElementById("invalid-birthday").style.visibility="hidden";
		}

		function xulysubmit(){
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
				document.getElementById("invalid-name").innerHTML=" Tên khách hàng đang trống";
				document.getElementById("invalid-name").style.visibility="visible";
				name.focus();
				return false;
			}

			if(username.value == "")
			{
				alert("Tên tài khoản đang rỗng !!!");
				username.focus();
				return false;
			}

			if(pass1.value == "")
			{
				alert("Mật khẩu đang rỗng !!!");
				pass1.focus();
				return false;
			}

			if(pass2.value == "")
			{
				alert("Vui lòng xác nhận lại mật khẩu");
				pass2.focus();
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
			if(date.value == "")
			{
				alert("Ngày sinh đang rỗng");
				date.focus();
				return false;
			}
			if(tel.value == "")
			{
				alert("Số điện thoại đang rỗng");
				tel.focus();
				return false;
			}

			if(accept.checked == false) //Chưa chấp nhận điều khoản
			{
			   alert("Bạn chưa chấp nhận điều khoản của cửa hàng");
				return false;
			}
			return true;
		}
	$(document).ready(function() {
		$("#btnsubmit").click(function(){
			if(xulysubmit()){
					$.ajax({
					type:"POST",
					url: "xulydangky.php",
					dataType: 'html',
					data:{
						name:$("#idname").val(),
						username:$("#iduser").val(),
						password:$("#idpass").val(),
						respassword:$("#idpass2").val(),
						phone:$("#idphone").val(),
						date:$("#date").val(),
						email:$("#idemail").val(),
						address:$("#idaddress").val(),
						sex:$("#idsex").val(),
						position:'Khách hàng',
					},
					
					success: function(data){
						alert(data);
						if(data="Bạn đã đăng ký thành công."){
							location.reload();
						}
					}
				})
			}
		});
    });
	
</script>
</head>

<body>
	<div class="modal" id="myModaldk" role="dialog" >
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
               <div class="modal-body">
				<div style="margin: 0;">
					<div class="container"> 
					<h1 style="font-weight:strong; padding:3px; text-align: center; background-color:#00A780; color:white;">ĐĂNG KÝ</h1>              
					<div class="row">
						<div class="col-xs-12 col-md-12 formdk"> <!--"col-xs-12 col-md-8"-->
								<label>Họ tên<span style="color:red">*</span> </label>
								<input  id="idname" name="name" value="" placeholder="Họ tên..." type="text" onchange="checkName()">
								<div id="invalid-name" style="color:red; visibility:hidden;"></div>

								<label>Tên tài khoản<span style="color:red">*</span> </label>
								<input  id="iduser" name="username" value="" placeholder="Tên tài khoản" type="text" onchange="checkUsername()">
								<div id="invalid-username" style="color:red; visibility:hidden;"></div>

								<label>Mật khẩu<span style="color:red">*</span> </label>
								<input id="idpass" name="password" value="" placeholder="Mật khẩu" type="password" onchange="checkPass1()">
								<div id="invalid-pass" style="color:red; visibility:hidden;"></div>

								<label>Xác nhận lại mật khẩu<span style="color:red">*</span> </label>
								<input  id="idpass2" name="repassword" value="" placeholder="Nhập lại mật khẩu" type="password" onchange="checkPassAgain()">
								<div id="invalid-pass2" style="color:red; visibility:hidden;"></div>
								<label>Giới tính</label>
								<select id="idsex">
									<option value="male">Nam</option>
									<option value="female">Nữ</option>
								</select><br>
								
								<label>Ngày sinh <span style="color:red">*</span> </label>
								<input type="date" name="date" id="date" value="2000-08-28" onchange="checkDate()">
								<div id="invalid-birthday" style="color:red; visibility:hidden;"></div>
								
								<label>Thư điện tử</label>
								<input  id="idemail" name="email" value="" placeholder="Email" type="text" onchange="checkEmail()" />
								<div id="invalid-email" style="color:red; visibility:hidden;"></div>

								<label>Địa chỉ</label>
								<input id="idaddress" name="address" value="" placeholder="Địa chỉ" type="text" onchange="checkAddress()">
								<div id="invalid-address" style="color:red; visibility:hidden;"></div>

								<label>Số điện thoại</label>
								<input id="idphone" name="phone" value="" placeholder="Số điện thoại" type="text" onchange="checkPhone()">
								<div id="invalid-phone" style="color:red; visibility:hidden;"></div>


								<br>
								<input type="checkbox" id="xacnhan" name="xacnhandk">Tôi đã đọc và chấp thuận mọi<u><a
										href="provisions.html"> Điều khoản</a>.</u>
								<div style="text-align:right">
									<button id="btnsubmit" name="signin"  class="nutdk">Đăng ký</button>
									<input type="reset" name="reset" class="nuthuy" value="Hủy" data-dismiss="modal"/>
								</div>
							</form>
						</div>
					</div>
					</div>  
				</div>
				</div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
</body>

</html>
