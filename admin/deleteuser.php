<?php
deleteuser();
	function deleteuser(){
		if(isset($_POST['user'])){
			include('../connect.php');
			$user=$_POST['user'];
			$class=new Database();
			$sqd=$class->connect();
			$sql="DELETE FROM user WHERE username='$user'";
			$s1=$sqd->query($sql);
			echo "Xóa tài khoản '$user' thành công";
		}
		else{
			echo"Xóa tài khoản '$user' thất bại";
		}
	}
?>