<?php
    session_start();
    require 'vendor/autoload.php';
    require_once 'connect.php';

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    echo $twig->render('dashboard.html.twig', [
        'data' => $_SESSION['data']
    ])
?>