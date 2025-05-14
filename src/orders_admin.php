<?php
require_once 'vendor/autoload.php';
include 'connect.php';

$conn->set_charset("utf8");

// Lấy danh sách đơn hàng
$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
$orders = $result->fetch_all(MYSQLI_ASSOC);

// Cấu hình Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

// Render giao diện
echo $twig->render('admin_orders.html.twig', [
    'orders' => $orders
]);
