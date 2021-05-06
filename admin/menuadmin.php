<?php
	if(isset($_SESSION['quyenuser']))
	{
		$quyenuser=$_SESSION['quyenuser'];
		$sql="SELECT maq FROM nhomquyen WHERE macv ='$quyenuser'";
		include('../connect.php');
		$class=new Database();
		$sq=$class->connect();
		$query=mysqli_query($sq,$sql);
		if(mysqli_num_rows($query)==0){
			echo "Lỗi không tồn tại quyền của tài khoản $useradmin";
			exit;
		}
		while($row=mysqli_fetch_array($query)){
			$s1=$row['maq'];
			$sql1="SELECT maq,tenq FROM dsquyen WHERE maq='$s1'";
			$query1=mysqli_query($sq,$sql1);
			while($row1=mysqli_fetch_array($query1)){
				$s2=$row1['maq'];
				$s3=$row1['tenq'];
				?>
					<li id="<?php echo("$s2") ?>"><a href="#"><span class="glyphicon glyphicon-stats"></span><?php echo("$s3") ?></a></li>
				<?php
			}
		}
	}
?>