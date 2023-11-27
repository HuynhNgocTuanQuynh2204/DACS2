<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Thêm sản phẩm sách</h6>
<table border="1px" width="100%" style="border-collapse: collapse;">
  <form method="POST" action="modules/sach/xuly.php" enctype="multipart/form-data">
  <tr>
    <td>Tên sách</td>
    <td><input type="text" name="tensach" required></td>
  </tr>
  <tr>
    <td>Mã sách</td>
    <td><input type="text" name="masach" required></td>
  </tr>
  <tr>
    <td>Tác giả</td>
    <td><input type="text" name="tacgia" required></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" required></td>
  </tr>
  <tr>
    <td>tóm tắt</td>
    <td>
      <textarea id="sanphamtt"  rows="10" style="resize: none;" name="tomtat" ></textarea>
    </td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td>
      <textarea id="sanphamnd" rows="10" style="resize: none;" name="noidung" ></textarea>
    </td>
  </tr>
  <tr>
    <td>Danh mục sách</td>
    <td>
      <select name="danhmuc">
        <?php
          $sql_danhmuc_sach ="SELECT * FROM tbl_danhmucsach ORDER BY id_danhmucsach DESC";
          $query_danhmuc_sach = mysqli_query($mysqli,$sql_danhmuc_sach);
          while($row_danhmuc = mysqli_fetch_array($query_danhmuc_sach)){
        ?>
        <option value="<?php echo $row_danhmuc['id_danhmucsach'] ?>"><?php echo $row_danhmuc['tendanhmucsach'] ?></option>
        <?php
          }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td  colspan="2"><input type="submit"name="themsach" value="Thêm sách"></td>
  </tr>
  </form>
</table>