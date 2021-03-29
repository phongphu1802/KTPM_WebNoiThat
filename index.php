<?php
	include('connect.php');
	include('kiemtrasession.php');
	if(isset($_SESSION['useradmin']))
	{
		header("LOCATION: admin/index.php");
	}
?>
<?php if(isset($_SESSION['success'])){ ?>
			<script>alert(<?php echo $_SESSION['success']?>);</script>
<?php }?>
<html>
<head>
	<!-- Đường dẫn JS vs CSS -->
	<?php include('ajax_phantrang_vs_onclick.php') ?>	
</head>
<body>
	<?php include('modal_tacvu.php')?>
<from action="" name="frmdangky" method="get">
<div class="container-fluid">
    <div class="row" style="background-color:#4d4848 ;">
        <div class="search-box" >
			<img src="picture/logot3.jpg" class="logo">
			<input type="text" class="form-control" placeholder="Nhập để tìm sản phẩm..." id="search" value="">
            <span class="input-group-text" id="searchclick"><i class="fa fa-search"></i></span> 
		</div>
		<div class="menu-bar">
          	<?php
					if(isset($_SESSION['username']))
					{
						//echo "<script>alert('abc');</script>";
						echo('
						<ul>
							<li id="'.$_SESSION['username'].'" onClick="hienthilichsu(this)" title="Xem lịch sử mua hàng" ><a href="#"><h7>Chào '.$_SESSION['username'].'</h7></a></li>
							<li onClick="hienthigiohang()"><a href="#"><i class="fa fa-shopping-cart"></i>Giỏ Hàng</a></li>
							<li ><a href="xulydangxuat.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
						</ul>
							');
					}else{
						//echo $_SESSION['username'];
						//echo "<script>alert('abc');</script>";
						echo('
						<ul>
							<li onClick="hienthigiohang()"><a href="#"><i class="fa fa-shopping-cart"></i>Giỏ Hàng</a></li>
						  	<li data-toggle="modal" data-target="#myModaldk"><a href="#" >Đăng ký</a></li>
						  	<li data-toggle="modal" data-target="#myModaldn"><a href="#">Đăng nhập</a></li>
						</ul>
							');
					}
				?>
				  
		 </div>  
    </div>
	
	<div class="row" style="margin-top: 10px;">
		<nav class="main-nav" class="col-md-2 col-sm-2 col-12">
			<ul class="main-nav-ul">
				<li><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
				<li><a href="index.php"><i class="fa fa-cube"></i> Sản phẩm<span class="sub-arrow"></span></a>
					<ul>
						<?php
						$class=new Database();
						$sqd=$class->connect();
						$sql="Select * FROM catalog";
						$datal=$class->query($sql);
						foreach($datal as $key=>$val)
						{
							echo '<li style="list-style-type:none" id="LMN2'.$val['id'].'"><a href="#content">'.$val['name'].'</a></li>';
						}
						?>
					</ul>
				</li>
				<li><a href="#a"><i class="fa fa-phone"></i> Liên hệ</a></li>
			</ul>
		</nav>
		<div class="slider" class="col-md-10 col-sm-10" id="hinhanh1">
			<div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="picture/s3.jpg" class="d-block w-100">
					</div>
					<div class="carousel-item">
						<img src="picture/s2.jpg" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item">
						<img src="picture/s1.jpg" class="d-block w-100" alt="...">
					</div>
				</div>
				<ol class="carousel-indicators">
					<li data-target="#slider" data-slide-to="0" class="active"></li>
					<li data-target="#slider" data-slide-to="1"></li>
					<li data-target="#slider" data-slide-to="2"></li>
				</ol>
			</div>
    	</div>
	</div>
	<!-----------------------------CONTENT-------------------------------------------->
	<div class="row">
		<div class="col-xl-1"></div>
		<div class="col-xl-10">
			<br>
			<div id="content2" class="search-box">
				<br>
                    <label><h5>Loại sản phẩm</h5>
                          <select name="types" id="loainc" value="" style="height:50%">
                          <option value="">--Loại--</option>
                          <?php
                              $con=mysqli_connect("localhost", "root","","csdl_ban_hang");
                              $query1="select * from catalog";
                              $result1= mysqli_query($con,$query1);
                              while($row=mysqli_fetch_array($result1))
                              {
                                  echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
                              }                      
                              ?>
                           </select>
					</label>
				<label style="margin-left: 2%"><h5>Giá thấp nhất:</h5>
					<input type="text" value="" name="min" id="minnc" style="height:50%"></input>
				</label>
				<label style="margin-left: 2%"><h5>Giá cao nhất:</h5>
					<input type="text" value="" name="max" id="maxnc" style="height:50%"></input>
				</label>
				<label style="margin-top: 22.5px;">
					<span class="input-group-text" id="nangcao"><i class="fa fa-search"></i></span> 
				</label>
            </div>
			<div id="content"></div>
		</div>
		<div class="col-xl-1"></div>
	</div>
    <!-----------------------------FOOTER--------------------------------------------->
    <div class="row" style="height: 300px;">
		<section id="a" class="footer">
			<div class="container tex-center">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<h1>LIÊN HỆ VỚI CHÚNG TÔI</h1>
						<p><b>Đường dây nóng: </b> 092-669-9079</p>

						<p><b>Thư điện tử: </b>noithat@gmail.com</p>

						<p><b>Địa chỉ: </b>50 Thành Thái, quận 10, thành phố Hồ Chí Minh</p>

					</div>

					<div class="col-md-6 col-sm-6">
						<h1>CHI NHÁNH CỬA HÀNG</h1>
						<p><b>Chi nhánh 1: </b>18.02 An Dương Vương, phường 4, quận 5, thành phố Hồ Chí Minh</p>

						<p><b>Chi nhánh 2: </b>24 Lê Đức Thọ, phường 17, quận Gò Vấp, thành phố Hồ Chí Minh</p>

						<p><b>Chi nhánh 3: </b>50 Thành Thái, quận 10, thành phố Hồ Chí Minh</p>

					</div>

				</div>
				<hr>
				<p class="copyright" ><i class="fa fa-copyright"></i> Bản quyền thuộc về NNP Corp.</p>
			</div>
		</section>
	</div>
                     <!---BUTTON TO TOP---->
    <a class="gotopbtn" href="#"><i class="fa fa-angle-double-up"></i> </a>
	
</div>
</from>
<?php
	require('Login.php');
	require('Signup.php');
	//require('product-detail.php');

?>
    <script>
        function openmenu() {
            document.getElementById("side-menu").style.display = "block";
            document.getElementById("menu-btn").style.display = "none";
            document.getElementById("close-btn").style.display = "block";

        }
        function closemenu() {
            document.getElementById("side-menu").style.display = "none";
            document.getElementById("menu-btn").style.display = "block";
            document.getElementById("close-btn").style.display = "none";
        }
		
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#hinhanh1').collapse('hide')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 1000) $("#hinhanh1").collapse('hide')
		})
    </script>
</body>
</html>