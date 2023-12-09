<?php
session_start();
include('config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
     body {
            background: #f2f2f2;
            background-image: url(../images/p63.webp);
            background-size: cover;
            background-repeat: no-repeat;
            }


        .wrapper-login {
            width: 25%;
            margin: 0 auto;
            margin-top: 100px; /* Để căn giữa form theo chiều dọc */
        }
    </style>
</head>
<body>
<div class="wrapper-login">
    <form action="" method="POST">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tìm kiếm tài khoản</h3>
            </div>
            <?php
            if (isset($_POST['timtaikhoan'])) {
                $email = $_POST['email'];
                 $sql = "SELECT * FROM tbl_admin WHERE username = '".$email."' LIMIT 1 ";
                 $row = mysqli_query($mysqli, $sql);
                 $id = mysqli_fetch_array($row);
                 $count = mysqli_num_rows($row);
                 if ($count > 0) {
                    echo '<script>alert("Địa chỉ đúng vui lòng đặt lại mật khẩu"); window.location.href = "datlaimatkhau.php?id=' . $id["id_admin"] . '";</script>';
                 } else {
                     echo '<p style="color:red;">Không tìm thấy Email của bạn.Vui lòng kiểm tra lại!</p>';
                 }
             }
            ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Nhập địa chỉ Email</label>
                    <input type="text" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" name="timtaikhoan" value="Tìm kiếm tài khoản">
                </div>
                <div class="form-group text-center">
                            <a href="login.php">Quay lại đăng nhập</a>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
