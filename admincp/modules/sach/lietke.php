<?php
 $sql_lietke_sach = "SELECT * FROM tbl_sach,tbl_danhmucsach,tbl_admin WHERE tbl_sach.id_danhmucsach=tbl_danhmucsach.id_danhmucsach 
 AND tbl_sach.id_admin = tbl_admin.id_admin ORDER BY tbl_sach.id_sach DESC";
 $query_lietke_sach =   mysqli_query($mysqli,$sql_lietke_sach);
?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Liệt kê sách</h6>
<table style="width: 100%;" border="1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Tên sách</th>
    <th>Hình ảnh</th>
    <th>Tác giả</th>
    <th>Danh muc</th>
    <th>Mã sách</th>
    <th>Tóm tắt</th>
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
    while($row = mysqli_fetch_array($query_lietke_sach)){
      $i++;  
    ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensach'] ?></td> 
    <td><img src="modules/sach/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td> 
    <td><?php echo $row['tacgia'] ?></td> 
    <td><?php echo $row['tendanhmucsach'] ?></td>
    <td><?php echo $row['masach'] ?></td> 
    <td><?php echo $row['tomtat'] ?></td> 
    <?php
       if($_SESSION['level']!=0){
    ?>
    <td>
    <a  class="btn btn-primary" href="modules/sach/xuly.php?idsanpham=<?php echo  $row['id_sach']?>">Xóa</a> ||
    <a  class="btn btn-secondary" href="index.php?action=sach&query=sua&idsanpham=<?php echo  $row['id_sach']?>">Sửa</a>
  </td>
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