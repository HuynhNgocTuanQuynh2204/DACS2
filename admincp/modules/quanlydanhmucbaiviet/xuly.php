<?php
   include('../../config/config.php');
session_start();

   $tendanhmucbaiviet = $_POST['tendanhmucbaiviet'];
   $thutu = $_POST['thutu'];
   $id_admin = $_SESSION['id_admin'];

   if(isset($_POST['themdanhmucbaiviet'])){
    $sql_them = "INSERT INTO tbl_danhmucbaiviet(tendanhmucbaiviet,thutu,id_admin) VALUES('".$tendanhmucbaiviet."','".$thutu."','".$id_admin."')";
    mysqli_query($mysqli,$sql_them);
    header('location:../../index.php?action=quanlydanhmucbaiviet&query=them');
   
   
   } elseif (isset($_POST['suadanhmucbaiviet'])){
      $sql_update = "UPDATE tbl_danhmucbaiviet SET tendanhmucbaiviet='". $tendanhmucbaiviet."',thutu='".$thutu."',id_admin = '".$id_admin."' WHERE id_danhmucbaiviet='$_GET[iddanhmucbaiviet]'";
      mysqli_query($mysqli,$sql_update);
      header('location:../../index.php?action=quanlydanhmucbaiviet&query=them');
   
   
   }else{
      $id = $_GET['iddanhmucbaiviet'];
      $sql_xoa = "DELETE FROM tbl_danhmucbaiviet WHERE id_danhmucbaiviet ='".$id."'";
      mysqli_query($mysqli,$sql_xoa);
      header('location:../../index.php?action=quanlydanhmucbaiviet&query=them');
   }
?>