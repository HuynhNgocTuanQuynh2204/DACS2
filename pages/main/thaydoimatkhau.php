<?php
  if (isset($_POST['doimatkhau'])){
    $matkhau_cu =md5($_POST['password_cu']);
    $matkhau_moi =md5($_POST['password_moi']);
    $sql = "SELECT * FROM tbl_dangky WHERE matkhau ='".$matkhau_cu."' LIMIT 1 ";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if ($count>0){
        $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangky SET  matkhau ='".$matkhau_moi."'");
        echo '<p style="color:green;text-align:center;">Mật khẩu đã được thay đổi</p>';
    }else{
        echo '<p style="color:red;text-align:center;">Mật khẩu cũ không đúng vui lòng nhập lại</p>';
    }
  }
?>
<form action="" method="POST">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Đổi mật khẩu</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="password">Mật khẩu cũ</label>
                            <input type="password" class="form-control" name="password_cu" id="password" placeholder="Mật khẩu cũ...">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password_moi" id="password" placeholder="Mật khẩu mới...">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="doimatkhau" value="Đổi mật khẩu">
                        </div>
                        <div class="form-group text-center">
                            <a href="index.php?quanly=quanlytaikhoan">Quản lí tài khoản </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>