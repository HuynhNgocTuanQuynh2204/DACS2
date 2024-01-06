<?php
       if($_SESSION['level']!=0){
    ?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Thêm tài liệu</h6>
<table border="1px" width="100%" style="border-collapse: collapse;">
  <form method="POST" action="modules/tailieu/xuly.php" enctype="multipart/form-data">
  <tr>
    <td>Tên tài liệu</td>
    <td><input type="text" name="tentailieu" required></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" required></td>
  </tr>
  <tr>
    <td>Link</td>
    <td><input type="text" name="link" required></td>
  </tr>
  <tr>
    <td  colspan="2"><input type="submit"name="themtailieu" value="Thêm tài liệu"></td>
  </tr>
  </form>
</table>
<?php
       }
       ?>