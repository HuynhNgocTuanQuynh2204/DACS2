<h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Bình luận ở những bài viết gần đây</h6>
<?php
$id_user = $_SESSION['id_khachhang'];

$sql = "SELECT * FROM comments 
        INNER JOIN tbl_dangky ON comments.user_id = tbl_dangky.id_dangky
        INNER JOIN tbl_dangbai ON comments.post_id = tbl_dangbai.id_baidang 
        WHERE tbl_dangky.id_dangky != $id_user AND tbl_dangbai.id_user = $id_user  ORDER BY comments.time DESC";

$result = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($kq = mysqli_fetch_array($result)) {
        ?>
                <form action="">
                    <tr>
                        <td>Tên</td>
                        <td><?php echo $kq['tenkhachhang']; ?>:</td>
                        <td><?php echo $kq['time']; ?></td>
                    </tr>
                    <tr>
                        <td>Đã bình luận bài đăng:</td>
                        <a href="index.php?quanly=chitietbaidang&id=<?php echo $kq['post_id']?>">
                            <p style="color: red;"><?php echo $kq['tenbaidang']; ?></p>
                        </a>
                    </tr>
                </form>
        <?php
            }
        } else {
            echo "Không có bình luận từ người dùng khác cho bài viết của bạn.";
        }
?>
