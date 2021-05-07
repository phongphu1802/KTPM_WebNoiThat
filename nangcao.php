<script>
	function chitietsanpham2(obj)
	{
		$.ajax({
			type:"POST",
			url: "updateview.php",
			dataType: 'html',
			data:{
				id:obj.id
			}
		});
		$.ajax({
			type:"POST",
			url: "product-detail.php",
			dataType: 'html',
			data:{
				id:obj.id
			},
			success: function(data){
				$("#chitietsanpham1").html(data);
				$("#myModalctsp").modal(options10);
					var options10 = {
					'backdrop' : 'static',
					'keyboard' : true,
					'show' :true,
					'focus' : false
					}
			}
		});
	}
</script>
<?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['loainc'])) 
        {
            // Gán hàm addslashes để chống sql injection
			$loai = $_POST['loainc'];
			$min = $_POST['minnc'];
			$max = $_POST['maxnc'];
			$con=mysqli_connect("localhost", "root","","csdl_ban_hang");
			if (!$con) {
				exit('Kết nối không thành công!');
			}
			$sql='SELECT count(product.id) as total , product.name, catalog.name, product.price, image
					FROM catalog, product
					WHERE catalog.id=product.catalog_id and catalog.id='.$loai.' and product.price>'.$min.' and product.price<'.$max;
				$result=mysqli_query($con,$sql);
				$row = mysqli_fetch_assoc($result);
				$total_records = $row['total'];
			// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
				$current_page=1;
				$current_page = isset($_POST['page']) ? $_POST['page'] : 1;
				$limit = 10;
		 
				// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
				// tổng số trang
				$total_page = ceil($total_records / $limit);
		 
				// Giới hạn current_page trong khoảng 1 đến total_page
				if ($current_page > $total_page){
					$current_page = $total_page;
				}
				else if ($current_page < 1){
					$current_page = 1;
				}
		 
				// Tìm Start
				$start = ($current_page - 1) * $limit;
				include('connect.php');
				
				$sql='SELECT product.id, product.name, catalog.name, product.price, image
					FROM catalog, product
					WHERE catalog.id=product.catalog_id and catalog.id='.$loai.' and product.price>'.$min.' and product.price<'.$max.'  
					LIMIT '.$start.','. $limit;
				$result = mysqli_query($con,$sql);
				//echo $sql;
                // Đếm số đong trả về trong sql.
				if(empty($result)){
					echo "<script>alert('Không tìm thấy kết quả');</script>";
				}else{
					$num = mysqli_num_rows($result);
					if($num>0 && $num != 0){
						echo '<script>alert("Kết quả tìm theo giá trong khoảng ('.$min.', '.$max.')");</script>';
						while ($row = mysqli_fetch_assoc($result)) {?>
						<div onClick="chitietsanpham2(this)" id="<?php echo $row["id"]; ?>" data-toggle="modal" data-target="#myModalctsp">
							<div style="width:19%; height:400px;float:left; border:1px solid #E25D33;padding:0px;text-align:center;margin:-1px 10px 10px -1px;border-radius:15px;" >
								<img src="<?php echo $row["image"];?>" width="80%" height="200px">
								<h2> <?php echo  $row['name']?> </h2>
								<h3 style="color:red">Giá: <?php echo number_format($row['price'])?> Đ</h3>
								<input type="submit" name="add_to_cart" style="margin-top:5px;background-color:#E25D33; color:#000;height:30px;width:70%;border-radius:15px;border:2px solid #E25D33;" value="Thêm vào giỏ hàng"/>
							</div>
						</div>
						<?php }
					}
				}
?>
			<div class="pagination" style="clear: both">
<?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
			if(empty($loai)|| empty($min) || empty($max))
			exit;
			else
            if ($current_page > 1 && $total_page > 1){
                echo '<span class="pagination_searchsuper" style="cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:65px; height:55px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;" id="'.($current_page-1).'" >Prev</span>';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span class="pagination_searchsuper" style="cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:40px; height:55px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;"  id="'.$i.'">'.$i.'</span> ';
                }
                else{
                    echo '<span class="pagination_search" style="cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:40px; height:55px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;" id="'.$i.'">'.$i.' </span> ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<span class="pagination_searchsuper" style="cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:65px; height:55px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;" id="'.($current_page+1).'" >Next</span>';
            }
?>
		</div>
<?php
	}
?>