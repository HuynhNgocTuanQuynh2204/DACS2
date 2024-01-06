<?php
       if($_SESSION['level']!=0){
    ?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Thêm danh mục sách</h6>
<table border="1px" width="50%" style="border-collapse: collapse;">
  <form method="POST" action="modules/danhmucsach/xuly.php">
  <tr>
    <td>Tên danh mục</td>
    <td><input type="text" name="tendanhmucsach" required></td>
  </tr>
  <tr>
    <td>Thứ tự</td>
    <td><input type="text" name="thutu" required></td>
  </tr>
  <tr>
    <td  colspan="2"><input type="submit"name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
  </tr>
  </form>
</table>
<?php
       }
       ?>