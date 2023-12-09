<?php
include('../../config/config.php');
require('../../../carbon/autoload.php');
use Carbon\Carbon;
session_start();
$now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');

   $tentailieu = $_POST['tentailieu'];
   $link = $_POST['link'];
    //xulyhinhanh
   $hinhanh = $_FILES['hinhanh']['name'];
   $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
   $hinhanh_time = time().'_'.$hinhanh;
   $id_admin = $_SESSION['id_admin'];
   
   

  

   if(isset($_POST['themtailieu'])){
   //them
    $sql_them = "INSERT INTO tbl_tailieu(tentailieu,hinhanh,link,ngaydang,id_admin) VALUE('".$tentailieu."
      ','".$hinhanh_time."','".$link."','".$now."','".$id_admin."')";
   mysqli_query($mysqli,$sql_them);
   move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
   header('location:../../index.php?action=tailieu&query=them');
   
   
   }elseif (isset($_POST['suatailieu'])){
      //sua
      if($hinhanh !=''){
         move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);       
         $sql_update = "UPDATE tbl_tailieu SET tentailieu='". $tentailieu."',
          hinhanh='". $hinhanh_time."',link='". $link."',ngaydang ='".$now."',id_admin = '".$id_admin."'
          WHERE id_tailieu='$_GET[idsanpham]'";
         $sql = "SELECT * FROM tbl_tailieu WHERE id_tailieu = '$_GET[idsanpham]' LIMIT 1";
         $query = mysqli_query($mysqli,$sql);
         while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
         }
      }else{
         $sql_update = "UPDATE tbl_tailieu SET tentailieu='". $tentailieu."',link='".$link."',ngaydang = '".$now."',id_admin = '".$id_admin."'
          WHERE id_tailieu='$_GET[idsanpham]'";
      }
      mysqli_query($mysqli,$sql_update);
      header('location:../../index.php?action=tailieu&query=them');
   
   
   }else{
      $id = $_GET['idsanpham'];
      $sql = "SELECT * FROM tbl_tailieu WHERE id_tailieu = '$id' LIMIT 1";
      $query = mysqli_query($mysqli,$sql);
      while($row = mysqli_fetch_array($query)){
         unlink('uploads/'.$row['hinhanh']);
      }
      $sql_xoa = "DELETE FROM tbl_tailieu WHERE id_tailieu ='".$id."'";
      mysqli_query($mysqli,$sql_xoa);
      header('location:../../index.php?action=tailieu&query=them');
   }
?>