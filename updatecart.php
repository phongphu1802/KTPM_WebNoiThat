<?php
if(isset($_POST['key'])){
	include('connect.php');
	include('kiemtrasession.php');
	include('funtion.php');
	$db=new Database();
	
	$qty = $_POST['amout'];
	$key = $_POST['key'];
	if($qty==0){
		echo "Số lượng không thể bằng không";
		exit;
	}
	$_SESSION['shoppingcart'][$key]['amout'] =$qty;
	echo "Cập nhật giỏ hàng thành công";
}
?>