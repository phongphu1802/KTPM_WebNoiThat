<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="css/admin.css" type="text/css" media="all" />
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
	
	<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.js.map"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js.map"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.js.map"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js.map"></script>
	<script>
	function openNav() {
		document.getElementById("sideNavigation").style.width = "20%";
		document.getElementById("main").style.marginLeft = "20%";
	}

	function closeNav() {
		document.getElementById("sideNavigation").style.width = "0";
		document.getElementById("main").style.marginLeft = "0";
	}
	</script>
</head>

<body>
			<!-------------------------------------------------leftmenu------------------------------------------------------->
			<div id="sideNavigation" class="sidenav ">
			  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  	<a href="#">Quản lý khách hàng</a>
			  	<a href="#">Quản lý hóa đơn</a>
			  	<a href="#">Quản lý sản phẩm</a>
			</div>
			<!--------------------------------------------------header--------------------------------------------------------->
			<div class="row-12" >
				<nav class="topnav">
					<a href="#" onclick="openNav()">
						<svg width="30" height="30" id="icoOpen">
						<path d="M0,5 30,5" stroke="white" stroke-width="5"/>
						<path d="M0,14 30,14" stroke="white" stroke-width="5"/>
						<path d="M0,23 30,23" stroke="white" stroke-width="5"/>
						</svg>
					</a>
					<li style="list-style-type: none"><a href="index.php" style="float: right; margin-top: 5px; height: 100%;">Đăng xuất</a></li>
					<marquee style="width: 20%;float: right; color: white; font-size: 40px;">Welcome to Admin</marquee>
				</nav>
			</div>
			<!-------------------------------------------------content---------------------------------------------------------->
			<div id="main" class="row">
			<!-- Add all your websites page content here  -->
			</div>
</body>
</html>