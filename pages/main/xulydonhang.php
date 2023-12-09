<?php
 include("../../admincp/config/config.php");
 if(isset($_GET['cart_status']) && isset($_GET['code'])){
    $status = $_GET['cart_status'];
    $code = $_GET['code'];

    $sql = "UPDATE tbl_cart SET cart_status = '$status' WHERE code_cart = '$code'";
    $sql_query = mysqli_query($mysqli, $sql);
 }
 header('location:http://localhost/SECURITY/index.php?quanly=donhangdadat');


?>