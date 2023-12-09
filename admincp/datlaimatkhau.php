<?php
session_start();
include('config/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu </title>
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
                <h3 class="card-title">Đặt lại mật khẩu của bạn</h3>
            </div>
            <?php
                if (isset($_POST['datlaimatkhau'])) {
                    $matkhau1 = md5($_POST['password1']);
                    $matkhau2 = md5($_POST['password2']);
                    $id = $_GET['id'];
                    if($matkhau1 == $matkhau2){
                        $sql = "UPDATE tbl_admin SET password = '$matkhau1' WHERE id_admin = '$id'";
                        $row = mysqli_query($mysqli, $sql);
                        
                        if ($row && mysqli_affected_rows($mysqli) > 0) {
                            echo '<script>alert("Mật khẩu đặt lại thành công");window.location.href = "login.php";</script>';
                        } else {
                            echo '<script>alert("Có lỗi xảy ra. Vui lòng thử lại sau.");</script>';
                        }
                    } else {
                        echo '<script>alert("Mật khẩu không khớp. Vui lòng nhập lại.");</script>';
                    }
                }
            ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="password">Mật khẩu mới</label>
                    <input type="password" class="form-control" name="password1" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="password2" id="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" name="datlaimatkhau" value="Đặt lại mật khẩu">
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
