<h3 style="text-align: center;text-transform: uppercase;font-weight: bold;">Chi tiết sách</h3>
<?php
       $sql_chitiet ="SELECT * FROM tbl_sach,tbl_danhmucsach WHERE tbl_sach.id_danhmucsach = tbl_danhmucsach.id_danhmucsach AND tbl_sach.id_sach= '$_GET[id]' 
      LIMIT 1";
       $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
        while($row_chitiet = mysqli_fetch_array($query_chitiet)){
      
?>
<div class="row">
  <div class="col-md-10">
    <div class="hinhanh_sanpham">
                <img class="img img-responsive" width="100%" height="150px" src="admincp/modules/sach/uploads/<?php  echo $row_chitiet['hinhanh'] ?>" alt="">
    </div>
     <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sach'] ?>">
                <h3 style="margin: 0;">Tên sách: <?php echo $row_chitiet['tensach']?></h3>
                <p>Mã sách: <?php echo $row_chitiet['masach']?></p>
                <p>Tác giả: <?php echo $row_chitiet['tacgia']?></p>
                <p>Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmucsach']?></p>
                
    </form>
  </div>
</div>
<div class="clear"></div>
      <div class="tabs">
        <ul id="tabs-nav">
          <li><a href="#tab1">Tóm tắt</a></li>
          <li><a href="#tab2">Nội dung chi tiết</a></li>
          <li><a href="#tab3">Hình ảnh</a></li>
        </ul> <!-- END tabs-nav -->
        <div id="tabs-content">
          <div id="tab1" class="tab-content">
          <?php echo $row_chitiet['tomtat']?>
          </div>
          <div id="tab2" class="tab-content" width="100%">
          <?php echo $row_chitiet['noidung']?>
          </div>
          <div id="tab3" class="tab-content">
          <img width="100%" src="admincp/modules/sach/uploads/<?php  echo $row_chitiet['hinhanh'] ?>" alt="">
          </div>
        </div> <!-- END tabs-content -->
      </div> <!-- END tabs -->
</div>

<?php
        }
    ?>