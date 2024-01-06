<?php
   $sql = "SELECT * FROM tbl_trahang WHERE id_donhang = '$_GET[id]'";
   $kq = mysqli_query($mysqli, $sql);
   $row= mysqli_fetch_array($kq);
?>
<table style="width: 100%;" border="1" style="border-collapse: collapse;">
 <tr>
    <th>Lí do</th>
 </tr>
 <tr>
    <td><?php echo $row['lido']   ?></td>
 </tr>
</table>
<form action="modules/quanlydonhang/xuly.php?" style="margin-top: 10px;" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
    <input type="hidden" name="idsp" value="<?php echo $_GET['idsp']; ?>">
        <div class="text-center">
                    <input type="submit" class="btn btn-primary" name="huydonhang" value="Xác nhận hủy">
        </div>
</form>