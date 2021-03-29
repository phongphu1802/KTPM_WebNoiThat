<?php
if(isset($_POST['key'])){
	include('connect.php');
	include('kiemtrasession.php');
	include('funtion.php');

	$key = $_POST['key'];

	unset($_SESSION['shoppingcart'][$key]);
	if(isset($_SESSION['idarray'])){
		$_SESSION['idarray']-=1;
	}
	echo " Xóa sản phẩm trong giỏ hàng thành công ! !";
}
?>