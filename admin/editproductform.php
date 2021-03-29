<script>
function checkProductName()
{
    var name = document.getElementById('idname');
    var patt =/^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?!]+$/;
    var result = patt.test(name.value)
    if(result==false)
    {
        document.getElementById('invalid-name').innerHTML="Tên sản phẩm không được chứa kí tự đặc biệt";
        document.getElementById('invalid-name').style.visibility="visible";
    }
    else
        document.getElementById('invalid-name').style.visibility="hidden";

}

function checkPrice()
{
    var price = document.getElementById('idprice')
    var patt = /^\d+$/;
    var result = patt.test(price.value);
    if(result==false)
    {
        document.getElementById('invalid-price').innerHTML="Chỉ được nhập số";
        document.getElementById('invalid-price').style.visibility="visible";
    }
    else
        document.getElementById('invalid-price').style.visibility="hidden";

}

function checkAmount()
{
    var amount = document.getElementById('idamount');
    var patt =/^\d+$/;
    var result = patt.test(amount.value);
    if(result==false)
    {
        document.getElementById('invalid-amount').innerHTML="Chỉ được nhập số";
        document.getElementById('invalid-amount').style.visibility="visible";
    }
    else
        document.getElementById('invalid-amount').style.visibility="hidden";
}

function xulyrong()
{
   var name = document.getElementById("idname");
   var type = document.getElementById("idtype");
   var price = document.getElementById("idprice");
   var amount = document.getElementById("idamount");
   var color = document.getElementById("idcolor");
   var detail = document.getElementById("iddetail");

   if(name.value=="")
   {
       alert('Tên sản phẩm rỗng');
       name.focus();
       return false;
   }
   var namex = document.getElementById("invalid-name").style.visibility;
   if(namex == "visible")
   {
       alert("Tên sản phẩm nhập sai, vui lòng nhập lại");
       return false;
   }

   if(type.value=="")
   {
       alert('Loại sản phẩm rỗng');
       type.focus();
       return false;
   }
   if(price.value=="")
   {
       alert('Giá sản phẩm rỗng')
       price.focus();
       return false;
   }
   var pricex = document.getElementById("invalid-price").style.visibility; 
   if(pricex == "visible")
   {
       alert("Giá nhập sai, vui lòng nhập lại");
       return false;
   }

   if(amount.value=="")
   {
       alert('Số lượng sản phẩm rỗng');
       amount.focus();
       return false;
   }
   var amountx = document.getElementById("invalid-amount").style.visibility;
   if(amountx == "visible")
   {
       alert("Số lượng nhập sai, vui lòng nhập lại");
       return false;
   }


   if(color.value=="")
   {
       alert('Màu sắc sản phẩm rỗng');
       color.focus();
       return false;
   }
   return true;

   if(detail.value=="")
   {
        alert("Chi tiết sản phẩm rỗng");
        detail.focus();
        return false;
   }
}
function refresh()
{
    document.getElementById('invalid-name').style.visibility="hidden";
    document.getElementById('invalid-price').style.visibility="hidden";
    document.getElementById('invalid-amount').style.visibility="hidden";

}


</script>

<?php
$conn = new mysqli("localhost","root","","csdl_ban_hang");
if($conn)
echo 'Kết nối thành công';
else
echo 'Không kết nối được';

if(isset($_POST['edit_id']))
{
    mysqli_query($conn,"SET NAMES UTF8");
    $query= "SELECT * FROM product WHERE id=".$_POST['edit_id'];
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $idproduct = $row['id'];
    $name = $row['name'];
    $type = $row['catalog_id'];
    $price = $row['price'];
    $amount = $row['amout'];
    $color = $row['color'];
    $image = $row['image'];
    $detail = $row['detail']; //chi tiết sản phẩm
}
else
echo 'Chưa nhận được yêu cầu';
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="text-align: center;">Sửa thông tin sản phẩm</h1>
	</div>
</div>
<div class="row">
<form role="form" name='editform' id="ideditform" method="POST" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="form-group">
        <label>Mã sản phẩm</label>
        <input type="text" class="form-control" id="idid" name="id" value="<?php echo($idproduct)?>" readonly>
    </div>
    <div class="form-group">
        <label>Tên sản phẩm</label>
        <input type="text" class="form-control" id="idname" name="name" value="<?php echo($name)?>" onchange="checkProductName()">
        <div id="invalid-name" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Loại sản phẩm</label>
        <select id="idtype" name="type">
        <?php
        mysqli_query($conn,"SET NAMES UTF8");
        $qry2 ="select * from catalog where id ='$type'";
        $result2 = mysqli_query($conn,$qry2);
        $row2 = mysqli_fetch_array($result2);
        $row2['id'];

        $qry="select * from catalog";
        $result = mysqli_query($conn,$qry);
        while($rowtype=mysqli_fetch_array($result))
        {
            if($rowtype['id'] == $row2['id'])
                echo '<option value='.$rowtype['id'].' selected=\'selected\'>'.$rowtype['name'].'</option>';
            else
                echo '<option value='.$rowtype['id'].'>'.$rowtype['name'].'</option>';
        }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label>Giá</label>
        <input type="text" class="form-control" id="idprice" name="price" value="<?php echo($price)?>" onchange="checkPrice()">
        <div id="invalid-price" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Số lượng</label>
        <input type="text" id="idamount" class="form-control" name="amount" value="<?php echo($amount)?>" onchange="checkAmount()">
        <div id="invalid-amount" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Màu</label>
        <select  id="idcolor" name="color">
        <?php 
        $colorlist = array('yellow','brown','black','white','gray','blue','red');
        for($i=0; $i<count($colorlist); $i++)
        {
            if($color == $colorlist[$i])
            {
        
                echo "<option value=\"$color\" selected='selected'>$color</option>";      
            }
            else
                echo "<option value=\"$colorlist[$i]\">$colorlist[$i]</option>";
        }
        ?>
        </select>
    </div>
</div>
<div class="col-md-6">  
    <div class="form-group">
        <label>Chi tiết sản phẩm</label>
        <textarea class="form-control" placeholder="Chi tiết sản phẩm"  id="iddetail" name="detail" rows="5" cols="33">
        <?php echo $detail ?>
        </textarea>
    </div>
    <div>
    <label>Hình ảnh sản phẩm</label>
    <br/>
    <img src="../<?php echo $image ?>" width="200px" height="200px" class="img-thumbnail">
    </div>

    <div class="form-group">
        <label>Bạn muốn thay đổi hình</label>
        <input type="file" id="idimage" name="HinhAnh" value="<?php echo $image ?>">
    </div>
    <br/>
    <input type="submit" class="btn btn-primary" id="editsubmit" name="submit" value='Chỉnh sửa thông tin'>
    <input type="reset" class="btn btn-default" value='Làm lại' onclick="refresh()">
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
                    $.ajax(
                    {
				    url:"editproduct.php",
				    method:"POST",
                    data: new FormData(this), //gửi theo name
                    contentType:false,
                    processData:false,
				    success:function(data)
                    {
                        alert(data);
                        if(data=="Chỉnh sửa thông tin thành công")
                        $("#myModalEditProduct").modal('hide');
                        //alert("Sửa thành công");
                        //$("#idimage").val('');
                    }
                    });
                }
        });			
});
</script>