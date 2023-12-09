<?php
include('../../admincp/config/config.php');
session_start();
$user_id = $_SESSION['id_khachhang']; // Thay thế bằng ID của người dùng đang đăng nhập

// Kiểm tra replies mới chưa được xem cho người dùng
$sql = "SELECT COUNT(*) as count FROM comment_replies WHERE user_id = $user_id ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['count']; // Trả về số lượng replies mới chưa được xem
} else {
    echo '0';
}

$conn->close();
?>