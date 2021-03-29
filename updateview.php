<?php
if(isset($_POST['id'])){
	$id=$_POST['id'];
	include('connect.php');
	$class=new Database();
	$sqd=$class->connect();
	//Lấy view hiện tại
	$sql="SELECT view FROM product WHERE id=$id";
	$data=$class->query($sql);
	foreach($data as $key=>$value){
		$view=$value['view'];
	}
	$view+=1;
	//update view
	$sqlupdate="UPDATE product SET view=$view WHERE id=$id";
	mysqli_query($sqd,$sqlupdate);
}
?>