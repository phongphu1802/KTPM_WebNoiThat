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
			$sql="SELECT tenq FROM dsquyen WHERE tenq='$quyen'";
			$query=mysqli_query($sq1,$sql);
			if(mysqli_num_rows($query)==1){
				echo "Quyền đã tồn tại vui lòng thêm quyền khác.";
				exit;
			}
			else{
				if(isset($_POST['quyen']))
				{
					//Count quyền
					$count="SELECT * FROM dsquyen";
					$countquyen=mysqli_query($sq1,$count);
					$temp=1;
					foreach($countquyen as $key=>$value){
						$temp++;
					}
					$data=array('maq' => 'q'.$temp,
								'tenq' => $quyen,
								'trangthai'=> '1'
								);
					$table='dsquyen';
					$class->insert($table,$data);
					echo "Bạn đã thêm quyền thành công.";
					exit;
				}
			}		
		}
	}
?>