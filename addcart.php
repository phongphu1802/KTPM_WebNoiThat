<?php
if(isset($_POST['id'])){
	$idproduct=$_POST['id'];
	include('connect.php');
	include('kiemtrasession.php');
	include('funtion.php');
	$db=new Database();
	if( !isset($_SESSION['username'])){
		echo "Bạn phải đăng nhập mới thực hiện được chức năng này";
		exit;
	}
	
	$amount=$_POST['amount'];
	$sqlamout="SELECT amout FROM product WHERE id=$idproduct";
	$datal=$db->query($sqlamout);
	foreach($datal as $key=>$value){
		$amount1=$value['amout'];
	}
	if($amount1<$amount){
		echo "Số lượng sản phẩm không đủ";
		exit;
	}
	//$id = intval(getInput('id'));
	$id=$_POST['id'];
		// Chi tiết sản phẩm
	$value = $db->fetchID("product",$id);
	
	if(!isset($_SESSION['idarray'])){
		$_SESSION['idarray']=1;
	}
	if(!isset($_SESSION['shoppingcart'][$_SESSION['idarray']])){
		
		$_SESSION['shoppingcart'][$_SESSION['idarray']]['name'] = $value['name'];
		$_SESSION['shoppingcart'][$_SESSION['idarray']]['image'] = $value['image'];
		$_SESSION['shoppingcart'][$_SESSION['idarray']]['id'] = $value['id'];
		$_SESSION['shoppingcart'][$_SESSION['idarray']]['amout'] = $amount;
		$_SESSION['shoppingcart'][$_SESSION['idarray']]['price'] = $value['price'];
		$_SESSION['idarray']+=1;
	}
	else{
		$_SESSION['shoppingcart'][$_SESSION['idarray']]['amout'] +=$amount;
	}
	
	echo "Thêm sản phẩm thành công";
	exit;
}
?>