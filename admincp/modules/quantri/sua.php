<?php
  $sql_qt = "SELECT * FROM tbl_admin  WHERE id_admin = '$_GET[id_admin]' ";
  $qr = mysqli_query($mysqli,$sql_qt);
  $row = mysqli_fetch_array($qr);
?>
<form action="modules/quantri/xuly.php?id=<?php echo  $row['id_admin'] ?>" method="POST" style="padding: 15px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sửa quyền quản trị</h3>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Họ và tên..." value="<?php echo $row['name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại..." value="<?php echo $row['phone'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Tài khoản</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email..." value="<?php echo $row['username'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="address" class="form-control" name="address" id="address" placeholder="Địa chỉ..." value="<?php echo $row['diachi'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <input type="text" class="form-control" name="level" id="level" placeholder="Level..." value="<?php echo $row['admin_status'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="suataikhoan" value="Sửa tài khoản">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
