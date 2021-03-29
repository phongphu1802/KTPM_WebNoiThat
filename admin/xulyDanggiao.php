<?php
	if(isset($_POST['idoder']))
	{
		include('../kiemtrasession.php');
		$idoder=$_POST['idoder'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data="status = 2";
		$table='oder';
		$class->updateOrder($table,$data,$idoder);
		echo "Đơn hàng đang được giao.";
		exit;
	}
?>