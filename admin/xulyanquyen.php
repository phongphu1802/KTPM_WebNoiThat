<?php
xulythemquyen();
	function xulythemquyen()
	{
		if(isset($_POST['quyen']))
		{
			$quyen=$_POST['quyen'];
			include('../connect.php');
			$class=new Database();
			$sq1=$class->connect();
			$sql="select * from dsquyen where maq = '.$quyen.'";
			$query=mysqli_query($sq1,$sql);
			foreach($countquyen as $key=>$value){
				$data=array('maq' =>$value['maq'],
							'tenq' => $value['tenq'],
							'trangthai'=> '0'
							);
				$table='dsquyen';
				$class->updatequyen($table,$data,$quyen);
				echo "Bạn đã sửa thành công.";
				exit;
			}
		}
	}		
?>