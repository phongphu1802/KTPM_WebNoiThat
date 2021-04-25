<?php
	include('kiemtrasession.php');
	include('connect.php');
	if(isset($_SESSION['username']))
	{
		$username=$_SESSION['username'];
	}
?>
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
	function GuiBl(obk){
//		var matk = document.getElementById("mataikhoan").value;
//		var masp = document.getElementById("masanpham").value;
//		var binhluan = document.getElementById("binhluan").value;
//		alert(matk);
//		alert(binhluan);
//		alert(masp);
		$.ajax({
				type:"POST",
				url: "xulythembinhluan.php",
				dataType: 'html',
				data:{
					txtuser:$("#mataikhoan").val(),
					txtmasp:$("#masanpham").val(),
					txtcmt:$("#binhluan").val(),
					txtdanhgia:5
				},
				success: function(data){
					{ 
                           if(data == 'Đã gửi bình luận') 
                           {
                             	location.reload();
                           }else{
                             	alert(data);
                           }
                      }
				}
			})
	}
</script>
<?php 
	
	//$sqd=mysqli_connect("localhost","root","","csdl_ban_hang");
	//$sql="SELECT * FROM product WHERE catalog_id ";
	//$query=mysqli_query($sqd,$sql);
		if(isset($_REQUEST['id'])){
		$Id=$_REQUEST['id'];
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
						<div style="margin-left:5%;margin-right:5%; margin-top: 20px">
							<div class="container" style=" border:1px solid #E25D33;height:100%; border-radius:15px;background-color:#fff;">
								<input type="hidden" name="mataikhoan" id="mataikhoan" value="<?php echo $username?>">
								<input type="hidden" name="masanpham" id="masanpham" value="<?php echo $value['id']?>">
								<input type="text" id="binhluan" name="binhluan" value="" style="width:90%; border: none; border-bottom: 2px solid purple; margin-top: 10px" placeholder="Mời bạn để lại bình luận...">
								<button class="btn btn-danger btn-sm" id="<?php echo $value['id']?>" name="Gui" style="background-color:#E25D33" title="Gửi" onClick="GuiBl(this)"><i class="fa fa-check-square-o"></i></button>
<!--								Lấy dữ liệu-->
							<?php	
			  						$class2=new Database();
									$sqlbl="select * from binhluan, user where binhluan.mauser=user.username";
									$datalbl=$class2->query($sqlbl);//Dọc dữ liệu xuất ra phần bình luận
									$count=count($datalbl);
									print_r('<div style="margin-top: 10px; margin-left: 10px; font-size:20px"><b>Bình luận</b></div><div style="width:100%;height:200px;overflow-x:hidden;overflow-y:auto;">');
									foreach($datalbl as $key=>$value1){
										if($value['id']==$value1['masp']){
											if($value1['trangthaibl']==0){
												print_r('
													<div style="border-top: 2px solid">
													<div style="font-size:20px"><b>'.$value1['mauser'].'</b></div>
													<div>'.$value1['noidung'].'</div>
													</div>
												');
											}
											else{
												print_r('
													<div style="border-top: 2px solid">
													<div style="font-size:20px"><b>'.$value1['mauser'].'</b></div>
													<div >'.$value1['noidung'].'</div>	
													<div style="margin-left: 20px;"><b>Admin</b><i class="fa fa-flag" style="color: green"></i> Shop đã thông tin đến '.$value1['mauser'].' ạ. Mọi thắc mắc khách hàng có thể đến cửa hàng gần nhất để được hỗ trợ ạ.</div>
													</div>
												');
											}
										}
									}
			
									print_r('</div><div style="margin-top: 20px"> </div>');
								?>		
							</div>		
						</div>
                    </div>
					<br>
                </div>		
<?php
			}
		}
	
?>