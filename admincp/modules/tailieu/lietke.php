<?php
 $sql_lietke_tailieu = "SELECT * FROM tbl_tailieu
 ORDER BY id_tailieu DESC";
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
    <th>Quản lý</th>
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
    <td>
    <a  class="btn btn-primary" href="modules/tailieu/xuly.php?idsanpham=<?php echo  $row['id_tailieu']?>">Xóa</a> ||
    <a  class="btn btn-secondary" href="index.php?action=tailieu&query=sua&idsanpham=<?php echo  $row['id_tailieu']?>">Sửa</a>
  </td>
  </tr>
  <?php } ?>
</table>