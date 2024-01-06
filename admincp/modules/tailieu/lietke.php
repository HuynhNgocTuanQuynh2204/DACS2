<?php
 $sql_lietke_tailieu = "SELECT * FROM tbl_tailieu,tbl_admin WHERE tbl_tailieu.id_admin = tbl_admin.id_admin
 ORDER BY tbl_tailieu.id_tailieu DESC";
 $query_lietke_tailieu =   mysqli_query($mysqli,$sql_lietke_tailieu);
?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Liệt kê tài liệu</h6>
<table style="width: 100%;" border="1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Tên tài liệu</th>
    <th>Hình ảnh</th>
    <th>Link</th>
    <th>Ngày đăng</th>
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
  </tr>
  <?php 
    $i=0;
    while($row = mysqli_fetch_array($query_lietke_tailieu)){
      $i++;  
    ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tentailieu'] ?></td> 
    <td><img src="modules/tailieu/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td> 
    <td><?php echo $row['link'] ?></td> 
    <td><?php echo $row['ngaydang'] ?></td>
    <?php
       if($_SESSION['level']!=0){
    ?>
    <td>
    <a  class="btn btn-primary" href="modules/tailieu/xuly.php?idsanpham=<?php echo  $row['id_tailieu']?>">Xóa</a> ||
    <a  class="btn btn-secondary" href="index.php?action=tailieu&query=sua&idsanpham=<?php echo  $row['id_tailieu']?>">Sửa</a>
  </td>
  </tr>
  <?php
       }else{
       ?>
       <td><?php echo $row['name'] ?></td> 
       <?php
       }
       ?>
  <?php } ?>
</table>