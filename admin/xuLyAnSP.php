<?php
setStatusSanPhamHide();
	function setStatusSanPhamHide(){
		if(isset($_POST['id'])){
			include('../connect.php');
			$product=$_POST['id'];
			$class=new Database();
			$sqd=$class->connect();
			$sql="UPDATE product SET status=0 WHERE id='$product'";
			$s1=$sqd->query($sql);
			echo "Ẩn sản phẩm thành công";
		}
		else{
			echo"Ẩn sản phẩm thất bại";
		}
	}
?>