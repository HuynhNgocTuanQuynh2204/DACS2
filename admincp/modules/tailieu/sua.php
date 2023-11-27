<?php
 $sql_sua_tailieu = "SELECT * FROM tbl_tailieu WHERE id_tailieu = '$_GET[idsanpham]' LIMIT 1";
 $query_sua_tailieu =   mysqli_query($mysqli,$sql_sua_tailieu);
?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Sửa tài liệu</h6>
<table border="1px" width="100%" style="border-collapse: collapse;">
<?php
while($row = mysqli_fetch_array($query_sua_tailieu)){
?>
  <form method="POST"  action="modules/tailieu/xuly.php?idsanpham=<?php echo  $row['id_tailieu'] ?>" enctype="multipart/form-data">
  <tr>
    <td>Tên tài liệu</td>
    <td><input type="text" name="tentailieu" value="<?php echo $row['tentailieu'] ?>"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh">
    <img src="modules/tailieu/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
  </td>
  </tr>
  <tr>
    <td></td>
    <td><input type="text" name="link" value="<?php echo $row['link'] ?>"></td>
  </tr>
  <tr>
    <td  colspan="2"><input type="submit" name="suatailieu" value="Sửa tài liệu"></td>
  </tr>
  </form>
  <?php
}
?>
</table>