<?php
       $sql_pro ="SELECT * FROM tbl_sach WHERE tbl_sach.id_danhmucsach = '$_GET[id]' ORDER BY id_sach DESC";
       $query_pro = mysqli_query($mysqli,$sql_pro);
       //get ten danh muc
       $sql_cate ="SELECT * FROM tbl_danhmucsach WHERE tbl_danhmucsach.id_danhmucsach = '$_GET[id]' LIMIT 1";
       $query_cate = mysqli_query($mysqli,$sql_cate);
       $row_title = mysqli_fetch_array($query_cate);
         //get title danhmuc
      //    $sql_pro_title = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
      //    $query_pro_title = mysqli_query($mysqli,$sql_pro_title);
      // $row_title = mysqli_fetch_array($query_pro_title);
?>
<h3>Danh mục sách : <?php echo $row_title['tendanhmucsach'] ?></h3> 
<div class="row">
                <?php
                   while($row = mysqli_fetch_array($query_pro)){
                ?>
                <div class="col-md-3">
                <div class="book-item">
                    <a href="index.php?quanly=sach&id=<?php echo $row['id_sach']?>">
                    <img class="img img-fluid" width="100%" height="220px" src="admincp/modules/sach/uploads/<?php  echo $row['hinhanh'] ?>">
                    <p class="title_product"><?php  echo $row['tensach'] ?></p>
                    <p class="title_product" style="color: blueviolet;">Tác giả: <?php  echo $row['tacgia'] ?></p>
                    </a>
                </div>
                   </div>
                <?php
                    }
                ?>
           </div>