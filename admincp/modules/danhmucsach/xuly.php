<?php
include('../../config/config.php');
session_start();


   $tenloaisach = $_POST['tendanhmucsach'];
   $thutu = $_POST['thutu'];
   $id_admin = $_SESSION['id_admin'];
   if(isset($_POST['themdanhmuc'])){
    $sql_them = "INSERT INTO tbl_danhmucsach(tendanhmucsach,thutu,id_admin) VALUES('".$tenloaisach."','".$thutu."','".$id_admin."')";
    mysqli_query($mysqli,$sql_them);
    header('location:../../index.php?action=danhmucsach&query=them');
   
   
   }elseif (isset($_POST['suadanhmuc'])){
      $sql_update = "UPDATE tbl_danhmucsach SET tendanhmucsach='". $tenloaisach."',thutu='".$thutu."',id_admin='".$id_admin."' WHERE id_danhmucsach='$_GET[iddanhmuc]'";
      mysqli_query($mysqli,$sql_update);
      header('location:../../index.php?action=danhmucsach&query=them');
   
   
   }else{
      $id = $_GET['iddanhmuc'];
      $sql_xoa = "DELETE FROM tbl_danhmucsach WHERE id_danhmucsach ='".$id."'";
      mysqli_query($mysqli,$sql_xoa);
      header('location:../../index.php?action=danhmucsach&query=them');
   }
?>