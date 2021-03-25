<?php
    include "db-connect.php";
    $result = mysqli_query($con, "Select ");
    if($result) {
        echo "Them thanh cong";
    } else {
        echo "Them that bai";
    }
?>