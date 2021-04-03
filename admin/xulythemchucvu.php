<?php
xulythemchucvu();
	function xulythemchucvu()
	{
		if(isset($_POST['tencv']))
		{
			$tencv=$_POST['tencv'];
			$chuoi=$_POST['chucnang'];
			include('../connect.php');
			$class=new Database();
			$sq1=$class->connect();
			$sql="SELECT * FROM chucvu WHERE chucvu='$tencv'";
			$query=mysqli_query($sq1,$sql);
			if(mysqli_num_rows($query)==1){
				echo "Chức vụ đã tồn tại vui lòng thêm chức vụ khác.";
				exit;
			}
			else{
				if(isset($_POST['tencv']))
				{
					//Count quyền
					$count="SELECT * FROM chucvu";
					$countchucvu=mysqli_query($sq1,$count);
					$temp=1;
					foreach($countchucvu as $key=>$value){
						$temp++;
					}
					$data=array('macv' => 'cv'.$temp,
								'chucvu' => $tencv,
								'luong'=> '0',
								'trangthai'=>'1'
								);
					$table='chucvu';
					$class->insert($table,$data);
					$quyen = explode(",", $chuoi);
					for($i=0;$i<count($quyen);$i++){
						$data=array('macv' => 'cv'.$temp,
								'maq' => $quyen[$i]
								);
						$table='nhomquyen';
						$class->insert($table,$data);
					}
					echo "Bạn đã thêm chức vụ thành công thành công.";
					exit;
				}
			}		
		}
	}
?>