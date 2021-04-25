<?php
xulysuancc();
function xulysuancc()
{
	if(isset($_POST['username']))
	{
		$nhaccungcap=$_POST['username'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data=array('mancc' => $_POST['username'],
					'tenncc' => $_POST['name'],
					'sdtncc'=> $_POST['phone'],
					'diachi' => $_POST['address'],
					'gmail'=> $_POST['email'],
			);
		$table='nhaccungcap';
		$class->updatenhaccungcap($table,$data,$nhaccungcap);
		echo "Chúc mừng bạn đã sửa thành công ".$_POST['username'];
		exit;
	}
}
?> 