<?php
	if(isset($_POST['idtl']))
	{
		include('../kiemtrasession.php');
		$idtl=$_POST['idtl'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$trangthai="1";
		$class->updateBinhluan($idtl,$trangthai);
		echo "Đã trả lời bình luận.";
		exit;
	}
?>