<?php
$conn = new mysqli("localhost","root","","csdl_ban_hang");
if($conn)
    echo '';
else
    echo "Kết nối thất bại";
mysqli_query($conn,"SET NAMES UTF8");
?>
<?php
    $error=0;
    if(isset($_POST['id'])&& isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price'])
    && isset($_POST['amount']) && isset($_POST['color']))
    {
        if($_FILES["image-url"]["error"] != 0) //gặp lỗi trong khi đang upload file
        {
            $error=1;
            ?>
            <script>alert("Đã gặp sự cố khi upload, vui lòng thử lại")</script>
            <?php
        }
        
        if($_FILES["image-url"]["size"]>1000000)
        {
            $error=1;
            ?>
            <script>alert("Chỉ được upload ảnh dưới 1MB");</script>
            <?php
        }

        $file_type=pathinfo($_FILES["image-url"]["name"], PATHINFO_EXTENSION); //đuôi ảnh upload
        $file_type_allow=array('png','jpg','jpeg','gif'); //đuôi ảnh được chấp nhập
        if(!in_array(strtolower($file_type), $file_type_allow))
        {
            $error=1;
            ?>
            <script>alert("Chỉ được upload file ảnh");</script>
            <?php
        }

        if($error==0)
        {
            $tmp_name = $_FILES["image-url"]["tmp_name"];
            $newimageurl = "picture/".$_FILES["image-url"]["name"];
            move_uploaded_file($tmp_name,$newimageurl);
            $query="INSERT INTO product(id, catalog_id, name, price, amout,color,image) VALUES ("
            .$_POST['id'].","
            .$_POST['type'].",'"
            .$_POST['name']."',"
            .$_POST['price'].","
            .$_POST['amount'].",'"
            .$_POST['color']."','"
            .$newimageurl."')";
            //mysqli_query($conn,$query);
        }
        
        //mysqli_close($conn);
        //header('location: qlsanpham3.php');


    }
    /*$conn = new mysqli("localhost","root","","csdl_ban_hang");
    mysqli_query($conn,"SET NAMES UTF8");
    if(isset($_GET['submit']))
    {
        echo "<br> Đã nhận được form";
        if(isset($_GET['id'])&& isset($_GET['name']) && isset($_GET['type']) && isset($_GET['price'])
        && isset($_GET['amount']) && isset($_GET['color']) && isset($_GET['pic']))
        {
            echo "<br>";
            echo $_GET['id']."<br>";
            echo $_GET['name']."<br>";
            echo $_GET['type']."<br>";
            echo $_GET['price']."<br>";
            echo $_GET['amount']."<br>";
            echo $_GET['color']."<br>";
            echo $_GET['pic']."<br>";
            
            //$query = "INSERT INTO product(id, catalog_id, name, price, amout,color) VALUES(".
            //"".$_GET['id'].",".
            //"".$_GET['type'].",".
           // "'".$_GET['name']."',".
            //"".$_GET['price'].",".
           // "".$_GET['amount'].",".
            //"'".$_GET['color']."')";
           // $result=mysqli_query($conn,$query); 
           // mysqli_close($conn);
            //header('location: qlsanpham3.php');
        }
        else
            echo "chưa nhận được form";
    }*/   
?>
<script>
function checkProductName()
{
    var name = document.getElementById('idname');
    var patt =/^[a-zA-Z0-9\s][^#&<>\"~;$^%{}?]+$/;
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
   if(amount.value=="")
   {
       alert('Số lượng sản phẩm rỗng');
       amount.focus();
       return false;
   }
   if(color.value=="")
   {
       alert('Màu sắc sản phẩm rỗng');
       color.focus();
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
</script>
<?php
    $query2 = "SELECT MAX(id) FROM product";
    $result2 = mysqli_query($conn,$query2);
    $row2= mysqli_fetch_array($result2);
    $max_id=$row2[0];
?>
<form name='addform' action="addproductform.php" method='POST'  enctype="multipart/form-data" onsubmit="return xulyrong();">
<label>Mã sản phẩm</label>
<input type="text" id="idid" name="id" value=<?php echo($max_id+1) ?> readonly> 
<!--id(sản phẩm mới)=max(id)+1; readonly để không cho sửa mã sản phẩm-->
<br>
<label>Tên sản phẩm</label>
<input type="text" id="idname" name="name" onchange="checkProductName()">
<div id="invalid-name" style="color:red; visibility:hidden;"></div>

<label>Loại sản phẩm</label>
<select id="idtype" name="type">
<option></option>
<?php
$qry="select * from catalog";
$result = mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result))
{
    echo '<option value=\''.$row['id'].'\'>'.$row['name'].'</option>';
}
?>
</select>
<br>
<label>Giá</label>
<input type="text" id="idprice" name="price"  onchange="checkPrice()">
<div id="invalid-price" style="color:red; visibility:hidden;"></div>
<label>Số lượng<label>
<input type="text" id="idamount" name="amount" onchange="checkAmount()">
<div id="invalid-amount" style="color:red; visibility:hidden;"></div>
<label>Màu</label>
<select  id="idcolor" name="color">
    <option value="Vàng">yellow</option>
    <option value="Nâu">brown</option>
    <option value="Đen">black</option>
    <option value="Xám">gray</option>
    <option value="Xanh">blue</option>
    <option value="Đỏ">red</option>
</select>
<br>
<label>Hình ảnh</label>
<input type="file" id="idimage" name="image-url">
<br>
<input type="submit" name="submit" value='Thêm sản phẩm mới'>
<input type="reset" value='Làm lại'>
</form>