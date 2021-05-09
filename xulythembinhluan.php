<?php
if(isset($_POST['txtuser'])){
	//Bắt dữ liệu Post
	$matk=$_POST['txtuser'];
	$masp=$_POST['txtmasp'];
	$binhluan=$_POST['txtcmt'];
	$danhgia=$_POST['txtdanhgia'];
	include('connect.php');
	$class=new Database();
	$sq1=$class->connect();
	$sql = "select * from binhluan";
	$querycount=mysqli_query($sq1,$sql);
	if($binhluan==''){
			echo "Vui lòng ghi thông tin bình luận";
			exit;
		}
		$data=array('idbinhluan' => mysqli_num_rows($querycount)+1,
						'masp' => $_POST['txtmasp'],
						'mauser'=> $_POST['txtuser'],
						'noidung' => $_POST['txtcmt'],
						'danhgia'=> $_POST['txtdanhgia'],
						'trangthaibl'=> 0
						);
			$table='binhluan';
			$class->insert($table,$data);
			echo "Đã gửi bình luận";
			exit;

}
?>