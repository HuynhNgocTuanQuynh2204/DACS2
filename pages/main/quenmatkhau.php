<?php
  if (isset($_POST['timtaikhoan'])){
    $email = $_POST['email'];
    $sql = "SELECT * FROM tbl_dangky WHERE email = '".$email."' LIMIT 1 ";
    $row = mysqli_query($mysqli, $sql);
    $id = mysqli_fetch_array($row);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        echo '<script>alert("Địa chỉ đúng vui lòng đặt lại mật khẩu"); window.location.href = "index.php?quanly=datlaimatkhau&id=' . $id["id_dangky"] . '";</script>';
     } else {
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
