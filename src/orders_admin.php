<?php
// admin_orders.php
include 'connect.php';
$conn->set_charset("utf8");

// Lấy danh sách đơn hàng
$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
$orders = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 30px; }
        .status-select { min-width: 130px; }
    </style>
</head>
<body>
    <h2 class="mb-4">Danh sách đơn hàng</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Người dùng</th>
                <th>Sản phẩm</th>
                <th>Tổng tiền (đ)</th>
                <th>Trạng thái</th>
                <th>Thời gian tạo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= htmlspecialchars($order['user_id']) ?></td>
                <td><?= htmlspecialchars($order['items']) ?></td>
                <td><?= number_format($order['total_price'], 2) ?></td>
                <td>
                    <select class="form-select status-select" data-id="<?= $order['id'] ?>">
                        <?php
                        $statuses = ['Pending', 'Preparing', 'Completed', 'Cancelled'];
                        foreach ($statuses as $status):
                        ?>
                        <option value="<?= $status ?>" <?= $status === $order['status'] ? 'selected' : '' ?>>
                            <?= $status ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><?= $order['created_at'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        document.querySelectorAll('.status-select').forEach(select => {
            select.addEventListener('change', function() {
                const orderId = this.dataset.id;
                const newStatus = this.value;

                fetch('update_status.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id=${orderId}&status=${newStatus}`
                })
                .then(res => res.text())
                .then(data => {
                    alert(data); // thông báo kết quả
                });
            });
        });
    </script>
</body>
</html>
