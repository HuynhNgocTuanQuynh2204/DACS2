<form action="" method="POST">
    <?php
    $sql_qltk = "SELECT * FROM tbl_dangky ORDER BY id_dangky";
    $qr = mysqli_query($mysqli,$sql_qltk);
    $row_qltk = mysqli_fetch_array($qr);
    ?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quản lý tài khoản</h3>
                    </div>
                    <?php
                            if (isset($_POST['datlaitk'])){
                               $name = $_POST['name'];
                               $address = $_POST['address'];
                               $phone = $_POST['phone'];
                                $sql = "UPDATE tbl_dangky SET  tenkhachhang ='".$name."', diachi ='".$address."', dienthoai ='".$phone."' WHERE id_dangky = '".$_SESSION['id_khachhang']."'";
                                $row = mysqli_query($mysqli,$sql);
                                if ($row){
                                    echo '<p style="color:green;text-align:center;">Đặt lại tài khoản thành công</p>';
                                }else{
                                    echo '<p style="color:red;text-align:center;">Đã xảy ra lỗi. Vui lòng thử lại sau.</p>';
                                }
                            }
                    ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $row_qltk['tenkhachhang'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $row_qltk['diachi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row_qltk['dienthoai'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="datlaitk" value="Đặt lại">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>