<?php
    if(isset($_POST['submittk']))
    {
		$connect = new mysqli("localhost","root","","csdl_ban_hang");
     	mysqli_query($connect,"SET NAMES UTF8");
			$tongsl=0;
			$tongtien=0;
			echo 'Thời gian từ: '.$_POST['datefrom'];
			echo ' đến '.$_POST['dateto'];
			echo '<table class="table table-bordered">
			<thead>
			<tr>
				<th data-sortable="true" >Mã loại</th>
				<th data-sortable="true">Mã sản phẩm</th>
				<th data-sortable="true">Tên sản phẩm</th>
				<th data-sortable="true">Số lượng bán</th>
				<th data-sortable="true">Tổng tiền</th>
			</tr>
			</thead>
			<tbody>';
	   		$catalog_id=$_POST['types'];
	  		$query2 = "SELECT catalog.id, product.id, product.name, SUM(oder_details.amout), product.price";
	   		$query2 .= " FROM oder, oder_details, product, catalog";
	  		$query2 .= " WHERE oder.id=oder_details.oder_id and oder_details.product_id=product.id 
	   		and product.catalog_id=catalog.id and catalog.id=".$_POST['types'];
	   		$query2 .=" and oder.created BETWEEN '".$_POST['datefrom']."' AND '".$_POST['dateto']."'";
	   		$query2 .= " GROUP BY catalog.id, product.id, product.price";
	   		$result2 = mysqli_query($connect,$query2);
	   		
			while($row2 = mysqli_fetch_array($result2))
			{
				echo '<tr>';			
				echo '<td>'.$row2[0].'</td>';
				echo '<td>'.$row2[1].'</td>';
				echo '<td>'.$row2[2].'</td>';
				echo '<td>'.$row2[3].'</td>';
				echo '<td><p class="text-right">'.$row2[3]*$row2[4].'</p></td>';	
				echo '</tr>';
				$tongsl+=$row2[3];
				$tongtien+=$row2[3]*$row2[4];
			}
				echo '</tbody>';
				echo '</table>';
				echo '<p class="h4">Tổng số lượng sản phẩm:'.$tongsl.'</p>';
				echo '<p class="h4">Tổng doanh thu:'.$tongtien.' vnđ</p>';
	}
?>