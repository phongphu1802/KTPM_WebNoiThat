<?php
	if(isset($_POST['idbl']))
	{
		$idbl=$_POST['idbl'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data="status = 1";
		$trangthai='2';
		$class->updateBinhluan($idbl,$trangthai);
		echo "Bạn đã lưu thành công.";
		exit;
	}
?>