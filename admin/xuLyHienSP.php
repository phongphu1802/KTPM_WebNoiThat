<?php
setStatusSanPhamShow();
	function setStatusSanPhamShow(){
		if(isset($_POST['id'])){
			include('../connect.php');
			$product=$_POST['id'];
			$class=new Database();
			$sqd=$class->connect();
			$sql="UPDATE product SET status=1 WHERE id='$product'";
			$s1=$sqd->query($sql);
			echo "Hiện sản phẩm thành công";
		}
		else{
			echo"Hiện sản phẩm thất bại";
		}
	}
?>