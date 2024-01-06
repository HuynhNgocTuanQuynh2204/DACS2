<?php
  $sql="SELECT * FROM tbl_cart WHERE id_cart='$_GET[code]'";
  $kq = mysqli_query($mysqli,$sql);
  $row = mysqli_fetch_array($kq);
?>
<h6 style="text-align: center ;text-transform: uppercase;">Bạn đã yêu cầu hoàn trả đơn hàng:<?php echo $row['code_cart'] ?></h6>
<div class="container">
    <form action="pages/main/xulydonhang.php?code=<?php echo $row['id_cart'] ?>" method="POST">
        <div class="form-group">
            <label for="noidung">Lí do hoàn trả</label>
            <textarea class="form-control" id="noidung" rows="5" style="resize: none;" name="noidung"></textarea>
        </div>
        <div class="text-center">
             <input type="submit" class="btn btn-primary" name="huydonhang" value="Xác nhận hủy">
        </div>
    </form>
</div>