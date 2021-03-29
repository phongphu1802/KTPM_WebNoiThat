<?php
$conn = new mysqli("localhost","root","","csdl_ban_hang");
/*if($conn)
echo "Kết nối thành công";
else
echo "Kết nối thất bại";*/
mysqli_query($conn,"SET NAMES UTF8");

$error=0;
if(isset($_POST['id']))
{
    //echo 'Đã nhận được form chỉnh sửa';
    //if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price']) &&
    //isset($_POST['amount']) && isset($_POST['color']))
    {
        $error=0;
        if($_FILES["HinhAnh"]["name"]=="") //Khi không upload file ảnh
        {
            
            /*echo $_POST['id'];
            echo $_POST['name'];
            echo $_POST['type'];
            echo $_POST['price'];
            echo $_POST['amount'];
            echo $_POST['color'];*/
            $query1="UPDATE product SET
                catalog_id=".$_POST['type'].",
                name='".$_POST['name']."',
                price=".$_POST['price'].",
                amout=".$_POST['amount'].",
                color='".$_POST['color']."',
                detail='".$_POST['detail']."'
                WHERE id=".$_POST['id'];
                mysqli_query($conn,$query1);
                mysqli_close($conn);
                //echo "không upload ảnh, cập nhật thông tin sản phẩm thành công";
                echo "Chỉnh sửa thông tin thành công";
        }
            
        else //Khi có thay đổi hình
        {
            if($_FILES["HinhAnh"]["error"]!=0)
            {
                $error=1;
                echo "Đã gặp sự cố khi upload file";
                exit;
            }

            if($_FILES["HinhAnh"]["size"]>1000000)
            {
                $error=1;
                echo "File có kích thước lớn, vui lòng thử lại";
                exit;
            }

            $file_type=pathinfo($_FILES["HinhAnh"]["name"],PATHINFO_EXTENSION);
            $file_type_allow=array('png','jpg','jpeg','gif');
            if(!in_array(strtolower($file_type), $file_type_allow))
            {
                $error=1;
                echo "Chỉ được upload file ảnh";
                exit;
            }

            if($error==0)
            {
                $tmp_name=$_FILES["HinhAnh"]["tmp_name"];
                $newimageurl="picture/".rand(0,50).$_FILES["HinhAnh"]["name"];//tên đường dẫn mới
                $moveimageurl = "../".$newimageurl;
                move_uploaded_file($tmp_name,$moveimageurl);
                $query2="UPDATE product 
                SET  
                catalog_id=".$_POST['type'].",
                name='".$_POST['name']."',
                price=".$_POST['price'].",
                amout=".$_POST['amount'].",
                color='".$_POST['color']."',
                detail='".$_POST['detail']."',
                image='".$newimageurl."'
                WHERE id=".$_POST['id'];
                mysqli_query($conn,$query2);
                mysqli_close($conn);
            }
            //echo "Sửa thông tin sản phẩm thành công";
            echo "Chỉnh sửa thông tin thành công";
        }
                   
    }
}
    
else
    echo 'Chưa nhận được form chỉnh sửa';
?>