<?php
	include('../connect.php');
	$class=new Database();
	$sql=$class->connect();
	$date = getdate();
	$mon=$_POST['thang'];
	$loai=$_POST['loai'];
	$year=$date['year'];
	$query2 ="SELECT catalog.id, product.id, product.name, SUM(oder_details.amout), product.price ";
	$query2.="FROM oder, oder_details, product, catalog ";
	$query2.="WHERE oder.id=oder_details.oder_id and oder_details.product_id=product.id and product.catalog_id=catalog.id and catalog.id='$loai' ";
	$query2.='and oder.created BETWEEN "'.$year.'-'.$mon.'-01" AND "'.$year.'-'.$mon.'-31" ';
	$query2.="GROUP BY catalog.id, product.id, product.price ";
	$result2 = mysqli_query($sql,$query2);
	$str2='';
	$str2a='';
	while($row2 = mysqli_fetch_array($result2))
	{
		$str2.=',"'.$row2[2].'"';
		$str2a.=','.$row2[3];
	}
	$str2=trim($str2,',');
	$str2a=trim($str2a,',');
	echo("/".$str2."/".$str2a."/");
?>