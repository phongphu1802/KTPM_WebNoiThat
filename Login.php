
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/dn.css" type="text/css">
  <title>Đăng nhập</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
     $(document).ready(function() { 
		$("#btnsubmit1").click(function(){
			$.ajax({
				type:"POST",
				url: "xulydangnhap.php",
				dataType: 'html',
				data:{
					txtuser:$("#iduserdn").val(),
					txtpass:$("#idpassdn").val()
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
		});
	});
     
    </script>
</head>

<body>
<!--Đăng nhập-->
<div class="modal" id="myModaldn" role="dialog" >
   <div class="modal-dialog modal-lg">
       <div class="modal-content">
               <!-- Modal Header -->
               <!-- Modal body -->
        <div class="modal-body">
				<div style="margin: 0;">
				  <div class="container" id="loginTittle">
					<h1 id="login"style="font-weight:strong; padding:3px; text-align: center; background-color:#00A780; color:white;">ĐĂNG NHẬP</h1>              
					<div class="row">
					  <div class="col-xs-12 col-md-12 formdangnhap">
						  <form name="dangnhap" method="post" action="">
							<label id="userLabel">Tên người dùng</label>
							<input type="text" id="iduserdn" name="txtuser" value="">         
							<label id="pwdLabel">Mật khẩu</label>
							<input type="password"  id="idpassdn" name="txtpass" value="" >
							<button type="submit" id="btnsubmit1" class="nut">Đăng nhập</button>
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