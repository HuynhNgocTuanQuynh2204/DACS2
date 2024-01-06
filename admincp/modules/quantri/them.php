<form action="" method="POST" style="padding: 15px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thêm quyền quản trị dữ liệu</h3>
                    </div>
                    <?php
                            if (isset($_POST['themtaikhoan'])){
                                $tentaikhoan = $_POST['name'];
                                $phone = $_POST['phone'];
                                $email = $_POST['email'];
                                $matkhau = md5($_POST['password']);
                                $diachi = $_POST['address'];
                                $level = $_POST['level'];
                                $sql = "INSERT INTO tbl_admin (name,diachi,phone,username,password,admin_status) 
                                VALUES ('$tentaikhoan','$diachi','$phone','$email','$matkhau','$level')";
                                $row = mysqli_query($mysqli, $sql);
                                if ($row){
                                    echo '<p style="color:green;text-align:center;">Thêm thành công thành viên </p>';
                                } else {
                                    echo '<p style="color:red;text-align:center;">Đã xảy ra lỗi vui lòng thử lại.</p>';
                                }
                            }
                    ?>
                    <div class="card-body">
                    <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên..." required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại..." required>
                        </div>
                        <div class="form-group">
                            <label for="email">Tài khoản</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email..." required>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="address" class="form-control" name="address" id="address" placeholder="Địa chỉ..." required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu..." required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <input type="text" class="form-control" name="level" id="level" placeholder="Level..." required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="themtaikhoan" value="Thêm tài khoản">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
