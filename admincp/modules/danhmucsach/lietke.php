<?php
 $sql_lietke_danhmucsach = "SELECT * FROM tbl_danhmucsach,tbl_admin WHERE tbl_danhmucsach.id_admin = tbl_admin.id_admin ORDER BY tbl_danhmucsach.thutu DESC";
 $query_lietke_danhmucsach =   mysqli_query($mysqli,$sql_lietke_danhmucsach);
?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Liệt kê danh mục sách</h6>
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
    while($row = mysqli_fetch_array($query_lietke_danhmucsach)){
      $i++;  
    ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmucsach'] ?></td> 
    <?php
       if($_SESSION['level']!=0){
    ?>
    <td><a  class="btn btn-primary" href="modules/danhmucsach/xuly.php?iddanhmuc=<?php echo  $row['id_danhmucsach']?>">Xóa</a> | 
    <a  class="btn btn-secondary" href="index.php?action=danhmucsach&query=sua&iddanhmuc=<?php echo  $row['id_danhmucsach']?>">Sửa</a></td>
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