<html>
    <head>
        <title>Demo Search Basic by freetuts.net</title>
        <link rel="stylesheet" href="show.css" type="text/css" />
        <script>
	function chitietsanpham1(obj)
	{
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
    </head>
    <body>
        <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_POST['search2'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_POST['search2']);

            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Kết nối sql
                $con=mysqli_connect("localhost", "root","","csdl_ban_hang");
				if (!$con) {
				exit('Kết nối không thành công!');
				}
				// thành côngppk
				//echo 'Kết nối thành công!';
				
				//echo $search;
 				$sql = "select count(id) as total from product where name like '%$search%' or color like '%$search%'";
                // Thực thi câu truy vấn
                //$query= mysqli_query($con,$sql);
				
 				$result = mysqli_query($con,$sql);
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
		 
				// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
				// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
				$sql="SELECT * FROM product where name like '%$search%' or color like '%$search%'  LIMIT $start, $limit ";
				$result = mysqli_query($con,$sql);
				//echo $sql;
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);	
 				
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả

                if ($num > 0 && $search != "" && $num != 0) 
                {
                    // Dùng $num để đếm số dòng trả về.
                    //echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysqli_fetch_assoc($result)) {?>
						<div onClick="chitietsanpham1(this)" id="<?php echo $row["id"]; ?>" data-toggle="modal" data-target="#myModalctsp" style="margin-top: 15px;">
							<div style="width:19%; height:400px;float:left; border:1px solid #E25D33;padding:0px;text-align:center;margin:-1px 10px 10px -1px;border-radius:15px;" >
								<img src="<?php echo $row["image"];?>" width="80%" height="200px">
								<h2> <?php echo  $row['name']?> </h2>
								<h3 style="color:red">Giá: <?php echo number_format($row['price'])?> Đ</h3>
								<input type="submit" name="add_to_cart" style="margin-top:5px;background-color:#E25D33; color:#000;height:30px;width:70%;border-radius:15px;border:2px solid #E25D33;" value="Thêm vào giỏ hàng"/>
							</div>
						</div>
                    <?php }
                } 
                else 
				{
                    echo "Khong tim thay ket qua!";
                }
				
			
				
            }
        }
        ?>   
        <div class="pagination" style="clear: both">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
			if(empty($search))
			exit;
			else
            if ($current_page > 1 && $total_page > 1){
                echo '<span class="pagination_search" style="cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:65px; height:55px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;" id="'.($current_page-1).'" >Prev</span>';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span class="pagination_search" style="cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:40px; height:55px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;"  id="'.$i.'">'.$i.'</span> ';
                }
                else{
                    echo '<span class="pagination_search" style="cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:40px; height:55px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;" id="'.$i.'">'.$i.' </span> ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<span class="pagination_search" style="cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:65px; height:55px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;" id="'.($current_page+1).'" >Next</span>';
            }
           ?>
			<br>
    </body>
</html>