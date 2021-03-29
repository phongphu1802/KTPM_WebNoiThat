<?php
    if(isset($_POST['submittk1']))
    {
		$connect = new mysqli("localhost","root","","csdl_ban_hang");
     	mysqli_query($connect,"SET NAMES UTF8");
		echo 'Thời gian từ: '.$_POST['datefrom1'];
		echo ' đến: '.$_POST['dateto1'];
		echo '<table class="table table-bordered">
			<thead>
			<tr>
				<th data-sortable="true">Mã loại</th>
				<th data-sortable="true">Tên loại</th>
				<th data-sortable="true">Số lượng bán</th>
			</tr>
			</thead>
			<tbody>';
	   $query3 = "SELECT catalog.id, catalog.name, SUM(oder_details.amout)";
	   $query3 .="FROM oder, oder_details, product, catalog ";
	   $query3 .=" where oder.id=oder_details.oder_id and oder_details.product_id=product.id and product.catalog_id=catalog.id";
	   $query3 .=" and oder.created BETWEEN '".$_POST['datefrom1']."' AND '".$_POST['dateto1']."'";
	   $query3 .=" GROUP BY catalog.id, catalog.name";
	   $result3 = mysqli_query($connect,$query3);
		while($row3 = mysqli_fetch_array($result3))
		{
			echo '<tr>';			
			echo '<td>'.$row3[0].'</td>';
			echo '<td>'.$row3[1].'</td>';
			echo '<td>'.$row3[2].'</td>';	
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
?>