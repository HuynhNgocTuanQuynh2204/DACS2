<?php
  if (isset($_POST['dangky'])){
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $matkhau =md5($_POST['matkhau']);
    $diachi = $_POST['diachi'];
    $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky (tenkhachhang,email,diachi,matkhau,dienthoai) 
    VALUES('". $tenkhachhang."','". $email."','".$diachi."','".$matkhau."','".$dienthoai."')");
    if($sql_dangky){
        echo '<p style="color:green">Bạn đã đăng kí thành công</p>';
        $_SESSION['dangky']=$tenkhachhang;
        $_SESSION['email']=$email;
        $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);

    }
  }
?>
<script>
    // Kiểm tra xem session có tồn tại hay không
    if ("<?php echo isset($_SESSION['dangky']); ?>" === "1") {
        window.location.href = "index.php?quanly=giohang"; 
    }
</script>
<h6 style="text-align: center;text-transform: uppercase;font-weight: bold;">Đăng kí thành viên</h6>
<style>
    table.dangky tr td {
    padding: 5px;
    }
    p{
        text-align: center;
    }
</style>
<div>
<form action="" method="POST" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hovaten">Họ và tên</label>
                    <input type="text" class="form-control" id="hovaten" name="hovaten">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" >
                </div>
                <div class="form-group">
                    <label for="dienthoai">Điện thoại</label>
                    <input type="text" class="form-control" id="dienthoai" name="dienthoai">
                </div>
                <div class="form-group">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi">
                </div>
                <div class="form-group">
                    <label for="matkhau">Mật khẩu</label>
                    <input type="password" class="form-control" id="matkhau" name="matkhau">
                </div>
                <button type="submit" class="btn btn-primary" name="dangky">Đăng ký</button>
                <a href="index.php?quanly=dangnhap" class="btn btn-link">Đăng nhập nếu có tài khoản</a>
            </div>
        </div>
    </div>
</form>

