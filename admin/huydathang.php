<?php
	if(isset($_POST['idoder']))
	{
		$idoder=$_POST['idoder'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data="status = 3";
		$table='oder';
		$class->updateOrder($table,$data,$idoder);
		echo "Bạn đã hủy thành công.";
		exit;
	}
?>