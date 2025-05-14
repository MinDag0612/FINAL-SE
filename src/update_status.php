<?php
// update_status.php
include 'connect.php';
$conn->set_charset("utf8");

$id = $_POST['id'] ?? '';
$status = $_POST['status'] ?? '';

$allowed = ['Pending', 'Preparing', 'Completed', 'Cancelled'];
if (!in_array($status, $allowed)) {
    echo "Trạng thái không hợp lệ!";
    exit;
}

$stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Đã cập nhật trạng thái!";
} else {
    echo "Không có thay đổi hoặc lỗi!";
}

$stmt->close();
$conn->close();
