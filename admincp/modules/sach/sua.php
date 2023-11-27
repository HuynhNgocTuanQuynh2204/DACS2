<?php
 $sql_sua_sach = "SELECT * FROM tbl_sach WHERE id_sach = '$_GET[idsanpham]' LIMIT 1";
 $query_sua_sach =   mysqli_query($mysqli,$sql_sua_sach);
?>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Sửa sản phẩm sách</h6>
<table border="1px" width="100%" style="border-collapse: collapse;">
<?php
while($row = mysqli_fetch_array($query_sua_sach)){
?>
  <form method="POST"  action="modules/sach/xuly.php?idsanpham=<?php echo  $row['id_sach'] ?>" enctype="multipart/form-data">
  <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" name="tensach" value="<?php echo $row['tensach'] ?>"></td>
  </tr>
  <tr>
    <td>Mã sp</td>
    <td><input type="text" name="masach" value="<?php echo $row['masach'] ?>"></td>
  </tr>
  <tr>
    <td>Tác giả</td>
    <td><input type="text" name="tacgia" value="<?php echo $row['tacgia'] ?>"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh">
    <img src="modules/sach/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
  </td>
  </tr>
  <tr>
    <td>tóm tắt</td>
    <td>
      <textarea id="tomtat" rows="10" style="resize: none;" name="tomtat"> <?php echo $row['tomtat'] ?></textarea>
    </td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td>
      <textarea id="noidung" rows="10" style="resize: none;" name="noidung"><?php echo $row['noidung'] ?></textarea>
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
            if($row_danhmuc['id_danhmucsach']==$row['id_danhmucsach']){
        ?>
        <option selected value="<?php echo $row_danhmuc['id_danhmucsach'] ?>"><?php echo $row_danhmuc['tendanhmucsach'] ?></option>
        <?php
            } else {
              ?>
               <option  value="<?php echo $row_danhmuc['id_danhmucsach'] ?>"><?php echo $row_danhmuc['tendanhmucsach'] ?></option>
              <?php
            }
          }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td  colspan="2"><input type="submit"name="suasach" value="Sửa sản phẩm sách"></td>
  </tr>
  </form>
  <?php
}
?>
</table>