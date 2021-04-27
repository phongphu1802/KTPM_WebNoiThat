<?php
	include('../connect.php');
	$class=new Database();
	$sql=$class->connect();
	$date = getdate();
	$mon=$_POST['thang'];
	$year=$date['year'];
	$query1 ="SELECT product.id, product.name, catalog.name, SUM(oder_details.amout) ";
	$query1.="FROM oder, oder_details, product, catalog ";
	$query1.='WHERE oder.id=oder_details.oder_id and oder_details.product_id=product.id and product.catalog_id=catalog.id and oder.created BETWEEN "'.$year.'-'.$mon.'-01" AND "'.$year.'-'.$mon.'-31" ';
	$query1.="GROUP BY product.id, product.name ORDER BY SUM(oder_details.amout) DESC LIMIT 10 ";
	$str1='';
	$str1a='';
	$result1 = mysqli_query($sql,$query1);
	while($row1 = mysqli_fetch_array($result1))
	{
		$str1.=',"'.$row1[1].'"';
		$str1a.=','.$row1[3];
	}
	$str1=trim($str1,',');
	$str1a=trim($str1a,',');
	echo("/".$str1."/".$str1a."/");
?>			