<?php
 $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
 $query_lietke_danhmucsp =   mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Liệt kê danh mục sản phẩm</h6>
<table style="width: 100%;" border="1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
    
  </tr>
  <?php 
    $i=0;
    while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
      $i++;  
    ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td> 
    <td><a class="btn btn-primary" href="modules/quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo  $row['id_danhmuc']?>">Xóa</a> | 
    <a  class="btn btn-secondary" href="index.php?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo  $row['id_danhmuc']?>">Sửa</a></td>
  </tr>
  <?php } ?>
</table>