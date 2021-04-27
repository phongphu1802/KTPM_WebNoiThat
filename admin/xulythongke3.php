<?php
	include('../connect.php');
	$class=new Database();
	$sql=$class->connect();
	$date = getdate();
	$mon=$_POST['thang'];
	$year=$date['year'];
	$query3 ="SELECT catalog.id, catalog.name, SUM(oder_details.amout) ";
	$query3.="FROM oder, oder_details, product, catalog ";
	$query3.="where oder.id=oder_details.oder_id and oder_details.product_id=product.id and product.catalog_id=catalog.id ";
	$query3.='and oder.created BETWEEN "'.$year.'-'.$mon.'-01" AND "'.$year.'-'.$mon.'-31" ';
	$query3.="GROUP BY catalog.id, catalog.name ";
	$result3 = mysqli_query($sql,$query3);
	$str3='';
	$str3a='';
	while($row3 = mysqli_fetch_array($result3)){
		$str3.=',"'.$row3[1].'"';
		$str3a.=','.$row3[2];
	}
	$str3=trim($str3,',');
	$str3a=trim($str3a,',');
	echo("/".$str3."/".$str3a."/");
?>