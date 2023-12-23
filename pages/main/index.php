<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Trang chủ</title>
</head>
<body>
<?php
  $sql = "SELECT * FROM tbl_trangchu";
  $query = mysqli_query($mysqli,$sql);
?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
  <div class="carousel-inner">
    <?php 
      $active = true; // Biến này để kiểm soát slide đầu tiên là active
      while($row = mysqli_fetch_array($query)){
    ?>
    <div class="carousel-item <?php if($active){ echo 'active'; $active = false; } ?>">
      <a href="<?php echo $row['link'] ?>"><img   src="admincp/modules/quanlywebsite/uploads/<?php echo $row['hinhanh'] ?>" class="d-block w-100" alt="Slide"></a>
    </div>
    <?php
      }
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container mt-5">
    <div class="row">
      <div class="col-lg-12 ">
        <div class="text-center mb-4">
        <h1 style="text-align: center; font-size: 36px; color: #333; margin-bottom: 20px;">
    Kết Nối Với Chúng Tôi - Khám Phá Một Thế Giới Bảo Mật An Toàn Thông Tin!
</h1>
          <p style="text-align: justify;font-size: 18px;">
          Chào mừng bạn đến với trang chủ của chúng tôi - một cửa hàng thông tin về bảo mật mạng và an toàn thông tin. Chúng tôi không chỉ là nền tảng học tập, chúng tôi còn là một cộng đồng nơi bạn có thể tìm hiểu, chia sẻ và mở rộng kiến thức.
Ở đây, chúng tôi cung cấp những khóa học đa dạng từ cơ bản đến chuyên sâu về bảo mật mạng, với sự hỗ trợ từ các chuyên gia hàng đầu trong ngành. Chúng tôi không chỉ cung cấp kiến thức mà còn tạo ra môi trường học tập thú vị và tương tác.
Với sứ mệnh làm cho bảo mật mạng trở nên dễ hiểu và áp dụng, chúng tôi hy vọng mỗi thành viên tham gia sẽ trở thành một chuyên gia trong việc bảo vệ thông tin cá nhân và doanh nghiệp.
Hãy liên hệ với chúng tôi ngay hôm nay để bắt đầu hành trình của bạn trong thế giới bảo mật mạng. Chúng tôi luôn sẵn lòng lắng nghe và hỗ trợ bạn trên con đường của kiến thức và thành công.
Hãy nhập thông tin liên hệ của bạn dưới đây hoặc đăng ký để nhận tin tức và cập nhật mới nhất từ chúng tôi. Chào mừng bạn đến với cộng đồng của chúng tôi
          </p>
        </div>
        <div>
          <img class="img img-fluid" src="images/p69.png" width="100%" alt="">
        </div>
      </div>
    </div>
  </div>
<?php
  $mysql_baidang = "SELECT * FROM tbl_dangbai";
  $query_baidang = mysqli_query($mysqli,$mysql_baidang);
?>
 <h1 style="text-align: center; font-size: 36px; color: #333; margin-bottom: 20px;">
 Các bài đăng mới nhất đến từ cộng đồng!
</h1>
   <p style="text-align: justify;font-size: 18px;">Chúng tôi không chỉ chú trọng đến việc truyền đạt kiến thức mà còn tạo ra một không gian
    mở, một cộng đồng nơi mọi người có thể thảo luận, chia sẻ kinh nghiệm và học hỏi lẫn nhau. Đây không chỉ là nơi học tập mà còn là sân 
    chơi để mở rộng mối quan hệ chuyên ngành và phát triển sự am hiểu sâu sắc về an ninh mạng.</p>
<div class="slider">
      <div class="slide-track">
        <?php 
            while($row_baidang = mysqli_fetch_array($query_baidang)){
        ?>
        <div class="slide1">
        <a href="index.php?quanly=chitietbaidang&id=<?php echo $row_baidang['id_baidang']?>">
          <img src="uploads/<?php echo $row_baidang['hinhanh'] ?>" alt="<?php echo $row_baidang['tenbaidang'] ?>">
          </a>
        </div>
        <?php
            }
            ?>
      </div>
</div>
<?php
  $mysql_tintuc = "SELECT * FROM tbl_baiviet";
  $query_tintuc = mysqli_query($mysqli,$mysql_tintuc);
?>
   <p style="text-align: justify;font-size: 18px;">
Tự hào giới thiệu một không gian tương tác năng động về bảo mật mạng và an toàn thông tin, chúng tôi không chỉ là nền tảng học tập mà còn là
 nguồn thông tin đa chiều, cập nhật liên tục về các xu hướng, lỗ hổng bảo mật, và chiến lược phòng thủ. Chúng tôi luôn sẵn lòng đồng hành 
 cùng bạn trong việc hiểu rõ những nguy cơ tiềm ẩn và áp dụng những biện pháp bảo mật hiệu quả.Thông qua việc cung cấp tin tức mới nhất, 
 chúng tôi mong muốn tạo ra một nguồn thông tin đáng tin cậy, giúp bạn tiếp cận thông tin bảo mật một cách toàn diện và thực tế. Những cập 
 nhật hàng ngày về các lỗ hổng bảo mật, các mô hình tấn công tiên tiến, và các phương pháp bảo vệ mới nhất sẽ giúp bạn nắm bắt xu hướng và 
 tiếp tục cải thiện chiến lược an ninh thông tin của mình.</p>
  <h1 style="text-align: center; font-size: 36px; color: #333; margin-bottom: 20px;">
  Cập Nhật Về Bảo Mật và Tin Tức Thông Tin!
</h1>
<div class="slider">
      <div class="slide-track">
        <?php 
            while($row_tintuc = mysqli_fetch_array($query_tintuc)){
        ?>
        <div class="slide1">
        <a href="index.php?quanly=baiviet&id=<?php echo $row_tintuc['id_baiviet']?>">
          <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_tintuc['hinhanh'] ?>" alt="<?php echo $row_tintuc['tenbaiviet'] ?>">
          </a>
        </div>
        <?php
            }
            ?>
      </div>
</div>
<?php
  $mysql_sach = "SELECT * FROM tbl_sach";
  $query_sach = mysqli_query($mysqli,$mysql_sach);
?>
   <p style="text-align: justify;font-size: 18px;">Chào mừng bạn đến với trang chủ của chúng tôi - nơi cung cấp kiến thức và thông tin đa 
   dạng về bảo mật mạng và an toàn thông tin. Chúng tôi không chỉ đơn thuần là một nền tảng học tập, mà còn là một cộng đồng đầy nhiệt huyết
   , nơi mà bạn có thể tìm hiểu, chia sẻ và mở rộng kiến thức</p>
  <h1 style="text-align: center; font-size: 36px; color: #333; margin-bottom: 20px;">
  Thư Viện Sách Bảo Mật và An Toàn Thông Tin!
</h1>
<div class="slider">
      <div class="slide-track">
        <?php 
            while($row_sach = mysqli_fetch_array($query_sach)){
        ?>
        <div class="slide1">
        <a href="index.php?quanly=sach&id=<?php echo $row_sach['id_sach']?>">
          <img src="admincp/modules/sach/uploads/<?php echo $row_sach['hinhanh'] ?>" alt="<?php echo $row_sach['tensach'] ?>">
          </a>
        </div>
        <?php
            }
            ?>
      </div>
</div>
<?php
  $mysql_sanpham = "SELECT * FROM tbl_sanpham";
  $query_sanpham = mysqli_query($mysqli,$mysql_sanpham);
?>
   <p style="text-align: justify;font-size: 18px;">Chúng tôi tự hào giới thiệu loạt các khóa học chất lượng cao, nhằm mục tiêu cung cấp kiến
thức sâu rộng về bảo mật mạng và an toàn thông tin. Tại đây, chúng tôi tập trung vào việc xây dựng những khóa học đặc sắc, thú vị và thực tiễn 
để giúp học viên tiếp cận và nắm vững các nguyên tắc và kỹ năng cần thiết trong lĩnh vực này.Dưới đây là một số trong những khóa học đáng chú ý mà chúng tôi cung cấp</p>
   <h1 style="text-align: center; font-size: 36px; color: #333; margin-bottom: 20px;">
   Thư Viện Khóa Học Bảo Mật và An Toàn Thông Tin!
   <div class="slider">
      <div class="slide-track">
        <?php 
            while($row_sanpham = mysqli_fetch_array($query_sanpham)){
        ?>
        <div class="slide1">
        <a href="index.php?quanly=sanpham&id=<?php echo $row_sanpham['id_sanpham']?>">
          <img src="admincp/modules/quanlysp/uploads/<?php echo $row_sanpham['hinhanh'] ?>" alt="<?php echo $row_sanpham['tensanpham'] ?>">
          </a>
        </div>
        <?php
            }
            ?>
      </div>
</div>
<?php
  $mysql_tailieu = "SELECT * FROM tbl_tailieu";
  $query_tailieu = mysqli_query($mysqli,$mysql_tailieu);
?>
   <p style="text-align: justify;font-size: 18px;">Đồng thời, chúng tôi hân hạnh giới thiệu một bộ sưu tập sách đa dạng và chất lượng cao về
    bảo mật mạng và an toàn thông tin. Những tựa sách này không chỉ giúp bạn hiểu rõ hơn về bảo mật mạng mà còn đưa ra những cách tiếp cận 
    mới mẻ và sáng tạo trong việc bảo vệ thông tin cá nhân và doanh nghiệp của bạn.</p>
  <h1 style="text-align: center; font-size: 36px; color: #333; margin-bottom: 20px;">
  Tài Liệu Và Sách Về An Toàn Thông Tin!
</h1>
<div class="slider">
      <div class="slide-track">
        <?php 
            while($row_tailieu = mysqli_fetch_array($query_tailieu)){
        ?>
        <div class="slide1">
        <a class="btn btn-secondary" href="<?php echo $row_tailieu["link"] ?>">
          <img src="admincp/modules/tailieu/uploads/<?php echo $row_tailieu['hinhanh'] ?>" alt="<?php echo $row_tailieu['tentailieu'] ?>">
          </a>
        </div>
        <?php
            }
            ?>
      </div>
</div>
<p style="text-align: justify;font-size: 18px;">Hãy đồng hành cùng chúng tôi để khám phá những thông tin cập nhật và cùng nhau xây dựng một 
môi trường an toàn, thông tin và đầy tri thức. Chúng tôi tin rằng, thông qua sự chia sẻ, học hỏi và áp dụng kiến thức thực tiễn, bạn sẽ trở 
thành một chuyên gia tự tin về an toàn thông tin không chỉ cho bản thân mình mà còn cho cả cộng đồng xung quanh.</p>

<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Chat"
  agent-id="b91913fe-2279-4cb9-8a27-f191300f8056"
  language-code="vi"
></df-messenger>
</body>
</html>
