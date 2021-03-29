
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
   var id = document.getElementById("idid");
   var name = document.getElementById("idname");
   var type = document.getElementById("idtype");
   var price = document.getElementById("idprice");
   var amount = document.getElementById("idamount");
   var color = document.getElementById("idcolor");
   var pic = document.getElementById("idimage");
   var detail = document.getElementById("iddetail");
   if(id.value=="")
   {
       alert('Mã sản phẩm rỗng')
       id.focus();
       return false;
   }
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

   if(detail.value=="")
   {
        alert('Chi tiết sản phẩm rỗng');
        detail.focus();
        return false;
   }

   if(pic.value=="")
   {
       alert('Bạn chưa upload hình');
       pic.focus();
       return false;
   }
   return true;
}

function refresh()
{
    document.getElementById('invalid-name').style.visibility="hidden";
    document.getElementById('invalid-price').style.visibility="hidden";
    document.getElementById('invalid-amount').style.visibility="hidden";

}
</script>
<?php
    $conn2 = new mysqli("localhost","root","","csdl_ban_hang");
    mysqli_query($conn2,"SET NAMES UTF8");
    //include('../connect.php');
    //$class=new Database();
	//$sqd=$class->connect();
    $query2 = "SELECT MAX(id) FROM product";
    $result2 = mysqli_query($conn2,$query2);
    $row2= mysqli_fetch_array($result2);
    //$row2=$class->query($query2);
    $max_id=$row2[0];
?>
<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm sản phẩm mới</h1>
			</div>
</div>
<div class="row">
<form role="form" name='addform' id="idaddform" method="POST" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="form-group">
        <label>Mã sản phẩm</label>
		<input class="form-control" type="text" id="idid" name="id" value=<?php echo $max_id+1 ?> readonly>
    </div>
    <div class="form-group">
        <label>Tên sản phẩm</label>
		<input class="form-control" placeholder="Tên sản phẩm" type="text" id="idname" name="name" onchange="checkProductName()">
		<div id="invalid-name" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Loại sản phẩm</label>
        <select id="idtype" name="type">
        <option value="">----</option>
        <?php
        $qry="select * from catalog";
        $row = mysqli_query($conn2,$qry);
        //$row=$class->query($qry);
        foreach($row as $key => $value)
        {
            echo '<option value=\''.$value['id'].'\'>'.$value['name'].'</option>';
        }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label>Giá</label>
        <input class="form-control" placeholder="Giá sản phẩm" type="text" id="idprice" name="price" onchange="checkPrice()">
        <div id="invalid-price" style="color:red; visibility:hidden;"></div>
    </div>
    <div class="form-group">
        <label>Số lượng</label>
		<input class="form-control" placeholder="Số lượng sản phẩm" type="text" id="idamount" name="amount" onchange="checkAmount()">
		<div id="invalid-amount" style="color:red; visibility:hidden;"></div>
    </div>   
    <div class="form-group">
        <label>Màu</label>
        <select  id="idcolor" name="color">
            <option value="Vàng">yellow</option>
            <option value="Nâu">brown</option>
            <option value="Đen">black</option>
            <option value="Xám">gray</option>
            <option value="Xanh">blue</option>
            <option value="Đỏ">red</option>
        </select>
    </div>
</div>  
<div class="col-md-6">   
    <div class="form-group">
        <label>Chi tiết sản phẩm</label>
        <textarea class="form-control" placeholder="Chi tiết sản phẩm"  id="iddetail" name="detail" rows="5" cols="33"></textarea>
    </div>
    <div>
        <label>Hình ảnh</label>
        <input type="file" id="idimage" name="image-url">
    </div>
    <br/>
    <input type="submit" class="btn btn-primary" name="submit" id="btnsubmit" value='Thêm sản phẩm mới'>
    <button type="reset" class="btn btn-default" value='Làm lại' onclick="refresh()">Làm lại</button>
</div> 
</form>
<div id="image_preview">
</div>
</div>


<script>
$(document).ready(function()
{
		$("#idaddform").on('submit',function(e)
        {
                e.preventDefault();
                if(xulyrong()==true)
                {
                    $.ajax(
                    {
				    url:"xulythemsanpham.php",
				    method:"POST",
                    data: new FormData(this), //gửi theo name
                    contentType:false,
                    processData:false,
				    success:function(data)
                    {
                        alert(data);
                        if(data=="Thêm sản phẩm mới thành công")
                            $("#myModalAddProduct").modal('hide');
                    }
                    });
                }
        });			
});

</script>