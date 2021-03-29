<script>
	function chitietsanpham(obj)
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

	//loaing sp và pagination
	if(isset($_POST['id'])){
		$Id=$_POST['id'];
		include('connect.php');
		$class=new Database();
		$sqd=$class->connect();
		$record_per_page=10;
		$page='';
		$output='';
		if(isset($_POST["page"])){
			$page=$_POST["page"];
		}
		else{
			$page=1;
		}
		$start_from=($page-1)*$record_per_page;
		$sql="SELECT * FROM product WHERE catalog_id=$Id LIMIT $start_from,$record_per_page";		
		$query=mysqli_query($sqd,$sql);
		$datal=$class->query($sql);
		echo '<br>';
		foreach($datal as $key=>$value){
			if ($value["amout"]>0){	?>		 
				<div id="<?php echo $value["id"]; ?>" onClick="chitietsanpham(this)" data-toggle="modal" data-target="#myModalctsp">   
					<div style="width:19%; height:400px;float:left; border:1px solid #E25D33;padding:0px;text-align:center;margin:-1px 10px 10px -1px;border-radius:15px;">
					<img src="<?php echo $value["image"];?>" width="80%" height="200px">
					<h5><?=$value['name']?></h5><br>         
					<h5 class="text-danger" style="color:red;">Giá:  <?= number_format($value["price"],0);?>Đ</h5>
					<input type="hidden" name="quantity" class="form-control" value="1"/>
					<input type="hidden" name="hidden_name" value="<?php echo $value["name"];?>"/>
					<input type="hidden" name="hidden_price" value=" <?= number_format($value["price"],0);?>" />
					<br>
					<input type="submit" name="add_to_cart" style="margin-top:5px;background-color:#E25D33; color:#000;height:30px;width:70%;border-radius:15px;border:2px solid #E25D33;" value="Thêm vào giỏ hàng"/>
					</div>
				</div>
			<?php
			}
			else{?>
				<div style="width:19%; height:400px;float:left; border:1px solid #E25D33;padding:0px;text-align:center;margin:-1px 10px 10px -1px;border-radius:15px;">
					<img src="<?php echo $value["image"];?>" width="80%" height="200px">
					<h5><?=$value['name']?></h5><br>         
					<h5 class="text-danger" style="color:red;">Giá:  <?= number_format($value["price"],0);?>Đ</h5>
					<input type="hidden" name="quantity" class="form-control" value="1"/>
					<input type="hidden" name="hidden_name" value="<?php echo $value["name"];?>"/>
					<input type="hidden" name="hidden_price" value=" <?= number_format($value["price"],0);?>" />
					<br>
					<input type="button" name="het_hang" style="margin-top:5px;background-color:#ffffff; color:#FF0000;height:30px;width:70%;border-radius:15px;border:2px solid #FF0000;" value="Hết hàng"/>
				</div>
				
			<?php
			} 				
		}
		
		$page_query="SELECT * FROM product WHERE catalog_id='$Id' ";
		
		$page_result=mysqli_query($sqd,$page_query);
		$total_records=mysqli_num_rows($page_result);
		$total_pages=ceil($total_records/$record_per_page);
		for($i=1;$i<=$total_pages;$i++){
			?>
			<div style="clear:both"></div>
            <?php
			
			$output.="<span class='pagination_link' style='cursor:pointer; padding:1%; border:1px solid #ccc;border-radius:100px; width:40px; height:40px;background-color:#E25D33;border:2px solid #fff; color:#fff;text-align:center;' id='".$i."'>".$i."</span>";
		}

		echo '</br>';
		echo $output;
		echo '<br>';
		echo '<br>';
	}
?>




