<?php
session_start();
include('config/config.php');

if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1 ";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
         $row_data = mysqli_fetch_array($row);
         $_SESSION['name'] = $row_data['name'];
        $_SESSION['dangnhap'] = $row_data['username'];
        $_SESSION['id_admin'] = $row_data['id_admin'];
        header('location:index.php');
    } else {
        echo '<script> alert("Tài khoản hoặc mật khẩu không đúng vui lòng nhập lại");</script>';
        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập </title>
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
                <h3 class="card-title">Đăng nhập quyền quản trị</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" name="dangnhap" value="Đăng nhập">
                </div>
                <div class="form-group text-center">
                            <a href="quenmatkhau.php">Quên mật khẩu</a>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
