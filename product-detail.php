
<script>
	function themgiohang(obj)
	{
		$.ajax({
					type:"POST",
					url: "addcart.php",
					dataType: 'html',
					data:{
						id:obj.id,
						amount:$("#amount").val()
					},
					success: function(data){
						if(data=="Bạn phải đăng nhập mới thực hiện được chức năng này")
						{	
							alert(data);
							$("#myModaldn").show(true);
							$("#myModaldn").modal(options11);
								var options11 = {
											  'backdrop' : 'static',
											  'keyboard' : true,
											  'show' :true,
											  'focus' : false
										}
						}else{
							alert(data);
							location.reload();
						}
					}
				});
	}
</script>
<?php 
	
	//$sqd=mysqli_connect("localhost","root","","csdl_ban_hang");
	//$sql="SELECT * FROM product WHERE catalog_id ";
	//$query=mysqli_query($sqd,$sql);
	
		if(isset($_REQUEST['id'])){
		$Id=$_REQUEST['id'];
		include('connect.php');
		$class=new Database();
		$sqd=$class->connect();
		$sql="SELECT * FROM product WHERE id=$Id";
		$query=mysqli_query($sqd,$sql);
		$datal=$class->query($sql);
			
		foreach($datal as $key=>$value){	
			?>
                <div class="container" style=" border:3px solid #E25D33;height:100%; border-radius:15px;background-color:#fff;">             
                    <div class="product-detail-left" >
                        <div class="sp-loading" style="width:auto; height:auto; float:left; padding:10px; text-align:center; margin:10px 19px 19px 10px;">
                            <img style="border-radius:15px;" src="<?php echo $value["image"];?>" width="80%" height="200px">
                        </div>
                    </div>
                    <div class="product-detail-right" >
						<br>
                        <h1 style="color:#E25D33">CHI TIẾT SẢN PHẨM</h1>
                        <h2  style="color:#000;"><?php echo $value["name"];?></h2>
                        <h4 class="text-danger" style="color:red;">Giá: <?php echo number_format( $value["price"],0);?>Đ</h4>
                        Số lượng: <input style="width: 10%" type="number" id="amount" name="quantity" class="form-control" value="1"/></br>
                        <div style="margin-left:5%;margin-right:5%;"><h2 >Chi tiết: </h2> <?php echo $value["detail"];?></div>
                        <button id="<?php echo $value['id']?>" onClick="themgiohang(this)" class="btn btn-default" style="background-color:#E25D33;margin-left:50%"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng</button>
                    </div>
					<br>
                </div>		
<?php
			}
		}
	
?>