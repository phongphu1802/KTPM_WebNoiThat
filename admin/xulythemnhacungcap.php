<?php
xulythemnhacungcap();
	function xulythemnhacungcap()
	{
		if(isset($_POST['username']))
		{
			$nhaccungcap=$_POST['username'];
			include('../connect.php');
			$class=new Database();
			$sq1=$class->connect();
			$sql="SELECT mancc FROM nhaccungcap WHERE mancc='$nhaccungcap'";
			$query=mysqli_query($sq1,$sql);
			if(mysqli_num_rows($query)==1){
				echo " Nhà cung cấp đã tồn tại vui lòng đổi khác.";
				exit;
			}
			else{
				if(isset($_POST['username']))
				{
					$data=array('mancc' => $_POST['username'],
								'tenncc' => $_POST['name'],
								'sdtncc'=> $_POST['phone'],
								'diachi'=> $_POST['address'],
								'gmail'=> $_POST['email'],
								);
					$table='nhaccungcap';
					$class->insert($table,$data);
					echo " Bạn đã thêm thành công.";//"Xin Chào ".$_POST['username'].
					exit;
				}
			}		
		}
	}
?>