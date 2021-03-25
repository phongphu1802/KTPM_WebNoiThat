<?php
    include "db-connect.php";
    function GetAllStaff(){
        $result = mysqli_query($con, "SELECT * FROM nhanvien");
        if($result) {

        } else {
            return false;
        }
    }
    function GetStaffByMaNV($manv){
        $result = mysqli_query($con, "SELECT * FROM nhanvien where manv like '%$manv%' ");
        if($result) {
            
        } else {
            return false;
        }
    }
    function GetStaffByCv($macv){
        $result = mysqli_query($con, "SELECT * FROM nhanvien where chucvu Like '%$macv%' ");
        if($result) {
            
        } else {
            return false;
        }
    }

?>