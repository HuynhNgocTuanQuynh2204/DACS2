<?php
  if (isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql_dangky = "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau = '".$matkhau."' LIMIT 1 ";
    $result_dangky = mysqli_query($mysqli, $sql_dangky);
    $count_dangky = mysqli_num_rows($result_dangky);
    
    $sql_admin = "SELECT * FROM tbl_admin WHERE username = '".$email."' AND password = '".$matkhau."' LIMIT 1 ";
    $result_admin = mysqli_query($mysqli, $sql_admin);
    $count_admin = mysqli_num_rows($result_admin);

    if ($count_dangky > 0 || $count_admin > 0){
        if ($count_dangky > 0) {
            $row_dangky = mysqli_fetch_array($result_dangky);
            $_SESSION['dangky'] = $row_dangky['tenkhachhang'];
            $_SESSION['email'] = $row_dangky['email'];
            $_SESSION['id_khachhang'] = $row_dangky['id_dangky']; 
            $_SESSION['level'] = $row_dangnhap['level'];
        } else if ($count_admin > 0) {
            $row_dangnhap = mysqli_fetch_array($result_admin);
         $_SESSION['name'] = $row_dangnhap['name'];
         $_SESSION['dangnhap'] = $row_dangnhap['username'];
         $_SESSION['id_admin'] = $row_dangnhap['id_admin'];
         $_SESSION['level'] = $row_dangnhap['admin_status'];
        }
    } else {
        echo '<p style="color:red">Mật khẩu hoặc tài khoản sai. Vui lòng đăng nhập lại. </p>';
    }
  }
?>

<script>
    if ("<?php echo isset($_SESSION['dangky']); ?>" === "1") {
        alert("Đăng nhập thành công");
        window.location.href = "index.php"; 
    }else if("<?php echo isset($_SESSION['dangnhap']); ?>" === "1"){
        alert("Đăng nhập thành công");
        window.location.href = "admincp/index.php"; 
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
                            <a href="index.php?quanly=quenmatkhau">Quên mật khẩu ?</a>
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
