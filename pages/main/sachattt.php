<h3 style="text-align: center; text-transform: uppercase; font-weight: bold;">Sách mới nhất</h3>

<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 12) - 12;
}
$sql_pro_sach = "SELECT * FROM tbl_sach ORDER BY id_sach LIMIT $begin,12 ";
$query_pro_sach = mysqli_query($mysqli, $sql_pro_sach);
?>

<div class="row">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro_sach)) {
    ?>
    <div class="col-md-3">
        <div class="book-item">
            <a href="index.php?quanly=sach&id=<?php echo $row_pro['id_sach']?>">
                <img class="img img-responsive" width="100%" height="220px" src="admincp/modules/sach/uploads/<?php echo $row_pro['hinhanh'] ?>">
                <p class="title_product"><?php echo $row_pro['tensach'] ?></p>
                <p class="author">Tác giả: <?php echo $row_pro['tacgia'] ?></p>
            </a>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<div style="clear: both;"></div>
<?php
$sql_trang = mysqli_query($mysqli, 'SELECT * FROM tbl_sach');
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 12);
?>
<p> Trang hiện tại: <?php echo $page; ?>/<?php echo $trang; ?></p>
<ul class="pagination">
    <?php
    for ($i = 1; $i <= $trang; $i++) {
    ?>
    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
        <a class="page-link" href="index.php?quanly=sachattt&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
    </li>
    <?php
    }
    ?>
</ul>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Chat"
  agent-id="b91913fe-2279-4cb9-8a27-f191300f8056"
  language-code="vi"
></df-messenger>