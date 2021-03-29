<?php
if(isset($_POST['user'])){
	include('kiemtrasession.php');
	include('connect.php');
	$class=new Database();
	$sq1=$class->connect();
	$sql1="select id from oder";
	$result=mysqli_query($sq1,$sql1);
	$num=mysqli_num_rows($result);
    $data=array(
		'id' => $num+1,
		'user_username' => $_POST['user'],
		'total_price' => $_POST['total'],
		'created'=> date('y-m-d'),
		'address' => $_POST['diachi'],
		'status'=>1,		
	);
	$table='oder';
	$class->insert($table,$data);
	
	//lấy dữ liệu session úp lên order-details
	$table2='oder_details';
	for($id=1;$id<=$_SESSION['idarray'];$id++){
		$data2=array(
		'oder_id'=>$num+1,
		'product_id'=>$_SESSION['shoppingcart'][$id]['id'],
		'price'=>$_SESSION['shoppingcart'][$id]['price'],
		'amout'=>$_SESSION['shoppingcart'][$id]['amout'],
		);
		unset($_SESSION['shoppingcart'][$id]['id']);
		unset($_SESSION['shoppingcart'][$id]['price']);
		unset($_SESSION['shoppingcart'][$id]['amout']);
		unset($_SESSION['shoppingcart'][$id]);
		$class->insert($table2,$data2);
	}
	echo ("Thanh toán thành công");
}
?>