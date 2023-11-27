<?php
include('../../config/config.php');


   $tenloaisach = $_POST['tendanhmucsach'];
   $thutu = $_POST['thutu'];

   if(isset($_POST['themdanhmuc'])){
    $sql_them = "INSERT INTO tbl_danhmucsach(tendanhmucsach,thutu) VALUES('".$tenloaisach."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('location:../../index.php?action=danhmucsach&query=them');
   
   
   }elseif (isset($_POST['suadanhmuc'])){
      $sql_update = "UPDATE tbl_danhmucsach SET tendanhmucsach='". $tenloaisach."',thutu='".$thutu."' WHERE id_danhmucsach='$_GET[iddanhmuc]'";
      mysqli_query($mysqli,$sql_update);
      header('location:../../index.php?action=danhmucsach&query=them');
   
   
   }else{
      $id = $_GET['iddanhmuc'];
      $sql_xoa = "DELETE FROM tbl_danhmucsach WHERE id_danhmucsach ='".$id."'";
      mysqli_query($mysqli,$sql_xoa);
      header('location:../../index.php?action=danhmucsach&query=them');
   }
?>