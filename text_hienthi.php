<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script>
	$(document).ready(function(){
		var d=1;
		$("#Ban").click(function(){
					
			d=1;
			$.ajax({				
				type:"POST",
				url: "hienthisanpham.php",
				dataType: 'html',
				data:{
					id:"1",
				},
				success: function(data){
					{ 
                           if(data == 'false') 
                           {
                             alert('Không có người dùng');
                           }else{
                             $('#content').html(data);
                           }
                      }
				}
			});
		});
		$("#Ghe").click(function(){
			d=2;
			$.ajax({
				type:"POST",
				url: "hienthisanpham.php",
				dataType: 'html',
				data:{
					id:"2",
				},
				success: function(data){
					{ 
                           if(data == 'false') 
                           {
                             alert('Không có người dùng');
                           }else{
                             $('#content').html(data);
                           }
                      }
				}
			});
		});
		$("#Giuong").click(function(){
			d=3;
			$.ajax({
				type:"POST",
				url: "hienthisanpham.php",
				dataType: 'html',
				data:{
					id:"3",
				},
				success: function(data){
					{ 
                           if(data == 'false') 
                           {
                             alert('Không có người dùng');
                           }else{
                             $('#content').html(data);
                           }
                      }
				}
			});
		
		});
		$("#Tu").click(function(){
			d=4;
			$.ajax({
				type:"POST",
				url: "hienthisanpham.php",
				dataType: 'html',
				data:{
					id:"4",
				},
				success: function(data){
					{ 
                           if(data == 'false') 
                           {
                             alert('Không có người dùng');
                           }else{
                             $('#content').html(data);
                           }
                      }
				}
			});
		});
		$("#Den").click(function(){
			d=5;
			$.ajax({
				type:"POST",
				url: "hienthisanpham.php",
				dataType: 'html',
				data:{
					id:"5",
				},
				success: function(data){
					{ 
                           if(data == 'false') 
                           {
                             alert('Không có người dùng');
                           }else{
                             $('#content').html(data);
                           }
                      }
				}
			});
		});
		$("#Guong").click(function(){
			d=6;
			$.ajax({
				type:"POST",
				url: "hienthisanpham.php",
				dataType: 'html',
				data:{
					id:"6",
				},
				success: function(data){
					{ 
                           if(data == 'false') 
                           {
                             alert('Không có người dùng');
                           }else{
                             $('#content').html(data);
                           }
                      }
				}
			});
		});
		$(document).ready(function() {
			load_data();
			function load_data(page){
				$.ajax({
					url:"hienthisanpham.php",
					method:"POST",
					data:{page:page,id:d},
					success: function(data){
						$('#content').html(data);
					}
				})
			}
			$(document).on('click','.pagination_link',function(){
				var page=$(this).attr("id");
				load_data(page);
			});
		});
	
	});
	
	
	
	</script>
</head>

<body>
	<div >
		<button id="Ban" >Bàn</button>
		<button id="Den">Đèn</button>
		<button id="Ghe">Ghế</button>
		<button id="Giuong">Giường</button>
		<button id="Tu">Tủ</button>
        <button id="Guong">Gương</button>
	</div>
	<div id="content"></div>
    
</body>
</html>