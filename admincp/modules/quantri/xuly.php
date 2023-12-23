<?php
include('../../config/config.php');
session_start();
$tentaikhoan = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$matkhau = md5($_POST['password']);
$diachi = $_POST['address'];
$level = $_POST['level'];
 if(isset($_POST['suataikhoan'])){
    $sql = "UPDATE tbl_admin SET name='$tentaikhoan',diachi='$diachi',phone='$phone ' , username='$email', password='$matkhau', admin_status='$level' 
    WHERE id_admin = '$_GET[id]'";
    $qr = mysqli_query($mysqli,$sql);
    echo '<script type="text/javascript">alert("Sửa thông tin thành công");    window.location.href = "http://localhost/SECURITY/admincp/index.php?action=quantri&query=them"; </script>';
 }
?>