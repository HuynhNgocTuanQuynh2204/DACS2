<?php
  session_start();
  include("../../admincp/config/config.php");
  require("../../mail/sendmail.php");
 require("../../carbon/autoload.php");
 use Carbon\Carbon;
 use Carbon\CarbonInterval;
 $now = Carbon::now('Asia/Ho_Chi_Minh');
 $now->format('Y-m-d H:i:s');
 $sql_mail = "SELECT * FROM tbl_cart";
 $r = mysqli_query($mysqli, $sql_mail);
 $q = mysqli_fetch_array($r);
 $id_khachhang = $_SESSION['id_khachhang'];
 $code_oder = rand(0,9999);
 $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,thoigian) VALUES ('".$id_khachhang."','".$code_oder."',1,'".$now."')";
 $cart_query = mysqli_query($mysqli,$insert_cart);
 if($cart_query){
    //theo giỏ hàng chi tiết
    foreach($_SESSION['cart'] as $key => $value){
      $id_sanpham = $value['id'];
      $soluong = $value['soluong'];
      $insert_oder_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua,thoigian) VALUES ('".$id_sanpham."','".$code_oder."','".$soluong."','".$now."')";
      mysqli_query($mysqli,$insert_oder_details);
    }
    $tieude = "Đặt hàng website Security.com thành công !";
    $noidung ="<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng là: ".$code_oder."</p>";
    $noidung .= "<h4>Đơn hàng đặt bao gồm: </h4>";


    foreach($_SESSION['cart'] as $key => $val){
     $noidung .= "<ul style='border: 1px solid blue;margin:10px'>
                <li>Tên sản phẩm: ".$val['tensanpham']."</li>
                <li>MÃ sản phẩm: ".$val['masp']."</li>
                <li>Giá sản phẩm: ".number_format($val['giasp'],0,',','.')."vnđ</li>
                <li>Số lượng sản phẩm: ".$val['soluong']."</li>
                <li>Thời gian đặt: ". $now."</li>
     </ul>";

    }


    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude,$noidung,$maildathang);
 }
  unset($_SESSION['cart']);
  header('location:../../index.php?quanly=camon');
?>