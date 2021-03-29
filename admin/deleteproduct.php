<?php
deleteproduct();
	function deleteproduct(){
		if(isset($_POST['id'])){
			include('../connect.php');
			$product=$_POST['id'];
			$class=new Database();
			$sqd=$class->connect();
			$sql="DELETE FROM product WHERE id='$product'";
			$s1=$sqd->query($sql);
			echo "Xóa sản phẩm thành công";
		}
		else{
			echo"Xóa sản phẩm thất bại";
		}
	}
?>