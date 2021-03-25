<?php
$host="127.0.0.1";
$username="root";
$password="";
$database="csdlwebnoithat";
$conn=mysqli_connect($host,$username,$password,$database);
mysqli_query($conn,"SET NAMES 'utf8'");
if (mysqli_connect_error())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{ echo "Success to connect to MySQL"; }
?>
<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$data = "csdlwebnoithat";

$con = mysqli_connect($host, $user, $pass, $data) or die("Ket noi khong thanh cong");
?>
