<?php
 $sql_sua_danhmucsach = "SELECT * FROM tbl_danhmucsach WHERE id_danhmucsach = '$_GET[iddanhmuc]' LIMIT 1";
 $query_sua_danhmucsach =   mysqli_query($mysqli,$sql_sua_danhmucsach);
?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Sửa danh mục sách</h6>
<table border="1px" width="50%" style="border-collapse: collapse;">
  <form method="POST" action="modules/danhmucsach/xuly.php?iddanhmuc=<?php echo  $_GET['iddanhmuc'] ?>">
   <?php
        while ($dong = mysqli_fetch_array($query_sua_danhmucsach)){
   ?>
  <tr>
    <td>Tên danh mục</td>
    <td><input type="text" name="tendanhmucsach" value="<?php echo $dong['tendanhmucsach']; ?>"></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" name="thutu" value="<?php echo $dong['thutu']; ?>"></td>
  </tr>
  <tr>
    <td  colspan="2"><input type="submit"name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
  </tr>
  <?php
        }
    ?>
  </form>
</table>