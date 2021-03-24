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