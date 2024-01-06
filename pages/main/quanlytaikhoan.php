<form action="" method="POST">
    <?php
   if(isset($_SESSION['id_khachhang'])) {
    $id_khachhang = $_SESSION['id_khachhang'];
    $sql_qldk = "SELECT * FROM tbl_dangky WHERE id_dangky = '".$id_khachhang."' ORDER BY id_dangky";
    $qr = mysqli_query($mysqli, $sql_qldk);
    $row_qldk = mysqli_fetch_array($qr);
} else if(isset($_SESSION['id_admin'])) {
    $id_admin = $_SESSION['id_admin'];
    $sql_qlam = "SELECT * FROM tbl_admin WHERE id_admin = '".$id_admin."' ORDER BY id_admin";
    $am = mysqli_query($mysqli, $sql_qlam);
    $row_qlam = mysqli_fetch_array($am);
}
    ?>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quản lý tài khoản</h3>
                    </div>
                    <?php
                    if(isset($_SESSION['id_khachhang'])) {
                            if (isset($_POST['datlaitk'])){
                               $name = $_POST['name'];
                               $address = $_POST['address'];
                               $phone = $_POST['phone'];
                                $sql = "UPDATE tbl_dangky SET  tenkhachhang ='".$name."', diachi ='".$address."', dienthoai ='".$phone."' WHERE id_dangky = '".$id_khachhang."'";
                                $row = mysqli_query($mysqli,$sql);
                                if ($row){
                                    echo '<p style="color:green;text-align:center;">Đặt lại tài khoản thành công</p>';
                                }else{
                                    echo '<p style="color:red;text-align:center;">Đã xảy ra lỗi. Vui lòng thử lại sau.</p>';
                                }
                            }
                    }else{
                        if (isset($_POST['datlaitk'])){
                            $name = $_POST['name'];
                            $address = $_POST['address'];
                            $phone = $_POST['phone'];
                             $sql_am = "UPDATE tbl_admin SET  name ='".$name."', diachi ='".$address."', phone ='".$phone."' WHERE id_admin = '".$id_admin."'";
                             $row_am = mysqli_query($mysqli,$sql_am);
                             if ($row_am){
                                 echo '<p style="color:green;text-align:center;">Đặt lại tài khoản thành công</p>';
                             }else{
                                 echo '<p style="color:red;text-align:center;">Đã xảy ra lỗi. Vui lòng thử lại sau.</p>';
                             }
                         }
                    }
                    ?>
                    <div class="card-body">
                    <?php if(isset($row_qldk)) { ?>
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $row_qldk['tenkhachhang'] ?> " >
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $row_qldk['diachi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row_qldk['dienthoai'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="datlaitk" value="Đặt lại">
                        </div>
                        <?php
                        }else
                        ?>
                        <?php if(isset($row_qlam)) { ?>
                        <div class="form-group">
                            <label for="name">Họ và tên</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $row_qlam['name'] ?> " >
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $row_qlam['diachi'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row_qlam['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="datlaitk" value="Đặt lại">
                        </div>
                        <?php
                        }else
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>