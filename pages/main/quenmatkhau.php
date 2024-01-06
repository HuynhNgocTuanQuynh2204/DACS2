<?php
  if (isset($_POST['timtaikhoan'])){
    $email = $_POST['email'];

    $sql_dk = "SELECT * FROM tbl_dangky WHERE email = '".$email."' LIMIT 1 ";
    $row_dk = mysqli_query($mysqli, $sql_dk);
    $id = mysqli_fetch_array($row_dk);
    $count = mysqli_num_rows($row_dk);

    $sql_am = "SELECT * FROM tbl_admin WHERE username = '".$email."' LIMIT 1 ";
    $row_am = mysqli_query($mysqli, $sql_am);
    $id_am = mysqli_fetch_array($row_am);
    $count_am = mysqli_num_rows($row_am);

    if ($count > 0 || $count_am > 0){
        if ($count > 0) {
            echo '<script>alert("Địa chỉ đúng vui lòng đặt lại mật khẩu"); window.location.href = "index.php?quanly=datlaimatkhau&id=' . $id["id_dangky"] . '";</script>';
        }else if ($count_am > 0) {
            echo '<script>alert("Địa chỉ đúng vui lòng đặt lại mật khẩu"); window.location.href = "index.php?quanly=datlaimatkhau&id=' . $id_am["id_admin"] . '";</script>';
        } 
    }else {
        echo '<p style="color:red;text-align:center">Không tìm thấy Email của bạn.Vui lòng kiểm tra lại!</p>';
    }
}
?>

<script>
    if ("<?php echo isset($_SESSION['dangky']); ?>" === "1") {
        alert("Đăng nhập thành công");
        window.location.href = "index.php"; 
    }
</script>

<form action="" method="POST">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Nhập địa chỉ email</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Tài khoản</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="timtaikhoan" value="Tìm kiếm tài khoản">
                        </div>
                        <div class="form-group text-center">
                            <a href="index.php?quanly=dangnhap">Quay lại đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
