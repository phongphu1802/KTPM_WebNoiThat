<?php
xulyanchucvu();
	function xulyanchucvu()
	{
		if(isset($_POST['macv']))
		{
			$chucvu=$_POST['macv'];
			include('../connect.php');
			$class=new Database();
			$sq1=$class->connect();
			$sql="select * from chucvu where macv = '$chucvu'";
			$query=mysqli_query($sq1,$sql);
			foreach($query as $key=>$value){
				$data=array('macv' =>$value['macv'],
							'chucvu' => $value['chucvu'],
							'luong' => $value['luong'],
							'trangthai'=> '0'
							);
				$table='chucvu';
				$class->updatechucvu($table,$data,$chucvu);
				echo "Bạn đã ẩn thành công.";
				exit;
			}
		}
	}		
?>