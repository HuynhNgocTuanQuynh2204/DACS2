<?php
 $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc,tbl_admin WHERE tbl_danhmuc.id_admin = tbl_admin.id_admin ORDER BY tbl_danhmuc.thutu DESC";
 $query_lietke_danhmucsp =   mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Liệt kê danh mục sản phẩm</h6>
<table style="width: 100%;" border="1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <?php
       if($_SESSION['level']!=0){
    ?>
    <th>Quản lý</th>
    <?php
    }else{
    ?>
     <th>Người thêm</th>
    <?php
    }
    ?>
  </tr>
  <?php 
    $i=0;
    while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
      $i++;  
    ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td> 
    <?php
       if($_SESSION['level']!=0){
    ?>
    <td><a class="btn btn-primary" href="modules/quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo  $row['id_danhmuc']?>">Xóa</a> | 
    <a  class="btn btn-secondary" href="index.php?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo  $row['id_danhmuc']?>">Sửa</a></td>
    <?php
       }else{
       ?>
       <td><?php echo $row['name'] ?></td> 
       <?php
       }
       ?>
  </tr>
  <?php } ?>
</table>