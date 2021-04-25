<?php
deleteuser();
	function deleteuser(){
		if(isset($_POST['nhaccungcap'])){
			include('../connect.php');
			$nhaccungcap=$_POST['nhaccungcap'];
			$class=new Database();
			$sqd=$class->connect();
			$sql="DELETE FROM nhaccungcap WHERE mancc='$nhaccungcap'";
			$s1=$sqd->query($sql);
			echo "Xóa nhà cung cấp '$nhaccungcap' thành công";
		}
		else{
			echo"Xóa nhà cung cấp '$nhaccungcap' thất bại";
		}
	}
?>