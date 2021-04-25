<?php
$conn = new mysqli("localhost","root","","csdl_ban_hang");
mysqli_query($conn,"SET NAMES UTF8");
if(isset($_POST['id']))
{
	$query1="UPDATE loaikhachhang SET
    tenlkh='".$_POST['name']."',
    dieukien=".$_POST['dk'].",
    sotiengian=".$_POST['discount']." 
    WHERE malkh='".$_POST['id']."'";
    mysqli_query($conn,$query1);
    mysqli_close($conn);
    echo "Chỉnh sửa thông tin thành công";
}
    
else
    echo 'Chưa nhận được form chỉnh sửa';
?>