<?php
    $conn3 = new mysqli("localhost","root","","csdl_ban_hang");

    mysqli_query($conn3,"SET NAMES UTF8");
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price'])
        && isset($_POST['amount']) && isset($_POST['color']) && isset($_POST['detail']))
        {        $error=0;      
            if($_FILES["image-url"]["error"] != 0) //gặp lỗi trong khi đang upload file
            {
                $error=1;
                echo "Đã gặp sự cố khi upload, vui lòng thử lại";
                exit;
            }
            
            if($_FILES["image-url"]["size"]>1000000)
            {
                $error=1;
                echo "File có kích thước lớn, vui lòng thử lại";
                exit;
            }
    
            $file_type=pathinfo($_FILES["image-url"]["name"], PATHINFO_EXTENSION); //đuôi ảnh upload
            $file_type_allow=array('png','jpg','jpeg','gif'); //đuôi ảnh được chấp nhập
            if(!in_array(strtolower($file_type), $file_type_allow))
            {
                $error=1;
                echo "Chỉ được chọn file ảnh";
                exit;
            }

            if($error==0)
            {

                $tmp_name = $_FILES["image-url"]["tmp_name"];
                $newimageurl = "picture/".rand(0,50).$_FILES["image-url"]["name"]; // đường dẫn lưu ở csdl
                $moveimageurl = "../".$newimageurl; //đường dẫn để di chuyển file ảnh
                move_uploaded_file($tmp_name,$moveimageurl);
                
                $query="INSERT INTO product(id, catalog_id, name, price, amout,color,detail,image) VALUES ("
                .$_POST['id'].","
                .$_POST['type'].",'"
                .$_POST['name']."',"
                .$_POST['price'].","
                .$_POST['amount'].",'"
                .$_POST['color']."','"
                .$_POST['detail']."','"
                .$newimageurl."')";
                mysqli_query($conn3,$query);   
            echo "Thêm sản phẩm mới thành công";          
            }
            
        }
?>