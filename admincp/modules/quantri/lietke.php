<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Liệt kê đơn hàng</h6>
<?php
 $sql_lietke_am = "SELECT * FROM tbl_admin ORDER BY id_admin DESC";
 $query_lietke_am =   mysqli_query($mysqli,$sql_lietke_am);
?>

<table style="width: 100%;" border="1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Họ và tên</th>
    <th>Số điện thoại</th>
    <th>Tài khoản</th>
    <th>Quyền</th>
    <th>Quản lý</th>
  
    
  </tr>
  <?php 
    $i=0;
    while($row = mysqli_fetch_array($query_lietke_am)){
      $i++;  
      if($row['admin_status']!= 1){
    ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['name'] ?></td> 
    <td><?php echo $row['phone'] ?></td>
    <td><?php echo $row['username'] ?></td>
    <td><?php 
        if($row['admin_status'] ==2){
          echo '<p style="color:yellow">Quản lý </p>';
        } elseif($row['admin_status'] ==3){
          echo '<p style="color:green">Nhân viên </p>';
        }
    ?></td>
    <td>
    <a  class="btn btn-primary"  href="modules/quantri/xuly.php?id_admin=<?php echo  $row['id_admin']?>">Xóa</a> ||
    <a  class="btn btn-secondary" href="index.php?action=quantri&query=sua&id_admin=<?php echo  $row['id_admin']?>">Sửa</a>
    </td>
  </tr>
 
  <?php }} ?>
</table>