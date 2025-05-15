<?php
    session_start();
    require 'vendor/autoload.php';
    require_once 'connect.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
    $orders = $result->fetch_all(MYSQLI_ASSOC);

    $result_feed = $conn->query("SELECT * FROM feedbacks");
    $feedbacks = $result_feed->fetch_all(MYSQLI_ASSOC);

    echo $twig->render('admin_page.html.twig', [
        'data' => $_SESSION['data'],
        'orders' => $orders,
        "feedback" => $feedbacks

    ])
?>