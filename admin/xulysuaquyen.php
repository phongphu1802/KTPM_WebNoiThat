<?php
xulysuaquyen();
function xulysuaquyen()
{
	if(isset($_POST['maq']))
	{
		$maq=$_POST['maq'];
		$tenq=$_POST['tenq'];
		$trangthai=$_POST['trangthai'];
		include('../connect.php');
		$class=new Database();
		$sq1=$class->connect();
		$sql="SELECT tenq FROM dsquyen WHERE tenq='$tenq'";
		$query=mysqli_query($sq1,$sql);
		if(mysqli_num_rows($query)==1){
			echo "Quyền đã tồn tại vui lòng sửa quyền khác.";
			exit;
		}
		$data=array('maq' => $maq,
			'tenq' => $tenq,
			'trangthai'=> $trangthai
			);
		$table='dsquyen';
		$class->updatequyen($table,$data,$maq);
		echo "Bạn đã sửa thành công.";
		exit;
	}
}
?> 