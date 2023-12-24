<h3 style="text-align: center; text-transform: uppercase; font-weight: bold;">Tài liệu hot nhất hiện nay</h3>

<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 9) - 9;
}
$sql_pro_tailieu = "SELECT * FROM tbl_tailieu ORDER BY tbl_tailieu.id_tailieu DESC LIMIT $begin,9 ";
$query_pro_tailieu = mysqli_query($mysqli, $sql_pro_tailieu);
?>

<div class="row">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro_tailieu)) {
    ?>
    <div class="col-md-4">
        <div class="document-item">
            <img class="img img-responsive" width="100%" height="280px" src="admincp/modules/tailieu/uploads/<?php echo $row_pro['hinhanh'] ?>">
            <p class="title_product"><?php echo $row_pro['tentailieu'] ?></p>
            <p><?php echo $row_pro["ngaydang"] ?></p>
            <div class="link_wrapper">
                <a class="btn btn-secondary" href="<?php echo $row_pro["link"] ?>">Xem và tải tài liệu tại đây</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<div style="clear: both;"></div>
<?php
$sql_trang = mysqli_query($mysqli, 'SELECT * FROM tbl_tailieu');
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 9);
?>
<p> Trang hiện tại: <?php echo $page; ?>/<?php echo $trang; ?></p>
<ul class="pagination">
    <?php
    for ($i = 1; $i <= $trang; $i++) {
    ?>
    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
        <a class="page-link" href="index.php?quanly=tailieu&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
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