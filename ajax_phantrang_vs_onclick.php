<meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap-grid.css.map" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap-grid.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap-grid.min.css.map" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap-reboot.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap-reboot.css.map" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css.map" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap.css.map" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap.min.css.map" type="text/css" media="all" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="admin/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function(){
		var search1="";
		var d=1;
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
		$("#LMN21").click(function(){
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
		$("#LMN22").click(function(){
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
		$("#LMN23").click(function(){
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
		$("#LMN24").click(function(){
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
		$("#LMN25").click(function(){
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
		$("#LMN26").click(function(){
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
		$("#nangcao").click(function(){
			if($("#loainc").val()!=""&&$("#maxnc").val()!=""&&$("#minnc").val()!=""){
				$.ajax({
					type:"POST",
					url: "nangcao.php",
					dataType: 'html',
					data:{
						loainc:$("#loainc").val(),
						maxnc:$("#maxnc").val(),
						minnc:$("#minnc").val()
					},
					success: function(data){
						$('#content').html(data);
					}
				});
			}
			else{
				alert("Kiểm tra lại điều kiện nhập vào");
			}
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
		$("#searchclick").click(function(){
			search1=$("#search").val();
			$.ajax({
				type:"POST",
				url: "timkiem1.php",
				dataType: 'html',
				data:{
					search2:$("#search").val()
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
			searchpt();
			function searchpt(page){
				$.ajax({
					url:"timkiem1.php",
					method:"POST",
					data:{page:page, search2:search1},
					success: function(data){
						$('#content').html(data);
					}
				})
			}
			$(document).on('click','.pagination_search',function(){
				var page=$(this).attr("id");
				searchpt(page);
			});
		});
	});
		function hienthigiohang(){
			$.ajax({
				type:"POST",
				url: "cart.php",
				dataType: 'html',
				data:{
				},
				success: function(data){
					$("#chitietgiohang").html(data);
					$("#myModalcart").modal(giohang);
					var giohang = {
						  'backdrop' : 'static',
						  'keyboard' : true,
						  'show' :true,
						  'focus' : false
					}
				}
			});
		}
		function hienthilichsu(obj){
			$.ajax({
				type:"POST",
				url: "lichsu.php",
				dataType: 'html',
				data:{
					username:obj.id
				},
				success: function(data){
					$("#chitietlichsu").html(data);
					$("#myModallichsu").modal(lichsu);
					var lichsu = {
						  'backdrop' : 'static',
						  'keyboard' : true,
						  'show' :true,
						  'focus' : false
					}
				}
			});
		}
	</script>