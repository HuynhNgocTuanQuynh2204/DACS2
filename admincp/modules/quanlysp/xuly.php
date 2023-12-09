<?php
include('../../config/config.php');
session_start();


   $tensanpham = $_POST['tensanpham'];
   $masp = $_POST['masp'];
   $giasp = $_POST['giasp'];
   $soluong = $_POST['soluong'];
    //xulyhinhanh
   $hinhanh = $_FILES['hinhanh']['name'];
   $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
   $hinhanh_time = time().'_'.$hinhanh;
   $tomtat = $_POST['tomtat'];
   $noidung = $_POST['noidung'];
   $tinhtrang = $_POST['tinhtrang'];
   $danhmuc = $_POST['danhmuc'];
   $id_admin = $_SESSION['id_admin'];
   

  

   if(isset($_POST['themsanpham'])){
   //them
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc,id_admin) VALUE('".$tensanpham."
      ','".$masp."','".$giasp."','".$soluong."','".$hinhanh_time."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."','".$id_admin."')";
   mysqli_query($mysqli,$sql_them);
   move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
   header('location:../../index.php?action=quanlysp&query=them');
   
   
   }elseif (isset($_POST['suasanpham'])){
      //sua
      if($hinhanh !=''){
         move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);       
         $sql_update = "UPDATE tbl_sanpham SET tensanpham='". $tensanpham."',masp='".$masp."', giasp='". $giasp."',
          soluong='". $soluong."', hinhanh='". $hinhanh_time."', tomtat='". $tomtat."', noidung='". $noidung."', tinhtrang='". $tinhtrang
         ."',id_danhmuc='". $danhmuc."',id_admin ='".$id_admin."' WHERE id_sanpham='$_GET[idsanpham]'";
         $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
         $query = mysqli_query($mysqli,$sql);
         while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
         }
      }else{
         $sql_update = "UPDATE tbl_sanpham SET tensanpham='". $tensanpham."',masp='".$masp."', giasp='". $giasp."',
          soluong='". $soluong."', tomtat='". $tomtat."', noidung='". $noidung."', tinhtrang='". $tinhtrang
         ."',id_danhmuc='". $danhmuc."',id_admin = '".$id_admin."' WHERE id_sanpham='$_GET[idsanpham]'";
      }
      mysqli_query($mysqli,$sql_update);
      header('location:../../index.php?action=quanlysp&query=them');
   
   
   }else{
      $id = $_GET['idsanpham'];
      $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
      $query = mysqli_query($mysqli,$sql);
      while($row = mysqli_fetch_array($query)){
         unlink('uploads/'.$row['hinhanh']);
      }
      $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham ='".$id."'";
      mysqli_query($mysqli,$sql_xoa);
      header('location:../../index.php?action=quanlysp&query=them');
   }
?>