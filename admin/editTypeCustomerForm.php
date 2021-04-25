<script>
function checkTypeName()
{
    var name = document.getElementById('idname');
    var patt =/^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?!]+$/;
    var result = patt.test(name.value)
    if(result==false)
    {
        document.getElementById('invalid-name').innerHTML="Tên loại khách không được chứa ký tự đặc biệt";
        document.getElementById('invalid-name').style.visibility="visible";
    }
    else
        document.getElementById('invalid-name').style.visibility="hidden";

}

function checkDk()
{
    var dk = document.getElementById('iddk')
    var patt = /^\d+$/;
    var result = patt.test(dk.value);
    if(result==false)
    {
        document.getElementById('invalid-dk').innerHTML="Chỉ được nhập số";
        document.getElementById('invalid-dk').style.visibility="visible";
    }
    else
        document.getElementById('invalid-dk').style.visibility="hidden";
}

function checkGiam()
{
    var giam = document.getElementById('iddiscount')
    var patt = /^\d+$/;
    var result = patt.test(giam.value);
    if(result==false)
    {
        document.getElementById('invalid-discount').innerHTML="Chỉ được nhập số";
        document.getElementById('invalid-discount').style.visibility="visible";
    }
    else
        document.getElementById('invalid-discount').style.visibility="hidden";
}

function xulyrong()
{
   var name = document.getElementById("idname");
   var dk = document.getElementById("iddk");
   var discount = document.getElementById("iddiscount");

   if(name.value=="")
   {
       alert('Tên loại khách rỗng');
       name.focus();
       return false;
   }
   var namex = document.getElementById("invalid-name").style.visibility;
   if(namex == "visible")
   {
       alert("Tên loại khách nhập sai, vui lòng nhập lại");
       return false;
   }

   if(dk.value=="")
   {
       alert('Tổng giá trị thanh toán tối thiểu rỗng.');
       dk.focus();
       return false;
   }
   var dkx = document.getElementById("invalid-dk").style.visibility; 
   if(dkx == "visible")
   {
       alert("Tổng giá trị thanh toán tối thiểu nhập sai, vui lòng nhập lại");
       return false;
   }
   if(discount.value=="")
   {
       alert('Tỉ lệ được giảm rỗng');
       discount.focus();
       return false;
   }
   var discountx = document.getElementById("invalid-discount").style.visibility; 
   if(discountx == "visible")
   {
       alert("Tỉ lệ được giảm nhập sai, vui lòng nhập lại");
       return false;
   }
   return true;
}
function refresh()
{
    document.getElementById('invalid-name').style.visibility="hidden";
    document.getElementById('invalid-dk').style.visibility="hidden";
    document.getElementById('invalid-discount').style.visibility="hidden";

}

</script>

<?php
$conn = new mysqli("localhost","root","","csdl_ban_hang");
if(isset($_POST['edit_id']))
{
    mysqli_query($conn,"SET NAMES UTF8");
    $query= "SELECT * FROM loaikhachhang WHERE malkh='".$_POST['edit_id']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $malkh = $row['malkh'];
    $tenlkh = $row['tenlkh'];
    $dieukien = $row['dieukien'];
    $giam = $row['sotiengian'];
}
else
echo 'Chưa nhận được yêu cầu';
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="text-align: center;">Sửa thông tin khuyến mãi theo loại khách hàng</h1>
	</div>
</div>
<div class="row">
<form role="form" name='editform' id="ideditform" method="POST" enctype="multipart/form-data">
	<div class="col-lg-6">
		<div class="form-group">
			<label>Mã loại KH</label>
			<input type="text" class="form-control" id="idid" name="id" value="<?php echo($malkh)?>" readonly>
		</div>
		
		<div class="form-group">
			<label>Tổng giá trị thanh toán tối thiểu (đồng)</label>
			<input type="text" class="form-control" id="iddk" name="dk" value="<?php echo($dieukien)?>" onchange="checkDk()">
			<div id="invalid-dk" style="color:red; visibility:hidden;"></div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label>Tên loại KH</label>
			<input type="text" class="form-control" id="idname" name="name" value="<?php echo($tenlkh)?>" onchange="checkTypeName()">
			<div id="invalid-name" style="color:red; visibility:hidden;"></div>
		</div>
		<div class="form-group">
			<label>Tỉ lệ được giảm (%)</label>
			<input type="text" class="form-control" id="iddiscount" name="discount" value="<?php echo($giam)?>" onchange="checkGiam()">
			<div id="invalid-discount" style="color:red; visibility:hidden;"></div>
		</div>
			<input type="submit" class="btn btn-primary" id="editsubmit" name="submit" value='Lưu'>
			<input type="reset" class="btn btn-default" value='Hủy' onclick="refresh()">
	</div>
	
		
	
</form>
</div>

<script>
$(document).ready(function()
{
		$("#ideditform").on('submit',function(e)
        {
				
                e.preventDefault();
                if(xulyrong()==true)
                {
					//alert("Submitted");
                    $.ajax(
                    {
				    url:"editTypeCustomer.php",
				    method:"POST",
                    data: new FormData(this), //gửi theo name
                    contentType:false,
                    processData:false,
				    success:function(data)
                    {
                        alert(data);
                        if(data=="Chỉnh sửa thông tin thành công")
                        $("#myModalEditTypeCustomer").modal('hide');
						//window.location.reload();
                    }
                    });
                }
        });			
});
</script>