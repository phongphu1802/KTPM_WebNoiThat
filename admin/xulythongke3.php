<?php
    if(isset($_POST['submittk2']))
    {
		$connect = new mysqli("localhost","root","","csdl_ban_hang");
     	mysqli_query($connect,"SET NAMES UTF8");
		echo 'Thời gian từ: '.$_POST['datefrom2'];
		echo ' đến: '.$_POST['dateto2'];
		echo '<table class="table table-bordered">
			<thead>
			<tr>
				<th data-sortable="true">Mã sản phẩm</th>
                <th data-sortable="true">Tên sản phẩm</th>
                <th data-sortable="true">Tên loại</th>
				<th data-sortable="true">Số lượng bán</th>
			</tr>
			</thead>
			<tbody>';
			// chọn ra 10 sản phẩm bán chạy
            $query3 = "SELECT product.id, product.name, catalog.name, SUM(oder_details.amout)";
            $query3 .= " FROM oder, oder_details, product, catalog";
            $query3 .=  " WHERE oder.id=oder_details.oder_id and oder_details.product_id=product.id and product.catalog_id=catalog.id
            and oder.created BETWEEN '".$_POST['datefrom2']."' AND '".$_POST['dateto2']."'";
            $query3 .= " GROUP BY product.id, product.name 
            ORDER BY SUM(oder_details.amout) DESC
            LIMIT 10"; 
	   		$result3 = mysqli_query($connect,$query3);
			while($row3 = mysqli_fetch_array($result3))
			{
			echo '<tr>';			
			echo '<td>'.$row3[0].'</td>';
			echo '<td>'.$row3[1].'</td>';
            echo '<td>'.$row3[2].'</td>';	
            echo '<td>'.$row3[3].'</td>';
			echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
	}
?>