<?php 
   if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
    unset($_SESSION['dangnhap']);
    unset($_SESSION['name']);
    unset($_SESSION['id_admin']);
    unset($_SESSION['level']);
    header('location:http://localhost/SECURITY/index.php?quanly=dangnhap');
   }
?>  

<div class="container mt-4" style="text-align: center;">
    <p><a href="index.php?dangxuat=1" class="btn btn-danger">Đăng xuất: 
        <?php if (isset($_SESSION['dangnhap'])){
            echo $_SESSION['dangnhap'];
        } 
        ?>
    </a>
    <a href="../index.php" class="btn btn-info">Đến trang người dùng</a>
</p>
</div>
