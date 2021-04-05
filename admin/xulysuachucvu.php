<?php
xulysuachucvu();
	function xulysuachucvu()
	{
		if(isset($_POST['macv']))
		{
			$macv=$_POST['macv'];
			$tencv=$_POST['tencv'];
			$chuoi=$_POST['chucnang'];
			include('../connect.php');
			$class=new Database();
			$sq1=$class->connect();
			$sql="SELECT * FROM chucvu WHERE chucvu = '$tencv' and chucvu <> (SELECT chucvu FROM chucvu WHERE macv='$macv')";
			echo $sql;
			$query=mysqli_query($sq1,$sql);
			if(mysqli_num_rows($query)==1){
				echo "Chức vụ đã tồn tại vui lòng sửa chức vụ khác.";
				exit;
			}
			else{
				if(isset($_POST['macv']))
				{
					$data=array('chucvu' => $tencv,
								'luong'=> '0',
								'trangthai'=>'1'
								);
					$table='chucvu';
					$class->updatechucvu($table,$data,$macv);
					$sql1="DELETE * FROM nhomquyen WHERE macv='$macv'";
					$query1=mysqli_query($sq1,$sql1);
					$quyen = explode(",", $chuoi);
					for($i=0;$i<count($quyen);$i++){
						$data=array('macv' => $macv,
								'maq' => $quyen[$i]
								);
						$table='nhomquyen';
						$class->insert($table,$data);
					}
					echo "Thay đổi chức vụ thành công.";
					exit;
				}
			}		
		}
	}
?>