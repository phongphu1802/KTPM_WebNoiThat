<?php
xulysuataikhoan();
function xulysuataikhoan()
{
	if(isset($_POST['username']))
	{
		$user=$_POST['username'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$data=array('username' => $_POST['username'],
			'password' => $_POST['password'],
			'phonenumber'=> $_POST['phone'],
			'name' => $_POST['name'],
			'gioitinh'=> $_POST['sex'],
			'email'=> $_POST['email'],
			'address'=> $_POST['address'],
			'created'=> $_POST['created'],
			'position'=>$_POST['position']
			);
		$table='user';
		$class->updateuser($table,$data,$user);
		echo "Xin chào bạn đã sửa thành công.".$_POST['username'];
		exit;
	}
}
?> 