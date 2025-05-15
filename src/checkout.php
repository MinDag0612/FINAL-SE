<?php
include 'connect.php'; // file kết nối CSDL

if (!isset($_POST['cartData'])) {
    echo "<h2>Không có dữ liệu giỏ hàng!</h2>";
    exit;
}

$cartJson = $_POST['cartData'];
$cart = json_decode($cartJson, true);
$total = 0;

if (!$cart || count($cart) === 0) {
    echo "<h2>Giỏ hàng trống!</h2>";
    exit;
}

// Tạo chuỗi mô tả đơn hàng
$orderItems = [];
foreach ($cart as $name => $item) {
    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;
    $orderItems[] = "$name x {$item['quantity']}";
}
$orderDescription = implode(", ", $orderItems);

session_start();
$user_id = $_SESSION['user_id'] ?? 'guest';

// Lưu vào bảng orders
$conn->set_charset("utf8");
$stmt = $conn->prepare("INSERT INTO orders (user_id, items, total_price) VALUES (?, ?, ?)");
$stmt->bind_param("ssd", $user_id, $orderDescription, $total);
$stmt->execute();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hóa đơn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 40px;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
        }
    </style>
    <link rel="stylesheet" href="style/home.css" />
</head>
<body>
    <div class="invoice-box">
        <h2 class="text-center mb-4">HÓA ĐƠN THANH TOÁN</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá (đ)</th>
                    <th>Thành tiền (đ)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $name => $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                ?>
                <tr>
                    <td><?= htmlspecialchars($name) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= number_format($item['price'], 2) ?></td>
                    <td><?= number_format($subtotal, 2) ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="text-end"><strong>Tổng cộng</strong></td>
                    <td><strong><?= number_format($total, 2) ?> đ</strong></td>
                </tr>
            </tbody>
        </table>

        <p class="text-center mt-4">Cảm ơn bạn đã mua hàng!</p>
        <div class="text-center">
            <a href="home.php" class="btn btn-success">Quay lại cửa hàng</a>
        </div>
    </div>
</body>
</html>
