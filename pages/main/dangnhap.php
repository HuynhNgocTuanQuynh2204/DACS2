<?php
  if (isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau = '".$matkhau."' LIMIT 1 ";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0){
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        $_SESSION['email'] = $row_data['email'];
        $_SESSION['id_khachhang'] = $row_data['id_dangky'];
        // echo '<script>alert("Đăng nhập thành công")</script>';
    } else {
        echo '<p style="color:red">Mật khẩu hoặc tài khoản sai. Vui lòng đăng nhập lại. </p>';
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
                        <h3 class="card-title">Đăng nhập khách hàng</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">Tài khoản</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu...">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="dangnhap" value="Đăng nhập">
                        </div>
                        <div class="form-group text-center">
                            <a href="index.php?quanly=dangky">Đăng ký tài khoản</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
