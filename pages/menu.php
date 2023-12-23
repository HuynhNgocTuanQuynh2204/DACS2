<?php
      $sql_danhmuc ="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
      $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
?>
<?php
      $sql_danhmuc_bv ="SELECT * FROM tbl_danhmucbaiviet ORDER BY id_danhmucbaiviet DESC";
      $query_danhmuc_bv = mysqli_query($mysqli,$sql_danhmuc_bv);
?>
<?php
      $sql_danhmuc_sach ="SELECT * FROM tbl_danhmucsach ORDER BY id_danhmucsach DESC";
      $query_danhmuc_sach = mysqli_query($mysqli,$sql_danhmuc_sach);
?>
<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
        unset($_SESSION['email']);
        unset($_SESSION['id_khachhang']);
        header('location:index.php?quanly=dangnhap');
    }
?>
<style>
 .fixed-menu {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
  
}
.bell-icon {
      color: #FF0000; 
    }
    .dropdown-menu {
      display: none;
    }
    .notification-item {
      cursor: pointer;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%;" >
  <a class="navbar-brand" href="index.php"><i class="fa-solid fa-user-secret"></i> SECURITY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?quanly=giohang">Giỏ hàng</a>
      </li>
      <li class="nav-item"><a  class="nav-link" href="index.php?quanly=tintuc">Tin tức</a></li>
      <li class="nav-item"><a  class="nav-link" href="index.php?quanly=sachattt">Sách tham khảo</a></li>
      <li class="nav-item"><a  class="nav-link" href="index.php?quanly=khoahoc">Khóa học</a></li>
      <li class="nav-item"><a  class="nav-link" href="index.php?quanly=tailieu">Tài liệu</a></li>
      <li class="nav-item"><a  class="nav-link" href="index.php?quanly=congdong">Cộng đồng</a></li>
      <li class="nav-item"><a  class="nav-link" href="index.php?quanly=lienhe">Liên hệ</a></li>
      <li class="nav-item d-md-none"><a  class="nav-link" href="index.php?quanly=dangbai">Đăng bài</a></li>
      <?php
      if(isset($_SESSION['dangky'])){
      ?>
      <li class="nav-item d-md-none"><a  class="nav-link" href="index.php?quanly=quanlybaidang">Trạng thái bài đăng</a></li>
      <?php
      }
      ?>
      <li class="nav-item dropdown d-md-none">
        <a class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-expanded="false" >
         Khóa học
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
             while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
          <a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
          <?php
            }
           ?>
        </div>
      </li>
      <li class="nav-item dropdown d-md-none">
        <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown">
       Tin tức
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
             while($row_danhmuc_bv = mysqli_fetch_array($query_danhmuc_bv)){
        ?>
          <a class="dropdown-item" href="index.php?quanly=danhmucbaiviet&id=<?php echo $row_danhmuc_bv['id_danhmucbaiviet']?>"><?php echo $row_danhmuc_bv['tendanhmucbaiviet'] ?></a>
          <?php
            }
           ?>
        </div>
      </li>
      <li class="nav-item dropdown d-md-none" >
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" >
       Sách
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
             while($row_danhmuc_sach = mysqli_fetch_array($query_danhmuc_sach)){
        ?>
          <a class="dropdown-item" href="index.php?quanly=danhmucsach&id=<?php echo $row_danhmuc_sach['id_danhmucsach']?>"><?php echo $row_danhmuc_sach['tendanhmucsach'] ?></a>
          <?php
            }
           ?>
        </div>
      </li>
      <?php
                 if(isset($_SESSION['dangky'])){
                 ?>
                 <li class="nav-item"><a  class="nav-link" href="index.php?dangxuat=1">Đăng xuất</a></li>
                 <li class="nav-item"><a  class="nav-link" href="index.php?quanly=thaydoimatkhau">Đổi mật khẩu</a></li>
                 <li class="nav-item"><a  class="nav-link" href="index.php?quanly=lichsudonhang">Lịch sử đơn hàng</a></li>
                 <li><?php 
                       if(isset($_SESSION['level']) && $_SESSION['level'] == "0") { ?>
                                  <a class="btn btn-danger" href="http://localhost/SECURITY/admincp/login.php" target="_blank">ADMIN</a></b>
                        <?php
                        }elseif($_SESSION['level']=="1") { 
                         ?>
                          <a class="btn btn-danger" href="http://localhost/SECURITY/admincp/login.php" target="_blank">Quản lý</a></b>
                         <?php
                        }elseif($_SESSION['level']=="2"){?>
                         <a class="btn btn-danger" href="http://localhost/SECURITY/admincp/login.php" target="_blank">Nhân viên</a></b>
                        <?php
                        }
                        ?>
                        ?></li>
 
                 <?php
                 }else{
                 ?>
                 <li class="nav-item"><a  class="nav-link" href="index.php?quanly=dangnhap">Đăng nhập</a></li>
                 <?php
                 }
                ?>
    </ul>
    <br>
    <form class="form-inline my-2 my-lg-0" action="index.php?quanly=timkiem" method="POST">
      <input class="form-control mr-sm-2" type="search" name="tukhoa" placeholder="Từ khóa..." aria-label="Search" required>
      <button class="btn btn-outline-success my-2 my-sm-0" name="timkiem" type="submit">Tìm kiếm</button>
    </form>
  </div>
</nav>



<!-- <div class="menu">
            <ul class="listmenu">
                <li><a href="index.php">Trang chủ</a></li>
                <?php
                 while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                <?php
                 }
                ?>
                <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
                 <?php
                 if(isset($_SESSION['dangky'])){
                 ?>
                 <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
                 <li><a href="index.php?quanly=thaydoimatkhau">Đổi mật khẩu</a></li>
                 <?php
                 }else{
                 ?>
                 <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
                 <?php
                 }
                 ?>
                
                <li><a href="index.php?quanly=tintuc">Tin tức</a></li>
                <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
               
            </ul>
            <p>
            <form action="index.php?quanly=timkiem" method="POST">
                <input type="text" placeholder="Tìm kiếm sản phẩm,tin tức..." name="tukhoa">
                <input type="submit" name="timkiem" value="Tìm kiếm">
            </form>
        </p>
</div> -->