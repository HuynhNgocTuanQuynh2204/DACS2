<?php
include('../../config/config.php');


   $tensach = $_POST['tensach'];
   $masach = $_POST['masach'];
   $tacgia = $_POST['tacgia'];
    //xulyhinhanh
   $hinhanh = $_FILES['hinhanh']['name'];
   $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
   $hinhanh_time = time().'_'.$hinhanh;
   $tomtat = $_POST['tomtat'];
   $noidung = $_POST['noidung'];
   $danhmuc = $_POST['danhmuc'];
   

  

   if(isset($_POST['themsach'])){
   //them
    $sql_them = "INSERT INTO tbl_sach(tensach,masach,tacgia,hinhanh,tomtat,noidung,id_danhmucsach) VALUE('".$tensach."
      ','".$masach."','".$tacgia."','".$hinhanh_time."','".$tomtat."','".$noidung."','".$danhmuc."')";
   mysqli_query($mysqli,$sql_them);
   move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
   header('location:../../index.php?action=sach&query=them');
   
   
   }elseif (isset($_POST['suasach'])){
      //sua
      if($hinhanh !=''){
         move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);       
         $sql_update = "UPDATE tbl_sach SET tensach='". $tensach."',masach='".$masach."', 
          tacgia='". $tacgia."', hinhanh='". $hinhanh_time."', tomtat='". $tomtat."', noidung='". $noidung."'
        ,id_danhmucsach='". $danhmuc."' WHERE id_sach='$_GET[idsanpham]'";
         $sql = "SELECT * FROM tbl_sach WHERE id_sach = '$_GET[idsanpham]' LIMIT 1";
         $query = mysqli_query($mysqli,$sql);
         while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
         }
      }else{
         $sql_update = "UPDATE tbl_sach SET tensach='". $tensach."',masach='".$masach."', tacgia='". $tacgia."',
          tomtat='". $tomtat."', noidung='". $noidung."',
        id_danhmucsach='". $danhmuc."' WHERE id_sach='$_GET[idsanpham]'";
      }
      mysqli_query($mysqli,$sql_update);
      header('location:../../index.php?action=sach&query=them');
   
   
   }else{
      $id = $_GET['idsanpham'];
      $sql = "SELECT * FROM tbl_sach WHERE id_sach = '$id' LIMIT 1";
      $query = mysqli_query($mysqli,$sql);
      while($row = mysqli_fetch_array($query)){
         unlink('uploads/'.$row['hinhanh']);
      }
      $sql_xoa = "DELETE FROM tbl_sach WHERE id_sach ='".$id."'";
      mysqli_query($mysqli,$sql_xoa);
      header('location:../../index.php?action=sach&query=them');
   }
?>